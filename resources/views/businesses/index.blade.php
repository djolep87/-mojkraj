@php
    // Determine which layout to use based on user type
    $isBusinessUser = auth('business')->check();
    $layoutName = $isBusinessUser ? 'layouts.business' : 'layouts.app';
@endphp

@extends($layoutName)

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
                Otkrijte lokalne biznise i usluge u {{ $currentUser ? $currentUser->neighborhood : 'Nepoznato' }}, {{ $currentUser ? $currentUser->city : 'Nepoznato' }}
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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

                    <!-- Sort -->
                    <div>
                        <label for="sort" class="block text-sm font-medium text-gray-700 mb-2">
                            Sortiraj po
                        </label>
                        <select name="sort" id="sort" class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Najnoviji</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Najstariji</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Naziv: A-Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Naziv: Z-A</option>
                            <option value="type" {{ request('sort') == 'type' ? 'selected' : '' }}>Tip biznisa</option>
                        </select>
                    </div>
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
                @if(request()->hasAny(['search', 'type']))
                    sa trenutnim filterima
                @endif
            </p>
        </div>

        <!-- Businesses Grid -->
        @if($businesses->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8">
                @foreach($businesses as $businessUser)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <!-- Mobile Layout: Horizontal with image on left -->
                        <div class="flex md:flex-col">
                            <!-- Business Image - Left side on mobile, top on desktop -->
                            <div class="w-24 h-24 md:w-full md:h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center flex-shrink-0 md:flex-shrink">
                                <div class="text-center">
                                    <div class="w-10 h-10 md:w-16 md:h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-1 md:mb-2">
                                        <span class="text-lg md:text-2xl font-bold text-white">{{ substr($businessUser->company_name, 0, 1) }}</span>
                                    </div>
                                    <p class="text-white text-xs md:text-sm font-medium hidden md:block">{{ $businessUser->company_name }}</p>
                                </div>
                            </div>

                            <!-- Business Content - Right side on mobile, below image on desktop -->
                            <div class="flex-1 p-3 md:p-6">
                                <!-- Header -->
                                <div class="mb-2 md:mb-3">
                                    <h3 class="text-base md:text-lg font-semibold text-gray-900 mb-0.5 md:mb-1 line-clamp-1">
                                        {{ $businessUser->company_name }}
                                    </h3>
                                    <div class="flex items-center gap-2 flex-wrap mb-1 md:mb-0">
                                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded-full">
                                            {{ ucfirst(str_replace('_', ' ', $businessUser->business_type)) }}
                                        </span>
                                        @if($businessUser->total_ratings > 0)
                                            <div class="flex items-center space-x-1">
                                                <div class="flex items-center space-x-0.5">
                                                    @php
                                                        $avgRating = $businessUser->average_rating ?? 0;
                                                    @endphp
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <svg class="w-3 h-3 md:w-3.5 md:h-3.5 {{ $avgRating >= $i ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                        </svg>
                                                    @endfor
                                                </div>
                                                <span class="text-xs md:text-sm font-medium text-gray-700">{{ number_format($businessUser->average_rating, 1) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                @if($businessUser->description)
                                    <p class="text-gray-600 text-xs md:text-sm mb-2 md:mb-4 line-clamp-2 md:line-clamp-3">
                                        {{ Str::limit($businessUser->description, 80) }}
                                    </p>
                                @endif

                                <!-- Business Info - Hidden on mobile, shown on desktop -->
                                <div class="hidden md:block space-y-2 mb-4">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $businessUser->address }}, {{ $businessUser->neighborhood }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        {{ $businessUser->phone }}
                                    </div>
                                    @if($businessUser->email)
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            {{ $businessUser->email }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Stats - Hidden on mobile, shown on desktop -->
                                <div class="hidden md:flex items-center justify-between text-sm text-gray-500 mb-4">
                                    <span>{{ $businessUser->created_at->format('d.m.Y') }}</span>
                                    <span>{{ $businessUser->city }}</span>
                                </div>

                                <!-- Action Button -->
                                <a href="{{ route('businesses.show', $businessUser) }}" 
                                   class="block w-full bg-green-600 text-white text-center py-1.5 md:py-2 px-3 md:px-4 rounded-lg text-sm md:text-base font-medium hover:bg-green-700 transition-colors duration-200">
                                    Pogledaj biznis
                                </a>
                            </div>
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
                    Nema biznisa u vašem komšiluku
                </h3>
                <p class="text-gray-600 mb-6">
                    Trenutno nema registriranih biznisa u {{ $currentUser ? $currentUser->neighborhood : 'Nepoznato' }}, {{ $currentUser ? $currentUser->city : 'Nepoznato' }}.
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
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection