@extends('layouts.user')

@section('title', 'Vesti - Moj Kraj')

@section('content')
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
    50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6); }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-pulse-glow {
    animation: pulse-glow 3s ease-in-out infinite;
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out forwards;
}

.news-card {
    animation: fadeInUp 0.6s ease-out forwards;
}

.news-card:nth-child(1) { animation-delay: 0.1s; }
.news-card:nth-child(2) { animation-delay: 0.2s; }
.news-card:nth-child(3) { animation-delay: 0.3s; }
.news-card:nth-child(4) { animation-delay: 0.4s; }
.news-card:nth-child(5) { animation-delay: 0.5s; }
.news-card:nth-child(6) { animation-delay: 0.6s; }
</style>

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero Header -->
        <div class="relative bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl p-8 mb-12 shadow-2xl overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-4 right-4 w-32 h-32 bg-white rounded-full animate-float"></div>
                <div class="absolute bottom-4 left-4 w-24 h-24 bg-yellow-300 rounded-full animate-pulse"></div>
                <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-pink-300 rounded-full animate-bounce"></div>
            </div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                            <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Vesti</span><br>
                            <span class="text-white">iz vašeg komšiluka</span>
                        </h1>
                        <p class="text-xl text-white/90 mb-6">
                            Najnovije vesti iz {{ $currentUser->neighborhood }}, {{ $currentUser->city }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('news.create') }}" class="group bg-white/20 backdrop-blur-md text-white px-8 py-4 rounded-2xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/30 shadow-xl hover:shadow-2xl hover:scale-105">
                                <span class="flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Kreiraj vest
                                </span>
                            </a>
                            <a href="{{ route('news.info') }}" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-8 py-4 rounded-2xl font-bold hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 shadow-xl hover:shadow-yellow-500/25 hover:scale-105">
                                <span class="flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Saznaj više
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <div class="w-32 h-32 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center animate-pulse-glow">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-8 shadow-lg animate-fade-in-up">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-2xl mb-8 shadow-lg animate-fade-in-up">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- News Grid -->
        @if($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $article)
                    <div class="news-card group relative bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                        <!-- Image Section -->
                        @if($article->images && count($article->images) > 0)
                            <a href="{{ route('news.show', $article) }}" class="block relative overflow-hidden">
                                <img src="{{ Storage::url($article->images[0]) }}" alt="{{ $article->title }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute top-4 right-4">
                                    @if($article->user_id === $currentUser->id)
                                        <span class="bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                            Vaša vest
                                        </span>
                                    @endif
                                </div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-medium px-3 py-1 rounded-full">
                                        {{ ucfirst($article->category) }}
                                    </span>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('news.show', $article) }}" class="block relative overflow-hidden">
                                <div class="w-full h-56 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                                    <svg class="w-16 h-16 text-blue-400 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                                <div class="absolute top-4 right-4">
                                    @if($article->user_id === $currentUser->id)
                                        <span class="bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                            Vaša vest
                                        </span>
                                    @endif
                                </div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-medium px-3 py-1 rounded-full">
                                        {{ ucfirst($article->category) }}
                                    </span>
                                </div>
                            </a>
                        @endif
                        
                        <!-- Content Section -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200 line-clamp-2">
                                {{ $article->title }}
                            </h3>
                            
                            <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                                {{ $article->summary ?? Str::limit($article->content, 120) }}
                            </p>
                            
                            <!-- Author and Date -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2">
                                    @if($article->is_anonymous)
                                        <div class="w-8 h-8 bg-gradient-to-br from-gray-500 to-gray-700 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <span class="text-sm font-medium text-gray-700">Anonimni korisnik</span>
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    @else
                                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                            <span class="text-white text-sm font-bold">{{ substr($article->user->name, 0, 1) }}</span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">{{ $article->user->name }}</span>
                                    @endif
                                </div>
                                <span class="text-sm text-gray-500">{{ $article->created_at->format('d.m.Y') }}</span>
                            </div>
                            
                            <!-- Stats -->
                            <div class="flex items-center justify-between mb-6 text-sm text-gray-500">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>{{ $article->views }} pregleda</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <span>{{ $article->likes }} lajkova</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action Button -->
                            <a href="{{ route('news.show', $article) }}" 
                               class="group/btn block w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-3 px-6 rounded-2xl font-bold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                                <span class="flex items-center justify-center">
                                    Pročitaj više
                                    <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <div class="bg-white/80 backdrop-blur-lg rounded-2xl p-4 shadow-xl border border-white/20">
                    {{ $news->links() }}
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-8 animate-pulse">
                    <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Nema vesti</h3>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Trenutno nema vesti u vašem komšiluku ({{ $currentUser->neighborhood }}, {{ $currentUser->city }}). 
                    Budite prvi koji će podeliti vest sa svojim komšijama!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('news.create') }}" class="group bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                        <span class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Kreiraj prvu vest
                        </span>
                    </a>
                    <a href="{{ route('news.info') }}" class="group bg-white/20 backdrop-blur-md text-gray-700 px-8 py-4 rounded-2xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-gray-200 shadow-xl hover:shadow-2xl hover:scale-105">
                        <span class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Saznaj više o vestima
                        </span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection