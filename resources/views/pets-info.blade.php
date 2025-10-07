@extends('layouts.app')

@section('title', 'Kućni ljubimci - Moj Kraj')

@section('content')
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes float-delayed {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(5deg); }
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(-3deg); }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 8s ease-in-out infinite;
}

.animate-float-slow {
    animation: float-slow 10s ease-in-out infinite;
}
</style>
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-yellow-300/20 rounded-full animate-bounce"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-pink-300/20 rounded-full animate-ping"></div>
        <div class="absolute top-1/3 right-1/3 w-20 h-20 bg-orange-300/20 rounded-full animate-pulse"></div>
    </div>
    
    <!-- Floating Pet Icons -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-6xl opacity-20 animate-float">🐕</div>
        <div class="absolute top-1/3 right-1/4 text-5xl opacity-20 animate-float-delayed">🐱</div>
        <div class="absolute bottom-1/3 left-1/3 text-4xl opacity-20 animate-float-slow">🐰</div>
        <div class="absolute bottom-1/4 right-1/3 text-5xl opacity-20 animate-float">🐹</div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/20 backdrop-blur-md text-white text-sm font-semibold mb-8 shadow-xl border border-white/30">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" clip-rule="evenodd" />
            </svg>
            Ljubav povezuje komšiluke
        </div>
        
        <h1 class="text-6xl md:text-8xl font-bold mb-8 leading-tight" style="text-shadow: 0 4px 8px rgba(0,0,0,0.3);">
            <span class="bg-gradient-to-r from-yellow-300 via-orange-300 to-pink-300 bg-clip-text text-transparent">Kućni ljubimci</span><br>
            <span class="text-white">u komšiluku</span>
        </h1>
        
        <p class="text-2xl md:text-3xl mb-12 max-w-5xl mx-auto leading-relaxed font-light" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            Povezujte se sa komšijama kroz ljubav prema životinjama. Delite usluge, savete, 
            organizujte šetnje i gradite prijateljstva koja traju ceo život.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16">
            <a href="{{ auth()->check() ? route('pets.index') : route('login') }}" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-12 py-5 rounded-full text-xl font-bold hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 shadow-2xl hover:shadow-yellow-500/25 hover:scale-105">
                <span class="flex items-center">
                    Pridruži se zajednici
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </a>
            <a href="#features" class="group bg-white/20 backdrop-blur-md text-white px-12 py-5 rounded-full text-xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105">
                <span class="flex items-center">
                    Saznaj više
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </span>
            </a>
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">2,500+</div>
                <div class="text-white/80">Registrovanih ljubimaca</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">1,200+</div>
                <div class="text-white/80">Aktivnih komšija</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">98%</div>
                <div class="text-white/80">Zadovoljstvo uslugama</div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-8 h-8 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>

