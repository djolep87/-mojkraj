<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $news->title }} - Moj Kraj</title>
    
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
                        <a href="{{ route('news.index') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Vesti</a>
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
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('news.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Nazad na vesti
                </a>
            </div>

            <!-- Article -->
            <article class="bg-white shadow rounded-lg overflow-hidden">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($news->category) }}
                            </span>
                            @if($news->is_featured)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Istaknuto
                                </span>
                            @endif
                        </div>
                        @if($isRegularUser && $currentUser->id === $news->user_id)
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('news.edit', $news) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    Uredi
                                </a>
                                <form method="POST" action="{{ route('news.destroy', $news) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu vest?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                        Obriši
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <div class="flex items-center space-x-4">
                            <span>Autor: {{ $news->user->name }}</span>
                            <span>{{ $news->created_at->format('d.m.Y H:i') }}</span>
                            <span class="flex items-center text-blue-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $news->user->neighborhood }}, {{ $news->user->city }}
                            </span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                {{ $news->views }} pregleda
                            </span>
                            <button onclick="likeNews({{ $news->id }})" class="flex items-center text-gray-500 hover:text-red-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span id="likes-count">{{ $news->likes }}</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="px-6 py-6">
                    @if($news->summary)
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Sažetak</h3>
                            <p class="text-gray-700">{{ $news->summary }}</p>
                        </div>
                    @endif

                    <!-- Images -->
                    @if($news->images && count($news->images) > 0)
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Slike</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($news->images as $image)
                                    <div class="relative">
                                        <img src="{{ Storage::url($image) }}" alt="{{ $news->title }}" class="w-full h-64 object-cover rounded-lg">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Videos -->
                    @if($news->videos && count($news->videos) > 0)
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Video zapisi</h3>
                            <div class="space-y-4">
                                @foreach($news->videos as $video)
                                    <div class="relative">
                                        <video controls class="w-full rounded-lg">
                                            <source src="{{ Storage::url($video) }}" type="video/mp4">
                                            Vaš browser ne podržava video tag.
                                        </video>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Main Content -->
                    <div class="prose max-w-none">
                        <div class="whitespace-pre-wrap text-gray-700">{{ $news->content }}</div>
                    </div>
                </div>
            </article>
        </div>
    </div>

    <script>
        function likeNews(newsId) {
            fetch(`/news/${newsId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('likes-count').textContent = data.likes;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
