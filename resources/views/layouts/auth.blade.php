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
                
                <!-- Back to Home -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                        Nazad na početnu
                    </a>
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
                    <h4 class="text-md font-semibold mb-4">Registracija</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('register') }}" class="text-gray-300 hover:text-white">Registruj se</a></li>
                        <li><a href="{{ route('business.register') }}" class="text-gray-300 hover:text-white">Biznis registracija</a></li>
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
