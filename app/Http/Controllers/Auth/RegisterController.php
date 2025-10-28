<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:10'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);

        // Automatsko pridruživanje ili kreiranje zgrade
        $buildingInfo = $this->handleBuildingMembership($user);

        Auth::login($user);

        // Dodaj informaciju o zgradi u sesiju
        $successMessage = 'Uspešno ste se registrovali! ';
        if (isset($buildingInfo['created']) && $buildingInfo['created']) {
            $successMessage .= $buildingInfo['message'];
        } elseif (isset($buildingInfo['building_exists']) && $buildingInfo['building_exists']) {
            $successMessage .= $buildingInfo['message'];
        }

        return redirect()->route('home')
            ->with('success', $successMessage)
            ->with('building_info', $buildingInfo);
    }

    /**
     * Automatski procesira pripadnost zgradi za novog korisnika
     * Samo kreira novu zgradu ako ne postoji (korisnik postaje manager)
     * Ako zgrada postoji, korisnik mora ručno da se pridruži klikom na dugme
     */
    private function handleBuildingMembership(User $user): array
    {
        // Pronađi postojanu zgradu sa istom adresom
        $existingBuilding = Building::where('address', $user->address)
            ->where('city', $user->city)
            ->where('neighborhood', $user->neighborhood)
            ->first();

        if ($existingBuilding) {
            // Ako zgrada već postoji, NE dodavaj korisnika automatski
            // Korisnik će se morati ručno pridružiti klikom na dugme
            return [
                'joined' => false,
                'building_exists' => true,
                'building' => $existingBuilding->name,
                'message' => 'Postoji zgrada "' . $existingBuilding->name . '" na vašoj adresi. Možete joj se pridružiti kada otvorite njen profil.'
            ];
        } else {
            // Ako zgrada ne postoji, kreiraj novu i postavi korisnika kao managera
            // Generišemo naziv zgrade ili koristimo adresu
            $buildingName = $user->address . ', ' . $user->neighborhood;
            
            $building = Building::create([
                'name' => $buildingName,
                'address' => $user->address,
                'city' => $user->city,
                'neighborhood' => $user->neighborhood,
                'lat' => $user->latitude ?? null,
                'lng' => $user->longitude ?? null,
            ]);

            // Dodaj korisnika kao managera nove zgrade
            $building->users()->attach($user->id, [
                'role_in_building' => 'manager'
            ]);
            
            return [
                'created' => true,
                'building' => $building->name,
                'role' => 'manager',
                'message' => 'Uspešno ste kreirali novu zgradu "' . $building->name . '" i postavljeni ste kao menadžer.'
            ];
        }
    }
}