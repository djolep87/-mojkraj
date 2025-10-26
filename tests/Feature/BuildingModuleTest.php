<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Building;
use App\Models\Report;
use App\Models\Expense;
use App\Models\Vote;
use App\Models\Announcement;

class BuildingModuleTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $building;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Kreiraj test korisnika
        $this->user = User::factory()->create([
            'city' => 'Beograd',
            'neighborhood' => 'Centar'
        ]);

        // Kreiraj test zgradu
        $this->building = Building::create([
            'name' => 'Test Zgrada',
            'address' => 'Test ulica 123',
            'city' => 'Beograd',
            'neighborhood' => 'Centar',
            'lat' => 44.7866,
            'lng' => 20.4489
        ]);

        // Dodaj korisnika kao managera zgrade
        $this->building->users()->attach($this->user->id, [
            'role_in_building' => 'manager'
        ]);
    }

    public function test_can_list_buildings()
    {
        $response = $this->actingAs($this->user)
            ->getJson('/api/buildings');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'address',
                            'city',
                            'users',
                            'apartments'
                        ]
                    ]
                ]
            ]);
    }

    public function test_can_create_building()
    {
        $buildingData = [
            'name' => 'Nova Zgrada',
            'address' => 'Nova ulica 456',
            'city' => 'Beograd',
            'neighborhood' => 'Centar',
            'lat' => 44.7866,
            'lng' => 20.4489
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/api/buildings', $buildingData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'name',
                    'address',
                    'city'
                ]
            ]);

        $this->assertDatabaseHas('buildings', [
            'name' => 'Nova Zgrada',
            'address' => 'Nova ulica 456',
            'city' => 'Beograd',
            'neighborhood' => 'Centar'
        ]);
    }

    public function test_can_create_report()
    {
        $reportData = [
            'title' => 'Pokvaren lift',
            'description' => 'Lift se zaglavio i ne radi.',
            'photo' => null
        ];

        $response = $this->actingAs($this->user)
            ->postJson("/api/buildings/{$this->building->id}/reports", $reportData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'title',
                    'description',
                    'status',
                    'building_id',
                    'user_id',
                    'user'
                ]
            ]);

        $this->assertDatabaseHas('reports', [
            'title' => 'Pokvaren lift',
            'building_id' => $this->building->id,
            'user_id' => $this->user->id
        ]);
    }

    public function test_can_create_expense()
    {
        $expenseData = [
            'category' => 'Održavanje',
            'amount' => 25000.00,
            'date' => now()->format('Y-m-d'),
            'description' => 'Popravka lifta'
        ];

        $response = $this->actingAs($this->user)
            ->postJson("/api/buildings/{$this->building->id}/expenses", $expenseData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'category',
                    'amount',
                    'date',
                    'building_id'
                ]
            ]);

        $this->assertDatabaseHas('expenses', [
            'category' => 'Održavanje',
            'amount' => 25000.00,
            'building_id' => $this->building->id
        ]);
    }

    public function test_can_create_vote()
    {
        $voteData = [
            'title' => 'Da li ste za renoviranje fasade?',
            'description' => 'Predlažemo renoviranje fasade zgrade.',
            'deadline' => now()->addDays(30)->format('Y-m-d H:i:s'),
            'options' => [
                'Da, slažem se',
                'Ne, ne slažem se',
                'Uzdržavam se'
            ]
        ];

        $response = $this->actingAs($this->user)
            ->postJson("/api/buildings/{$this->building->id}/votes", $voteData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'title',
                    'description',
                    'deadline',
                    'building_id',
                    'options'
                ]
            ]);

        $this->assertDatabaseHas('votes', [
            'title' => 'Da li ste za renoviranje fasade?',
            'building_id' => $this->building->id
        ]);
    }

    public function test_can_create_announcement()
    {
        $announcementData = [
            'title' => 'Važno obaveštenje',
            'content' => 'Molimo sve stanare da provere svoje poštanske sandučiće.',
            'pinned' => true
        ];

        $response = $this->actingAs($this->user)
            ->postJson("/api/buildings/{$this->building->id}/announcements", $announcementData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'title',
                    'content',
                    'pinned',
                    'building_id'
                ]
            ]);

        $this->assertDatabaseHas('announcements', [
            'title' => 'Važno obaveštenje',
            'building_id' => $this->building->id
        ]);
    }

    public function test_cannot_access_building_without_permission()
    {
        // Kreiraj drugog korisnika koji nije član zgrade
        $otherUser = User::factory()->create();

        $response = $this->actingAs($otherUser)
            ->getJson("/api/buildings/{$this->building->id}");

        $response->assertStatus(403)
            ->assertJson([
                'success' => false,
                'message' => 'Nemate pristup ovoj zgradi.'
            ]);
    }

    public function test_cannot_create_expense_without_manager_role()
    {
        // Kreiraj korisnika kao residenta
        $resident = User::factory()->create();
        $this->building->users()->attach($resident->id, [
            'role_in_building' => 'resident'
        ]);

        $expenseData = [
            'category' => 'Održavanje',
            'amount' => 25000.00,
            'date' => now()->format('Y-m-d'),
            'description' => 'Popravka lifta'
        ];

        $response = $this->actingAs($resident)
            ->postJson("/api/buildings/{$this->building->id}/expenses", $expenseData);

        $response->assertStatus(403)
            ->assertJson([
                'success' => false,
                'message' => 'Nemate dozvolu za dodavanje troškova.'
            ]);
    }

    public function test_cannot_create_building_with_duplicate_address()
    {
        // Pokušaj da kreiraš zgradu sa istom adresom
        $duplicateData = [
            'name' => 'Druga Zgrada',
            'address' => 'Test ulica 123',
            'city' => 'Beograd',
            'neighborhood' => 'Centar',
            'lat' => 44.7866,
            'lng' => 20.4489
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/api/buildings', $duplicateData);

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Zgrada sa ovom adresom već postoji u vašem naselju.'
            ])
            ->assertJsonValidationErrors(['address']);
    }
}