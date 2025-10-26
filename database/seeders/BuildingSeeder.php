<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Building;
use App\Models\User;
use App\Models\Apartment;
use App\Models\Report;
use App\Models\Expense;
use App\Models\Vote;
use App\Models\VoteOption;
use App\Models\Announcement;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kreiraj test zgradu
        $building = Building::create([
            'name' => 'Zgrada Test',
            'address' => 'Test ulica 123',
            'city' => 'Beograd',
            'neighborhood' => 'Centar',
            'lat' => 44.7866,
            'lng' => 20.4489
        ]);

        // Pronađi prvog korisnika ili kreiraj test korisnika
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Test Korisnik',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'city' => 'Beograd',
                'neighborhood' => 'Centar'
            ]);
        }

        // Dodaj korisnika kao managera zgrade
        $building->users()->attach($user->id, [
            'role_in_building' => 'manager'
        ]);

        // Kreiraj stan
        $apartment = Apartment::create([
            'building_id' => $building->id,
            'number' => '1A',
            'floor' => 1,
            'owner_id' => $user->id
        ]);

        // Kreiraj test prijavu
        Report::create([
            'building_id' => $building->id,
            'user_id' => $user->id,
            'title' => 'Pokvaren lift',
            'description' => 'Lift se zaglavio na 3. spratu i ne radi.',
            'status' => 'open'
        ]);

        // Kreiraj test trošak
        Expense::create([
            'building_id' => $building->id,
            'category' => 'Održavanje',
            'amount' => 50000.00,
            'date' => now()->subDays(10),
            'description' => 'Popravka lifta'
        ]);

        // Kreiraj test glasanje
        $vote = Vote::create([
            'building_id' => $building->id,
            'title' => 'Da li ste za renoviranje fasade?',
            'description' => 'Predlažemo renoviranje fasade zgrade. Trošak bi bio podeljen između svih stanara.',
            'deadline' => now()->addDays(30)
        ]);

        // Kreiraj opcije za glasanje
        VoteOption::create([
            'vote_id' => $vote->id,
            'option_text' => 'Da, slažem se'
        ]);

        VoteOption::create([
            'vote_id' => $vote->id,
            'option_text' => 'Ne, ne slažem se'
        ]);

        VoteOption::create([
            'vote_id' => $vote->id,
            'option_text' => 'Uzdržavam se'
        ]);

        // Kreiraj test objavu
        Announcement::create([
            'building_id' => $building->id,
            'title' => 'Važno obaveštenje',
            'content' => 'Molimo sve stanare da provere svoje poštanske sandučiće.',
            'pinned' => true
        ]);

        $this->command->info('Test podaci za stambene zajednice su kreirani!');
        $this->command->info("Zgrada ID: {$building->id}");
        $this->command->info("Korisnik ID: {$user->id}");
    }
}