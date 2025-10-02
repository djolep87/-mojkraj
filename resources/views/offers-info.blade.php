@extends('layouts.app')

@section('title', 'Ponude - Moj Kraj')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-purple-500 via-pink-600 to-red-600 text-white py-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
        <div class="absolute bottom-10 right-10 w-24 h-24 bg-white rounded-full"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
            <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Ponude</span> iz vašeg komšiluka
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Otkrijte ekskluzivne ponude, popuste i specijalne usluge od lokalnih biznisa u vašem komšiluku
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('offers.index') }}" class="bg-white text-purple-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Pogledaj sve ponude
            </a>
            @if($isBusinessUser)
                <a href="{{ route('business.offers.create') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Kreiraj ponudu
                </a>
            @elseif($isRegularUser)
                <a href="{{ route('business.register') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Registruj biznis
                </a>
            @else
                <a href="{{ route('business.register') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Registruj biznis
                </a>
            @endif
        </div>
    </div>
</section>

<!-- What Are Offers Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Šta su <span class="text-purple-600">ponude</span>?
                </h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Ekskluzivne ponude</h3>
                            <p class="text-gray-600">Specijalne cene i usluge koje lokalni biznisi nude samo komšijama iz svoje okoline.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Ograničeno vreme</h3>
                            <p class="text-gray-600">Ponude su dostupne u određenom vremenskom periodu - dnevne, nedeljne ili mesečne.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Lokalna prednost</h3>
                            <p class="text-gray-600">Kao komšija, dobijate pristup ponudama koje nisu dostupne široj javnosti.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-8 shadow-xl">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                         alt="Lokalne ponude" 
                         class="w-full h-80 object-cover rounded-xl shadow-lg">
                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg">
                        <div class="text-2xl font-bold text-purple-600">-50%</div>
                        <div class="text-sm text-gray-600">Popust</div>
                    </div>
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
                <a href="{{ route('business.offers.create') }}" class="bg-white text-purple-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
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
