@extends('layouts.app')

@section('title', 'Stambene zajednice - Informacije')

@section('content')
<style>
@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
}

.feature-card {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

.feature-card:nth-child(1) { animation-delay: 0.1s; }
.feature-card:nth-child(2) { animation-delay: 0.2s; }
.feature-card:nth-child(3) { animation-delay: 0.3s; }
.feature-card:nth-child(4) { animation-delay: 0.4s; }
.feature-card:nth-child(5) { animation-delay: 0.5s; }
.feature-card:nth-child(6) { animation-delay: 0.6s; }
</style>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-indigo-900 via-purple-800 to-pink-800 overflow-hidden">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 30px 30px;"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Text Content -->
            <div>
                <div class="inline-block mb-6">
                    <span class="bg-indigo-500/20 text-indigo-200 px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm border border-indigo-400/30">
                        🏢 Upravljanje zgradama
                    </span>
                </div>
                
                <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
                    Stambene zajednice<br>
                    <span class="text-purple-300">digitalno upravljanje</span>
                </h1>
                
                <p class="text-xl text-indigo-100 mb-8 leading-relaxed">
                    Povežite se sa susedima, upravljajte zgradom efikasno i brzo rešavajte sve probleme zajedno. Sve na jednom mestu, jednostavno i pregledno.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    @if(auth()->check())
                    <a href="{{ route('buildings.index') }}" class="bg-white text-indigo-900 px-8 py-4 rounded-xl font-bold hover:bg-indigo-50 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 inline-flex items-center">
                        Otvori zajednice
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    @else
                    <a href="{{ route('register') }}" class="bg-white text-indigo-900 px-8 py-4 rounded-xl font-bold hover:bg-indigo-50 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 inline-flex items-center">
                        Registruj se
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
            
            <!-- Right Side - Feature Icons -->
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-5xl mb-3">🏘️</div>
                    <div class="text-2xl font-bold text-white mb-1">Upravljanje</div>
                    <div class="text-indigo-200 text-sm">Efikasno upravljanje zgradom</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-5xl mb-3">👥</div>
                    <div class="text-2xl font-bold text-white mb-1">Komunikacija</div>
                    <div class="text-indigo-200 text-sm">Povezivanje sa susedima</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-5xl mb-3">📊</div>
                    <div class="text-2xl font-bold text-white mb-1">Transparentnost</div>
                    <div class="text-indigo-200 text-sm">Jasni troškovi i prijave</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-5xl mb-3">⚡</div>
                    <div class="text-2xl font-bold text-white mb-1">Brzo</div>
                    <div class="text-indigo-200 text-sm">Rešavanje problema</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Sve što vam treba na <span class="text-indigo-600">jednom mestu</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Moderan sistem za upravljanje stambenom zajednicom koji pojednostavljuje svakodnevni rad
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1: Prijave kvarova -->
            <div class="feature-card bg-white rounded-2xl shadow-lg p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Prijave kvarova</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Prijavite kvarove u zgradi jednostavno i brzo. Dodajte fotografije, opis problema i pratite status rešavanja u realnom vremenu.
                </p>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Dodavanje fotografija
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Praćenje statusa
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Obaveštenja manageru
                    </li>
                </ul>
            </div>

            <!-- Feature 2: Objave i obaveštenja -->
            <div class="feature-card bg-white rounded-2xl shadow-lg p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Objave i obaveštenja</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Manager objavljuje važne informacije za sve stanare. Važne objave mogu biti fiksirane na vrh. Svako može komentarisati.
                </p>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Fiksiranje važnih objava
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Komentari i diskusije
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Hronološki prikaz
                    </li>
                </ul>
            </div>

            <!-- Feature 3: Glasanja i ankete -->
            <div class="feature-card bg-white rounded-2xl shadow-lg p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Glasanja i ankete</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Kreirajte ankete i glasanja za važne odluke u zgradi. Svaki stanar može glasati samo jednom. Rezultati su vidljivi u realnom vremenu.
                </p>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Višestruki izbori
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Rok za glasanje
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Automatski rezultati
                    </li>
                </ul>
            </div>

            <!-- Feature 4: Upravljanje troškovima -->
            <div class="feature-card bg-white rounded-2xl shadow-lg p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Upravljanje troškovima</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Evidentirajte sve troškove zgrade. Manager dodaje nove troškove, a svi stanari mogu videti detalje i ukupne iznose.
                </p>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Kategorizacija troškova
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Ukupan pregled
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Transparentan pristup
                    </li>
                </ul>
            </div>

            <!-- Feature 5: Upravljanje članstvom -->
            <div class="feature-card bg-white rounded-2xl shadow-lg p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Upravljanje članstvom</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Manager može dodavati nove stanare, a stanari mogu sami da se pridruže zgradi slanjem zahteva koji manager odobrava.
                </p>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Zahtevi za pridruživanje
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Odobravanje managera
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Pregled svih članova
                    </li>
                </ul>
            </div>

            <!-- Feature 6: Sigurnost i privatnost -->
            <div class="feature-card bg-white rounded-2xl shadow-lg p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Sigurnost i privatnost</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Samo članovi zgrade imaju pristup detaljima. Manager ima dodatne privilegije za upravljanje. Vaši podaci su sigurni.
                </p>
                <ul class="space-y-2 text-sm text-gray-500">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Kontrola pristupa
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Zaštićeni podaci
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Role-based pristup
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Kako <span class="text-indigo-600">to radi</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Tri jednostavna koraka ka efikasnom upravljanju vašom zgradom
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6 relative">
                    <span class="text-3xl font-bold text-indigo-600">1</span>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                        ✓
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Kreirajte ili pridružite se</h3>
                <p class="text-gray-600 leading-relaxed">
                    Kreirajte novu stambenu zajednicu za svoju zgradu ili se pridružite postojećoj. Ako ste prvi, postaćete manager. Ostali stanari mogu slati zahteve za pridruživanje.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="text-center">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6 relative">
                    <span class="text-3xl font-bold text-purple-600">2</span>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                        ✓
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Upravljajte i komunicirajte</h3>
                <p class="text-gray-600 leading-relaxed">
                    Manager objavljuje obaveštenja, kreira glasanja, dodaje troškove. Stanari prijavljuju kvarove, komentarišu objave i učestvuju u glasanjima.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6 relative">
                    <span class="text-3xl font-bold text-pink-600">3</span>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                        ✓
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Prerađujte rezultate</h3>
                <p class="text-gray-600 leading-relaxed">
                    Pratite status prijava kvarova, rezultate glasanja, ukupne troškove i sve što je važno za vašu zgradu. Sve na jednom mestu, u bilo kom trenutku.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
            Spremni da počnete?
        </h2>
        <p class="text-xl text-indigo-100 mb-8">
            Pridružite se zajednici stanara koji već koriste naš sistem za efikasno upravljanje zgradom
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            @if(auth()->check())
            <a href="{{ route('buildings.index') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-xl font-bold hover:bg-indigo-50 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 inline-flex items-center">
                Otvori stambene zajednice
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
            @else
            <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-xl font-bold hover:bg-indigo-50 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 inline-flex items-center">
                Registruj se besplatno
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
            @endif
            <a href="{{ route('about') }}" class="bg-indigo-500/20 text-white px-8 py-4 rounded-xl font-bold hover:bg-indigo-500/30 transition-all duration-300 backdrop-blur-sm border border-white/30 inline-flex items-center">
                Saznajte više o nama
            </a>
        </div>
    </div>
</section>

@endsection
