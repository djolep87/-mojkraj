@extends('layouts.app')

@section('title', 'Ponude - Moj Kraj')

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
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #ec4899 100%);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-yellow-300/20 rounded-full animate-bounce"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-pink-300/20 rounded-full animate-ping"></div>
        <div class="absolute top-1/3 right-1/3 w-20 h-20 bg-orange-300/20 rounded-full animate-pulse"></div>
    </div>
    
    <!-- Floating Offer Icons -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-6xl opacity-20 animate-float">🎯</div>
        <div class="absolute top-1/3 right-1/4 text-5xl opacity-20 animate-float-delayed">💰</div>
        <div class="absolute bottom-1/3 left-1/3 text-4xl opacity-20 animate-float-slow">🏷️</div>
        <div class="absolute bottom-1/4 right-1/3 text-5xl opacity-20 animate-float">🎁</div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/20 backdrop-blur-md text-white text-sm font-semibold mb-8 shadow-xl border border-white/30">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
            </svg>
            Ekskluzivne ponude za komšije
        </div>
        
        <h1 class="text-6xl md:text-8xl font-bold mb-8 leading-tight" style="text-shadow: 0 4px 8px rgba(0,0,0,0.3);">
            <span class="bg-gradient-to-r from-yellow-300 via-orange-300 to-pink-300 bg-clip-text text-transparent">Ponude</span><br>
            <span class="text-white">iz vašeg komšiluka</span>
        </h1>
        
        <p class="text-2xl md:text-3xl mb-12 max-w-5xl mx-auto leading-relaxed font-light" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            Otkrijte ekskluzivne ponude, popuste i specijalne usluge od lokalnih biznisa u vašem komšiluku. 
            Uštedite novac i podržite komšije kroz posebne cene i usluge.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16">
            <a href="{{ route('offers.index') }}" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-12 py-5 rounded-full text-xl font-bold hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 shadow-2xl hover:shadow-yellow-500/25 hover:scale-105">
                <span class="flex items-center">
                    Pogledaj sve ponude
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </a>
            @if($isBusinessUser)
                <a href="{{ route('offers.create') }}" class="group bg-white/20 backdrop-blur-md text-white px-12 py-5 rounded-full text-xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105">
                    <span class="flex items-center">
                        Kreiraj ponudu
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </span>
                </a>
            @elseif($isRegularUser)
                <a href="{{ route('business.register') }}" class="group bg-white/20 backdrop-blur-md text-white px-12 py-5 rounded-full text-xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105">
                    <span class="flex items-center">
                        Registruj biznis
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </span>
                </a>
            @else
                <a href="{{ route('business.register') }}" class="group bg-white/20 backdrop-blur-md text-white px-12 py-5 rounded-full text-xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105">
                    <span class="flex items-center">
                        Registruj biznis
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </span>
                </a>
            @endif
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">2,500+</div>
                <div class="text-white/80">Aktivnih ponuda</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">15,000+</div>
                <div class="text-white/80">Zadovoljnih kupaca</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">85%</div>
                <div class="text-white/80">Ušteda novca</div>
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
<section id="features" class="py-24 bg-gradient-to-br from-slate-50 via-purple-50 to-pink-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                </svg>
                Kompletna platforma za ponude
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                Sve što vam treba za <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-red-600 bg-clip-text text-transparent">uštedu</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Otkrijte ekskluzivne ponude, uštedite novac, podržite lokalne biznise i gradite jaču zajednicu 
                kroz posebne cene i usluge namenjene komšijama.
            </p>
        </div>

        <!-- Main Features Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <!-- Exclusive Offers -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-3xl p-10 shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Ekskluzivne ponude</h3>
                            <p class="text-purple-600 font-semibold">Specijalne cene za komšije</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Dobijte pristup ekskluzivnim ponudama koje lokalni biznisi nude samo komšijama iz svoje okoline. 
                        Uštedite novac kroz posebne cene i usluge koje nisu dostupne široj javnosti.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-2 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">Ekskluzivne cene</span>
                        <span class="px-4 py-2 bg-pink-100 text-pink-800 rounded-full text-sm font-medium">Lokalna prednost</span>
                        <span class="px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-medium">Ograničeno vreme</span>
                    </div>
                    <div class="flex items-center text-purple-600 font-semibold group-hover:text-purple-700">
                        <span>Otkrij ponude</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Community Support -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-teal-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-3xl p-10 shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Podrška zajednici</h3>
                            <p class="text-green-600 font-semibold">Rast kroz saradnju</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Podržite lokalne biznise i gradite jaču zajednicu kroz kupovinu po posebnim cenama. 
                        Svaki dinar potrošen u lokalnom biznisu ostaje u zajednici i pomaže njenom razvoju.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium">Lokalna ekonomija</span>
                        <span class="px-4 py-2 bg-teal-100 text-teal-800 rounded-full text-sm font-medium">Zajednički rast</span>
                        <span class="px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium">Održivi razvoj</span>
                    </div>
                    <div class="flex items-center text-green-600 font-semibold group-hover:text-green-700">
                        <span>Podrži zajednicu</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Features Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Time-Limited Offers -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Ograničeno vreme</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Ponude dostupne u određenom vremenskom periodu</p>
            </div>

            <!-- Money Saving -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Ušteda novca</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Ekskluzivne cene i popusti za komšije</p>
            </div>

            <!-- Local Focus -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Lokalni fokus</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Ponude relevantne za vašu lokaciju</p>
            </div>

            <!-- Easy Discovery -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Lako pronalaženje</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Filtriranje i pretraga ponuda po kategorijama</p>
            </div>
        </div>
    </div>
