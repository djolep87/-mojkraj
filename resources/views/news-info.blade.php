@extends('layouts.app')

@section('title', 'Vesti - Moj Kraj')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-500 via-indigo-600 to-purple-700 text-white py-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
        <div class="absolute bottom-10 right-10 w-24 h-24 bg-white rounded-full"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
            <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Vesti</span> iz vašeg komšiluka
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Budite u toku sa dešavanjima, novostima i pričama iz vašeg komšiluka
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('news.index') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                Pogledaj sve vesti
            </a>
            @if($isRegularUser)
                <a href="{{ route('news.create') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Objavi vest
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Prijavi se da objaviš vest
                </a>
            @endif
        </div>
    </div>
</section>

<!-- Why News Matter Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Zašto su <span class="text-blue-600">vesti</span> bitne?
                </h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Informisanost</h3>
                            <p class="text-gray-600">Budite u toku sa svim dešavanjima u vašem komšiluku - od radova na ulici do novih biznisa.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Zajedništvo</h3>
                            <p class="text-gray-600">Povezujte se sa komšijama kroz zajedničke teme i dešavanja koja vas zanimaju.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Sigurnost</h3>
                            <p class="text-gray-600">Dobijte važne obaveštenja o sigurnosti, radovima i drugim značajnim dešavanjima.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-100 to-indigo-100 rounded-2xl p-8 shadow-xl">
                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                         alt="Lokalne vesti" 
                         class="w-full h-80 object-cover rounded-xl shadow-lg">
                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg">
                        <div class="text-2xl font-bold text-blue-600">24/7</div>
                        <div class="text-sm text-gray-600">Ažurne vesti</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What You Can Share Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Šta možete da <span class="text-blue-600">objavite</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Podelite vesti, dešavanja i priče iz vašeg komšiluka sa ostalim komšijama
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- News Type 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Važne obaveštenja</h3>
                <p class="text-gray-600 mb-4">Podelite važne informacije o radovima, prekidu struje, vodi ili drugim značajnim dešavanjima.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Radovi na infrastrukturi</li>
                    <li>• Prekid komunalnih usluga</li>
                    <li>• Sigurnosna upozorenja</li>
                </ul>
            </div>
            
            <!-- News Type 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Događaji i aktivnosti</h3>
                <p class="text-gray-600 mb-4">Najavite lokalne događaje, okupljanja, sportsku aktivnost ili druge zajedničke aktivnosti.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Lokalni festivali</li>
                    <li>• Sportski turniri</li>
                    <li>• Okupljanja zajednice</li>
                </ul>
            </div>
            
            <!-- News Type 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Pozitivne priče</h3>
                <p class="text-gray-600 mb-4">Podelite pozitivne vesti, uspehe komšija ili lepe trenutke iz komšiluka.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Uspešne priče komšija</li>
                    <li>• Dobra dela u zajednici</li>
                    <li>• Pozitivne promene</li>
                </ul>
            </div>
            
            <!-- News Type 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Nove usluge</h3>
                <p class="text-gray-600 mb-4">Informišite komšije o novim uslugama, prodavnicama ili biznisima u komšiluku.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Novi biznisi</li>
                    <li>• Nove usluge</li>
                    <li>• Promene u radnom vremenu</li>
                </ul>
            </div>
            
            <!-- News Type 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Saveti i preporuke</h3>
                <p class="text-gray-600 mb-4">Podelite korisne savete, preporuke ili iskustva sa komšijama.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Saveti za domaćinstvo</li>
                    <li>• Preporuke majstora</li>
                    <li>• Iskustva sa uslugama</li>
                </ul>
            </div>
            
            <!-- News Type 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-pink-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Slike i video</h3>
                <p class="text-gray-600 mb-4">Podelite slike i video snimke dešavanja, lepih trenutaka ili važnih obaveštenja.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Fotografije događaja</li>
                    <li>• Video snimci</li>
                    <li>• Dokumentovane promene</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- What Community Can Learn Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Šta komšiluk može da <span class="text-blue-600">sazna</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kroz vesti, komšije mogu da saznaju sve što je važno za njihov svakodnevni život
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                     alt="Komšiluk" 
                     class="w-full h-96 object-cover rounded-2xl shadow-xl">
            </div>
            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Informacije koje pomažu</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Planiranje dana</h4>
                            <p class="text-gray-600">Saznajte o radovima, prekidu usluga ili događajima da biste planirali svoj dan.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Sigurnost i bezbednost</h4>
                            <p class="text-gray-600">Budite obavešteni o sigurnosnim situacijama, sumnjivim aktivnostima ili važnim upozorenjima.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Zajedničke aktivnosti</h4>
                            <p class="text-gray-600">Učestvujte u događajima, aktivnostima i inicijativama koje organizuje zajednica.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Korisni saveti</h4>
                            <p class="text-gray-600">Dobijte preporuke za usluge, majstore, prodavnice ili druge korisne informacije.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-blue-600 mb-2">95%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Komšija čita lokalne vesti</div>
                <div class="text-gray-600">Većina ljudi prati dešavanja u svom komšiluku</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-blue-600 mb-2">3x</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Brže informisanje</div>
                <div class="text-gray-600">Lokalne vesti stižu tri puta brže od tradicionalnih medija</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-blue-600 mb-2">87%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Korisnost informacija</div>
                <div class="text-gray-600">Komšije smatraju da su lokalne vesti veoma korisne</div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Poslednje <span class="text-blue-600">vesti</span> iz komšiluka
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pogledajte šta se dešava u vašem komšiluku
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <!-- Sample News 1 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
                        <span>Marija Petrović</span>
                        <span>•</span>
                        <span>2 sata</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Radovi na glavnoj ulici</h3>
                    <p class="text-gray-600 mb-4">Od sutra počinju radovi na asfaltiranju glavne ulice. Očekuje se prekid saobraćaja u toku dana.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-blue-600 font-medium">Varoš</span>
                        <span class="text-sm text-gray-500">Beograd</span>
                    </div>
                </div>
            </div>
            
            <!-- Sample News 2 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
                        <span>Marko Nikolić</span>
                        <span>•</span>
                        <span>5 sati</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Lokalni festival</h3>
                    <p class="text-gray-600 mb-4">Ovaj vikend se održava godišnji festival komšiluka. Pozivamo sve da učestvuju!</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-green-600 font-medium">Centar</span>
                        <span class="text-sm text-gray-500">Novi Sad</span>
                    </div>
                </div>
            </div>
            
            <!-- Sample News 3 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
                        <span>Ana Jovanović</span>
                        <span>•</span>
                        <span>1 dan</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Nova pekara otvorena</h3>
                    <p class="text-gray-600 mb-4">U komšiluku je otvorena nova pekara sa svežim hlebom i domaćim pecivima.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-purple-600 font-medium">Stari grad</span>
                        <span class="text-sm text-gray-500">Niš</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="{{ route('news.index') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                Pogledaj sve vesti
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6">Spremni da podelite vesti?</h2>
        <p class="text-xl mb-8 opacity-90">
            Pridružite se zajednici i budite deo informisanog komšiluka
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if($isRegularUser)
                <a href="{{ route('news.create') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Objavi svoju vest
                </a>
                <a href="{{ route('news.index') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Pogledaj sve vesti
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Prijavi se da objaviš vest
                </a>
                <a href="{{ route('news.index') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Pogledaj sve vesti
                </a>
            @endif
        </div>
    </div>
</section>
@endsection