<!-- Features Overview Section -->
<section id="features" class="py-24 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" clip-rule="evenodd" />
                </svg>
                Kompletna platforma za ljubimce
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                Sve što vam treba za <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">vaše ljubimce</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Povezujte se sa komšijama, delite usluge, organizujte šetnje, pronađite najbolje veterinare 
                i gradite prijateljstva kroz ljubav prema životinjama.
            </p>
        </div>

        <!-- Main Features Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <!-- Pet Care Services -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-3xl p-10 shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Usluge za ljubimce</h3>
                            <p class="text-blue-600 font-semibold">Čuvanje, negovanje, šetnje</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Pronađite pouzdane komšije koji će čuvati vaše ljubimce, organizujte grupne šetnje, 
                        delite troškove veterinarа i gradite mrežu podrške u komšiluku.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Čuvanje ljubimaca</span>
                        <span class="px-4 py-2 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">Grupne šetnje</span>
                        <span class="px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">Veterinarske usluge</span>
                    </div>
                    <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                        <span>Otkrij usluge</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Community & Social -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-teal-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-3xl p-10 shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Zajednica ljubitelja</h3>
                            <p class="text-green-600 font-semibold">Povezivanje i druženje</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Upoznajte komšije koji dele istu ljubav prema životinjama, organizujte dešavanja, 
                        delite savete i gradite prijateljstva koja traju ceo život.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium">Grupne aktivnosti</span>
                        <span class="px-4 py-2 bg-teal-100 text-teal-800 rounded-full text-sm font-medium">Saveti i iskustva</span>
                        <span class="px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium">Dešavanja</span>
                    </div>
                    <div class="flex items-center text-green-600 font-semibold group-hover:text-green-700">
                        <span>Pridruži se zajednici</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Features Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Emergency Help -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Hitna pomoć</h3>
                <p class="text-gray-600 text-sm leading-relaxed">24/7 dostupnost komšija za hitne situacije sa ljubimcima</p>
            </div>

            <!-- Cost Sharing -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Deljenje troškova</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Zajednička kupovina hrane, veterinarа i opreme sa popustom</p>
            </div>

            <!-- Training & Education -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Trening i edukacija</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Grupni treninzi, saveti stručnjaka i zajedničko učenje</p>
            </div>

            <!-- Safety & Security -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Sigurnost i bezbednost</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Pouzdane komšije, verifikovani korisnici i sigurna platforma</p>
            </div>
        </div>
    </div>
</section>

<!-- Pet Care Tips & Resources Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                Korisni saveti i resursi
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                Sve što trebate da znate o <span class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent">brigi o ljubimcima</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Stručni saveti, korisni resursi i praktični tipovi koji će vam pomoći da pružite najbolju negu vašim ljubimcima
            </p>
        </div>

        <!-- Tips Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
            <!-- Health & Wellness -->
            <div class="group bg-gradient-to-br from-red-50 to-pink-50 rounded-3xl p-8 border border-red-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Zdravlje i wellness</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-red-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Redovne kontrole kod veterinara</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-red-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Vakcinacija i prevencija</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-red-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Praćenje težine i apetita</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-red-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Rano prepoznavanje simptoma</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Organizujte grupne posete veterinaru sa komšijama za popust!</p>
                </div>
            </div>

            <!-- Nutrition & Feeding -->
            <div class="group bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl p-8 border border-yellow-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Ishrana i hranjenje</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Balansirana ishrana po uzrastu</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Redovni obroci u isto vreme</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Dovoljno sveže vode</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Izbegavanje opasne hrane</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Zajednička kupovina hrane sa komšijama - ušteda do 30%!</p>
                </div>
            </div>

            <!-- Exercise & Training -->
            <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Vežbanje i trening</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Redovne šetnje i aktivnost</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Mentalna stimulacija</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Osnovni komandi i ponašanje</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Socijalizacija sa drugim ljubimcima</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Organizujte grupne šetnje sa komšijama - zabavno i korisno!</p>
                </div>
            </div>
        </div>

        <!-- Emergency Resources -->
        <div class="bg-gradient-to-r from-red-500 to-pink-500 rounded-3xl p-12 text-white mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-4xl font-bold mb-6">Hitne situacije sa ljubimcima</h3>
                    <p class="text-xl mb-8 opacity-90">
                        Znajte kako da reagujete u hitnim situacijama i gde da se obratite za pomoć
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Hitna veterinarska služba</h4>
                                <p class="text-white/80">011/123-4567 (24/7)</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Najbliži hitni veterinar</h4>
                                <p class="text-white/80">Klinika "Vet Plus" - 5 min od centra</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Komšije za hitnu pomoć</h4>
                                <p class="text-white/80">Pozovite komšije preko platforme</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-8xl mb-4">🚨</div>
                    <h4 class="text-2xl font-bold mb-4">Uvek spremni da pomognemo</h4>
                    <p class="text-lg opacity-90">Zajedno smo jači!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pet Services Types Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Kakve <span class="text-orange-600">usluge</span> možete pružiti?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Evo različitih načina kako možete pomoći komšijama sa kućnim ljubimcima
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service Type 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Čuvanje ljubimaca</h3>
                <p class="text-gray-600 mb-4">Pružite uslugu čuvanja kada komšije putuju ili su zauzeti.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Kratkoročno čuvanje</li>
                    <li>• Dugoročno čuvanje</li>
                    <li>• Hitno čuvanje</li>
                    <li>• Čuvanje tokom praznika</li>
                </ul>
            </div>
            
            <!-- Service Type 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Higijena i negovanje</h3>
                <p class="text-gray-600 mb-4">Pomozite sa kupanjem, šišanjem i osnovnom negom.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Kupanje ljubimaca</li>
                    <li>• Šišanje i friziranje</li>
                    <li>• Čišćenje ušiju i zuba</li>
                    <li>• Negovanje noktiju</li>
                </ul>
            </div>
            
            <!-- Service Type 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Šetnja i vežbanje</h3>
                <p class="text-gray-600 mb-4">Organizujte zajedničke šetnje i aktivnosti za ljubimce.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Redovne šetnje</li>
                    <li>• Grupne šetnje</li>
                    <li>• Igranje u parku</li>
                    <li>• Trening i vežbanje</li>
                </ul>
            </div>
            
            <!-- Service Type 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Veterinarske usluge</h3>
                <p class="text-gray-600 mb-4">Podelite informacije i organizujte grupne posete veterinaru.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Preporuke veterinarа</li>
                    <li>• Grupne posete</li>
                    <li>• Hitne intervencije</li>
                    <li>• Deljenje troškova</li>
                </ul>
            </div>
            
            <!-- Service Type 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Hrana i oprema</h3>
                <p class="text-gray-600 mb-4">Delite hranu, igračke i opremu za kućne ljubimce.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Deljenje hrane</li>
                    <li>• Zajednička kupovina</li>
                    <li>• Pozajmljivanje opreme</li>
                    <li>• Preporuke proizvoda</li>
                </ul>
            </div>
            
            <!-- Service Type 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Edukacija i saveti</h3>
                <p class="text-gray-600 mb-4">Podelite znanje i iskustvo o brigi o kućnim ljubimcima.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Saveti za negovanje</li>
                    <li>• Obuka i trening</li>
                    <li>• Rešavanje problema</li>
                    <li>• Zajedničko učenje</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories & Testimonials Section -->
<section class="py-24 bg-gradient-to-br from-purple-50 via-pink-50 to-red-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm5 3a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                </svg>
                Uspešne priče iz komšiluka
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-red-600 bg-clip-text text-transparent">Prijateljstva</span> koja traju ceo život
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Upoznajte komšije koji su pronašli prijatelje, uštedeli novac i gradili zajednicu kroz ljubav prema životinjama
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            <!-- Testimonial 1 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-purple-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        M
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Milica Petrović</h4>
                        <p class="text-gray-600 text-sm">Vlasnik psa "Rex"</p>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">5.0</span>
                        </div>
                    </div>
                </div>
                <blockquote class="text-gray-700 leading-relaxed mb-4">
                    "Kroz platformu sam upoznala komšiju koja čuva mog Rexa kada putujem. 
                    Ne samo što je pouzdana, već je i Rex postao najbolji prijatelj sa njenim psom!"
                </blockquote>
                <div class="flex items-center text-purple-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Novi Beograd, Beograd
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-pink-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-red-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        S
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Stefan Jovanović</h4>
                        <p class="text-gray-600 text-sm">Vlasnik mačke "Mimi"</p>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">5.0</span>
                        </div>
                    </div>
                </div>
                <blockquote class="text-gray-700 leading-relaxed mb-4">
                    "Zajedno sa komšijama organizujemo grupne šetnje svakog vikenda. 
                    Uštedeli smo 40% na veterinaru i našli najboljeg trenera u gradu!"
                </blockquote>
                <div class="flex items-center text-pink-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Vračar, Beograd
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-red-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        A
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Ana Stojanović</h4>
                        <p class="text-gray-600 text-sm">Vlasnik psa "Bella"</p>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">5.0</span>
                        </div>
                    </div>
                </div>
                <blockquote class="text-gray-700 leading-relaxed mb-4">
                    "Kada je Bella bila bolesna, komšije su mi pomogle da je odvezem kod veterinara. 
                    Platforma je stvarno povezala naš komšiluk!"
                </blockquote>
                <div class="flex items-center text-red-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Zvezdara, Beograd
                </div>
            </div>
        </div>

        <!-- Success Stats -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl p-12 text-white">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <div class="text-purple-200">Uspešnih usluga</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">98%</div>
                    <div class="text-purple-200">Zadovoljstvo korisnika</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">40%</div>
                    <div class="text-purple-200">Ušteda na troškovima</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">24/7</div>
                    <div class="text-purple-200">Dostupnost pomoći</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community Benefits Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Zašto su <span class="text-orange-600">kućni ljubimci</span> važni za komšiluk?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kućni ljubimci pomažu da se komšije povežu i grade jaču zajednicu
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <img src="https://images.unsplash.com/photo-1551717743-49959800b1f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                     alt="Komšije sa ljubimcima" 
                     class="w-full h-96 object-cover rounded-2xl shadow-xl">
            </div>
            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Prednosti za zajednicu</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Povezivanje komšija</h4>
                            <p class="text-gray-600">Ljubimci su prirodni "razgovor starter" i pomažu komšijama da se upoznaju.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Sigurnost komšiluka</h4>
                            <p class="text-gray-600">Ljubimci pomažu u praćenju sigurnosti i brzom reagovanju na probleme.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Zajednička briga</h4>
                            <p class="text-gray-600">Komšije pomažu jedna drugoj u brigi o ljubimcima kada je potrebno.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Ušteda troškova</h4>
                            <p class="text-gray-600">Deljenje troškova za veterinarа, hranu i opremu za ljubimce.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Success Stories -->
        <div class="bg-gradient-to-r from-orange-600 to-pink-600 rounded-2xl p-8 text-white">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-3xl font-bold mb-4">Uspešne priče iz komšiluka</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>"Komšija mi je čuvao psa tokom godišnjeg odmora - besplatno!"</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>"Zajedno smo organizovali grupne šetnje svakog vikenda"</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>"Delimo troškove veterinarа - uštedeli smo 50%!"</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>"Našli smo najboljeg veterinara preko komšije"</span>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-6xl font-bold text-yellow-300 mb-2">🐕</div>
                    <div class="text-xl">Ljubav povezuje</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Practical Examples Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Praktični <span class="text-orange-600">primeri</span> usluga
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Evo konkretnih načina kako možete pomoći komšijama sa kućnim ljubimcima
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Example 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Čuvar ljubimaca"</h3>
                <p class="text-gray-600 mb-4">Pružite uslugu čuvanja kada komšije putuju ili su bolesni.</p>
                <div class="bg-blue-50 rounded-lg p-4">
                    <p class="text-sm text-blue-700 font-medium">Primer: "Čuvam psa komšije dok su na godišnjem odmoru - 500 din/dan"</p>
                </div>
            </div>
            
            <!-- Example 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Šetač ljubimaca"</h3>
                <p class="text-gray-600 mb-4">Organizujte redovne šetnje za komšije koji nemaju vremena.</p>
                <div class="bg-green-50 rounded-lg p-4">
                    <p class="text-sm text-green-700 font-medium">Primer: "Šetam psa komšije svakog dana - 200 din/šetnja"</p>
                </div>
            </div>
            
            <!-- Example 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Grupna kupovina"</h3>
                <p class="text-gray-600 mb-4">Organizujte zajedničku kupovinu hrane i opreme sa popustom.</p>
                <div class="bg-purple-50 rounded-lg p-4">
                    <p class="text-sm text-purple-700 font-medium">Primer: "Kupujemo hranu zajedno - 20% popust za sve!"</p>
                </div>
            </div>
            
            <!-- Example 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Veterinarska grupa"</h3>
                <p class="text-gray-600 mb-4">Organizujte grupne posete veterinaru sa popustom.</p>
                <div class="bg-red-50 rounded-lg p-4">
                    <p class="text-sm text-red-700 font-medium">Primer: "Grupna poseta veterinaru - 15% popust za sve!"</p>
                </div>
            </div>
            
            <!-- Example 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Trening grupa"</h3>
                <p class="text-gray-600 mb-4">Organizujte zajedničke treninge i obuku ljubimaca.</p>
                <div class="bg-yellow-50 rounded-lg p-4">
                    <p class="text-sm text-yellow-700 font-medium">Primer: "Grupni trening pasa - 1000 din/član"</p>
                </div>
            </div>
            
            <!-- Example 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Hitna pomoć"</h3>
                <p class="text-gray-600 mb-4">Pružite hitnu pomoć kada komšije imaju probleme sa ljubimcima.</p>
                <div class="bg-indigo-50 rounded-lg p-4">
                    <p class="text-sm text-indigo-700 font-medium">Primer: "Hitna pomoć za ljubimce - 24/7 dostupnost"</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Statistike <span class="text-orange-600">kućnih ljubimaca</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Brojke koje pokazuju koliko su kućni ljubimci važni za komšiluk
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-orange-600 mb-2">68%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Kuća ima ljubimca</div>
                <div class="text-gray-600">Većina domaćinstava u Srbiji ima bar jednog kućnog ljubimca</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-orange-600 mb-2">85%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Komšija pomaže sa ljubimcima</div>
                <div class="text-gray-600">Većina komšija je spremna da pomogne sa brigom o ljubimcima</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-orange-600 mb-2">92%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Zadovoljstvo uslugama</div>
                <div class="text-gray-600">Komšije su veoma zadovoljne uslugama za kućne ljubimce</div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Posts Section -->
