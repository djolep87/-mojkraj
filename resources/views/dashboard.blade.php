<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Moj Kraj</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">Moj Kraj</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('dashboard') }}" class="text-gray-900 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        <a href="#" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Dešavanja</a>
                        <a href="#" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Vesti</a>
                        <a href="#" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Biznisi</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 text-sm">Dobrodošao, {{ $currentUser->name }}!</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                            Odjavi se
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6">
                    <h1 class="text-2xl font-bold text-gray-900 mb-4">
                        Dobrodošao u svoj komšiluk!
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Tvoja lokacija:</h3>
                            <p class="text-gray-600">{{ $user->address }}</p>
                            <p class="text-gray-600">{{ $user->neighborhood }}, {{ $user->city }}</p>
                            @if($user->postal_code)
                                <p class="text-gray-600">{{ $user->postal_code }}</p>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Brza akcija:</h3>
                            <div class="space-y-2">
                                <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                                    Deli dešavanje
                                </button>
                                <button class="w-full bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors">
                                    Deli vest
                                </button>
                                <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors">
                                    Deli priču
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Events -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Nedavna dešavanja u {{ $user->neighborhood }}</h3>
                        <div class="space-y-3">
                            <div class="border-l-4 border-blue-500 pl-4">
                                <p class="text-sm text-gray-600">Trenutno nema dešavanja u vašem komšiluku.</p>
                            </div>
                        </div>
                        <button class="mt-4 text-blue-600 text-sm font-medium hover:text-blue-700">
                            Pregledaj sva dešavanja →
                        </button>
                    </div>
                </div>

                <!-- Recent News -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Najnovije vesti</h3>
                        <div class="space-y-3">
                            <div class="border-l-4 border-green-500 pl-4">
                                <p class="text-sm text-gray-600">Trenutno nema vesti iz vašeg komšiluka.</p>
                            </div>
                        </div>
                        <button class="mt-4 text-green-600 text-sm font-medium hover:text-green-700">
                            Pregledaj sve vesti →
                        </button>
                    </div>
                </div>

                <!-- Local Businesses -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Lokalni biznisi</h3>
                        <div class="space-y-3">
                            <div class="border-l-4 border-purple-500 pl-4">
                                <p class="text-sm text-gray-600">Trenutno nema registrovanih biznisa u vašem komšiluku.</p>
                            </div>
                        </div>
                        <button class="mt-4 text-purple-600 text-sm font-medium hover:text-purple-700">
                            Pregledaj sve biznise →
                        </button>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="mt-6 bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Statistike vašeg komšiluka</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">0</div>
                            <div class="text-sm text-gray-600">Dešavanja</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">0</div>
                            <div class="text-sm text-gray-600">Vesti</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">0</div>
                            <div class="text-sm text-gray-600">Biznisi</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-orange-600">0</div>
                            <div class="text-sm text-gray-600">Korisnici</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
