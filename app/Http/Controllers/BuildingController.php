<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class BuildingController extends Controller
{
    /**
     * Prikazuje listu zgrada po gradu i naselju korisnika
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // Filtriranje po gradu i naselju korisnika
        $buildings = Building::inArea($user->city, $user->neighborhood)
            ->with(['users', 'apartments', 'reports'])
            ->paginate(15);

        // Ako je AJAX zahtev ili API zahtev, vrati JSON
        if ($request->ajax() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'data' => $buildings
            ]);
        }

        // Inače vrati view
        return view('buildings.index', compact('buildings'));
    }

    /**
     * Prikazuje detalje određene zgrade
     */
    public function show(Building $building)
    {
        // Dozvoliti pristup svim korisnicima (članovi imaju pun pristup, ostali mogu videti osnovne info)
        // Ne blokiramo pristup, ali u view-u kontrolišemo šta se prikazuje
        
        $building->load([
            'users',
            'apartments.owner',
            'reports.user',
            'expenses',
            'votes.options',
            'announcements'
        ]);

        if (request()->ajax() || request()->is('api/*')) {
            // Za API, proveravamo pristup
            if (!$building->hasUser(Auth::user())) {
                return response()->json([
                    'success' => false,
                    'message' => 'Nemate pristup ovoj zgradi.'
                ], 403);
            }
            
            return response()->json([
                'success' => true,
                'data' => $building
            ]);
        }

        return view('buildings.show', compact('building'));
    }

    /**
     * Kreira novu zgradu
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'neighborhood' => 'nullable|string|max:255',
                'lat' => 'nullable|numeric|between:-90,90',
                'lng' => 'nullable|numeric|between:-180,180',
            ]);

            if ($validator->fails()) {
                if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Validacija neuspešna',
                        'errors' => $validator->errors()
                    ], 422);
                }
                
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $request->all();
            
            // Automatski postavi naselje korisnika ako nije uneseno
            if (empty($data['neighborhood'])) {
                $data['neighborhood'] = Auth::user()->neighborhood;
            }
            
            // Automatski postavi grad korisnika ako nije uneseno
            if (empty($data['city'])) {
                $data['city'] = Auth::user()->city;
            }

            // Proveri da li zgrada sa istim nazivom već postoji u istom gradu i naselju
            $existingBuildingByName = Building::where('name', $data['name'])
                ->where('city', $data['city'])
                ->where('neighborhood', $data['neighborhood'])
                ->first();

            if ($existingBuildingByName) {
                if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Zgrada sa ovim nazivom već postoji u vašem naselju.',
                        'errors' => ['name' => ['Zgrada sa nazivom "' . $data['name'] . '" već postoji u ' . $data['neighborhood'] . ', ' . $data['city']]]
                    ], 422);
                }
                
                return redirect()->back()
                    ->withErrors(['name' => 'Zgrada sa nazivom "' . $data['name'] . '" već postoji u ' . $data['neighborhood'] . ', ' . $data['city']])
                    ->withInput();
            }

            // Proveri da li zgrada sa istom adresom već postoji u istom gradu i naselju
            $existingBuilding = Building::where('address', $data['address'])
                ->where('city', $data['city'])
                ->where('neighborhood', $data['neighborhood'])
                ->first();

            if ($existingBuilding) {
                if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Zgrada sa ovom adresom već postoji u vašem naselju.',
                        'errors' => ['address' => ['Zgrada na ovoj adresi već postoji u ' . $data['neighborhood'] . ', ' . $data['city']]]
                    ], 422);
                }
                
                return redirect()->back()
                    ->withErrors(['address' => 'Zgrada sa ovom adresom već postoji u ' . $data['neighborhood'] . ', ' . $data['city']])
                    ->withInput();
            }

            $building = Building::create($data);

            // Dodaje korisnika kao managera nove zgrade
            $building->users()->attach(Auth::id(), [
                'role_in_building' => 'manager'
            ]);

            $building->load(['users', 'apartments']);

            if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Zgrada je uspešno kreirana',
                    'data' => $building
                ], 201);
            }

            return redirect()->route('buildings.index')
                ->with('success', 'Zgrada je uspešno kreirana');
                
        } catch (\Exception $e) {
            Log::error('Error creating building: ' . $e->getMessage());
            
            if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Desila se greška pri kreiranju zgrade',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                ->withErrors(['error' => 'Desila se greška pri kreiranju zgrade'])
                ->withInput();
        }
    }

    /**
     * Ažurira zgradu
     */
    public function update(Request $request, Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za uređivanje ove zgrade.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'city' => 'sometimes|required|string|max:255',
            'neighborhood' => 'sometimes|nullable|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lng' => 'nullable|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        // Proveri da li zgrada sa istim nazivom već postoji (ali različita od trenutne zgrade)
        if ($request->has('name') || $request->has('city') || $request->has('neighborhood')) {
            $existingBuildingByName = Building::where('name', $request->input('name', $building->name))
                ->where('city', $request->input('city', $building->city))
                ->where('neighborhood', $request->input('neighborhood', $building->neighborhood))
                ->where('id', '!=', $building->id)
                ->first();

            if ($existingBuildingByName) {
                return response()->json([
                    'success' => false,
                    'message' => 'Zgrada sa ovim nazivom već postoji.',
                    'errors' => ['name' => ['Zgrada sa nazivom "' . $request->input('name', $building->name) . '" već postoji u ' . $request->input('neighborhood', $building->neighborhood) . ', ' . $request->input('city', $building->city)]]
                ], 422);
            }
        }

        // Proveri da li zgrada sa istom adresom već postoji (ali različita od trenutne zgrade)
        if ($request->has('address') || $request->has('city') || $request->has('neighborhood')) {
            $existingBuilding = Building::where('address', $request->input('address', $building->address))
                ->where('city', $request->input('city', $building->city))
                ->where('neighborhood', $request->input('neighborhood', $building->neighborhood))
                ->where('id', '!=', $building->id)
                ->first();

            if ($existingBuilding) {
                return response()->json([
                    'success' => false,
                    'message' => 'Zgrada sa ovom adresom već postoji.',
                    'errors' => ['address' => ['Zgrada na ovoj adresi već postoji u ' . $request->input('neighborhood', $building->neighborhood) . ', ' . $request->input('city', $building->city)]]
                ], 422);
            }
        }

        $building->update($request->all());
        $building->load(['users', 'apartments']);

        return response()->json([
            'success' => true,
            'message' => 'Zgrada je uspešno ažurirana',
            'data' => $building
        ]);
    }

    /**
     * Briše zgradu
     */
    public function destroy(Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za brisanje ove zgrade.'
            ], 403);
        }

        $building->delete();

        return response()->json([
            'success' => true,
            'message' => 'Zgrada je uspešno obrisana'
        ]);
    }

    /**
     * Dodaje korisnika u zgradu
     */
    public function addUser(Request $request, Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za dodavanje korisnika.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'role_in_building' => 'required|in:manager,resident'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        // Proverava da li korisnik već postoji u zgradi
        if ($building->hasUser(User::find($request->user_id))) {
            return response()->json([
                'success' => false,
                'message' => 'Korisnik već postoji u ovoj zgradi.'
            ], 422);
        }

        $building->users()->attach($request->user_id, [
            'role_in_building' => $request->role_in_building
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Korisnik je uspešno dodat u zgradu'
        ]);
    }

    /**
     * Uklanja korisnika iz zgrade
     */
    public function removeUser(Request $request, Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za uklanjanje korisnika.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $building->users()->detach($request->user_id);

        return response()->json([
            'success' => true,
            'message' => 'Korisnik je uspešno uklonjen iz zgrade'
        ]);
    }

    /**
     * Korisnik se pridružuje zgradi preko adrese
     */
    public function join(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validacija neuspešna',
                    'errors' => $validator->errors()
                ], 422);
            }
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        
        // Automatski postavi naselje korisnika ako nije uneseno
        if (empty($data['neighborhood'])) {
            $data['neighborhood'] = Auth::user()->neighborhood;
        }
        
        // Automatski postavi grad korisnika ako nije uneseno
        if (empty($data['city'])) {
            $data['city'] = Auth::user()->city;
        }

        // Pronađi zgradu sa ovom adresom
        $building = Building::where('address', $data['address'])
            ->where('city', $data['city'])
            ->where('neighborhood', $data['neighborhood'])
            ->first();

        if (!$building) {
            if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Zgrada sa ovom adresom ne postoji.',
                    'suggestion' => 'Možete kreirati novu zgradu.'
                ], 404);
            }
            
            return redirect()->back()
                ->withErrors(['address' => 'Zgrada sa ovom adresom ne postoji.'])
                ->withInput();
        }

        // Proveri da li je korisnik već član zgrade
        if ($building->hasUser(Auth::user())) {
            if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Već ste član ove zgrade.'
                ], 422);
            }
            
            return redirect()->back()
                ->withErrors(['error' => 'Već ste član ove zgrade.']);
        }

        // Dodaj korisnika kao člana zgrade (kao resident)
        $building->users()->attach(Auth::id(), [
            'role_in_building' => 'resident'
        ]);

        if ($request->ajax() || $request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'message' => 'Uspešno ste se pridružili zgradi',
                'data' => $building->load(['users', 'apartments'])
            ], 201);
        }

        return redirect()->route('buildings.index')
            ->with('success', 'Uspešno ste se pridružili zgradi');
    }

    /**
     * Vraća listu korisnika sa istom adresom kao zgrada (za managera)
     */
    public function getEligibleUsers(Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za pregled korisnika.'
            ], 403);
        }

        // Pronađi sve korisnike koji žive na istoj adresi ali nisu članovi zgrade
        $eligibleUsers = User::where('address', $building->address)
            ->where('city', $building->city)
            ->where('neighborhood', $building->neighborhood)
            ->whereDoesntHave('buildings', function ($query) use ($building) {
                $query->where('buildings.id', $building->id);
            })
            ->select('id', 'name', 'email', 'address')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $eligibleUsers
        ]);
    }

    /**
     * Korisnik se samouključuje u zgradu (samo ako je adresa ista)
     */
    public function selfJoin(Building $building): JsonResponse
    {
        $user = Auth::user();

        // Proveri da li korisnik već pripada zgradi
        if ($building->hasUser($user)) {
            return response()->json([
                'success' => false,
                'message' => 'Već ste član ove zgrade.'
            ], 422);
        }

        // Proveri da li je adresa korisnika ista kao adresa zgrade
        if ($user->address !== $building->address || 
            $user->city !== $building->city || 
            $user->neighborhood !== $building->neighborhood) {
            return response()->json([
                'success' => false,
                'message' => 'Možete se pridružiti samo zgradama na istoj adresi gde vi živite. Vaša adresa: ' . $user->address . ', ' . $user->neighborhood . ', ' . $user->city . '. Adresa zgrade: ' . $building->address . ', ' . $building->neighborhood . ', ' . $building->city
            ], 403);
        }

        // Dodaj korisnika kao resident
        $building->users()->attach($user->id, [
            'role_in_building' => 'resident'
        ]);

        $building->load(['users', 'apartments']);

        return response()->json([
            'success' => true,
            'message' => 'Uspešno ste se pridružili zgradi "' . $building->name . '"',
            'data' => $building
        ]);
    }

    /**
     * Dodaje korisnika u zgradu (poboljšana verzija sa proverom adrese)
     */
    public function addResident(Request $request, Building $building): JsonResponse
    {
        // Proverava da li je korisnik manager zgrade
        if (!$building->isManager(Auth::user())) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu za dodavanje korisnika.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validacija neuspešna',
                'errors' => $validator->errors()
            ], 422);
        }

        $userToAdd = User::findOrFail($request->user_id);

        // Proveri da li korisnik živi na istoj adresi
        if ($userToAdd->address !== $building->address || 
            $userToAdd->city !== $building->city || 
            $userToAdd->neighborhood !== $building->neighborhood) {
            return response()->json([
                'success' => false,
                'message' => 'Korisnik ne živi na adresi ove zgrade. Možete dodati samo korisnike sa istom adresom.'
            ], 422);
        }

        // Proverava da li korisnik već postoji u zgradi
        if ($building->hasUser($userToAdd)) {
            return response()->json([
                'success' => false,
                'message' => 'Korisnik već postoji u ovoj zgradi.'
            ], 422);
        }

        $building->users()->attach($userToAdd->id, [
            'role_in_building' => 'resident'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Korisnik "' . $userToAdd->name . '" je uspešno dodat u zgradu',
            'data' => $userToAdd
        ]);
    }
}