# 🧪 Performance Testing Guide - Moj Kraj

## Brzo Testiranje

### Opcija 1: PHP Script (Preporučeno za Windows/macOS)

```bash
php test_performance.php
```

### Opcija 2: Bash Script (Linux/macOS)

```bash
chmod +x test_performance.sh
./test_performance.sh
```

### Opcija 3: Manual Apache Bench

```bash
# Homepage test
ab -n 100 -c 10 http://localhost/mojkraj/public/

# Login test
ab -n 100 -c 10 http://localhost/mojkraj/public/login
```

---

## 📊 Interpretacija Rezultata

### Requests per Second (RPS)

-   **< 20 RPS**: ❌ Kritično - samo 5-15 korisnika
-   **20-100 RPS**: 🟡 Zadovoljavajuće - 50-100 korisnika
-   **100-500 RPS**: ✅ Dobro - 200-500 korisnika
-   **500+ RPS**: 🎉 Odlično - 500-1,000+ korisnika

### Average Response Time

-   **< 100ms**: 🎉 Odlično
-   **100-300ms**: ✅ Dobro
-   **300-500ms**: 🟡 Prihvatljivo
-   **500-1000ms**: ⚠️ Sporo
-   **> 1000ms**: ❌ Previše sporo

### Failed Requests

-   **0%**: 🎉 Perfektno
-   **< 1%**: ✅ Dobro
-   **1-5%**: 🟡 Treba optimizacija
-   **> 5%**: ❌ Ozbiljan problem

---

## 🔧 Brze Optimizacije

### 1. Prebaci na MySQL (5 minuta)

```bash
# 1. Otvori .env i promeni:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mojkraj
DB_USERNAME=root
DB_PASSWORD=

# 2. Kreiraj bazu (otvori MySQL u XAMPP):
mysql -u root
CREATE DATABASE mojkraj CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;

# 3. Migracija:
php artisan migrate:fresh --seed
```

**Benefit**: Kapacitet 15 → 500 korisnika 🚀

---

### 2. Dodaj Database Indekse (2 minuta)

```bash
php artisan migrate --path=database/migrations/2025_10_10_211244_add_performance_indexes_to_tables.php
```

**Benefit**: Query brzina +200-500% 🚀

---

### 3. Laravel Optimization (1 minut)

```bash
# Cache config/routes/views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Opcache (proveri da je enable u php.ini)
```

**Benefit**: Response time -30-50% 🚀

---

### 4. Asset Optimization (5 minuta)

```bash
# Production build
npm run build

# Ovo kompresuje CSS/JS fajlove
```

**Benefit**: Loading speed +50-70% 🚀

---

## 📈 Pre/Posle Očekivanja

### Pre Optimizacija (SQLite, no cache)

```
Requests per second: 10-20 req/s
Time per request: 500-1000ms
Failed requests: 0-30%
Max users: 5-15
```

### Posle Optimizacija (MySQL + Indeksi)

```
Requests per second: 200-500 req/s
Time per request: 100-200ms
Failed requests: 0-1%
Max users: 500-1,000
```

---

## 🎯 Checklist Pre Produkcije

-   [ ] Prebačeno na MySQL/PostgreSQL
-   [ ] Database indeksi dodati
-   [ ] Laravel caching omogućen
-   [ ] Assets optimizovani (npm run build)
-   [ ] PHP opcache enable
-   [ ] Error reporting = false u produkciji
-   [ ] HTTPS omogućen
-   [ ] Backup strategija postavljena
-   [ ] Monitoring setup (optional)

---

## 📞 Troubleshooting

### Problem: "ab command not found"

**Rešenje**:

```bash
# Windows XAMPP:
C:\xampp\apache\bin\ab.exe

# macOS XAMPP:
/Applications/XAMPP/xamppfiles/bin/ab

# Linux:
sudo apt-get install apache2-utils
```

### Problem: Svi testovi fail

**Rešenje**:

1. Proveri da je XAMPP Apache pokrenut
2. Proveri da li sajt radi: http://localhost/mojkraj/public/
3. Proveri URL u test skripti

### Problem: Puno failed requests

**Rešenje**:

1. Prebaci na MySQL (SQLite ima lock issues)
2. Povećaj PHP memory_limit u php.ini
3. Dodaj database indekse

### Problem: Sporo (> 500ms avg)

**Rešenje**:

1. Dodaj indekse u bazu
2. Optimizuj query-je (eager loading)
3. Dodaj Redis cache
4. Run: php artisan optimize

---

## 🔍 Advanced Testing

### Load Test sa različitim brojem korisnika

```bash
# 10 korisnika
ab -n 1000 -c 10 http://localhost/mojkraj/public/

# 50 korisnika
ab -n 1000 -c 50 http://localhost/mojkraj/public/

# 100 korisnika (stress test)
ab -n 1000 -c 100 http://localhost/mojkraj/public/
```

### Test specifičnih stranica

```bash
# Homepage
ab -n 100 -c 10 http://localhost/mojkraj/public/

# Vesti
ab -n 100 -c 10 http://localhost/mojkraj/public/vesti

# Business
ab -n 100 -c 10 http://localhost/mojkraj/public/biznis

# Offers
ab -n 100 -c 10 http://localhost/mojkraj/public/ponude
```

---

## 📊 Monitoring Tools

### Laravel Telescope (Development)

```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```

Pristup: http://localhost/mojkraj/public/telescope

### Laravel Debugbar (Development)

```bash
composer require barryvdh/laravel-debugbar --dev
```

Automatski se pojavljuje u browseru na dnu stranice

---

## 💡 Performance Tips

1. **N+1 Problem**: Uvek koristi `with()` za relacione podatke

    ```php
    // LOŠE
    $news = News::all();
    foreach ($news as $item) {
        echo $item->user->name; // N+1!
    }

    // DOBRO
    $news = News::with('user')->get();
    ```

2. **Pagination**: Uvek paginuj velike liste

    ```php
    $news = News::paginate(20); // Umesto all()
    ```

3. **Select Only Needed**: Ne učitavaj sve kolone

    ```php
    $users = User::select('id', 'name', 'email')->get();
    ```

4. **Cache**: Keširaj skupe query-je
    ```php
    $news = Cache::remember('news:latest', 300, function() {
        return News::with('user')->latest()->take(10)->get();
    });
    ```

---

## 📞 Kontakt

Za dodatnu pomoć, pogledaj:

-   `PERFORMANCE_ANALYSIS.md` - Detaljna analiza
-   Laravel dokumentacija: https://laravel.com/docs/optimization
-   Apache Bench guide: https://httpd.apache.org/docs/2.4/programs/ab.html

**Napomena**: Ovi testovi su za development environment. Produkcija performanse mogu biti 2-3x bolje (ili gore) zavisno od hosting-a.














