<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\BusinessUser;
use App\Models\News;
use App\Models\PetPost;
use App\Models\Business;
use App\Models\Offer;
use Faker\Factory as Faker;

class ComprehensiveSeeder extends Seeder
{
    private $faker;
    private $serbianFirstNames;
    private $serbianLastNames;
    private $belgradeNeighborhoods;
    private $businessTypes;
    private $petTypes;
    private $newsCategories;

    public function __construct()
    {
        $this->faker = Faker::create('sr_Latn_RS');
        
        // Srpska imena
        $this->serbianFirstNames = [
            'Marko', 'Nikola', 'Stefan', 'Aleksandar', 'Miloš', 'Nemanja', 'Dušan', 'Milan', 'Petar', 'Vladimir',
            'Ana', 'Marija', 'Jelena', 'Milica', 'Snežana', 'Jovana', 'Tijana', 'Katarina', 'Aleksandra', 'Tamara',
            'Luka', 'Filip', 'Đorđe', 'Vuk', 'Lazar', 'Matija', 'Andrej', 'Bogdan', 'David', 'Ivan',
            'Sofija', 'Ema', 'Teodora', 'Mina', 'Lara', 'Stella', 'Mila', 'Luna', 'Hana', 'Una',
            'Mihajlo', 'Uroš', 'Viktor', 'Ognjen', 'Relja', 'Vojin', 'Radovan', 'Zoran', 'Dejan', 'Branko'
        ];

        $this->serbianLastNames = [
            'Petrović', 'Jovanović', 'Nikolić', 'Marković', 'Đorđević', 'Stojanović', 'Ilić', 'Milošević', 'Radović', 'Lukić',
            'Popović', 'Đukić', 'Mladenović', 'Kostić', 'Pavlović', 'Milojević', 'Ristić', 'Simić', 'Tomić', 'Vasić',
            'Stefanović', 'Matić', 'Mladenović', 'Jevtić', 'Maksimović', 'Stanković', 'Milošević', 'Radulović', 'Petković', 'Đurić',
            'Krstić', 'Milošević', 'Jovanović', 'Petrović', 'Nikolić', 'Marković', 'Đorđević', 'Stojanović', 'Ilić', 'Radović'
        ];

        // Delovi Beograda
        $this->belgradeNeighborhoods = [
            'Vračar', 'Stari grad', 'Zvezdara', 'Palilula', 'Zemun', 'Novi Beograd', 'Savski venac', 'Voždovac',
            'Rakovica', 'Čukarica', 'Grocka', 'Barajevo', 'Obrenovac', 'Lazarevac', 'Mladenovac', 'Sopot',
            'Surčin', 'Zemun Polje', 'Batajnica', 'Karaburma', 'Ripanj', 'Beli Potok', 'Leštane', 'Vrčin',
            'Kaluđerica', 'Bolec', 'Krnjača', 'Padinska Skela', 'Kovilovo', 'Ritopek', 'Veliko Selo', 'Umka'
        ];

        // Tipovi biznisa
        $this->businessTypes = [
            'Restoran', 'Kafić', 'Prodavnica', 'Apoteka', 'Frizerski salon', 'Auto servis', 'Klinika', 'Sala za proslave',
            'Fitnes centar', 'Knjižara', 'Elektronika', 'Odeća i obuća', 'Supermarket', 'Pekara', 'Mesara', 'Ribarnica',
            'Cvećara', 'Zanatska radnja', 'Turistička agencija', 'Notarska kancelarija', 'Advokatska kancelarija',
            'Računovodstvena agencija', 'Nekretnine', 'Osiguranje', 'Bankovni servis', 'IT servis', 'Dizajn studio',
            'Fotografski studio', 'Muzička škola', 'Jezik škola', 'Dance studio', 'Spa centar', 'Masaza'
        ];

        // Tipovi kućnih ljubimaca
        $this->petTypes = [
            'Pas', 'Mačka', 'Zec', 'Hrčak', 'Ptica', 'Ribica', 'Kornjača', 'Gušter', 'Zmija', 'Miš'
        ];

        // Kategorije vesti
        $this->newsCategories = [
            'Lokalne vesti', 'Dešavanja', 'Sport', 'Kultura', 'Edukacija', 'Zdravlje', 'Bezbednost', 'Saobraćaj',
            'Ekologija', 'Tehnologija', 'Biznis', 'Turizam', 'Gastronomija', 'Moda', 'Zabava', 'Omladina'
        ];
    }

    public function run()
    {
        $this->command->info('🚀 Počinje kreiranje sadržaja: 100 običnih korisnika, 100 business korisnika, 100 vesti, 100 postova o kućnim ljubimcima, 100 biznisa i 100 ponuda...');

        // Kreiranje običnih korisnika
        $this->createUsers();
        
        // Kreiranje business korisnika
        $this->createBusinessUsers();
        
        // Kreiranje vesti
        $this->createNews();
        
        // Kreiranje kućnih ljubimaca
        $this->createPetPosts();
        
        // Kreiranje biznisa
        $this->createBusinesses();
        
        // Kreiranje ponuda
        $this->createOffers();

        $this->command->info('✅ Kreiran je sadržaj: 100 običnih korisnika, 100 business korisnika, 100 vesti, 100 postova o kućnim ljubimcima, 100 biznisa i 100 ponuda!');
    }

