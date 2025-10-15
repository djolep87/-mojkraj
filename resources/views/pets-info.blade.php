@extends('layouts.app')

@section('title', 'Kućni ljubimci - Moj Kraj')

@section('content')
<style>
@keyframes bounce-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

@keyframes wiggle {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-5deg); }
    75% { transform: rotate(5deg); }
}

.paw-print {
    animation: bounce-slow 2s ease-in-out infinite;
}

.pet-card:hover {
    transform: scale(1.05) rotate(2deg);
}
</style>

<!-- Playful Hero with Paw Prints -->
<section class="relative bg-gradient-to-br from-orange-400 via-pink-400 to-purple-500 overflow-hidden">
    <!-- Decorative Paw Prints -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 text-6xl paw-print" style="animation-delay: 0s;">🐾</div>
        <div class="absolute top-40 right-20 text-5xl paw-print" style="animation-delay: 0.5s;">🐾</div>
        <div class="absolute bottom-20 left-1/4 text-4xl paw-print" style="animation-delay: 1s;">🐾</div>
        <div class="absolute bottom-40 right-1/3 text-5xl paw-print" style="animation-delay: 1.5s;">🐾</div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <!-- Cute Badge -->
            <div class="inline-flex items-center bg-white/30 backdrop-blur-md px-6 py-3 rounded-full text-white font-semibold mb-8 border-2 border-white/50">
                <span class="text-2xl mr-2" style="animation: wiggle 1s ease-in-out infinite;">❤️</span>
                Zajednica ljubitelja životinja
            </div>
            
            <!-- Main Title -->
            <h1 class="text-6xl md:text-7xl font-extrabold text-white mb-6 leading-tight" style="text-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                🐕 🐱 🐰
            </h1>
            <h2 class="text-5xl md:text-6xl font-extrabold text-white mb-8 leading-tight" style="text-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                Kućni ljubimci<br>
                <span class="text-yellow-200">dele komšiluk</span>
            </h2>
            
            <p class="text-2xl text-white/90 mb-12 max-w-3xl mx-auto leading-relaxed">
                Pronađite prijatelje za igru, podelin usluge čuvanja, organizujte šetnje i delite lepe trenutke sa vašim ljubimcima! 🎾
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ auth()->check() ? route('pets.index') : route('login') }}" class="bg-white text-purple-600 px-10 py-5 rounded-full font-bold text-lg hover:bg-purple-50 transition-all duration-300 shadow-2xl hover:shadow-3xl hover:scale-105 inline-flex items-center justify-center">
                    <span class="text-2xl mr-2">🐾</span>
                    Pridruži se zajednici
                </a>
            </div>
        </div>
    </div>
    
    <!-- Wave Bottom -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="white"/>
        </svg>
    </div>
</section>

<!-- Pet Types Cards -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Svi ljubimci su dobrodošli! 🎉</h2>
            <p class="text-xl text-gray-600">Nezavisno od vrste, veličine ili rase</p>
        </div>
        
        <div class="grid md:grid-cols-4 gap-6">
            <!-- Dog Card -->
            <div class="pet-card bg-gradient-to-br from-amber-100 to-orange-200 rounded-3xl p-8 text-center transition-all duration-300 cursor-pointer shadow-lg">
                <div class="text-7xl mb-4">🐕</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Psi</h3>
                <p class="text-gray-700">Najbolji prijatelji</p>
                <div class="mt-4 text-orange-600 font-semibold">2,000+ ljubimaca</div>
            </div>
            
            <!-- Cat Card -->
            <div class="pet-card bg-gradient-to-br from-purple-100 to-pink-200 rounded-3xl p-8 text-center transition-all duration-300 cursor-pointer shadow-lg">
                <div class="text-7xl mb-4">🐱</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Mačke</h3>
                <p class="text-gray-700">Nezavisni prijatelji</p>
                <div class="mt-4 text-purple-600 font-semibold">1,500+ ljubimaca</div>
            </div>
            
            <!-- Rabbit Card -->
            <div class="pet-card bg-gradient-to-br from-green-100 to-emerald-200 rounded-3xl p-8 text-center transition-all duration-300 cursor-pointer shadow-lg">
                <div class="text-7xl mb-4">🐰</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Zečevi</h3>
                <p class="text-gray-700">Slatki ljubimci</p>
                <div class="mt-4 text-green-600 font-semibold">300+ ljubimaca</div>
            </div>
            
            <!-- Other Card -->
            <div class="pet-card bg-gradient-to-br from-blue-100 to-cyan-200 rounded-3xl p-8 text-center transition-all duration-300 cursor-pointer shadow-lg">
                <div class="text-7xl mb-4">🐹</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Ostali</h3>
                <p class="text-gray-700">Ptice, glodari...</p>
                <div class="mt-4 text-blue-600 font-semibold">200+ ljubimaca</div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section - What You Can Do -->
