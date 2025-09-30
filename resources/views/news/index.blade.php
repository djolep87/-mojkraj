<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vesti - Moj Kraj</title>
    
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
                        <a href="{{ route('home') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Početna</a>
                        <a href="{{ route('news.index') }}" class="text-gray-900 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Vesti</a>
                        <a href="{{ route('businesses.index') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Biznisi</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @if($isRegularUser)
                        <a href="{{ route('news.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                            Nova vest
                        </a>
                        <a href="{{ route('dashboard') }}" class="text-gray-700 text-sm hover:text-blue-600">Dobrodošao, {{ $currentUser->name }}!</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                Odjavi se
                            </button>
                        </form>
                    @elseif($isBusinessUser)
                        <a href="{{ route('business.dashboard') }}" class="text-gray-700 text-sm hover:text-blue-600">Dobrodošao, {{ $currentBusinessUser->company_name }}!</a>
                        <form method="POST" action="{{ route('business.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                Odjavi se
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                            Prijavi se
                        </a>
                        <a href="{{ route('register') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                            Registruj se
                        </a>
                        <a href="{{ route('business.register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                            Registruj biznis
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
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
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Vesti iz komšiluka</h1>
                @if($isRegularUser)
                    <p class="mt-2 text-gray-600">Pratite najnovije dešavanja u vašem komšiluku ({{ $currentUser->neighborhood }}, {{ $currentUser->city }}) i vaše vlastite vesti</p>
                @else
                    <p class="mt-2 text-gray-600">Pratite najnovije dešavanja u komšiluku</p>
                @endif
            </div>

            <!-- News Grid -->
            @if($news->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($news as $article)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            @if($article->images && count($article->images) > 0)
                                <a href="{{ route('news.show', $article) }}" class="block">
                                    <img src="{{ Storage::url($article->images[0]) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover hover:opacity-90 transition-opacity cursor-pointer">
                                </a>
                            @else
                                <a href="{{ route('news.show', $article) }}" class="block">
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition-colors cursor-pointer">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                </a>
                            @endif
                            
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center space-x-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ ucfirst($article->category) }}
                                        </span>
                                        @if($isRegularUser && $currentUser->id === $article->user_id)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Vaša vest
                                            </span>
                                        @endif
                                    </div>
                                    @if($article->is_featured)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Istaknuto
                                        </span>
                                    @endif
                                </div>
                                
                                <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2">
                                    <a href="{{ route('news.show', $article) }}" class="hover:text-blue-600">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                
                                @if($article->summary)
                                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->summary }}</p>
                                @else
                                    <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                                @endif
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                        <span>{{ $article->user->name }}</span>
                                        <span>{{ $article->created_at->format('d.m.Y') }}</span>
                                    </div>
                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            {{ $article->views }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            {{ $article->likes }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $news->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Nema vesti</h3>
                    @if($isRegularUser)
                        <p class="mt-1 text-sm text-gray-500">Trenutno nema objavljenih vesti u vašem komšiluku ({{ $currentUser->neighborhood }}, {{ $currentUser->city }}) i nema vaših vesti.</p>
                    @else
                        <p class="mt-1 text-sm text-gray-500">Trenutno nema objavljenih vesti.</p>
                    @endif
                    @if($isRegularUser)
                        <div class="mt-6">
                            <a href="{{ route('news.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Napravi prvu vest
                            </a>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</body>
</html>