@if($latestPets->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Najnoviji <span class="text-orange-600">postovi o ljubimcima</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pogledajte šta komšije dele o svojim kućnim ljubimcima
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($latestPets as $pet)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <a href="{{ route('pets.show', $pet) }}" class="block">
                        @if($pet->images && count($pet->images) > 0)
                            <img src="{{ Storage::url($pet->images[0]) }}" alt="{{ $pet->title }}" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-orange-100 to-pink-100 flex items-center justify-center hover:scale-105 transition-transform duration-300">
                                <svg class="w-16 h-16 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                        @endif
                    </a>
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{ ucfirst($pet->post_type) }}
                            </span>
                            @if($pet->pet_type)
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ ucfirst($pet->pet_type) }}
                                </span>
                            @endif
                        </div>
                        
                        <a href="{{ route('pets.show', $pet) }}" class="block group">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2 group-hover:text-orange-600 transition-colors duration-200">
                                {{ $pet->title }}
                            </h3>
                        </a>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit($pet->content, 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-pink-400 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                    {{ substr($pet->user->name, 0, 1) }}
                                </div>
                                <span class="text-sm text-gray-500">{{ $pet->user->name }}</span>
                            </div>
                            <span class="text-sm text-gray-500">{{ $pet->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center">
            @if(auth()->check())
                <a href="{{ route('pets.index') }}" class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                    Prikaži više postova
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Prijavite se za pristup
                </a>
            @endif
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-orange-600 to-pink-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6">Spremni da se povežete kroz ljubav prema životinjama?</h2>
        <p class="text-xl mb-8 opacity-90">
            Pridružite se zajednici komšija koji dele ljubav prema kućnim ljubimcima
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if(auth()->check())
                <a href="{{ route('pets.index') }}" class="bg-white text-orange-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Pridruži se zajednici
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-white text-orange-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Pridruži se zajednici
                </a>
            @endif
            <a href="#about" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-orange-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Saznaj više
            </a>
        </div>
    </div>
</section>
@endsection

