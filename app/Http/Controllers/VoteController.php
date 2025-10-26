<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Vote;
use App\Models\VoteOption;
use App\Models\VoteResult;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Prikazuje listu glasanja za određenu zgradu
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

        $votes = $building->votes()
            ->with(['options.results'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // Dodaje informaciju da li je korisnik već glasao
        $votes->getCollection()->transform(function ($vote) {
            $vote->user_has_voted = $vote->hasUserVoted(Auth::user());
            $vote->is_active = $vote->isActive();
            return $vote;
        });

        return response()->json([
            'success' => true,
            'data' => $votes
        ]);
    }

    /**
     * Kreira novo glasanje
     */
    public function store(Request $request, Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za kreiranje glasanja.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'deadline' => 'required|date|after:now',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            $vote = Vote::create([
                'building_id' => $building->id,
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline
            ]);

            // Kreira opcije za glasanje
            foreach ($request->options as $optionText) {
                VoteOption::create([
                    'vote_id' => $vote->id,
                    'option_text' => $optionText
                ]);
            }

            DB::commit();

            $vote->load(['options']);

            return response()->json([
                'success' => true,
                'message' => 'Glasanje je uspešno kreirano',
                'data' => $vote
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Došlo je do greške prilikom kreiranja glasanja.'
            ], 500);
        }
    }

    /**
     * Prikazuje detalje određenog glasanja
     */
    public function show(Building $building, Vote $vote): JsonResponse
    {
        // Proverava da li glasanje pripada zgradi
        if ($vote->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Glasanje ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        $vote->load(['options.results']);
        
        // Dodaje dodatne informacije
        $vote->user_has_voted = $vote->hasUserVoted(Auth::user());
        $vote->is_active = $vote->isActive();
        $vote->total_votes = $vote->total_votes;

        return response()->json([
            'success' => true,
            'data' => $vote
        ]);
    }

    /**
     * Čuva glas korisnika
     */
    public function vote(Request $request, Building $building, Vote $vote): JsonResponse
    {
        // Proverava da li glasanje pripada zgradi
        if ($vote->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Glasanje ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        // Proverava da li je glasanje još uvek aktivno
        if (!$vote->isActive()) {
            return response()->json([
                'success' => false,
                'message' => 'Glasanje je završeno.'
            ], 422);
        }

        // Proverava da li je korisnik već glasao
        if ($vote->hasUserVoted(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Već ste glasali u ovom glasanju.'
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'vote_option_id' => 'required|exists:vote_options,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        // Proverava da li opcija pripada glasanju
        $voteOption = VoteOption::find($request->vote_option_id);
        if ($voteOption->vote_id !== $vote->id) {
            return response()->json([
                'success' => false,
                'message' => 'Opcija ne pripada ovom glasanju.'
            ], 422);
        }

        VoteResult::create([
            'vote_option_id' => $request->vote_option_id,
            'user_id' => Auth::id()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Vaš glas je uspešno zabeležen'
        ]);
    }

    /**
     * Ažurira glasanje
     */
    public function update(Request $request, Building $building, Vote $vote): JsonResponse
    {
        // Proverava da li glasanje pripada zgradi
        if ($vote->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Glasanje ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za uređivanje glasanja.'
            ], 403);
        }

        // Proverava da li je glasanje još uvek aktivno
        if (!$vote->isActive()) {
            return response()->json([
                'success' => false,
                'message' => 'Ne možete uređivati završeno glasanje.'
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max:2000',
            'deadline' => 'sometimes|required|date|after:now'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $vote->update($request->all());
        $vote->load(['options']);

        return response()->json([
            'success' => true,
            'message' => 'Glasanje je uspešno ažurirano',
            'data' => $vote
        ]);
    }

    /**
     * Briše glasanje
     */
    public function destroy(Building $building, Vote $vote): JsonResponse
    {
        // Proverava da li glasanje pripada zgradi
        if ($vote->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Glasanje ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za brisanje glasanja.'
            ], 403);
        }

        $vote->delete();

        return response()->json([
            'success' => true,
            'message' => 'Glasanje je uspešno obrisano'
        ]);
    }

    /**
     * Prikazuje rezultate glasanja
     */
    public function results(Building $building, Vote $vote): JsonResponse
    {
        // Proverava da li glasanje pripada zgradi
        if ($vote->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Glasanje ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        $vote->load(['options.results']);
        
        $results = $vote->options->map(function ($option) {
            return [
                'id' => $option->id,
                'option_text' => $option->option_text,
                'vote_count' => $option->vote_count,
                'vote_percentage' => $option->vote_percentage
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'vote' => $vote,
                'results' => $results,
                'total_votes' => $vote->total_votes
            ]
        ]);
    }
}