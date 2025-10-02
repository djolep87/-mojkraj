@extends('layouts.app')

@section('title', 'Za Biznis Korisnike - Moj Kraj')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-green-500 via-emerald-600 to-teal-700 text-white py-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
        <div class="absolute bottom-10 right-10 w-24 h-24 bg-white rounded-full"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
            Dobrodošli u <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Moj Kraj</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Povezujte se sa svojim komšijama i rastite zajedno sa lokalnom zajednicom
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('business.register') }}" class="bg-white text-green-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Registrujte svoj biznis
            </a>
            <a href="{{ route('business.login') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-green-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Prijavite se
            </a>
        </div>
    </div>
</section>

<!-- Why Moj Kraj Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Zašto <span class="text-green-600">Moj Kraj</span>?
                </h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Lokalna zajednica</h3>
                            <p class="text-gray-600">Povezujte se direktno sa svojim komšijama i gradite dugotrajne odnose sa lokalnim kupcima.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Rast sa zajednicom</h3>
                            <p class="text-gray-600">Vaš biznis raste zajedno sa lokalnom zajednicom - što je zajednica jača, to je i vaš uspeh veći.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Besplatna reklama</h3>
                            <p class="text-gray-600">Reklamirajte se besplatno u svojoj lokalnoj zajednici bez skupe marketinške kampanje.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-green-100 to-emerald-100 rounded-2xl p-8 shadow-xl">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                         alt="Lokalni biznis" 
                         class="w-full h-80 object-cover rounded-xl shadow-lg">
                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg">
                        <div class="text-2xl font-bold text-green-600">100%</div>
                        <div class="text-sm text-gray-600">Lokalno</div>
                    </div>
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
@endsection
