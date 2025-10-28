<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    /**
     * Prikazuje listu objava za određenu zgradu
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

        $announcements = $building->announcements()
            ->with(['user:id,name', 'comments.user:id,name'])
            ->ordered()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $announcements
        ]);
    }

    /**
     * Kreira novu objavu
     */
    public function store(Request $request, Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za kreiranje objava.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:5000',
            'pinned' => 'boolean'
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

        $announcement = Announcement::create($data);
        $announcement->load('user:id,name');

        return response()->json([
            'success' => true,
            'message' => 'Objava je uspešno kreirana',
            'data' => $announcement
        ], 201);
    }

    /**
     * Prikazuje detalje određene objave
     */
    public function show(Building $building, Announcement $announcement): JsonResponse
    {
        // Proverava da li objava pripada zgradi
        if ($announcement->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Objava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li korisnik ima pristup zgradi
        if (!$building->hasUser(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ], 403);
        }

        $announcement->load(['user:id,name', 'comments.user:id,name']);

        return response()->json([
            'success' => true,
            'data' => $announcement
        ]);
    }

    /**
     * Ažurira objavu
     */
    public function update(Request $request, Building $building, Announcement $announcement): JsonResponse
    {
        // Proverava da li objava pripada zgradi
        if ($announcement->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Objava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za uređivanje objava.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string|max:5000',
            'pinned' => 'sometimes|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $announcement->update($request->all());
        $announcement->load('user:id,name');

        return response()->json([
            'success' => true,
            'message' => 'Objava je uspešno ažurirana',
            'data' => $announcement
        ]);
    }

    /**
     * Briše objavu
     */
    public function destroy(Building $building, Announcement $announcement): JsonResponse
    {
        // Proverava da li objava pripada zgradi
        if ($announcement->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Objava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za brisanje objava.'
            ], 403);
        }

        $announcement->delete();

        return response()->json([
            'success' => true,
            'message' => 'Objava je uspešno obrisana'
        ]);
    }

    /**
     * Prikvačuje objavu
     */
    public function pin(Building $building, Announcement $announcement): JsonResponse
    {
        // Proverava da li objava pripada zgradi
        if ($announcement->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Objava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za prikvačivanje objava.'
            ], 403);
        }

        $announcement->pin();

        return response()->json([
            'success' => true,
            'message' => 'Objava je prikvačena',
            'data' => $announcement
        ]);
    }

    /**
     * Otkvačuje objavu
     */
    public function unpin(Building $building, Announcement $announcement): JsonResponse
    {
        // Proverava da li objava pripada zgradi
        if ($announcement->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Objava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za otkvačivanje objava.'
            ], 403);
        }

        $announcement->unpin();

        return response()->json([
            'success' => true,
            'message' => 'Objava je otkvačena',
            'data' => $announcement
        ]);
    }
}