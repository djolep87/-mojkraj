@extends('layouts.app')

@section('title', 'Moj Kraj - Povezujemo vaš komšiluk')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen overflow-hidden flex items-center" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('css/images/street-and-houses-of-upscale-neighborhood-on-a-sum-NZAX52H.jpg') }}'), linear-gradient(135deg, #667eea 0%, #764ba2 100%); background-size: cover; background-position: center;">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.1"><circle cx="30" cy="30" r="2"/></g></svg></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white bg-opacity-20 backdrop-blur-sm text-white text-sm font-medium mb-8">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Lokalna zajednica u vašem džepu
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight drop-shadow-2xl">
                    Povezujemo <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent drop-shadow-lg">vaš komšiluk</span>
                </h1>
                <p class="text-xl md:text-2xl text-white mb-10 max-w-4xl mx-auto leading-relaxed drop-shadow-lg font-medium">
                    Delite dešavanja, vesti i priče iz svoje okoline. Otkrijte lokalne biznise i povežite se sa komšijama.
                    Vaš digitalni komšiluk čeka vas!
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="{{ route('register') }}" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-10 py-4 rounded-full text-lg font-bold hover:from-yellow-500 hover:to-orange-600 transition-all duration-300  shadow-2xl drop-shadow-lg">
                        <span class="flex items-center">
                            Počni da deliš
                            <svg class="w-5 h-5 ml-2 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                    </a>
                    <a href="{{ route('login') }}" class="group bg-white bg-opacity-30 backdrop-blur-sm text-white px-10 py-4 rounded-full text-lg font-semibold hover:bg-opacity-40 transition-all duration-300 border-2 border-white border-opacity-50 shadow-xl">
                        <span class="flex items-center">
                            Istraži komšiluk
                            <svg class="w-5 h-5 ml-2 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        

       
    </section>

    <!-- Categories Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Šta možete da <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">delite</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Povezujte se sa komšijama kroz različite vrste sadržaja
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Dešavanja -->
                <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 ">Dešavanja</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Organizujte i promovišite lokalne događaje, žurke, sportski turniri i druge aktivnosti u vašem komšiluku.
                    </p>
                    <button class="text-green-600 font-semibold hover:text-green-700 flex items-center ">
                        Deli dešavanje 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>

                <!-- Vesti -->
                <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl flex items-center justify-center mb-6 ">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors">Vesti</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Informišite komšije o važnim dešavanjima, promenama u komšiluku i drugim relevantnim vestima.
                    </p>
                    <button class="text-blue-600 font-semibold hover:text-blue-700 flex items-center ">
                        Deli vest 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>

                <!-- Priče -->
                <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mb-6 ">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-purple-600 transition-colors">Priče</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Podelite zanimljive priče iz komšiluka, uspomene i iskustva koja povezuju zajednicu.
                    </p>
                    <button class="text-purple-600 font-semibold hover:text-purple-700 flex items-center ">
                        Deli priču 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Local Businesses Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Lokalni biznisi
                </h2>
                <p class="text-xl text-gray-600">
                    Otkrijte komšije koji nude usluge u vašem komšiluku
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Sample Business 1 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Restoran "Kod Mile"</h3>
                        <p class="text-gray-600 mb-4">Tradicionalna srpska kuhinja sa modernim pristupom</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Hrana i piće</span>
                            <span class="text-sm text-blue-600">★ 4.8</span>
                        </div>
                    </div>
                </div>

                <!-- Sample Business 2 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Prodavnica "Mega"</h3>
                        <p class="text-gray-600 mb-4">Sve što vam treba na jednom mestu</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Trgovina</span>
                            <span class="text-sm text-blue-600">★ 4.5</span>
                        </div>
                    </div>
                </div>

                <!-- Sample Business 3 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Servis "Elektro"</h3>
                        <p class="text-gray-600 mb-4">Popravka i održavanje kućnih aparata</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Usluge</span>
                            <span class="text-sm text-blue-600">★ 4.9</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                @if($isRegularUser || $isBusinessUser)
                    <a href="{{ route('businesses.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors inline-block">
                        Pregledaj sve biznise
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors inline-block">
                        Prijavi se da vidiš biznise
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- Community Stats Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Naša zajednica raste
                </h2>
                <p class="text-xl text-gray-600">
                    Brojke koje pokazuju snagu lokalne zajednice
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2">1,234</div>
                    <div class="text-gray-600">Aktivnih korisnika</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-600 mb-2">567</div>
                    <div class="text-gray-600">Objavljenih vesti</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-purple-600 mb-2">89</div>
                    <div class="text-gray-600">Lokalnih biznisa</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-orange-600 mb-2">45</div>
                    <div class="text-gray-600">Dešavanja</div>
                </div>
            </div>
        </div>
    </section>
@endsection