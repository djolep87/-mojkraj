@php
    // Check authentication status
    $isRegularUser = auth()->check();
    $isBusinessUser = auth('business')->check();
    $currentUser = auth()->user();
    $currentBusinessUser = auth('business')->user();
@endphp

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Moj Kraj')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-xl shadow-2xl border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-4 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-3xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent group-hover:from-pink-600 group-hover:via-purple-600 group-hover:to-blue-600 transition-all duration-300">
                                Moj Kraj
                            </span>
                            <span class="text-xs text-gray-500 font-medium -mt-1">Povezujemo komšiluke</span>
                        </div>
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        Početna
                    </a>
                    
                    
                    <!-- Posts Dropdown -->
                    <div class="relative group">
                        <button class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200 flex items-center">
                            Postovi
                            <svg class="w-4 h-4 ml-1 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 mt-1 w-72 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                @if(true)
                                    <a href="{{ route('news.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        <div>
                                            <div class="font-medium">Vesti</div>
                                            <div class="text-xs text-gray-500">Pregledaj sve vesti</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('businesses.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <div>
                                            <div class="font-medium">Biznisi</div>
                                            <div class="text-xs text-gray-500">Pregledaj sve biznise</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('pets.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <div>
                                            <div class="font-medium">Kućni ljubimci</div>
                                            <div class="text-xs text-gray-500">Pregledaj sve postove o ljubimcima</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('offers.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                        <div>
                                            <div class="font-medium">Ponude</div>
                                            <div class="text-xs text-gray-500">Pregledaj sve ponude</div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-3m-2 4H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        <div>
                                            <div class="font-medium">Vesti</div>
                                            <div class="text-xs text-gray-500">Prijavite se za pristup vestima</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('login') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <div>
                                            <div class="font-medium">Biznisi</div>
                                            <div class="text-xs text-gray-500">Prijavite se za pristup biznisima</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('login') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <div>
                                            <div class="font-medium">Kućni ljubimci</div>
                                            <div class="text-xs text-gray-500">Prijavite se za pristup postovima o ljubimcima</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('offers.info') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                        <div>
                                            <div class="font-medium">Ponude</div>
                                            <div class="text-xs text-gray-500">Specijalne ponude i popusti</div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Stambene zajednice -->
                    @if(auth()->check())
                    <a href="{{ route('buildings.index') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 font-medium transition-all duration-200 flex items-center whitespace-nowrap">
                        <svg class="w-5 h-5 mr-1.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Zajednice
                    </a>
                    @endif
                    
                    <!-- Info Dropdown -->
                    <div class="relative group">
                        <button class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200 flex items-center">
                            Informacije
                            <svg class="w-4 h-4 ml-1 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 mt-1 w-64 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <a href="{{ route('news.info') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <div class="font-medium">O vestima</div>
                                        <div class="text-xs text-gray-500">Saznajte više o vestima</div>
                                    </div>
                                </a>
                                <a href="{{ route('business.info') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <div class="font-medium">O biznisima</div>
                                        <div class="text-xs text-gray-500">Saznajte više o biznisima</div>
                                    </div>
                                </a>
                                <a href="{{ route('pets.info') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <div class="font-medium">O ljubimcima</div>
                                        <div class="text-xs text-gray-500">Saznajte više o ljubimcima</div>
                                    </div>
                                </a>
                                <a href="{{ route('offers.info') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <div class="font-medium">O ponudama</div>
                                        <div class="text-xs text-gray-500">Saznajte više o ponudama</div>
                                    </div>
                                </a>
                                <a href="{{ route('buildings.info') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <div>
                                        <div class="font-medium">O stambenim zajednicama</div>
                                        <div class="text-xs text-gray-500">Saznajte više o zajednicama</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <div>
                                        <div class="font-medium">Dešavanja</div>
                                        <div class="text-xs text-gray-500">Lokalni događaji i aktivnosti</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('about') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        O nama
                    </a>
                </div>
                
                <!-- User Actions -->
                <div class="flex items-center space-x-2">
                    @if($isRegularUser)
                        <a href="{{ route('notifications.index') }}" class="relative hidden lg:block p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            @if($currentUser->unreadNotifications->count() > 0)
                                <span class="absolute top-0 right-0 block h-5 w-5 rounded-full bg-red-500 text-white text-xs font-bold flex items-center justify-center">
                                    {{ $currentUser->unreadNotifications->count() > 9 ? '9+' : $currentUser->unreadNotifications->count() }}
                                </span>
                            @endif
                        </a>
                        <div class="relative group hidden lg:block">
                            <button class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-50 transition-all duration-200">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-semibold">{{ substr($currentUser->name, 0, 1) }}</span>
                                </div>
                                <span class="text-gray-700 font-medium text-sm">{{ $currentUser->name }}</span>
                                <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="py-2">
                                    <div class="px-4 py-3 border-b border-gray-100">
                                        <p class="text-sm font-semibold text-gray-900">{{ $currentUser->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $currentUser->neighborhood }}, {{ $currentUser->city }}</p>
                                    </div>
                                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="font-medium">Dashboard</span>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                                            <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span class="font-medium">Odjavi se</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @elseif($isBusinessUser)
                        <div class="relative group hidden lg:block">
                            <button class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-50 transition-all duration-200">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-semibold">{{ substr($currentBusinessUser->company_name, 0, 1) }}</span>
                                </div>
                                <span class="text-gray-700 font-medium text-sm">{{ $currentBusinessUser->company_name }}</span>
                                <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="py-2">
                                    <div class="px-4 py-3 border-b border-gray-100">
                                        <p class="text-sm font-semibold text-gray-900">{{ $currentBusinessUser->company_name }}</p>
                                        <p class="text-xs text-gray-500">{{ $currentBusinessUser->city }}</p>
                                    </div>
                                    <a href="{{ route('business.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors duration-200">
                                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="font-medium">Dashboard</span>
                                    </a>
                                    <form method="POST" action="{{ route('business.logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                                            <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span class="font-medium">Odjavi se</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="hidden lg:flex items-center space-x-2">
                            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg font-medium transition-colors duration-200">
                                Prijavi se
                            </a>
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg">
                                Registruj se
                            </a>
                            <a href="{{ route('business.login') }}" class="px-4 py-2 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-lg font-medium hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg">
                                Biznis
                            </a>
                        </div>
                    @endif
                    
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden bg-white border-t border-gray-100 shadow-xl">
            <div class="px-4 py-6 max-h-screen overflow-y-auto">
                <!-- Mobile Navigation Links -->
                <div class="space-y-2">
                    <!-- Main Navigation -->
                    <div class="space-y-1">
                        <a href="{{ route('home') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                            <svg class="w-5 h-5 mr-3 text-blue-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="text-base">Početna</span>
                        </a>
                        
                        <!-- Stambene zajednice -->
                        @if(auth()->check())
                        <a href="{{ route('buildings.index') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 font-medium transition-all duration-200 group">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-indigo-200 transition-colors">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-sm">Stambene zajednice</div>
                                <div class="text-xs text-gray-500">Upravljanje zgradama i stanarima</div>
                            </div>
                        </a>
                        @endif
                        
                        <!-- Posts Section -->
                        <div class="space-y-1">
                            <div class="px-4 py-2 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">Sadržaj</div>
                            @if(true)
                                <a href="{{ route('news.index') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">Vesti</div>
                                        <div class="text-xs text-gray-500">Pregledaj sve vesti</div>
                                    </div>
                                </a>
                                <a href="{{ route('businesses.index') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">Biznisi</div>
                                        <div class="text-xs text-gray-500">Pregledaj sve biznise</div>
                                    </div>
                                </a>
                                <a href="{{ route('pets.index') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-200 transition-colors">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">Kućni ljubimci</div>
                                        <div class="text-xs text-gray-500">Pregledaj sve postove o ljubimcima</div>
                                    </div>
                                </a>
                                <a href="{{ route('offers.index') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">Ponude</div>
                                        <div class="text-xs text-gray-500">Pregledaj sve ponude</div>
                                    </div>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-3m-2 4H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">Vesti</div>
                                        <div class="text-xs text-gray-500">Prijavite se za pristup vestima</div>
                                    </div>
                                </a>
                                <a href="{{ route('login') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">Biznisi</div>
                                        <div class="text-xs text-gray-500">Prijavite se za pristup biznisima</div>
                                    </div>
                                </a>
                                <a href="{{ route('login') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-200 transition-colors">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">Kućni ljubimci</div>
                                        <div class="text-xs text-gray-500">Prijavite se za pristup postovima o ljubimcima</div>
                                    </div>
                                </a>
                                <a href="{{ route('offers.info') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">Ponude</div>
                                        <div class="text-xs text-gray-500">Specijalne ponude i popusti</div>
                                    </div>
                                </a>
                            @endif
                        </div>
                        
                        <!-- Information Section -->
                        <div class="space-y-1">
                            <div class="px-4 py-2 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">Informacije</div>
                            <a href="{{ route('news.info') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 group">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-sm">O vestima</div>
                                    <div class="text-xs text-gray-500">Saznajte više o vestima</div>
                                </div>
                            </a>
                            <a href="{{ route('business.info') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200 group">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-sm">O biznisima</div>
                                    <div class="text-xs text-gray-500">Saznajte više o biznisima</div>
                                </div>
                            </a>
                            <a href="{{ route('pets.info') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition-all duration-200 group">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-200 transition-colors">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-sm">O ljubimcima</div>
                                    <div class="text-xs text-gray-500">Saznajte više o ljubimcima</div>
                                </div>
                            </a>
                            <a href="{{ route('offers.info') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-all duration-200 group">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-sm">O ponudama</div>
                                    <div class="text-xs text-gray-500">Saznajte više o ponudama</div>
                                </div>
                            </a>
                            <a href="{{ route('buildings.info') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-all duration-200 group">
                                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-indigo-200 transition-colors">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-sm">O stambenim zajednicama</div>
                                    <div class="text-xs text-gray-500">Saznajte više o zajednicama</div>
                                </div>
                            </a>
                            <a href="#" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-all duration-200 group">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-sm">Dešavanja</div>
                                    <div class="text-xs text-gray-500">Lokalni događaji i aktivnosti</div>
                                </div>
                            </a>
                        </div>
                        
                        <a href="{{ route('about') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                            <svg class="w-5 h-5 mr-3 text-blue-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-base">O nama</span>
                        </a>
                    </div>
                </div>
                
                <!-- Mobile User Actions -->
                <div class="border-t border-gray-200 pt-6 mt-6">
                    @if($isRegularUser)
                        <div class="space-y-3">
                            <a href="{{ route('notifications.index') }}" class="flex items-center justify-between px-4 py-3 bg-white border-2 border-blue-200 rounded-xl hover:bg-blue-50 transition-all duration-200">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-800">Notifikacije</span>
                                </div>
                                @if($currentUser->unreadNotifications->count() > 0)
                                    <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">
                                        {{ $currentUser->unreadNotifications->count() > 9 ? '9+' : $currentUser->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </a>
                            <!-- User Dropdown Mobile -->
                            <div class="bg-white border-2 border-gray-200 rounded-xl overflow-hidden">
                                <button id="mobile-user-menu-button" class="w-full flex items-center justify-between px-4 py-4 hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-white text-lg font-bold">{{ substr($currentUser->name, 0, 1) }}</span>
                                        </div>
                                        <div class="text-left">
                                            <p class="text-gray-800 font-semibold text-base">{{ $currentUser->name }}</p>
                                            <p class="text-gray-500 text-sm">{{ $currentUser->neighborhood }}, {{ $currentUser->city }}</p>
                                        </div>
                                    </div>
                                    <svg id="mobile-user-menu-arrow" class="w-5 h-5 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="mobile-user-menu" class="hidden border-t border-gray-200">
                                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="font-medium">Dashboard</span>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                                            <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span class="font-medium">Odjavi se</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @elseif($isBusinessUser)
                        <div class="space-y-3">
                            <!-- Business User Dropdown Mobile -->
                            <div class="bg-white border-2 border-gray-200 rounded-xl overflow-hidden">
                                <button id="mobile-business-menu-button" class="w-full flex items-center justify-between px-4 py-4 hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-white text-lg font-bold">{{ substr($currentBusinessUser->company_name, 0, 1) }}</span>
                                        </div>
                                        <div class="text-left">
                                            <p class="text-gray-800 font-semibold text-base">{{ $currentBusinessUser->company_name }}</p>
                                            <p class="text-gray-500 text-sm">{{ $currentBusinessUser->city }}</p>
                                        </div>
                                    </div>
                                    <svg id="mobile-business-menu-arrow" class="w-5 h-5 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="mobile-business-menu" class="hidden border-t border-gray-200">
                                    <a href="{{ route('business.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors duration-200">
                                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="font-medium">Dashboard</span>
                                    </a>
                                    <form method="POST" action="{{ route('business.logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                                            <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span class="font-medium">Odjavi se</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="space-y-3">
                            <div class="text-center py-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Dobrodošli u Moj Kraj</h3>
                                <p class="text-sm text-gray-600">Povezujemo vaš komšiluk</p>
                            </div>
                            <div class="space-y-3">
                                <a href="{{ route('login') }}" class="w-full px-4 py-3 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-xl font-semibold text-center transition-all duration-200 border border-gray-200 hover:border-blue-200">
                                    Prijavi se
                                </a>
                                <a href="{{ route('register') }}" class="w-full px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold text-center hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                    Registruj se
                                </a>
                                <a href="{{ route('business.login') }}" class="w-full px-4 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-xl font-semibold text-center hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                    Biznis prijava
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
            
            // Mobile user menu dropdown
            const mobileUserMenuButton = document.getElementById('mobile-user-menu-button');
            const mobileUserMenu = document.getElementById('mobile-user-menu');
            const mobileUserMenuArrow = document.getElementById('mobile-user-menu-arrow');
            
            if (mobileUserMenuButton && mobileUserMenu) {
                mobileUserMenuButton.addEventListener('click', function() {
                    mobileUserMenu.classList.toggle('hidden');
                    mobileUserMenuArrow.classList.toggle('rotate-180');
                });
            }
            
            // Mobile business user menu dropdown
            const mobileBusinessMenuButton = document.getElementById('mobile-business-menu-button');
            const mobileBusinessMenu = document.getElementById('mobile-business-menu');
            const mobileBusinessMenuArrow = document.getElementById('mobile-business-menu-arrow');
            
            if (mobileBusinessMenuButton && mobileBusinessMenu) {
                mobileBusinessMenuButton.addEventListener('click', function() {
                    mobileBusinessMenu.classList.toggle('hidden');
                    mobileBusinessMenuArrow.classList.toggle('rotate-180');
                });
            }
        });
    </script>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- About Section -->
                <div class="lg:col-span-2">
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <span class="bg-gradient-to-r from-blue-500 to-purple-500 text-transparent bg-clip-text">Moj Kraj</span>
                    </h3>
                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        Povezujemo komšiluk kroz deljenje vesti, dešavanja, lokalnih biznisa i efikasno upravljanje stambenim zajednicama.
                    </p>
                </div>
                
                <!-- Sadržaj Section -->
                <div>
                    <h4 class="text-md font-semibold mb-4 text-white">Sadržaj</h4>
                    <ul class="space-y-2.5 text-sm">
                        @if($isRegularUser || $isBusinessUser)
                            <li>
                                <a href="{{ route('news.index') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-blue-400 transition-colors"></span>
                                    Vesti
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('businesses.index') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-green-400 transition-colors"></span>
                                    Biznisi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pets.index') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-orange-400 transition-colors"></span>
                                    Kućni ljubimci
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('offers.index') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-purple-400 transition-colors"></span>
                                    Ponude
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('buildings.index') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-indigo-400 transition-colors"></span>
                                    Stambene zajednice
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-blue-400 transition-colors"></span>
                                    Vesti
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-green-400 transition-colors"></span>
                                    Biznisi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-orange-400 transition-colors"></span>
                                    Kućni ljubimci
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-purple-400 transition-colors"></span>
                                    Ponude
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-indigo-400 transition-colors"></span>
                                    Stambene zajednice
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                
                <!-- Informacije Section -->
                <div>
                    <h4 class="text-md font-semibold mb-4 text-white">Informacije</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li>
                            <a href="{{ route('news.info') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-blue-400 transition-colors"></span>
                                O vestima
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('business.info') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-green-400 transition-colors"></span>
                                O biznisima
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pets.info') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-orange-400 transition-colors"></span>
                                O ljubimcima
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('offers.info') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-purple-400 transition-colors"></span>
                                O ponudama
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buildings.info') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-indigo-400 transition-colors"></span>
                                O stambenim zajednicama
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Kontakt i Ostalo Section -->
                <div>
                    <h4 class="text-md font-semibold mb-4 text-white">Ostalo</h4>
                    <ul class="space-y-2.5 text-sm mb-4">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-blue-400 transition-colors"></span>
                                Početna
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors flex items-center group">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2 group-hover:bg-purple-400 transition-colors"></span>
                                O nama
                            </a>
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-700">
                        <p class="text-gray-300 text-xs mb-2">Kontakt:</p>
                        <p class="text-gray-400 text-xs">
                            Email: <a href="mailto:info@mojkraj.rs" class="hover:text-white transition-colors">info@mojkraj.rs</a><br>
                            Telefon: +381 11 123 4567
                        </p>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-sm text-gray-300">
                    &copy; 2024 Moj Kraj. Sva prava zadržana.
                </p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
