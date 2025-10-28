<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Announcement;
use App\Models\AnnouncementComment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnnouncementCommentController extends Controller
{
    /**
     * Prikazuje komentare za određenu objavu
     */
    public function index(Building $building, Announcement $announcement): JsonResponse
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

        $comments = $announcement->comments()
            ->with('user:id,name')
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $comments
        ]);
    }

    /**
     * Kreira novi komentar
     */
    public function store(Request $request, Building $building, Announcement $announcement): JsonResponse
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

        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $comment = AnnouncementComment::create([
            'announcement_id' => $announcement->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        $comment->load('user:id,name');

        return response()->json([
            'success' => true,
            'message' => 'Komentar je uspešno dodat',
            'data' => $comment
        ], 201);
    }

    /**
     * Ažurira komentar
     */
    public function update(Request $request, Building $building, Announcement $announcement, AnnouncementComment $comment): JsonResponse
    {
        // Proverava da li komentar pripada objavi
        if ($comment->announcement_id !== $announcement->id) {
            return response()->json([
                'success' => false,
                'message' => 'Komentar ne pripada ovoj objavi.'
            ], 404);
        }

        // Proverava da li objava pripada zgradi
        if ($announcement->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Objava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik vlasnik komentara ili manager zgrade
        if ($comment->user_id !== Auth::id() && !$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za uređivanje ovog komentara.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'content' => 'sometimes|required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $comment->update($request->all());
        $comment->load('user:id,name');

        return response()->json([
            'success' => true,
            'message' => 'Komentar je uspešno ažuriran',
            'data' => $comment
        ]);
    }

    /**
     * Briše komentar
     */
    public function destroy(Building $building, Announcement $announcement, AnnouncementComment $comment): JsonResponse
    {
        // Proverava da li komentar pripada objavi
        if ($comment->announcement_id !== $announcement->id) {
            return response()->json([
                'success' => false,
                'message' => 'Komentar ne pripada ovoj objavi.'
            ], 404);
        }

        // Proverava da li objava pripada zgradi
        if ($announcement->building_id !== $building->id) {
            return response()->json([
                'success' => false,
                'message' => 'Objava ne pripada ovoj zgradi.'
            ], 404);
        }

        // Proverava da li je korisnik vlasnik komentara ili manager zgrade
        if ($comment->user_id !== Auth::id() && !$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za brisanje ovog komentara.'
            ], 403);
        }

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Komentar je uspešno obrisan'
        ]);
    }
}