    private function createUsers()
    {
        $this->command->info('👥 Kreiranje 100 običnih korisnika...');
        
        for ($i = 0; $i < 100; $i++) {
            $firstName = $this->faker->randomElement($this->serbianFirstNames);
            $lastName = $this->faker->randomElement($this->serbianLastNames);
            $neighborhood = $this->faker->randomElement($this->belgradeNeighborhoods);
            
            User::create([
                'name' => $firstName . ' ' . $lastName,
                'email' => strtolower($firstName . '.' . $lastName . $i . '@gmail.com'),
                'password' => Hash::make('password'),
                'address' => $this->faker->streetAddress . ', ' . $neighborhood,
                'neighborhood' => $neighborhood,
                'city' => 'Beograd',
                'postal_code' => $this->faker->postcode,
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now(),
            ]);

            if (($i + 1) % 100 === 0) {
                $this->command->info("✅ Kreirano " . ($i + 1) . " korisnika...");
            }
        }
    }

    private function createBusinessUsers()
    {
        $this->command->info('🏢 Kreiranje 100 business korisnika...');
        
        for ($i = 0; $i < 100; $i++) {
            $firstName = $this->faker->randomElement($this->serbianFirstNames);
            $lastName = $this->faker->randomElement($this->serbianLastNames);
            $neighborhood = $this->faker->randomElement($this->belgradeNeighborhoods);
            $businessType = $this->faker->randomElement($this->businessTypes);
            
            BusinessUser::create([
                'company_name' => $businessType . ' ' . $firstName . ' ' . $lastName,
                'contact_person' => $firstName . ' ' . $lastName,
                'email' => strtolower($firstName . '.' . $lastName . '.biz' . $i . '@gmail.com'),
                'phone' => $this->faker->phoneNumber,
                'password' => Hash::make('password'),
                'business_type' => $businessType,
                'address' => $this->faker->streetAddress . ', ' . $neighborhood,
                'neighborhood' => $neighborhood,
                'city' => 'Beograd',
                'postal_code' => $this->faker->postcode,
                'description' => $this->faker->paragraph(3),
                'website' => 'https://' . strtolower($firstName . $lastName . $i) . '.rs',
                'is_verified' => $this->faker->boolean(80),
                'is_active' => true,
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now(),
            ]);

            if (($i + 1) % 50 === 0) {
                $this->command->info("✅ Kreirano " . ($i + 1) . " business korisnika...");
            }
        }
    }

    private function createNews()
    {
        $this->command->info('📰 Kreiranje 100 vesti...');
        
        $users = User::all();
        
        for ($i = 0; $i < 100; $i++) {
            $user = $users->random();
            $category = $this->faker->randomElement($this->newsCategories);
            
            News::create([
                'user_id' => $user->id,
                'title' => $this->generateNewsTitle($category),
                'content' => $this->faker->paragraphs(rand(3, 8), true),
                'category' => $category,
                'is_published' => true,
                'is_featured' => $this->faker->boolean(20),
                'views' => rand(0, 1000),
                'city' => $user->city,
                'neighborhood' => $user->neighborhood,
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now(),
            ]);

            if (($i + 1) % 200 === 0) {
                $this->command->info("✅ Kreirano " . ($i + 1) . " vesti...");
            }
        }
    }

    private function createPetPosts()
    {
        $this->command->info('🐕 Kreiranje 100 postova o kućnim ljubimcima...');
        
        $users = User::all();
        
        for ($i = 0; $i < 100; $i++) {
            $user = $users->random();
            $petType = $this->faker->randomElement($this->petTypes);
            
            PetPost::create([
                'user_id' => $user->id,
                'title' => $this->generatePetPostTitle($petType),
                'content' => $this->faker->paragraphs(rand(2, 5), true),
                'pet_type' => $petType,
                'pet_breed' => $this->faker->word,
                'pet_age' => rand(1, 15),
                'pet_gender' => $this->faker->randomElement(['Mužjak', 'Ženka']),
                'post_type' => $this->faker->randomElement(['upit', 'informacija', 'prodaja', 'usluga']),
                'location' => $user->neighborhood . ', ' . $user->city,
                'contact_phone' => $this->faker->phoneNumber,
                'contact_email' => $user->email,
                'is_urgent' => $this->faker->boolean(10),
                'is_active' => true,
                'likes_count' => rand(0, 50),
                'comments_count' => rand(0, 20),
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now(),
            ]);

            if (($i + 1) % 150 === 0) {
                $this->command->info("✅ Kreirano " . ($i + 1) . " postova o kućnim ljubimcima...");
            }
        }
    }

    private function createBusinesses()
    {
        $this->command->info('🏪 Kreiranje 100 biznisa...');
        
        $businessUsers = BusinessUser::all();
        
        for ($i = 0; $i < 100; $i++) {
            $businessUser = $businessUsers->random();
            
            Business::create([
                'business_user_id' => $businessUser->id,
                'title' => $this->faker->sentence(3),
                'description' => $this->faker->paragraphs(rand(2, 4), true),
                'type' => $this->faker->randomElement(['reklama', 'dnevna_ponuda', 'promocija', 'ostalo']),
                'price' => $this->faker->randomFloat(2, 100, 50000),
                'discount_percentage' => $this->faker->optional(0.3)->numberBetween(5, 50),
                'valid_from' => now()->subDays(rand(0, 30)),
                'valid_until' => now()->addDays(rand(1, 90)),
                'is_active' => true,
                'is_featured' => $this->faker->boolean(15),
                'views' => rand(0, 500),
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now(),
            ]);

            if (($i + 1) % 100 === 0) {
                $this->command->info("✅ Kreirano " . ($i + 1) . " biznisa...");
            }
        }
    }

    private function createOffers()
    {
        $this->command->info('💰 Kreiranje 100 ponuda...');
        
        $businessUsers = BusinessUser::all();
        
        for ($i = 0; $i < 100; $i++) {
            $businessUser = $businessUsers->random();
            $originalPrice = $this->faker->randomFloat(2, 500, 100000);
            $discountPercentage = $this->faker->numberBetween(10, 70);
            $discountPrice = $originalPrice * (1 - $discountPercentage / 100);
            
            Offer::create([
                'business_user_id' => $businessUser->id,
                'title' => $this->faker->sentence(4),
                'description' => $this->faker->paragraphs(rand(2, 4), true),
                'offer_type' => $this->faker->randomElement(['dnevna_ponuda', 'specijalna_ponuda', 'akcija', 'sezonska_ponuda']),
                'original_price' => $originalPrice,
                'discount_price' => $discountPrice,
                'discount_percentage' => $discountPercentage,
                'valid_from' => now()->subDays(rand(0, 30)),
                'valid_until' => now()->addDays(rand(1, 60)),
                'category' => $this->faker->randomElement(['hrana', 'odeća', 'elektronika', 'usluge', 'zabava', 'sport']),
                'is_active' => true,
                'is_featured' => $this->faker->boolean(20),
                'views' => rand(0, 300),
                'likes' => rand(0, 25),
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now(),
            ]);

            if (($i + 1) % 150 === 0) {
                $this->command->info("✅ Kreirano " . ($i + 1) . " ponuda...");
            }
        }
    }

    private function generateNewsTitle($category)
    {
        $titles = [
            'Lokalne vesti' => [
                'Novi park otvoren u ' . $this->faker->randomElement($this->belgradeNeighborhoods),
                'Rezultati lokalnih izbora u ' . $this->faker->randomElement($this->belgradeNeighborhoods),
                'Gradska infrastruktura se poboljšava',
                'Nova škola počinje sa radom',
                'Lokalna zajednica organizuje humanitarnu akciju'
            ],
            'Dešavanja' => [
                'Kulturni festival u ' . $this->faker->randomElement($this->belgradeNeighborhoods),
                'Muzički koncert u centru grada',
                'Izložba lokalnih umetnika',
                'Sportski turnir za decu',
                'Kulinarski festival tradicionalne hrane'
            ],
            'Sport' => [
                'Lokalni fudbalski tim osvojio prvenstvo',
                'Novi fitnes centar otvoren',
                'Maraton kroz ' . $this->faker->randomElement($this->belgradeNeighborhoods),
                'Omladinski košarkaški turnir',
                'Plivački klub organizuje takmičenje'
            ],
            'Kultura' => [
                'Nova pozorišna predstava u gradu',
                'Književni večer sa lokalnim piscima',
                'Izložba fotografija o Beogradu',
                'Koncert klasične muzike',
                'Festival kratkih filmova'
            ]
        ];

        $categoryTitles = $titles[$category] ?? [
            'Važne vesti iz ' . $this->faker->randomElement($this->belgradeNeighborhoods),
            'Aktuelno u našem kraju',
            'Novosti koje vas zanimaju',
            'Dešavanja u komšiluku'
        ];

        return $this->faker->randomElement($categoryTitles);
    }

    private function generatePetPostTitle($petType)
    {
        $titles = [
            'Pas' => [
                'Tražim novi dom za psa',
                'Izgubljen pas u ' . $this->faker->randomElement($this->belgradeNeighborhoods),
                'Pomozite da pronađem psa',
                'Usvajanje psa - potrebna pomoć',
                'Veterinarska pomoć za psa'
            ],
            'Mačka' => [
                'Mačke za usvajanje',
                'Izgubljena mačka traži dom',
                'Pomozite mačkama u komšiluku',
                'Veterinarska pomoć za mačku',
                'Mačke u potrebi hrane'
            ],
            'Zec' => [
                'Zec za usvajanje',
                'Pomozite zecu u nevolji',
                'Tražim savet za brigu o zecu',
                'Zec izgubljen u parku'
            ]
        ];

        $petTitles = $titles[$petType] ?? [
            'Tražim pomoć za ' . strtolower($petType),
            'Usvajanje ' . strtolower($petType),
            'Pomozite ' . strtolower($petType) . ' u nevolji'
        ];

        return $this->faker->randomElement($petTitles);
    }
}