</section>

<!-- Offers Tips & Best Practices Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                Saveti za uspešne ponude
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                Kako da <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-red-600 bg-clip-text text-transparent">kreirate privlačne</span> ponude
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Stručni saveti, najbolje prakse i korisni tipovi koji će vam pomoći da kreirate ponude koje privlače komšije
            </p>
        </div>

        <!-- Tips Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
            <!-- Creating Attractive Offers -->
            <div class="group bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 border border-purple-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Kreiranje privlačnih ponuda</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite jasne i privlačne naslove</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Dodajte atraktivne slike proizvoda</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Istaknite uštedu u dinarima i procentima</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite emotivne reči ("ekskluzivno", "ograničeno")</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Ponude sa slikama imaju 3x više klikova!</p>
                </div>
            </div>

            <!-- Timing and Duration -->
            <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Timing i trajanje</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Postavite jasne datume početka i kraja</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite "flash sale" za hitnost</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Planirajte ponude za vikend i praznike</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite countdown timere za hitnost</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Ponude od 3-7 dana imaju najbolje rezultate!</p>
                </div>
            </div>

            <!-- Target Audience -->
            <div class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Ciljna grupa</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Poznajte svoje komšije i njihove potrebe</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Kreirajte ponude za različite demografske grupe</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite personalizovane poruke</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Testirajte različite tipove ponuda</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Personalizovane ponude imaju 5x više konverzija!</p>
                </div>
            </div>
        </div>

        <!-- Offer Categories Guide -->
        <div class="bg-gradient-to-r from-purple-500 to-pink-600 rounded-3xl p-12 text-white mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-4xl font-bold mb-6">Tipovi ponuda</h3>
                    <p class="text-xl mb-8 opacity-90">
                        Kreirajte različite tipove ponuda za različite potrebe komšija
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Popusti i akcije</h4>
                                <p class="text-white/80">Procentualni i fiksni popusti na proizvode</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Dnevne/nedeljne ponude</h4>
                                <p class="text-white/80">Specijalne cene za određeno vreme</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Usluge i paketi</h4>
                                <p class="text-white/80">Kombinovane usluge sa popustom</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-8xl mb-4">🎁</div>
                    <h4 class="text-2xl font-bold mb-4">Svaka ponuda je dobrodošla</h4>
                    <p class="text-lg opacity-90">Kreirajte ponude koje će komšije obožavati!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Types of Offers Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Kakve <span class="text-purple-600">ponude</span> možete kreirati?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kao biznis korisnik, možete kreirati različite tipove ponuda za svoje komšije
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Offer Type 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Popusti i akcije</h3>
                <p class="text-gray-600 mb-4">Ponudite komšijama popuste na vaše proizvode ili usluge.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• 20% popust za komšije</li>
                    <li>• 2+1 gratis akcije</li>
                    <li>• Sezonski popusti</li>
                    <li>• Loyalty programi</li>
                </ul>
            </div>
            
            <!-- Offer Type 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Dnevne ponude</h3>
                <p class="text-gray-600 mb-4">Specijalne ponude dostupne samo tokom određenog dana.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Happy hour cene</li>
                    <li>• Dnevni meni</li>
                    <li>• Flash sale akcije</li>
                    <li>• Brze ponude</li>
                </ul>
            </div>
            
            <!-- Offer Type 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Nedeljne ponude</h3>
                <p class="text-gray-600 mb-4">Ponude koje traju tokom cele nedelje.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Nedeljni meni</li>
                    <li>• Weekend paketi</li>
                    <li>• Sedmične akcije</li>
                    <li>• Nedeljni popusti</li>
                </ul>
            </div>
            
            <!-- Offer Type 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Mesečne ponude</h3>
                <p class="text-gray-600 mb-4">Dugotrajne ponude koje traju tokom meseca.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Mesečni paketi</li>
                    <li>• Pretplata sa popustom</li>
                    <li>• Mesečne akcije</li>
                    <li>• Dugoročni popusti</li>
                </ul>
            </div>
            
            <!-- Offer Type 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Usluge</h3>
                <p class="text-gray-600 mb-4">Specijalne usluge koje nudite komšijama.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Besplatna dostava</li>
                    <li>• Ekskluzivne usluge</li>
                    <li>• Personalizovane usluge</li>
                    <li>• VIP tretman</li>
                </ul>
            </div>
            
            <!-- Offer Type 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Paketi i kombinacije</h3>
                <p class="text-gray-600 mb-4">Kombinovane ponude sa više proizvoda ili usluga.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Family paketi</li>
                    <li>• Kombinovane usluge</li>
                    <li>• Bundle ponude</li>
                    <li>• Kompletna rešenja</li>
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
                    <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm5 3a1 1 0 100 2h3a1 1 0 100-2h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                </svg>
                Uspešne priče iz komšiluka
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-red-600 bg-clip-text text-transparent">Ponude</span> povezuju komšiluke
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Upoznajte komšije koji su kroz ponude uštedeli novac, podržali lokalne biznise i gradili jaču zajednicu
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
                        <h4 class="text-lg font-bold text-gray-900">Milica Nikolić</h4>
                        <p class="text-gray-600 text-sm">Komšija iz Vračara</p>
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
                    "Kroz ponude sam uštedela preko 15,000 dinara u poslednja 3 meseca! 
                    Najbolje je što podržavam komšije i dobijam kvalitetne proizvode po nižim cenama."
                </blockquote>
                <div class="flex items-center text-purple-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Vračar, Beograd
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-pink-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-red-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        A
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Aleksandar Petrović</h4>
                        <p class="text-gray-600 text-sm">Komšija iz Novog Beograda</p>
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
                    "Kroz ponude sam upoznao odlične komšije i njihove biznise. 
                    Sada redovno kupujem od lokalnih prodavaca i uvek imam pristup najboljim cenama!"
                </blockquote>
                <div class="flex items-center text-pink-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Novi Beograd, Beograd
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-red-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        S
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Sofija Jovanović</h4>
                        <p class="text-gray-600 text-sm">Komšija iz Zvezdare</p>
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
                    "Kroz ponude sam pronašla odlične usluge u mom komšiluku koje nisam znala da postoje. 
                    Sada redovno koristim frizerski salon, kafić i prodavnicu u blizini!"
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
                    <div class="text-4xl font-bold mb-2">2,500+</div>
                    <div class="text-purple-200">Aktivnih ponuda</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">15,000+</div>
                    <div class="text-purple-200">Zadovoljnih kupaca</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">85%</div>
                    <div class="text-purple-200">Prosečna ušteda</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">92%</div>
                    <div class="text-purple-200">Zadovoljstvo ponudama</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Offers Matter Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Zašto su <span class="text-purple-600">ponude</span> važne?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Ponude pomažu i biznisima i komšijama da grade bolje odnose i rastu zajedno
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80" 
                     alt="Lokalne ponude" 
                     class="w-full h-96 object-cover rounded-2xl shadow-xl">
            </div>
            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Prednosti za komšije</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Ušteda novca</h4>
                            <p class="text-gray-600">Dobijte pristup ekskluzivnim cenama i popustima koje nisu dostupne drugim kupcima.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Lokalna prednost</h4>
                            <p class="text-gray-600">Kao komšija, imate pristup ponudama koje su namenjene samo lokalnoj zajednici.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Personalizovane usluge</h4>
                            <p class="text-gray-600">Dobijte usluge prilagođene vašim potrebama i preferencijama.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Pouzdanost</h4>
                            <p class="text-gray-600">Kupujte od poznatih komšija koji poznaju vaše potrebe i preferencije.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Business Benefits -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl p-8 text-white">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-3xl font-bold mb-4">Prednosti za biznise</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Povećanje lokalne prepoznatljivosti</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Povratni kupci iz komšiluka</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Besplatna reklama u zajednici</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Direktan kontakt sa kupcima</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-300 rounded-full"></div>
                            <span>Mogućnost testiranja novih proizvoda</span>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-6xl font-bold text-yellow-300 mb-2">+200%</div>
                    <div class="text-xl">Povećanje lokalnih kupaca</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interesting Offers Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Kakve ponude su <span class="text-purple-600">zanimljive</span> komšijama?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Evo nekoliko ideja za ponude koje će privući pažnju vaših komšija
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Interesting Offer 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Komšija" popust</h3>
                <p class="text-gray-600 mb-4">Fiksni popust (npr. 15-20%) za sve komšije koji se identifikuju.</p>
                <div class="bg-red-50 rounded-lg p-4">
                    <p class="text-sm text-red-700 font-medium">Primer: "Pokažite ovu poruku i dobijte 20% popust na sve!"</p>
                </div>
            </div>
            
            <!-- Interesting Offer 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Prvi put" ponuda</h3>
                <p class="text-gray-600 mb-4">Specijalna ponuda za komšije koji prvi put koriste vašu uslugu.</p>
                <div class="bg-green-50 rounded-lg p-4">
                    <p class="text-sm text-green-700 font-medium">Primer: "Prvi put kod nas? 50% popust na prvu uslugu!"</p>
                </div>
            </div>
            
            <!-- Interesting Offer 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Porodični" paket</h3>
                <p class="text-gray-600 mb-4">Posebne cene za porodice iz komšiluka.</p>
                <div class="bg-blue-50 rounded-lg p-4">
                    <p class="text-sm text-blue-700 font-medium">Primer: "Porodični paket - 30% popust za 3+ osobe!"</p>
                </div>
            </div>
            
            <!-- Interesting Offer 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Brza" ponuda</h3>
                <p class="text-gray-600 mb-4">Ograničene ponude dostupne samo kratko vreme.</p>
                <div class="bg-purple-50 rounded-lg p-4">
                    <p class="text-sm text-purple-700 font-medium">Primer: "Samo danas - 40% popust do 18h!"</p>
                </div>
            </div>
            
            <!-- Interesting Offer 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Kombinacija" ponuda</h3>
                <p class="text-gray-600 mb-4">Kombinujte više usluga ili proizvoda sa popustom.</p>
                <div class="bg-yellow-50 rounded-lg p-4">
                    <p class="text-sm text-yellow-700 font-medium">Primer: "Kupite 2, dobijte 3. gratis!"</p>
                </div>
            </div>
            
            <!-- Interesting Offer 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">"Loyalty" program</h3>
                <p class="text-gray-600 mb-4">Nagradite komšije koji redovno koriste vaše usluge.</p>
                <div class="bg-indigo-50 rounded-lg p-4">
                    <p class="text-sm text-indigo-700 font-medium">Primer: "Nakupite 5 usluga, 6. je besplatna!"</p>
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
                Statistike <span class="text-purple-600">ponuda</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Brojke koje pokazuju koliko su ponude efikasne za lokalne biznise
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-purple-600 mb-2">85%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Komšija koristi lokalne ponude</div>
                <div class="text-gray-600">Većina ljudi preferira ponude od lokalnih biznisa</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-purple-600 mb-2">3x</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Više povratnih kupaca</div>
                <div class="text-gray-600">Lokalne ponude privlače tri puta više povratnih kupaca</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-purple-600 mb-2">92%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Zadovoljstvo ponudama</div>
                <div class="text-gray-600">Komšije su veoma zadovoljne lokalnim ponudama</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-purple-600 to-pink-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6">Spremni da kreirate ponude?</h2>
        <p class="text-xl mb-8 opacity-90">
            Pridružite se zajednici i počnite da delite ekskluzivne ponude sa svojim komšijama
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if($isBusinessUser)
                <a href="{{ route('offers.create') }}" class="bg-white text-purple-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Kreiraj svoju ponudu
                </a>
                <a href="{{ route('offers.index') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Pogledaj sve ponude
                </a>
            @else
                <a href="{{ route('business.register') }}" class="bg-white text-purple-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Registruj biznis
                </a>
                <a href="{{ route('offers.index') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Pogledaj sve ponude
                </a>
            @endif
        </div>
    </div>
</section>
@endsection


