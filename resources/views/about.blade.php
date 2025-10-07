@extends('layouts.app')

@section('title', 'O nama - Moj Kraj')

@section('content')
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

@keyframes float-delayed {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(-3deg); }
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(2deg); }
}

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
    50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6); }
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

.animate-pulse-glow {
    animation: pulse-glow 3s ease-in-out infinite;
}
</style>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 25%, #8b5cf6 50%, #ec4899 75%, #f59e0b 100%);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-40 h-40 bg-white/10 rounded-full animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-32 h-32 bg-yellow-300/20 rounded-full animate-bounce"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-pink-300/20 rounded-full animate-ping"></div>
        <div class="absolute top-1/3 right-1/3 w-28 h-28 bg-orange-300/20 rounded-full animate-pulse"></div>
        <div class="absolute bottom-1/3 left-1/3 w-20 h-20 bg-purple-300/20 rounded-full animate-bounce"></div>
    </div>
    
    <!-- Floating Community Icons -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-7xl opacity-20 animate-float">🏘️</div>
        <div class="absolute top-1/3 right-1/4 text-6xl opacity-20 animate-float-delayed">🤝</div>
        <div class="absolute bottom-1/3 left-1/3 text-5xl opacity-20 animate-float-slow">💝</div>
        <div class="absolute bottom-1/4 right-1/3 text-6xl opacity-20 animate-float">🌟</div>
        <div class="absolute top-1/2 left-1/2 text-4xl opacity-20 animate-float-delayed">❤️</div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <div class="inline-flex items-center px-8 py-4 rounded-full bg-white/20 backdrop-blur-md text-white text-lg font-semibold mb-12 shadow-2xl border border-white/30 animate-pulse-glow">
            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
            Priča o ljubavi prema komšiluku
        </div>
        
        <h1 class="text-7xl md:text-9xl font-bold mb-12 leading-tight" style="text-shadow: 0 6px 12px rgba(0,0,0,0.4);">
            <span class="bg-gradient-to-r from-yellow-300 via-orange-300 to-pink-300 bg-clip-text text-transparent">Moj Kraj</span><br>
            <span class="text-white text-6xl md:text-7xl">je vaš dom</span>
        </h1>
        
        <p class="text-3xl md:text-4xl mb-16 max-w-6xl mx-auto leading-relaxed font-light" style="text-shadow: 0 3px 6px rgba(0,0,0,0.3);">
            Verujemo da je komšiluk srce svakog grada. Naša misija je da povežemo komšije, 
            gradimo zajednicu i činimo vaš komšiluk najboljim mestom za život.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-8 justify-center mb-20">
            <a href="#story" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-16 py-6 rounded-full text-2xl font-bold hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 shadow-2xl hover:shadow-yellow-500/25 hover:scale-105">
                <span class="flex items-center">
                    Naša priča
                    <svg class="w-8 h-8 ml-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </a>
            <a href="#mission" class="group bg-white/20 backdrop-blur-md text-white px-16 py-6 rounded-full text-2xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105">
                <span class="flex items-center">
                    Naša misija
                    <svg class="w-8 h-8 ml-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </span>
            </a>
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 max-w-5xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="text-4xl font-bold text-white mb-3">10,000+</div>
                <div class="text-white/80 text-lg">Aktivnih komšija</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="text-4xl font-bold text-white mb-3">500+</div>
                <div class="text-white/80 text-lg">Lokalnih biznisa</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="text-4xl font-bold text-white mb-3">50+</div>
                <div class="text-white/80 text-lg">Gradova</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="text-4xl font-bold text-white mb-3">98%</div>
                <div class="text-white/80 text-lg">Zadovoljstvo</div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-10 h-10 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>

<!-- Our Story Section -->
<section id="story" class="py-32 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-64 h-64 bg-blue-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-48 h-48 bg-purple-400 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-pink-400 rounded-full blur-2xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-8 py-4 rounded-full bg-white/10 backdrop-blur-md text-white text-lg font-semibold mb-12 shadow-2xl border border-white/20">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                Naša priča
            </div>
            <h2 class="text-6xl md:text-8xl font-bold mb-12 leading-tight">
                <span class="bg-gradient-to-r from-yellow-300 via-orange-300 to-pink-300 bg-clip-text text-transparent">Kako je sve</span><br>
                <span class="text-white">počelo</span>
            </h2>
            <p class="text-2xl md:text-3xl max-w-5xl mx-auto leading-relaxed opacity-90">
                Sve je počelo sa jednom jednostavnom idejom: da komšije treba da se poznaju i pomažu jedni drugima
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <div class="bg-white/5 backdrop-blur-lg rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mr-6">
                            <span class="text-2xl">💡</span>
                        </div>
                        <h3 class="text-2xl font-bold">Inspiracija</h3>
                    </div>
                    <p class="text-lg leading-relaxed opacity-90">
                        Videli smo da se komšije ne poznaju, da ne znaju ko živi pored njih, 
                        da ne pomažu jedni drugima. Znali smo da to može biti drugačije.
                    </p>
                </div>

                <div class="bg-white/5 backdrop-blur-lg rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl flex items-center justify-center mr-6">
                            <span class="text-2xl">🚀</span>
                        </div>
                        <h3 class="text-2xl font-bold">Razvoj</h3>
                    </div>
                    <p class="text-lg leading-relaxed opacity-90">
                        Kreirali smo platformu koja omogućava komšijama da se povežu, 
                        dele vesti, podržavaju lokalne biznise i grade jaču zajednicu.
                    </p>
                </div>

                <div class="bg-white/5 backdrop-blur-lg rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-red-500 rounded-2xl flex items-center justify-center mr-6">
                            <span class="text-2xl">❤️</span>
                        </div>
                        <h3 class="text-2xl font-bold">Rezultat</h3>
                    </div>
                    <p class="text-lg leading-relaxed opacity-90">
                        Danas imamo hiljade komšija koji se pomažu, lokalne biznise koji rastu, 
                        i zajednice koje su postale sigurnije i bolje mesto za život.
                    </p>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-500/20 to-purple-500/20 backdrop-blur-lg rounded-3xl p-12 border border-white/20">
                    <div class="text-center">
                        <div class="text-8xl mb-8">🏘️</div>
                        <h4 class="text-3xl font-bold mb-6">Naša vizija</h4>
                        <p class="text-xl leading-relaxed opacity-90 mb-8">
                            "Da svaki komšiluk bude mesto gde se komšije poznaju, 
                            pomažu jedni drugima i grade zajedno bolju budućnost."
                        </p>
                        <div class="bg-white/10 rounded-2xl p-6">
                            <div class="text-4xl font-bold text-yellow-300 mb-2">10,000+</div>
                            <div class="text-lg opacity-90">Komšija koji veruju u našu viziju</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section id="mission" class="py-32 bg-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-20 w-64 h-64 bg-blue-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-48 h-48 bg-purple-400 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-8 py-4 rounded-full bg-gradient-to-r from-blue-100 to-purple-100 text-blue-800 text-lg font-semibold mb-12 shadow-2xl">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
                Naša misija
            </div>
            <h2 class="text-6xl md:text-8xl font-bold text-gray-900 mb-12 leading-tight">
                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Povezujemo</span><br>
                <span class="text-gray-900">komšije</span>
            </h2>
            <p class="text-2xl md:text-3xl text-gray-600 max-w-5xl mx-auto leading-relaxed">
                Naša misija je da gradimo jaču zajednicu kroz povezivanje komšija, 
                podršku lokalnih biznisa i stvaranje sigurnije okoline za sve
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Mission 1 -->
            <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-10 border border-blue-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">🤝</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Povezivanje</h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    Povezujemo komšije kroz deljenje vesti, dešavanja i lokalnih informacija. 
                    Omogućavamo im da se upoznaju i grade veze.
                </p>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        <span class="text-gray-600">Deljenje vesti iz komšiluka</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        <span class="text-gray-600">Organizovanje lokalnih događaja</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        <span class="text-gray-600">Međusobna pomoć i podrška</span>
                    </div>
                </div>
            </div>

            <!-- Mission 2 -->
            <div class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-10 border border-green-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">🏪</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Podrška biznisa</h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    Podržavamo lokalne biznise i omogućavamo im da se povežu sa komšijama. 
                    Gradimo jaču lokalnu ekonomiju.
                </p>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <span class="text-gray-600">Registracija lokalnih biznisa</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <span class="text-gray-600">Ekskluzivne ponude za komšije</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <span class="text-gray-600">Direktan kontakt sa kupcima</span>
                    </div>
                </div>
            </div>

            <!-- Mission 3 -->
            <div class="group bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-10 border border-purple-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">🛡️</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Sigurnost</h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    Gradimo sigurniju i bolju zajednicu kroz međusobnu podršku. 
                    Stvaramo okolinu gde se svi osećaju bezbedno.
                </p>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        <span class="text-gray-600">Međusobna briga i pomoć</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        <span class="text-gray-600">Deljenje sigurnosnih informacija</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        <span class="text-gray-600">Gradnja poverenja u zajednici</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Kako <span class="text-blue-600">funkcioniše</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Jednostavno i intuitivno - sve što trebate da znate o korišćenju Moj Kraj platforme
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl font-bold text-blue-600">1</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Registrujte se</h3>
                <p class="text-gray-600 mb-4">Kreirajte nalog i unesite svoju adresu i deo grada gde živite.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Osnovni podaci o sebi</li>
                    <li>• Lokacija (adresa i deo grada)</li>
                    <li>• Tip naloga (običan korisnik ili biznis)</li>
                </ul>
            </div>
            
            <!-- Step 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl font-bold text-green-600">2</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Povezujte se</h3>
                <p class="text-gray-600 mb-4">Otkrijte komšije iz vašeg dela grada i povežite se sa njima.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Pregledajte vesti iz vašeg komšiluka</li>
                    <li>• Otkrijte lokalne biznise</li>
                    <li>• Delite svoje dešavanja</li>
                </ul>
            </div>
            
            <!-- Step 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl font-bold text-purple-600">3</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Delite i učestvujte</h3>
                <p class="text-gray-600 mb-4">Aktivno učestvujte u životu zajednice i delite korisne informacije.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Objavljujte vesti i dešavanja</li>
                    <li>• Pomažite komšijama</li>
                    <li>• Gradite jaču zajednicu</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Naše <span class="text-blue-600">funkcionalnosti</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Sve što vam treba za povezivanje sa komšijama i građenje jače zajednice
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-blue-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-3m-2 4H9m12 0h-3m-7 4h.01M7 16h.01" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Lokalne vesti</h3>
                <p class="text-gray-600">Delite i čitajte vesti iz vašeg komšiluka. Budite u toku sa svim dešavanjima u okolini.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-green-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Lokalni biznisi</h3>
                <p class="text-gray-600">Otkrijte i podržite lokalne biznise. Pronađite najbolje usluge u vašoj blizini.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-purple-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Specijalne ponude</h3>
                <p class="text-gray-600">Koristite ekskluzivne ponude i popuste koje lokalni biznisi nude komšijama.</p>
            </div>
            
            <!-- Feature 4 -->
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-orange-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Kućni ljubimci</h3>
                <p class="text-gray-600">Povezujte se sa komšijama kroz ljubav prema životinjama. Delite usluge i brigu.</p>
            </div>
            
            <!-- Feature 5 -->
            <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Dešavanja</h3>
                <p class="text-gray-600">Organizujte i učestvujte u lokalnim događajima. Gradite jaču zajednicu.</p>
            </div>
            
            <!-- Feature 6 -->
            <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-indigo-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Zajednica</h3>
                <p class="text-gray-600">Gradite snažne veze sa komšijama i stvarajte sigurniju okolinu za sve.</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-6">Moj Kraj u brojkama</h2>
            <p class="text-xl opacity-90 max-w-3xl mx-auto">
                Brojke koje pokazuju koliko je naša platforma uspešna u povezivanju komšija
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-300 mb-2">10,000+</div>
                <div class="text-xl font-semibold mb-2">Aktivnih korisnika</div>
                <div class="text-blue-200">Komšija koji koriste platformu</div>
            </div>
            
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-300 mb-2">500+</div>
                <div class="text-xl font-semibold mb-2">Lokalnih biznisa</div>
                <div class="text-blue-200">Registrovanih na platformi</div>
            </div>
            
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-300 mb-2">2,000+</div>
                <div class="text-xl font-semibold mb-2">Objavljenih vesti</div>
                <div class="text-blue-200">Lokalnih dešavanja i vesti</div>
            </div>
            
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-300 mb-2">50+</div>
                <div class="text-xl font-semibold mb-2">Gradova</div>
                <div class="text-blue-200">Gde je platforma aktivna</div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-32 bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-64 h-64 bg-indigo-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-48 h-48 bg-purple-400 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-pink-400 rounded-full blur-2xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-8 py-4 rounded-full bg-white/10 backdrop-blur-md text-white text-lg font-semibold mb-12 shadow-2xl border border-white/20">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
                Naše vrednosti
            </div>
            <h2 class="text-6xl md:text-8xl font-bold mb-12 leading-tight">
                <span class="bg-gradient-to-r from-yellow-300 via-orange-300 to-pink-300 bg-clip-text text-transparent">Vrednosti</span><br>
                <span class="text-white">koje nas vode</span>
            </h2>
            <p class="text-2xl md:text-3xl max-w-5xl mx-auto leading-relaxed opacity-90">
                Naše vrednosti su temelj svega što radimo. One nas vode u gradnji jače zajednice
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <!-- Value 1 -->
                <div class="bg-white/5 backdrop-blur-lg rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mr-6">
                            <span class="text-2xl">🤝</span>
                        </div>
                        <h3 class="text-2xl font-bold">Solidarnost</h3>
                    </div>
                    <p class="text-lg leading-relaxed opacity-90">
                        Verujemo da su komšije tu jedni za druge. Gradimo zajednicu gde se svi pomažu 
                        i podržavaju u teškim trenucima.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="bg-white/5 backdrop-blur-lg rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl flex items-center justify-center mr-6">
                            <span class="text-2xl">🌱</span>
                        </div>
                        <h3 class="text-2xl font-bold">Održivost</h3>
                    </div>
                    <p class="text-lg leading-relaxed opacity-90">
                        Podržavamo lokalne biznise i gradimo održivu ekonomiju. Svaki dinar ostaje u zajednici 
                        i pomaže njenom razvoju.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="bg-white/5 backdrop-blur-lg rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mr-6">
                            <span class="text-2xl">🔒</span>
                        </div>
                        <h3 class="text-2xl font-bold">Poverenje</h3>
                    </div>
                    <p class="text-lg leading-relaxed opacity-90">
                        Gradimo poverenje kroz transparentnost i poštenje. Svaki komšija može da se osloni 
                        na nas i na zajednicu.
                    </p>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-indigo-500/20 to-purple-500/20 backdrop-blur-lg rounded-3xl p-12 border border-white/20">
                    <div class="text-center">
                        <div class="text-8xl mb-8">💝</div>
                        <h4 class="text-3xl font-bold mb-6">Naš tim</h4>
                        <p class="text-xl leading-relaxed opacity-90 mb-8">
                            Strastveni ljudi koji veruju u moć zajednice i rade na tome 
                            da vaš komšiluk bude najbolje mesto za život.
                        </p>
                        <div class="space-y-4">
                            <div class="bg-white/10 rounded-2xl p-4">
                                <div class="text-2xl font-bold text-yellow-300 mb-1">Moj Kraj Tim</div>
                                <div class="text-sm opacity-90">Osnivači i razvijači platforme</div>
                            </div>
                            <div class="bg-white/10 rounded-2xl p-4">
                                <div class="text-2xl font-bold text-green-300 mb-1">Komšijska Zajednica</div>
                                <div class="text-sm opacity-90">Moderatori i aktivni komšije</div>
                            </div>
                            <div class="bg-white/10 rounded-2xl p-4">
                                <div class="text-2xl font-bold text-pink-300 mb-1">Vi - Komšije</div>
                                <div class="text-sm opacity-90">Najvažniji deo našeg tima</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Future Vision Section -->
