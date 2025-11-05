<?php
/**
 * Performance Testing Script za Moj Kraj
 * Windows compatible verzija
 * 
 * Pokreni: php test_performance.php
 */

echo "🚀 Moj Kraj - Performance Testing\n";
echo str_repeat("=", 50) . "\n\n";

// Configuration
$baseUrl = "http://localhost/mojkraj/public";
$abPath = "C:/xampp/apache/bin/ab.exe"; // Windows XAMPP path

// Proveri da li ab postoji
if (!file_exists($abPath)) {
    echo "❌ Apache Bench nije pronađen na: $abPath\n";
    echo "Pokušavam sa 'ab' iz PATH-a...\n";
    $abPath = "ab"; // Pokušaj iz PATH-a
}

// Test URLs
$tests = [
    'Homepage' => '/',
    'Login' => '/login',
    'Register' => '/register',
    'About' => '/o-nama',
    'News Info' => '/vesti/info',
    'Business Info' => '/biznis/info',
];

$results = [];

foreach ($tests as $name => $url) {
    echo "📊 TEST: $name\n";
    echo str_repeat("-", 50) . "\n";
    
    $fullUrl = $baseUrl . $url;
    
    // Run Apache Bench
    $command = "$abPath -n 100 -c 10 -q \"$fullUrl\" 2>&1";
    $output = shell_exec($command);
    
    if (!$output) {
        echo "❌ Test nije uspeo!\n\n";
        continue;
    }
    
    // Parse results
    preg_match('/Requests per second:\s+([\d.]+)/', $output, $rps);
    preg_match('/Time per request:\s+([\d.]+).*\[ms\]\s+\(mean\)/', $output, $time);
    preg_match('/Failed requests:\s+(\d+)/', $output, $failed);
    
    $requestsPerSec = isset($rps[1]) ? $rps[1] : 'N/A';
    $avgTime = isset($time[1]) ? $time[1] : 'N/A';
    $failedReqs = isset($failed[1]) ? $failed[1] : '0';
    
    $results[$name] = [
        'rps' => $requestsPerSec,
        'time' => $avgTime,
        'failed' => $failedReqs
    ];
    
    echo "  Requests/sec: $requestsPerSec\n";
    echo "  Avg Time: $avgTime ms\n";
    echo "  Failed: $failedReqs\n\n";
    
    // Pauza između testova
    sleep(1);
}

// Summary
echo str_repeat("=", 50) . "\n";
echo "📈 SUMMARY\n";
echo str_repeat("=", 50) . "\n\n";

echo sprintf("%-20s | %-10s | %-12s | %-8s\n", "Test", "Req/sec", "Avg Time(ms)", "Failed");
echo str_repeat("-", 50) . "\n";

$totalRps = 0;
$totalTime = 0;
$count = 0;

foreach ($results as $name => $data) {
    echo sprintf("%-20s | %-10s | %-12s | %-8s\n", 
        $name, 
        $data['rps'], 
        $data['time'], 
        $data['failed']
    );
    
    if (is_numeric($data['rps'])) {
        $totalRps += $data['rps'];
        $count++;
    }
    if (is_numeric($data['time'])) {
        $totalTime += $data['time'];
    }
}

echo "\n";

// Averages
$avgRps = $count > 0 ? round($totalRps / $count, 2) : 0;
$avgTime = $count > 0 ? round($totalTime / $count, 2) : 0;

echo "Prosečan Requests/sec: $avgRps\n";
echo "Prosečno vreme: $avgTime ms\n\n";

// Recommendations
echo str_repeat("=", 50) . "\n";
echo "💡 ANALIZA I PREPORUKE\n";
echo str_repeat("=", 50) . "\n\n";

// Estimate concurrent users
$estimatedUsers = round($avgRps * 5); // Rough estimate

echo "📊 Estimirani kapacitet:\n";
echo "  - Requests/sec: $avgRps\n";
echo "  - Avg Response Time: $avgTime ms\n";
echo "  - Procena korisnika: ~$estimatedUsers konkurentnih korisnika\n\n";

