@extends('layouts.user')

@section('title', 'Kućni ljubimci - Moj Kraj')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Kućni ljubimci</h1>
                    <p class="text-gray-600">Povezujte se sa komšijama kroz ljubav prema životinjama</p>
                    <p class="text-sm text-orange-600 mt-1">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Prikazani su samo postovi iz vašeg dela grada ({{ auth()->user()->neighborhood }}, {{ auth()->user()->city }})
                    </p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('pets.create') }}" class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:from-orange-600 hover:to-pink-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Kreiraj post
                    </a>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tip posta</label>
                    <select name="type" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="">Svi tipovi</option>
                        <option value="upit" {{ request('type') == 'upit' ? 'selected' : '' }}>Upit</option>
                        <option value="informacija" {{ request('type') == 'informacija' ? 'selected' : '' }}>Informacija</option>
                        <option value="prodaja" {{ request('type') == 'prodaja' ? 'selected' : '' }}>Prodaja</option>
                        <option value="usluga" {{ request('type') == 'usluga' ? 'selected' : '' }}>Usluga</option>
                        <option value="udomljavanje" {{ request('type') == 'udomljavanje' ? 'selected' : '' }}>Udomljavanje</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tip ljubimca</label>
                    <select name="pet_type" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        <option value="">Svi tipovi</option>
                        <option value="pas" {{ request('pet_type') == 'pas' ? 'selected' : '' }}>Pas</option>
                        <option value="mačka" {{ request('pet_type') == 'mačka' ? 'selected' : '' }}>Mačka</option>
                        <option value="ptica" {{ request('pet_type') == 'ptica' ? 'selected' : '' }}>Ptica</option>
                        <option value="riba" {{ request('pet_type') == 'riba' ? 'selected' : '' }}>Riba</option>
                        <option value="ostalo" {{ request('pet_type') == 'ostalo' ? 'selected' : '' }}>Ostalo</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pretraži</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Pretraži postove..." class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                </div>
                
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors duration-200">
                        Filtriraj
                    </button>
                </div>
            </form>
            
            @if(request()->hasAny(['type', 'pet_type', 'search', 'urgent']))
                <div class="mt-4 flex flex-wrap gap-2">
                    @if(request('type'))
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-orange-100 text-orange-800">
                            Tip: {{ ucfirst(request('type')) }}
                            <a href="{{ request()->fullUrlWithQuery(['type' => null]) }}" class="ml-2 text-orange-600 hover:text-orange-800">×</a>
                        </span>
                    @endif
                    @if(request('pet_type'))
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-orange-100 text-orange-800">
                            Ljubimac: {{ ucfirst(request('pet_type')) }}
                            <a href="{{ request()->fullUrlWithQuery(['pet_type' => null]) }}" class="ml-2 text-orange-600 hover:text-orange-800">×</a>
                        </span>
                    @endif
                    @if(request('search'))
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-orange-100 text-orange-800">
                            Pretraga: "{{ request('search') }}"
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="ml-2 text-orange-600 hover:text-orange-800">×</a>
                        </span>
                    @endif
                    <a href="{{ route('pets.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Obriši sve filtere</a>
                </div>
            @endif
        </div>

        <!-- Posts Grid -->
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <!-- Post Image -->
                        <a href="{{ route('pets.show', $post) }}" class="block">
                            @if($post->images && count($post->images) > 0)
                                <div class="aspect-w-16 aspect-h-9">
                                    <img src="{{ Storage::url($post->images[0]) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="aspect-w-16 aspect-h-9 bg-gradient-to-br from-orange-100 to-pink-100 flex items-center justify-center hover:scale-105 transition-transform duration-300">
                                    <svg class="w-16 h-16 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                            @endif
                        </a>

                        <!-- Post Content -->
                        <div class="p-6">
                            <!-- Post Type Badge -->
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                    {{ ucfirst($post->post_type) }}
                                </span>
                                @if($post->is_urgent)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Hitno
                                    </span>
                                @endif
                            </div>

                            <!-- Title -->
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                <a href="{{ route('pets.show', $post) }}" class="hover:text-orange-600 transition-colors duration-200">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <!-- Pet Info -->
                            <div class="flex items-center text-sm text-gray-600 mb-3">
                                @if($post->pet_type)
                                    <span class="inline-flex items-center mr-3">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        {{ ucfirst($post->pet_type) }}
                                    </span>
                                @endif
                                @if($post->pet_breed)
                                    <span class="text-gray-400">•</span>
                                    <span class="ml-2">{{ $post->pet_breed }}</span>
                                @endif
                            </div>

                            <!-- Content Preview -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($post->content, 120) }}
                            </p>

                            <!-- Author and Stats -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-pink-400 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                        {{ substr($post->user->name, 0, 1) }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">{{ $post->user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        {{ $post->likes_count }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        {{ $post->comments_count }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Nema postova o ljubimcima</h3>
                <p class="text-gray-600 mb-6">Budite prvi koji će podeliti informacije o svojim ljubimcima!</p>
                <a href="{{ route('pets.create') }}" class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:from-orange-600 hover:to-pink-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                    Kreiraj prvi post
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