<section class="py-24 bg-gradient-to-br from-pink-50 via-purple-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Šta možete raditi? 🎨</h2>
            <p class="text-xl text-gray-600">Sve što vam treba za srećnog ljubimca</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center mb-6 mx-auto text-4xl">
                    👥
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Pronađi prijatelje</h3>
                <p class="text-gray-600 text-center">
                    Organizujte play date-ove sa ljubimcima iz komšiluka
                </p>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mb-6 mx-auto text-4xl">
                    🏠
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Čuvanje ljubimaca</h3>
                <p class="text-gray-600 text-center">
                    Nađite ili ponudite usluge čuvanja na putovanjima
                </p>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center mb-6 mx-auto text-4xl">
                    🚶
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Zajedničke šetnje</h3>
                <p class="text-gray-600 text-center">
                    Planirajte grupne šetnje sa drugim vlasnicima
                </p>
            </div>
            
            <!-- Feature 4 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center mb-6 mx-auto text-4xl">
                    💬
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Delite savete</h3>
                <p class="text-gray-600 text-center">
                    Razmenjujte iskustva i preporuke sa komšijama
                </p>
            </div>
            
            <!-- Feature 5 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mb-6 mx-auto text-4xl">
                    📸
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Delite fotografije</h3>
                <p class="text-gray-600 text-center">
                    Pohvalite se lepim trenucima sa ljubimcima
                </p>
            </div>
            
            <!-- Feature 6 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center mb-6 mx-auto text-4xl">
                    🏥
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Hitna pomoć</h3>
                <p class="text-gray-600 text-center">
                    Brzo pronađite veterinara ili pomoć u nevolji
                </p>
            </div>
            
            <!-- Feature 7 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center mb-6 mx-auto text-4xl">
                    🎁
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Razmena opreme</h3>
                <p class="text-gray-600 text-center">
                    Posuđujte ili prodajte opremu za ljubimce
                </p>
            </div>
            
            <!-- Feature 8 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-full flex items-center justify-center mb-6 mx-auto text-4xl">
                    🎓
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Obuka i trening</h3>
                <p class="text-gray-600 text-center">
                    Nađite trenere ili organizujte obuku zajedno
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Community Stories -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Priče iz zajednice 📖</h2>
            <p class="text-xl text-gray-600">Kako su ljubimci spojili komšije</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Story 1 -->
            <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl p-8 border-2 border-orange-200">
                <div class="text-5xl mb-4 text-center">🐕‍🦺</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Najbolji drugari</h3>
                <p class="text-gray-700 mb-4">
                    "Moj Rex je kroz Moj Kraj našao prijatelja Maksa. Sada svaki dan zajedno trčimo po parku!"
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-orange-400 rounded-full flex items-center justify-center text-white font-bold mr-3">
                        M
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Milan</div>
                        <div class="text-sm text-gray-600">Vračar</div>
                    </div>
                </div>
            </div>
            
            <!-- Story 2 -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 border-2 border-purple-200">
                <div class="text-5xl mb-4 text-center">🐱</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Čuvanje preko puta</h3>
                <p class="text-gray-700 mb-4">
                    "Komšinica mi čuva mačku kad putujem, a ja njenog psa. Zajednica koja se brine jedni o drugima!"
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-400 rounded-full flex items-center justify-center text-white font-bold mr-3">
                        S
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Sonja</div>
                        <div class="text-sm text-gray-600">Novi Beograd</div>
                    </div>
                </div>
            </div>
            
            <!-- Story 3 -->
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 border-2 border-blue-200">
                <div class="text-5xl mb-4 text-center">🐰</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Zečija familija</h3>
                <p class="text-gray-700 mb-4">
                    "Našla sam još vlasnika zečeva u kraju. Sada organizujemo mesečne sastanke i delimo savete!"
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center text-white font-bold mr-3">
                        A
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Ana</div>
                        <div class="text-sm text-gray-600">Zemun</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-24 bg-gradient-to-r from-purple-600 via-pink-600 to-orange-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-7xl mb-8">🐾 🎉 🐾</div>
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Vreme je za nove avanture!
        </h2>
        <p class="text-2xl text-white/90 mb-10">
            Pridružite se zajednici koja voli životinje kao i vi
        </p>
        
        <a href="{{ auth()->check() ? route('pets.index') : route('login') }}" class="inline-block bg-white text-purple-600 px-12 py-5 rounded-full font-bold text-lg hover:bg-purple-50 transition-all duration-300 shadow-2xl hover:scale-105">
            <span class="text-2xl mr-2">🐕</span>
            Započni danas
            <span class="ml-2">→</span>
        </a>
        
        <p class="text-white/80 mt-6">
            100% besplatno • Prijateljska zajednica • Svi ljubimci dobrodošli
        </p>
    </div>
</section>

@endsection
