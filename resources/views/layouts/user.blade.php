<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Moj Kraj')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            Moj Kraj
                        </span>
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        Početna
                    </a>
                    <a href="#" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        Dešavanja
                    </a>
                    <a href="{{ route('news.index') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        Vesti
                    </a>
                    <a href="{{ route('businesses.index') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        Biznisi
                    </a>
                    <a href="{{ route('offers.index') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        Ponude
                    </a>
                    <a href="#" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        O nama
                    </a>
                </div>
                
                <!-- User Section -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ substr($currentUser->name, 0, 1) }}
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-medium text-gray-900">{{ $currentUser->name }}</p>
                            <p class="text-xs text-gray-500">{{ $currentUser->neighborhood }}, {{ $currentUser->city }}</p>
                        </div>
                    </div>
                    <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full font-medium hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-lg font-medium hover:bg-gray-100 transition-all duration-200">
                            Odjavi se
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Moj Kraj</h3>
                    <p class="text-gray-300 text-sm">
                        Povezujemo komšiluk kroz deljenje vesti, dešavanja i lokalnih biznisa.
                    </p>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4">Linkovi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Početna</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Dešavanja</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">O nama</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4">Sadržaj</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('news.index') }}" class="text-gray-300 hover:text-white">Vesti</a></li>
                        <li><a href="{{ route('businesses.index') }}" class="text-gray-300 hover:text-white">Biznisi</a></li>
                        <li><a href="{{ route('offers.index') }}" class="text-gray-300 hover:text-white">Ponude</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4">Kontakt</h4>
                    <p class="text-gray-300 text-sm">
                        Email: info@mojkraj.rs<br>
                        Telefon: +381 11 123 4567
                    </p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-300">
                <p>&copy; 2024 Moj Kraj. Sva prava zadržana.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
