@extends('layouts.user')

@section('title', 'Biznisi u vašem komšiluku - Moj Kraj')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                Biznisi u vašem komšiluku
            </h1>
            <p class="text-gray-600">
                Otkrijte lokalne biznise i usluge u {{ $user->neighborhood }}, {{ $user->city }}
            </p>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <form method="GET" action="{{ route('businesses.index') }}" class="space-y-6">
                <!-- Search Bar -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                        Pretraži biznise
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" 
                               name="search" 
                               id="search"
                               value="{{ request('search') }}"
                               placeholder="Pretraži po nazivu, opisu ili kompaniji..."
                               class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Filters Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Type Filter -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                            Tip biznisa
                        </label>
                        <select name="type" id="type" class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Svi tipovi</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                    {{ ucfirst(str_replace('_', ' ', $type)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <label for="price_min" class="block text-sm font-medium text-gray-700 mb-2">
                            Cena od
                        </label>
                        <input type="number" 
                               name="price_min" 
                               id="price_min"
                               value="{{ request('price_min') }}"
                               placeholder="Min cena"
                               class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="price_max" class="block text-sm font-medium text-gray-700 mb-2">
                            Cena do
                        </label>
                        <input type="number" 
                               name="price_max" 
                               id="price_max"
                               value="{{ request('price_max') }}"
                               placeholder="Max cena"
                               class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Sort -->
                    <div>
                        <label for="sort" class="block text-sm font-medium text-gray-700 mb-2">
                            Sortiraj po
                        </label>
                        <select name="sort" id="sort" class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Preporučeno</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Najnoviji</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Najstariji</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Cena: niska → visoka</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Cena: visoka → niska</option>
                            <option value="views" {{ request('sort') == 'views' ? 'selected' : '' }}>Najgledaniji</option>
                        </select>
                    </div>
                </div>

                <!-- Featured Filter -->
                <div class="flex items-center">
                    <input type="checkbox" 
                           name="featured" 
                           id="featured"
                           value="1"
                           {{ request('featured') ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="featured" class="ml-2 block text-sm text-gray-700">
                        Prikaži samo preporučene biznise
                    </label>
                </div>

                <!-- Filter Buttons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="submit" 
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z" />
                        </svg>
                        Filtriraj
                    </button>
                    
                    <a href="{{ route('businesses.index') }}" 
                       class="bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-200 transition-colors duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Obriši filtere
                    </a>
                </div>
            </form>
        </div>

        <!-- Results Count -->
        <div class="mb-6">
            <p class="text-gray-600">
                Pronađeno <span class="font-semibold text-blue-600">{{ $businesses->total() }}</span> biznisa
                @if(request()->hasAny(['search', 'type', 'price_min', 'price_max', 'featured']))
                    sa trenutnim filterima
                @endif
            </p>
        </div>

        <!-- Businesses Grid -->
        @if($businesses->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($businesses as $business)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <!-- Business Image -->
                        @if($business->images && count($business->images) > 0)
                            <div class="h-48 bg-gray-200">
                                <img src="{{ Storage::url($business->images[0]) }}" 
                                     alt="{{ $business->title }}" 
                                     class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        @endif

                        <!-- Business Content -->
                        <div class="p-6">
                            <!-- Header -->
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                        {{ $business->title }}
                                    </h3>
                                    <p class="text-sm text-gray-600">
                                        {{ $business->businessUser->company_name }}
                                    </p>
                                </div>
                                @if($business->is_featured)
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        Preporučeno
                                    </span>
                                @endif
                            </div>

                            <!-- Type Badge -->
                            <div class="mb-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst(str_replace('_', ' ', $business->type)) }}
                                </span>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($business->description, 120) }}
                            </p>

                            <!-- Price -->
                            @if($business->price)
                                <div class="mb-4">
                                    <span class="text-lg font-semibold text-green-600">
                                        {{ number_format($business->price, 0, ',', '.') }} RSD
                                    </span>
                                    @if($business->discount_percentage)
                                        <span class="text-sm text-gray-500 ml-2">
                                            ({{ $business->discount_percentage }}% popust)
                                        </span>
                                    @endif
                                </div>
                            @endif

                            <!-- Stats -->
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{ $business->views }} pregleda
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{ $business->created_at->diffForHumans() }}
                                </div>
                            </div>

                            <!-- Action Button -->
                            <a href="{{ route('businesses.show', $business) }}" 
                               class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors duration-200">
                                Pogledaj detalje
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $businesses->links() }}
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                    Nema biznisa koji odgovaraju vašim kriterijumima
                </h3>
                <p class="text-gray-600 mb-6">
                    Pokušajte da promenite filtere ili pretražite drugačije.
                </p>
                <a href="{{ route('businesses.index') }}" 
                   class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition-colors duration-200">
                    Obriši sve filtere
                </a>
            </div>
        @endif
    </div>
</div>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection