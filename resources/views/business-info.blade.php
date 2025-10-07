@extends('layouts.app')

@section('title', 'Za Biznis Korisnike - Moj Kraj')

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
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: linear-gradient(135deg, #059669 0%, #10b981 50%, #34d399 100%);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-yellow-300/20 rounded-full animate-bounce"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-pink-300/20 rounded-full animate-ping"></div>
        <div class="absolute top-1/3 right-1/3 w-20 h-20 bg-orange-300/20 rounded-full animate-pulse"></div>
    </div>
    
    <!-- Floating Business Icons -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-6xl opacity-20 animate-float">🏪</div>
        <div class="absolute top-1/3 right-1/4 text-5xl opacity-20 animate-float-delayed">💼</div>
        <div class="absolute bottom-1/3 left-1/3 text-4xl opacity-20 animate-float-slow">🏢</div>
        <div class="absolute bottom-1/4 right-1/3 text-5xl opacity-20 animate-float">💰</div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/20 backdrop-blur-md text-white text-sm font-semibold mb-8 shadow-xl border border-white/30">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
            </svg>
            Biznis povezuje komšiluke
        </div>
        
        <h1 class="text-6xl md:text-8xl font-bold mb-8 leading-tight" style="text-shadow: 0 4px 8px rgba(0,0,0,0.3);">
            <span class="bg-gradient-to-r from-yellow-300 via-orange-300 to-pink-300 bg-clip-text text-transparent">Vaš biznis</span><br>
            <span class="text-white">u komšiluku</span>
        </h1>
        
        <p class="text-2xl md:text-3xl mb-12 max-w-5xl mx-auto leading-relaxed font-light" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            Povezujte se sa svojim komšijama, rastite zajedno sa lokalnom zajednicom 
            i gradite dugotrajne odnose sa kupcima koji žive u vašem komšiluku.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16">
            <a href="{{ route('business.register') }}" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-12 py-5 rounded-full text-xl font-bold hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 shadow-2xl hover:shadow-yellow-500/25 hover:scale-105">
                <span class="flex items-center">
                    Registrujte svoj biznis
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </a>
            <a href="{{ route('business.login') }}" class="group bg-white/20 backdrop-blur-md text-white px-12 py-5 rounded-full text-xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105">
                <span class="flex items-center">
                    Prijavite se
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </span>
            </a>
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">500+</div>
                <div class="text-white/80">Registrovanih biznisa</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">10,000+</div>
                <div class="text-white/80">Zadovoljnih kupaca</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">150%</div>
                <div class="text-white/80">Povećanje prodaje</div>
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
<section id="features" class="py-24 bg-gradient-to-br from-slate-50 via-green-50 to-emerald-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                </svg>
                Kompletna platforma za biznis
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                Sve što vam treba za <span class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent">uspeh</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Povezujte se sa komšijama, rastite zajedno sa lokalnom zajednicom, 
                reklamirajte se besplatno i gradite dugotrajne odnose sa kupcima.
            </p>
        </div>

        <!-- Main Features Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <!-- Local Community -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-3xl p-10 shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Lokalna zajednica</h3>
                            <p class="text-green-600 font-semibold">Povezivanje sa komšijama</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Povezujte se direktno sa svojim komšijama i gradite dugotrajne odnose sa lokalnim kupcima. 
                        Poznajte svoje kupce po imenu i prilagodite usluge njihovim potrebama.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium">Direktan kontakt</span>
                        <span class="px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium">Personalizovane usluge</span>
                        <span class="px-4 py-2 bg-teal-100 text-teal-800 rounded-full text-sm font-medium">Dugotrajni odnosi</span>
                    </div>
                    <div class="flex items-center text-green-600 font-semibold group-hover:text-green-700">
                        <span>Pridruži se zajednici</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Business Growth -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-3xl p-10 shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Rast sa zajednicom</h3>
                            <p class="text-blue-600 font-semibold">Uspeh kroz saradnju</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Vaš biznis raste zajedno sa lokalnom zajednicom. Što je zajednica jača, to je i vaš uspeh veći. 
                        Podržavajte lokalnu ekonomiju i gradite zajedno bolju budućnost.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Zajednički rast</span>
                        <span class="px-4 py-2 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">Lokalna ekonomija</span>
                        <span class="px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">Održivi razvoj</span>
                    </div>
                    <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                        <span>Rasti zajedno</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Features Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Free Marketing -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Besplatna reklama</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Reklamirajte se besplatno u svojoj lokalnoj zajednici</p>
            </div>

            <!-- Customer Insights -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Analitika kupaca</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Pratite uspeh i angažovanje kupaca</p>
            </div>

            <!-- Easy Management -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Jednostavno upravljanje</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Lako upravljajte svojim biznisom i ponudama</p>
            </div>

            <!-- Community Support -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 100 19.5 9.75 9.75 0 000-19.5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Podrška zajednice</h3>
                <p class="text-gray-600 text-sm leading-relaxed">24/7 podrška i pomoć zajednice</p>
            </div>
        </div>
    </div>
</section>

<!-- Business Tips & Best Practices Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                Saveti za uspešan biznis
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                Kako da <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent">uspešno rukujete</span> biznisom
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Stručni saveti, najbolje prakse i korisni tipovi koji će vam pomoći da gradite uspešan lokalni biznis
            </p>
        </div>

        <!-- Tips Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
            <!-- Customer Engagement -->
            <div class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Angažovanje kupaca</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Poznajte svoje kupce po imenu</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Slušajte njihove potrebe i želje</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Pružajte personalizovane usluge</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Tražite povratne informacije</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Zadovoljni kupci su vaši najbolji ambasadori!</p>
                </div>
            </div>

            <!-- Local Marketing -->
            <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Lokalni marketing</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite lokalne događaje za promociju</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Saradnja sa drugim lokalnim biznisima</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite društvene mreže za lokalnu publiku</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Učestvujte u zajedničkim aktivnostima</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Lokalni marketing je najefikasniji!</p>
                </div>
            </div>

            <!-- Business Growth -->
            <div class="group bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 border border-purple-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Rast i razvoj</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Kontinuirano poboljšanje usluga</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Investiranje u kvalitet</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Ekspanzija na osnovu potreba</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Praćenje trendova u industriji</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Rastite sa svojom zajednicom!</p>
                </div>
            </div>
        </div>

        <!-- Business Types Guide -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-3xl p-12 text-white mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-4xl font-bold mb-6">Tipovi biznisa</h3>
                    <p class="text-xl mb-8 opacity-90">
                        Bez obzira na tip vašeg biznisa, možete da se povežete sa komšijama
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Prodavnice i usluge</h4>
                                <p class="text-white/80">Restorani, kafići, frizerski saloni, prodavnice</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Online biznisi</h4>
                                <p class="text-white/80">E-commerce, digitalne usluge, freelancing</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Mali proizvođači</h4>
                                <p class="text-white/80">Rukotvorine, domaći proizvodi, lokalni brendovi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-8xl mb-4">🏪</div>
                    <h4 class="text-2xl font-bold mb-4">Svaki biznis je dobrodošao</h4>
                    <p class="text-lg opacity-90">Zajedno gradimo jaču zajednicu!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Business Posts Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Šta su <span class="text-green-600">Biznis Postovi</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Biznis postovi su način da podelite svoje usluge, proizvode i specijalne ponude sa komšijama
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Post Type 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Specijalne Ponude</h3>
                <p class="text-gray-600 mb-4">Podelite popuste, akcije i ekskluzivne ponude sa svojim komšijama.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• 20% popust za komšije</li>
                    <li>• Sezonske akcije</li>
                    <li>• Loyalty programi</li>
                </ul>
            </div>
            
            <!-- Post Type 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Nove Usluge</h3>
                <p class="text-gray-600 mb-4">Najavite nove proizvode ili usluge koje nudite komšijama.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Lansiranje novih proizvoda</li>
                    <li>• Dodatne usluge</li>
                    <li>• Sezonske ponude</li>
                </ul>
            </div>
            
            <!-- Post Type 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Događaji</h3>
                <p class="text-gray-600 mb-4">Pozovite komšije na vaše događaje, promocije ili okupljanja.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Otvaranje novog objekta</li>
                    <li>• Promotivni događaji</li>
                    <li>• Okupljanja zajednice</li>
                </ul>
            </div>
        </div>
        
        <!-- Impact Section -->
        <div class="mt-16 bg-gradient-to-r from-green-600 to-emerald-600 rounded-2xl p-8 text-white">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-3xl font-bold mb-4">Kako utiče na vaš biznis?</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Povećanje lokalne prepoznatljivosti</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Direktan kontakt sa kupcima</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Povratni kupci iz komšiluka</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Besplatna reklama u zajednici</span>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-6xl font-bold text-yellow-300 mb-2">+150%</div>
                    <div class="text-xl">Povećanje lokalnih kupaca</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories & Testimonials Section -->
<section class="py-24 bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm5 3a1 1 0 100 2h3a1 1 0 100-2h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                </svg>
                Uspešne priče iz komšiluka
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                <span class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent">Biznis</span> povezuje komšiluke
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Upoznajte biznis vlasnike koji su kroz platformu pronašli nove kupce, povećali prodaju i gradili jaču zajednicu
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            <!-- Testimonial 1 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-green-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        M
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Marko Petrović</h4>
                        <p class="text-gray-600 text-sm">Vlasnik kafića "Kod Marka"</p>
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
                    "Zahvaljujući platformi, povećao sam broj kupaca za 200%! Komšije su saznali za moj kafić 
                    i sada imam redovne goste koji žive u istom komšiluku."
                </blockquote>
                <div class="flex items-center text-green-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Vračar, Beograd
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-emerald-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        A
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Ana Stojanović</h4>
                        <p class="text-gray-600 text-sm">Vlasnica frizerskog salona "Ana's"</p>
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
                    "Kroz platformu sam upoznala komšije koje su postale moje najbolje klijentkinje. 
                    Sada imam čekanju listu i moram da zaposlim još jednu frizerku!"
                </blockquote>
                <div class="flex items-center text-emerald-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Novi Beograd, Beograd
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-teal-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        S
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Stefan Jovanović</h4>
                        <p class="text-gray-600 text-sm">Vlasnik online prodavnice "Lokalni Brend"</p>
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
                    "Kao online biznis, mislio sam da neću imati koristi od lokalne platforme. 
                    Ali komšije su postale moji najbolji kupci i preporučuju me dalje!"
                </blockquote>
                <div class="flex items-center text-teal-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Zvezdara, Beograd
                </div>
            </div>
        </div>

        <!-- Success Stats -->
        <div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-3xl p-12 text-white">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <div class="text-green-200">Registrovanih biznisa</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">10,000+</div>
                    <div class="text-green-200">Zadovoljnih kupaca</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">150%</div>
                    <div class="text-green-200">Povećanje prodaje</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">95%</div>
                    <div class="text-green-200">Zadovoljstvo biznisa</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Small Business Value Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Koliko su <span class="text-green-600">mali biznisi</span> korisni za komšije?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Lokalni biznisi su srce svake zajednice - pružaju personalizovane usluge i grade veze koje veliki lanci ne mogu
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80" 
                     alt="Lokalni biznis" 
                     class="w-full h-96 object-cover rounded-2xl shadow-xl">
            </div>
            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Personalizovane usluge</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Poznajete svoje kupce</h4>
                            <p class="text-gray-600">Mali biznisi poznaju svoje kupce po imenu i mogu da prilagode usluge njihovim potrebama.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Fleksibilnost</h4>
                            <p class="text-gray-600">Možete da se prilagodite specifičnim potrebama komšija i pružite usluge koje veliki lanci ne mogu.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Podrška lokalnoj ekonomiji</h4>
                            <p class="text-gray-600">Svaki dinar potrošen u lokalnom biznisu ostaje u zajednici i pomaže njenom razvoju.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-green-600 mb-2">73%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Komšija preferira lokalne biznise</div>
                <div class="text-gray-600">Prema istraživanjima, većina ljudi bira lokalne biznise kada je moguće</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-green-600 mb-2">3x</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Više povratnih kupaca</div>
                <div class="text-gray-600">Lokalni biznisi imaju tri puta više povratnih kupaca od velikih lanaca</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-green-600 mb-2">85%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Zadovoljstvo uslugom</div>
                <div class="text-gray-600">Komšije su zadovoljnije uslugama lokalnih biznisa</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-green-600 to-emerald-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6">Spremni da se pridružite zajednici?</h2>
        <p class="text-xl mb-8 opacity-90">
            Registrujte svoj biznis danas i počnite da gradite veze sa svojim komšijama
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('business.register') }}" class="bg-white text-green-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Registrujte se besplatno
            </a>
            <a href="{{ route('business.login') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-green-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Već imate nalog? Prijavite se
            </a>
        </div>
    </div>
</section>

<!-- View All Businesses Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-6">
            Otkrijte <span class="text-green-600">lokalne biznise</span> u vašem komšiluku
        </h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            Pregledajte sve kompanije i usluge u vašem delu grada
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('businesses.list') }}" class="bg-green-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                Pogledaj sve biznise
            </a>
        </div>
    </div>
</section>
@endsection

