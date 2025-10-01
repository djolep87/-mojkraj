@extends('layouts.user')

@section('title', 'Vesti - Moj Kraj')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Vesti iz vašeg komšiluka</h1>
        <p class="text-gray-600">
            Prikazane su vesti iz {{ $currentUser->neighborhood }}, {{ $currentUser->city }}
        </p>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <!-- News Grid -->
    @if($news->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($news as $article)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    @if($article->images && count($article->images) > 0)
                        <a href="{{ route('news.show', $article) }}" class="block">
                            <img src="{{ Storage::url($article->images[0]) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover hover:opacity-90 transition-opacity cursor-pointer">
                        </a>
                    @else
                        <a href="{{ route('news.show', $article) }}" class="block">
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition-colors cursor-pointer">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </a>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $article->title }}</h3>
                            @if($article->user_id === $currentUser->id)
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    Vaša vest
                                </span>
                            @endif
                        </div>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->summary ?? Str::limit($article->content, 150) }}</p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>{{ $article->user->name }}</span>
                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">
                                {{ ucfirst($article->category) }}
                            </span>
                        </div>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>{{ $article->views }} pregleda</span>
                            <span>{{ $article->likes }} lajkova</span>
                            <span>{{ $article->created_at->format('d.m.Y') }}</span>
                        </div>
                        
                        <a href="{{ route('news.show', $article) }}" 
                           class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                            Pročitaj više
                        </a>
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Nema vesti</h3>
            <p class="mt-1 text-sm text-gray-500">
                Trenutno nema vesti u vašem komšiluku ({{ $currentUser->neighborhood }}, {{ $currentUser->city }}).
            </p>
            <div class="mt-6">
                <a href="{{ route('news.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition-colors">
                    Kreiraj prvu vest
                </a>
            </div>
        </div>
    @endif
</div>
@endsection