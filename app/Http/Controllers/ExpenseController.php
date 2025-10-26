<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    /**
     * Prikazuje listu troškova za određenu zgradu
     */
    public function index(Request $request, Building $building): JsonResponse
    {
        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        $query = $building->expenses();

        // Filtriranje po kategoriji
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Filtriranje po datumu
        if ($request->filled('year')) {
            $query->inYear($request->year);
        }

        if ($request->filled('month')) {
            $query->inMonth($request->year ?? date('Y'), $request->month);
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->inDateRange($request->date_from, $request->date_to);
        }

        $expenses = $query->orderBy('date', 'desc')->paginate(15);

        // Dodatne statistike
        $stats = [
            'total_amount' => $building->expenses()->sum('amount'),
            'monthly_amount' => $building->expenses()
                ->inMonth(date('Y'), date('m'))
                ->sum('amount'),
            'categories' => $building->expenses()
                ->selectRaw('category, SUM(amount) as total')
                ->groupBy('category')
                ->get()
        ];

        return response()->json([
            'success' => true,
            'data' => $expenses,
            'stats' => $stats
        ]);
    }

    /**
     * Kreira novi trošak
     */
    public function store(Request $request, Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za dodavanje troškova.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $data['building_id'] = $building->id;

        $expense = Expense::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Trošak je uspešno dodat',
            'data' => $expense
        ], 201);
    }

    /**
     * Prikazuje detalje određenog troška
     */
    public function show(Building $building, Expense $expense): JsonResponse
    {
        // Proverava da li trošak pripada zgradi
        if ($expense->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Trošak ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $expense
        ]);
    }

    /**
     * Ažurira trošak
     */
    public function update(Request $request, Building $building, Expense $expense): JsonResponse
    {
        // Proverava da li trošak pripada zgradi
        if ($expense->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Trošak ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za uređivanje troškova.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'category' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|numeric|min:0',
            'date' => 'sometimes|required|date',
            'description' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $expense->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Trošak je uspešno ažuriran',
            'data' => $expense
        ]);
    }

    /**
     * Briše trošak
     */
    public function destroy(Building $building, Expense $expense): JsonResponse
    {
        // Proverava da li trošak pripada zgradi
        if ($expense->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Trošak ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za brisanje troškova.'
            ], 403);
        }

        $expense->delete();

        return response()->json([
            'success' => true,
            'message' => 'Trošak je uspešno obrisan'
        ]);
    }

    /**
     * Prikazuje statistike troškova
     */
    public function stats(Building $building): JsonResponse
    {
        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        $currentYear = date('Y');
        $currentMonth = date('m');

        $stats = [
            'total_amount' => $building->expenses()->sum('amount'),
            'yearly_amount' => $building->expenses()->inYear($currentYear)->sum('amount'),
            'monthly_amount' => $building->expenses()->inMonth($currentYear, $currentMonth)->sum('amount'),
            'categories' => $building->expenses()
                ->selectRaw('category, SUM(amount) as total, COUNT(*) as count')
                ->groupBy('category')
                ->orderBy('total', 'desc')
                ->get(),
            'monthly_breakdown' => $building->expenses()
                ->inYear($currentYear)
                ->selectRaw('MONTH(date) as month, SUM(amount) as total')
                ->groupBy('month')
                ->orderBy('month')
                ->get()
        ];

        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }
}