// Evaluation
if ($avgRps < 20) {
    echo "❌ KRITIČNO: Trenutni kapacitet 5-15 korisnika\n";
    echo "   Razlog: SQLite ne skalira za više korisnika\n\n";
    echo "🔧 HITNE AKCIJE:\n";
    echo "   1. Prebaci na MySQL (odmah!)\n";
    echo "   2. Dodaj Redis cache\n";
    echo "   3. Pokreni: php artisan migrate --path=database/migrations/2025_10_10_211244_add_performance_indexes_to_tables.php\n\n";
} elseif ($avgRps < 100) {
    echo "⚠️  UPOZORENJE: Trenutni kapacitet 50-100 korisnika\n";
    echo "   Dobro za testiranje, ali ne za produkciju\n\n";
    echo "🔧 PREPORUKE:\n";
    echo "   1. Dodaj database indekse\n";
    echo "   2. Optimizuj query-je (eager loading)\n";
    echo "   3. Dodaj Redis za cache\n\n";
} elseif ($avgRps < 500) {
    echo "✅ DOBRO: Trenutni kapacitet 200-500 korisnika\n";
    echo "   Prihvatljivo za mali do srednji sajt\n\n";
    echo "🔧 OPTIMIZACIJE:\n";
    echo "   1. CDN za statičke fajlove\n";
    echo "   2. Opcache za PHP\n";
    echo "   3. Asset optimization\n\n";
} else {
    echo "🎉 ODLIČNO: Kapacitet 500+ korisnika\n";
    echo "   Sajt je spreman za produkciju!\n\n";
    echo "🔧 DODATNO:\n";
    echo "   1. Load balancing za 1,000+ korisnika\n";
    echo "   2. Database replication\n";
    echo "   3. Monitoring setup\n\n";
}

// Performance Grade
$grade = 'F';
if ($avgRps >= 500) $grade = 'A';
elseif ($avgRps >= 100) $grade = 'B';
elseif ($avgRps >= 50) $grade = 'C';
elseif ($avgRps >= 20) $grade = 'D';

echo "📝 Performance Grade: $grade\n\n";

// Database Check
echo str_repeat("=", 50) . "\n";
echo "🗄️  DATABASE ANALIZA\n";
echo str_repeat("=", 50) . "\n\n";

$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    $env = file_get_contents($envPath);
    
    if (preg_match('/DB_CONNECTION=(\w+)/', $env, $match)) {
        $dbType = $match[1];
        echo "Trenutna baza: $dbType\n\n";
        
        if ($dbType === 'sqlite') {
            echo "❌ SQLite je u upotrebi!\n";
            echo "   Problem: SQLite ne podržava više od 10-15 konkurentnih korisnika\n";
            echo "   Rešenje: Prebaci na MySQL koji je već instaliran u XAMPP-u\n\n";
            echo "🔧 QUICK FIX:\n";
            echo "   1. Otvori .env fajl\n";
            echo "   2. Promeni:\n";
            echo "      DB_CONNECTION=sqlite\n";
            echo "      u:\n";
            echo "      DB_CONNECTION=mysql\n";
            echo "      DB_HOST=127.0.0.1\n";
            echo "      DB_PORT=3306\n";
            echo "      DB_DATABASE=mojkraj\n";
            echo "      DB_USERNAME=root\n";
            echo "      DB_PASSWORD=\n";
            echo "   3. Kreiraj bazu: mysql -u root -e \"CREATE DATABASE mojkraj\"\n";
            echo "   4. Pokreni: php artisan migrate:fresh --seed\n\n";
        } elseif ($dbType === 'mysql' || $dbType === 'mariadb') {
            echo "✅ MySQL je u upotrebi - odlično!\n";
            echo "   Kapacitet: 500-1,000+ korisnika\n\n";
        }
    }
}

// Cache Check
if (preg_match('/CACHE_DRIVER=(\w+)/', $env, $match)) {
    $cacheDriver = $match[1];
    echo "Cache Driver: $cacheDriver\n";
    
    if ($cacheDriver === 'file') {
        echo "⚠️  File cache je spor\n";
        echo "   Preporuka: Prebaci na Redis ili database\n\n";
    } else {
        echo "✅ $cacheDriver cache - dobro!\n\n";
    }
}

echo str_repeat("=", 50) . "\n";
echo "✅ Test završen!\n";
echo "Za detaljnije rezultate, pregledaj PERFORMANCE_ANALYSIS.md\n";
echo str_repeat("=", 50) . "\n";











