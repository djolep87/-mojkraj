@extends('layouts.user')

@section('title', 'Dashboard - Moj Kraj')

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

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-pulse-glow {
    animation: pulse-glow 3s ease-in-out infinite;
}
</style>

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Hero Section -->
        <div class="relative bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl p-8 mb-8 shadow-2xl overflow-hidden">
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
                            Dobrodošli, <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">{{ $currentUser->name }}</span>!
                        </h1>
                        <p class="text-xl text-white/90 mb-6">
                            Vaš komšiluk čeka da delite vesti i povežete se sa zajednicom
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
                            <a href="{{ route('news.index') }}" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-8 py-4 rounded-2xl font-bold hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 shadow-xl hover:shadow-yellow-500/25 hover:scale-105">
                                <span class="flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-3m-2 4H9m12 0h-3m-7 4h.01M7 16h.01" />
                                    </svg>
                                    Pregledaj vesti
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <div class="w-32 h-32 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center animate-pulse-glow">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Info Card -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl p-8 mb-8 shadow-xl border border-white/20">
            <div class="flex items-center space-x-6">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <span class="text-white text-2xl font-bold">{{ substr($currentUser->name, 0, 1) }}</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Vaš profil</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <span class="text-gray-600">{{ $currentUser->email }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-600">{{ $currentUser->address }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="text-gray-600">{{ $currentUser->neighborhood }}, {{ $currentUser->city }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total News Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Ukupno vesti</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $news->total() }}</p>
                            <p class="text-xs text-green-600 font-semibold mt-1">+12% ovaj mesec</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active News Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Aktivne vesti</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $news->where('is_published', true)->count() }}</p>
                            <p class="text-xs text-green-600 font-semibold mt-1">Objavljene</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Likes Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Ukupno lajkova</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $news->sum('likes') }}</p>
                            <p class="text-xs text-purple-600 font-semibold mt-1">Od komšija</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent News Section -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white/20 mb-8">
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Vaše najnovije vesti</h3>
                    <a href="{{ route('news.index') }}" class="group flex items-center space-x-2 text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                        <span>Sve vesti</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
                
                @if($news->count() > 0)
                    <div class="space-y-6">
                        @foreach($news as $article)
                            <div class="group relative bg-gradient-to-r from-white to-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                                <div class="flex items-start space-x-6">
                                    @if($article->images && count($article->images) > 0)
                                        <img src="{{ Storage::url($article->images[0]) }}" alt="{{ $article->title }}" class="w-20 h-20 object-cover rounded-xl shadow-md group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-purple-100 rounded-xl flex items-center justify-center shadow-md group-hover:scale-105 transition-transform duration-300">
                                            <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-200">{{ $article->title }}</h4>
                                        <p class="text-gray-600 mb-4 leading-relaxed">{{ Str::limit($article->content, 120) }}</p>
                                        <div class="flex items-center space-x-6 text-sm text-gray-500">
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
                                            <div class="flex items-center space-x-1">
                                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>{{ $article->created_at->format('d.m.Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('news.show', $article) }}" class="group/btn p-3 bg-blue-100 text-blue-600 rounded-xl hover:bg-blue-200 hover:scale-110 transition-all duration-200 shadow-sm" title="Pogledaj">
                                            <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <!-- Edit Button -->
                                        <a href="{{ route('news.edit', $article) }}" class="group/btn p-3 bg-green-100 text-green-600 rounded-xl hover:bg-green-200 hover:scale-110 transition-all duration-200 shadow-sm" title="Uredi">
                                            <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <!-- Delete Button -->
                                        <form method="POST" action="{{ route('news.destroy', $article) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu vest?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="group/btn p-3 bg-red-100 text-red-600 rounded-xl hover:bg-red-200 hover:scale-110 transition-all duration-200 shadow-sm" title="Obriši">
                                                <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Nema vesti</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">Počnite da delite vesti sa svojim komšijama i gradite jaču zajednicu u vašem komšiluku.</p>
                        <a href="{{ route('news.create') }}" class="group bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                            <span class="flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Kreiraj prvu vest
                            </span>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Pets Section -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white/20">
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Vaši postovi o ljubimcima</h3>
                    <div class="flex space-x-3">
                        <a href="{{ route('pets.index') }}" class="group flex items-center space-x-2 bg-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-3m-2 4H9m12 0h-3m-7 4h.01M7 16h.01" />
                            </svg>
                            <span>Svi postovi</span>
                        </a>
                        <a href="{{ route('pets.dashboard') }}" class="group flex items-center space-x-2 bg-orange-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Upravljaj</span>
                        </a>
                    </div>
                </div>
                
                @if($pets->count() > 0)
                    <div class="space-y-6">
                        @foreach($pets as $pet)
                            <div class="group relative bg-gradient-to-r from-white to-orange-50 rounded-2xl p-6 border border-orange-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                                <div class="flex items-start space-x-6">
                                    @if($pet->images && count($pet->images) > 0)
                                        <img src="{{ Storage::url($pet->images[0]) }}" alt="{{ $pet->title }}" class="w-20 h-20 object-cover rounded-xl shadow-md group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-20 h-20 bg-gradient-to-br from-orange-100 to-pink-100 rounded-xl flex items-center justify-center shadow-md group-hover:scale-105 transition-transform duration-300">
                                            <svg class="w-10 h-10 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors duration-200">{{ $pet->title }}</h4>
                                        <p class="text-gray-600 mb-4 leading-relaxed">{{ Str::limit($pet->content, 120) }}</p>
                                        <div class="flex items-center space-x-4 mb-4">
                                            <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">{{ ucfirst($pet->post_type) }}</span>
                                            @if($pet->pet_type)
                                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">{{ ucfirst($pet->pet_type) }}</span>
                                            @endif
                                        </div>
                                        <div class="flex items-center space-x-6 text-sm text-gray-500">
                                            <div class="flex items-center space-x-1">
                                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                                <span>{{ $pet->likes_count }} lajkova</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>{{ $pet->created_at->format('d.m.Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('pets.show', $pet) }}" class="group/btn p-3 bg-blue-100 text-blue-600 rounded-xl hover:bg-blue-200 hover:scale-110 transition-all duration-200 shadow-sm" title="Pogledaj">
                                            <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <!-- Edit Button -->
                                        <a href="{{ route('pets.edit', $pet) }}" class="group/btn p-3 bg-green-100 text-green-600 rounded-xl hover:bg-green-200 hover:scale-110 transition-all duration-200 shadow-sm" title="Uredi">
                                            <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <!-- Delete Button -->
                                        <form method="POST" action="{{ route('pets.destroy', $pet) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="group/btn p-3 bg-red-100 text-red-600 rounded-xl hover:bg-red-200 hover:scale-110 transition-all duration-200 shadow-sm" title="Obriši">
                                                <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gradient-to-br from-orange-100 to-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Nema postova o ljubimcima</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">Počnite da delite informacije o ljubimcima sa svojim komšijama i gradite zajednicu ljubitelja životinja.</p>
                        <a href="{{ route('pets.create') }}" class="group bg-gradient-to-r from-orange-600 to-pink-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-orange-700 hover:to-pink-700 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                            <span class="flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Kreiraj prvi post
                            </span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection