@php
use Illuminate\Support\Facades\Storage;
@endphp

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
                        <a href="{{ route('news.index') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Vesti</a>
                        <a href="{{ route('businesses.index') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Biznisi</a>
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
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            
            <!-- Error Message -->
            @if(session('error'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6">
                    <h1 class="text-2xl font-bold text-gray-900 mb-4">
                        Dobrodošao u svoj komšiluk!
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Tvoja lokacija:</h3>
                            <p class="text-gray-600">{{ $currentUser->address }}</p>
                            <p class="text-gray-600">{{ $currentUser->neighborhood }}, {{ $currentUser->city }}</p>
                            @if($currentUser->postal_code)
                                <p class="text-gray-600">{{ $currentUser->postal_code }}</p>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Brza akcija:</h3>
                            <div class="space-y-2">
                                <a href="{{ route('news.create') }}" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors inline-block text-center">
                                    Deli vest
                                </a>
                                <button class="w-full bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors">
                                    Deli dešavanje
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
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Nedavna dešavanja u {{ $currentUser->neighborhood }}</h3>
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
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Vaše vesti</h3>
                        @if($news->count() > 0)
                            <div class="space-y-3">
                                @foreach($news as $article)
                                    <div class="border-l-4 border-green-500 pl-4">
                                        <div class="flex items-start space-x-3">
                                            @if($article->images && count($article->images) > 0)
                                                <div class="flex-shrink-0">
                                                    <img src="{{ Storage::url($article->images[0]) }}" alt="{{ $article->title }}" class="w-16 h-16 object-cover rounded">
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <h4 class="text-sm font-medium text-gray-900">{{ $article->title }}</h4>
                                                <p class="text-sm text-gray-600">{{ Str::limit($article->content, 100) }}</p>
                                                <div class="flex items-center justify-between mt-2">
                                                    <div class="flex items-center space-x-4">
                                                        <span class="text-xs text-gray-500">{{ $article->created_at->format('d.m.Y') }}</span>
                                                        @if($article->images && count($article->images) > 0)
                                                            <span class="text-xs text-blue-600">📷 {{ count($article->images) }} slika</span>
                                                        @endif
                                                        @if($article->videos && count($article->videos) > 0)
                                                            <span class="text-xs text-purple-600">🎥 {{ count($article->videos) }} video</span>
                                                        @endif
                                                    </div>
                                                    <div class="flex items-center space-x-2">
                                                        <a href="{{ route('news.edit', $article) }}" class="text-blue-600 text-xs hover:text-blue-800">Uredi</a>
                                                        <form method="POST" action="{{ route('news.destroy', $article) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu vest? Ova akcija će obrisati i sve priložene slike i video fajlove.')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 text-xs hover:text-red-800">Obriši</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('news.index') }}" class="text-green-600 text-sm font-medium hover:text-green-700">
                                    Pregledaj sve vesti →
                                </a>
                                <a href="{{ route('news.create') }}" class="text-blue-600 text-sm font-medium hover:text-blue-700">
                                    Nova vest +
                                </a>
                            </div>
                        @else
                            <div class="border-l-4 border-green-500 pl-4">
                                <p class="text-sm text-gray-600">Trenutno nema vesti. Napravite svoju prvu vest!</p>
                            </div>
                            <a href="{{ route('news.create') }}" class="mt-4 text-green-600 text-sm font-medium hover:text-green-700">
                                Napravi prvu vest →
                            </a>
                        @endif
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
