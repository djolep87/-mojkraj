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
            $data['photo'] = $this->resizeAndStoreImage($request->file('photo'), 'reports');
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
            $data['photo'] = $this->resizeAndStoreImage($request->file('photo'), 'reports');
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

    /**
     * Resize i store sliku sa standardnim dimenzijama
     * Landscape: 800x600px, Portrait: 600x800px
     */
    private function resizeAndStoreImage($file, $directory): string
    {
        // Standardne dimenzije
        $landscapeWidth = 800;
        $landscapeHeight = 600;
        $portraitWidth = 600;
        $portraitHeight = 800;

        // Proveri da li GD extension postoji
        if (!extension_loaded('gd')) {
            // Ako GD nije dostupan, samo store original
            return $file->store($directory, 'public');
        }

        // Učitaj sliku
        $imageInfo = getimagesize($file->getRealPath());
        if (!$imageInfo) {
            return $file->store($directory, 'public');
        }

        $originalWidth = $imageInfo[0];
        $originalHeight = $imageInfo[1];
        $mimeType = $imageInfo['mime'];

        // Odredi da li je landscape ili portrait
        $isLandscape = $originalWidth > $originalHeight;
        
        // Postavi target dimenzije
        if ($isLandscape) {
            $targetWidth = $landscapeWidth;
            $targetHeight = $landscapeHeight;
        } else {
            $targetWidth = $portraitWidth;
            $targetHeight = $portraitHeight;
        }

        // Izračunaj dimenzije uz zadržavanje aspect ratio
        $ratio = min($targetWidth / $originalWidth, $targetHeight / $originalHeight);
        $newWidth = (int)($originalWidth * $ratio);
        $newHeight = (int)($originalHeight * $ratio);

        // Učitaj original sliku
        switch ($mimeType) {
            case 'image/jpeg':
                $source = imagecreatefromjpeg($file->getRealPath());
                break;
            case 'image/png':
                $source = imagecreatefrompng($file->getRealPath());
                break;
            case 'image/gif':
                $source = imagecreatefromgif($file->getRealPath());
                break;
            default:
                return $file->store($directory, 'public');
        }

        if (!$source) {
            return $file->store($directory, 'public');
        }

        // Kreiraj canvas sa target dimenzijama
        $canvas = imagecreatetruecolor($targetWidth, $targetHeight);
        
        // Za PNG sačuvaj transparentnost, za ostale bela pozadina
        if ($mimeType === 'image/png') {
            imagealphablending($canvas, false);
            imagesavealpha($canvas, true);
            $transparent = imagecolorallocatealpha($canvas, 255, 255, 255, 127);
            imagefill($canvas, 0, 0, $transparent);
            imagealphablending($canvas, true);
        } else {
            $white = imagecolorallocate($canvas, 255, 255, 255);
            imagefill($canvas, 0, 0, $white);
        }

        // Centriraj sliku na canvasu
        $x = (int)(($targetWidth - $newWidth) / 2);
        $y = (int)(($targetHeight - $newHeight) / 2);

        // Resize i kopiraj na canvas
        imagecopyresampled(
            $canvas,
            $source,
            $x,
            $y,
            0,
            0,
            $newWidth,
            $newHeight,
            $originalWidth,
            $originalHeight
        );

        // Generiši unique filename
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $directory . '/' . $filename;
        $fullPath = storage_path('app/public/' . $path);

        // Kreiraj directory ako ne postoji
        Storage::disk('public')->makeDirectory($directory);

        // Sačuvaj resized sliku
        switch ($mimeType) {
            case 'image/jpeg':
                imagejpeg($canvas, $fullPath, 85); // 85% quality
                break;
            case 'image/png':
                imagepng($canvas, $fullPath, 6); // Compression level 6
                break;
            case 'image/gif':
                imagegif($canvas, $fullPath);
                break;
        }

        // Oslobodi memoriju
        imagedestroy($source);
        imagedestroy($canvas);

        return $path;
    }
}