<section class="py-32 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-20 w-64 h-64 bg-blue-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-48 h-48 bg-purple-400 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-8 py-4 rounded-full bg-gradient-to-r from-blue-100 to-purple-100 text-blue-800 text-lg font-semibold mb-12 shadow-2xl">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                </svg>
                Budućnost
            </div>
            <h2 class="text-6xl md:text-8xl font-bold text-gray-900 mb-12 leading-tight">
                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Gradimo</span><br>
                <span class="text-gray-900">budućnost zajedno</span>
            </h2>
            <p class="text-2xl md:text-3xl text-gray-600 max-w-5xl mx-auto leading-relaxed">
                Naša vizija je da svaki komšiluk u Srbiji bude povezan, siguran i prosperitetan
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Future Goal 1 -->
            <div class="group bg-white rounded-3xl p-10 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-blue-100">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">🌍</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Nacionalna mreža</h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    Povezujemo sve komšiluke u Srbiji u jednu veliku mrežu zajednica. 
                    Gradimo mostove između različitih delova zemlje.
                </p>
                <div class="bg-blue-50 rounded-2xl p-6">
                    <div class="text-2xl font-bold text-blue-600 mb-2">100+</div>
                    <div class="text-sm text-gray-600">Gradova do 2025.</div>
                </div>
            </div>

            <!-- Future Goal 2 -->
            <div class="group bg-white rounded-3xl p-10 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-green-100">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">🚀</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Tehnološki napredak</h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    Uvodiмо najnovije tehnologije za bolje povezivanje komšija. 
                    AI, geolokacija i pametne notifikacije.
                </p>
                <div class="bg-green-50 rounded-2xl p-6">
                    <div class="text-2xl font-bold text-green-600 mb-2">AI</div>
                    <div class="text-sm text-gray-600">Pametne preporuke</div>
                </div>
            </div>

            <!-- Future Goal 3 -->
            <div class="group bg-white rounded-3xl p-10 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-purple-100">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">💝</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Dublje veze</h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    Gradimo dublje veze između komšija. Organizujemo događaje, 
                    volontiranje i zajedničke aktivnosti.
                </p>
                <div class="bg-purple-50 rounded-2xl p-6">
                    <div class="text-2xl font-bold text-purple-600 mb-2">1000+</div>
                    <div class="text-sm text-gray-600">Događaja godišnje</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-6">Pridružite se <span class="text-blue-600">Moj Kraj</span> zajednici!</h2>
        <p class="text-xl text-gray-600 mb-10">
            Bilo da želite da delite vesti, pronađete lokalne biznise ili se povežete sa komšijama, 
            Moj Kraj je pravo mesto za vas.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-blue-700 transition-colors duration-300 shadow-lg">
                Registrujte se besplatno
            </a>
            <a href="{{ route('login') }}" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-50 transition-colors duration-300 border-2 border-blue-600">
                Prijavite se
            </a>
        </div>
    </div>
</section>
@endsection

