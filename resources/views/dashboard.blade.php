@extends('layouts.user')

@section('title', 'Dashboard - Moj Kraj')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <!-- Welcome Section -->
        <div class="bg-white overflow-hidden shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">
                    Dobrodošli, {{ $currentUser->name }}!
                </h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Vaše informacije:</h3>
                        <p class="text-gray-600"><strong>Email:</strong> {{ $currentUser->email }}</p>
                        <p class="text-gray-600"><strong>Adresa:</strong> {{ $currentUser->address }}</p>
                        <p class="text-gray-600"><strong>Komšiluk:</strong> {{ $currentUser->neighborhood }}, {{ $currentUser->city }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Brze akcije:</h3>
                        <div class="space-y-2">
                            <a href="{{ route('news.create') }}" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors inline-block text-center">
                                Kreiraj vest
                            </a>
                            <a href="{{ route('news.index') }}" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors inline-block text-center">
                                Pregledaj sve vesti
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Ukupno vesti</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $news->total() }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Aktivne vesti</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $news->where('is_published', true)->count() }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Ukupno lajkova</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $news->sum('likes') }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent News -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Vaše najnovije vesti</h3>
                @if($news->count() > 0)
                    <div class="space-y-4">
                        @foreach($news as $article)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-start space-x-4">
                                    @if($article->images && count($article->images) > 0)
                                        <img src="{{ Storage::url($article->images[0]) }}" alt="{{ $article->title }}" class="w-16 h-16 object-cover rounded-lg">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 truncate">{{ $article->title }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($article->content, 100) }}</p>
                                        <div class="mt-2 flex items-center space-x-4 text-xs text-gray-500">
                                            <span>{{ $article->views }} pregleda</span>
                                            <span>{{ $article->likes }} lajkova</span>
                                            <span>{{ $article->created_at->format('d.m.Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('news.show', $article) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            Pogledaj
                                        </a>
                                        <a href="{{ route('news.edit', $article) }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                            Uredi
                                        </a>
                                        <form method="POST" action="{{ route('news.destroy', $article) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu vest?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Obriši
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Nema vesti</h3>
                        <p class="mt-1 text-sm text-gray-500">Počnite da delite vesti sa svojim komšijama.</p>
                        <div class="mt-6">
                            <a href="{{ route('news.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition-colors">
                                Kreiraj prvu vest
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Pets Section -->
        <div class="bg-white shadow rounded-lg mt-6">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Vaši postovi o ljubimcima</h3>
                    <div class="flex space-x-2">
                        <a href="{{ route('pets.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition-colors">
                            Svi postovi
                        </a>
                        <a href="{{ route('pets.dashboard') }}" class="bg-orange-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-orange-700 transition-colors">
                            Upravljaj
                        </a>
                    </div>
                </div>
                @if($pets->count() > 0)
                    <div class="space-y-4">
                        @foreach($pets as $pet)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-start space-x-4">
                                    @if($pet->images && count($pet->images) > 0)
                                        <img src="{{ Storage::url($pet->images[0]) }}" alt="{{ $pet->title }}" class="w-16 h-16 object-cover rounded-lg">
                                    @else
                                        <div class="w-16 h-16 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 truncate">{{ $pet->title }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($pet->content, 100) }}</p>
                                        <div class="mt-2 flex items-center space-x-4 text-xs text-gray-500">
                                            <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full">{{ ucfirst($pet->post_type) }}</span>
                                            @if($pet->pet_type)
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ ucfirst($pet->pet_type) }}</span>
                                            @endif
                                            <span>{{ $pet->likes_count }} lajkova</span>
                                            <span>{{ $pet->created_at->format('d.m.Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('pets.show', $pet) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            Pogledaj
                                        </a>
                                        <a href="{{ route('pets.edit', $pet) }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                            Uredi
                                        </a>
                                        <form method="POST" action="{{ route('pets.destroy', $pet) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Obriši
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Nema postova o ljubimcima</h3>
                        <p class="mt-1 text-sm text-gray-500">Počnite da delite informacije o ljubimcima sa svojim komšijama.</p>
                        <div class="mt-6">
                            <a href="{{ route('pets.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-orange-700 transition-colors">
                                Kreiraj prvi post
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection