@extends('layouts.app')

@section('title', 'Kućni ljubimci - Moj Kraj')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-orange-400 via-red-500 to-pink-600 text-white py-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
        <div class="absolute bottom-10 right-10 w-24 h-24 bg-white rounded-full"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
            <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Kućni ljubimci</span> u komšiluku
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Povezujte se sa komšijama kroz ljubav prema životinjama. Delite usluge, savete i brigu o kućnim ljubimcima
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="bg-white text-orange-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Pridruži se zajednici
            </a>
            <a href="#" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-orange-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Saznaj više
            </a>
        </div>
    </div>
</section>

<!-- What Are Pet Services Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Šta su <span class="text-orange-600">usluge za kućne ljubimce</span>?
                </h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Briga i negovanje</h3>
                            <p class="text-gray-600">Komšije pomažu jedna drugoj u brigu o kućnim ljubimcima kada je potrebno.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Zajedničke usluge</h3>
                            <p class="text-gray-600">Deljenje troškova i resursa za negovanje i lečenje kućnih ljubimaca.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Zajednička aktivnost</h3>
                            <p class="text-gray-600">Organizovanje šetnji, igranja i druženja sa kućnim ljubimcima.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-orange-100 to-pink-100 rounded-2xl p-8 shadow-xl">
                    <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                         alt="Kućni ljubimci" 
                         class="w-full h-80 object-cover rounded-xl shadow-lg">
                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg">
                        <div class="text-2xl font-bold text-orange-600">🐕</div>
                        <div class="text-sm text-gray-600">Ljubimci</div>
                    </div>
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
