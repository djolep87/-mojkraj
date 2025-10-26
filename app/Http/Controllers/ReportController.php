<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Prikazuje listu prijava za određenu zgradu
     */
    public function index(Building $building): JsonResponse
    {
        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        $reports = $building->reports()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $reports
        ]);
    }

    /**
     * Kreira novu prijavu kvara
     */
    public function store(Request $request, Building $building): JsonResponse
    {
        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
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
        $data['user_id'] = Auth::id();
        $data['status'] = 'open'; // Eksplicitno postavi status

        // Upload slike ako je priložena
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('reports', 'public');
        }

        $report = Report::create($data);
        $report->load('user');

        return response()->json([
            'success' => true,
            'message' => 'Prijava je uspešno kreirana',
            'data' => $report
        ], 201);
    }

    /**
     * Prikazuje detalje određene prijave
     */
    public function show(Building $building, Report $report): JsonResponse
    {
        // Proverava da li prijava pripada zgradi
        if ($report->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Prijava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        $report->load('user');

        return response()->json([
            'success' => true,
            'data' => $report
        ]);
    }

    /**
     * Ažurira status prijave
     */
    public function update(Request $request, Building $building, Report $report): JsonResponse
    {
        // Proverava da li prijava pripada zgradi
        if ($report->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Prijava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade ili autor prijave
        if (!$building->isManager(Auth::user()) && $report->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za uređivanje ove prijave.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max:2000',
            'status' => 'sometimes|required|in:open,closed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();

        // Upload nove slike ako je priložena
        if ($request->hasFile('photo')) {
            // Briše staru sliku ako postoji
            if ($report->photo) {
                Storage::disk('public')->delete($report->photo);
            }
            $data['photo'] = $request->file('photo')->store('reports', 'public');
        }

        $report->update($data);
        $report->load('user');

        return response()->json([
            'success' => true,
            'message' => 'Prijava je uspešno ažurirana',
            'data' => $report
        ]);
    }

    /**
     * Briše prijavu
     */
    public function destroy(Building $building, Report $report): JsonResponse
    {
        // Proverava da li prijava pripada zgradi
        if ($report->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Prijava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade ili autor prijave
        if (!$building->isManager(Auth::user()) && $report->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za brisanje ove prijave.'
            ], 403);
        }

        // Briše sliku ako postoji
        if ($report->photo) {
            Storage::disk('public')->delete($report->photo);
        }

        $report->delete();

        return response()->json([
            'success' => true,
            'message' => 'Prijava je uspešno obrisana'
        ]);
    }

    /**
     * Označava prijavu kao zatvorenu
     */
    public function close(Building $building, Report $report): JsonResponse
    {
        // Proverava da li prijava pripada zgradi
        if ($report->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Prijava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za zatvaranje ove prijave.'
            ], 403);
        }

        $report->markAsClosed();

        return response()->json([
            'success' => true,
            'message' => 'Prijava je označena kao zatvorena',
            'data' => $report
        ]);
    }
}