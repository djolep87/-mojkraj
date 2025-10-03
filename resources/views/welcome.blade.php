@extends('layouts.app')

@section('title', 'Moj Kraj - Povezujemo vaš komšiluk')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen overflow-hidden flex items-center" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.5)), url('{{ asset('css/images/street-and-houses-of-upscale-neighborhood-on-a-sum-NZAX52H.jpg') }}'); background-size: cover; background-position: center;">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/30 via-black/40 to-black/50"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.05"><circle cx="30" cy="30" r="2"/></g></svg></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <!-- Additional overlay for better text contrast -->
            <div class="absolute inset-0 bg-black/20 rounded-3xl mx-4"></div>
            
            <div class="relative text-center">
                <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/30 backdrop-blur-md text-white text-sm font-semibold mb-8 shadow-xl border border-white/20">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Lokalna zajednica u vašem džepu
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight" style="text-shadow: 0 4px 8px rgba(0,0,0,0.8), 0 2px 4px rgba(0,0,0,0.6);">
                    Povezujemo <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent" style="text-shadow: 0 4px 8px rgba(0,0,0,0.8), 0 2px 4px rgba(0,0,0,0.6);">vaš komšiluk</span>
                </h1>
                <p class="text-xl md:text-2xl text-white mb-10 max-w-4xl mx-auto leading-relaxed font-medium px-4" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8), 0 1px 2px rgba(0,0,0,0.6);">
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
                    <a href="{{ route('login') }}" class="group bg-white/20 backdrop-blur-md text-white px-10 py-4 rounded-full text-lg font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">
                        <span class="flex items-center">
                            Istraži komšiluk
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        

       
    </section>

    <!-- Login Required Section -->
    @if(!auth()->check())
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-12 shadow-lg border border-blue-100">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Prijavite se da vidite sadržaj
                </h2>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Da biste videli vesti, postove o biznisima i kućnim ljubimcima iz vašeg komšiluka, 
                    potrebno je da se prijavite. Tako možemo da vam prikažemo sadržaj relevantan za vašu lokaciju.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Prijavite se
                    </a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-green-500 to-teal-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Registrujte se
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Latest News Section -->
    @if(auth()->check() && $latestNews->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Najnovije <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">vesti</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Pogledajte šta se dešava u vašem komšiluku
                </p>
                @if(auth()->check())
                    <p class="text-sm text-blue-600 mt-2">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Prikazane su vesti iz vašeg dela grada ({{ auth()->user()->neighborhood }}, {{ auth()->user()->city }})
                    </p>
                @endif
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($latestNews as $news)
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                        <a href="{{ route('news.show', $news) }}" class="block">
                            @if($news->images && count($news->images) > 0)
                                <img src="{{ Storage::url($news->images[0]) }}" alt="{{ $news->title }}" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center hover:scale-105 transition-transform duration-300">
                                    <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            @endif
                        </a>
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ ucfirst($news->category) }}
                                </span>
                                <span class="text-sm text-gray-500">{{ $news->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <a href="{{ route('news.show', $news) }}" class="block group">
                                <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-200">
                                    {{ $news->title }}
                                </h3>
                            </a>
                            
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ Str::limit($news->content, 120) }}
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                        {{ substr($news->user->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm text-gray-500">{{ $news->user->name }}</span>
                                </div>
                                <span class="text-sm text-gray-500">{{ $news->user->neighborhood }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            
            <div class="text-center">
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('news.index') }}" class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                        Vidi ostale vesti
                    </a>
                    @if(auth()->check())
                        <a href="{{ route('news.create') }}" class="bg-gradient-to-r from-green-500 to-teal-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Dodaj novu vest
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-green-500 to-teal-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Prijavite se za dodavanje
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

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