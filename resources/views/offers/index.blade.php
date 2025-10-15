@php
    // Determine which layout to use based on user type
    $isBusinessUser = auth('business')->check();
    $layoutName = $isBusinessUser ? 'layouts.business' : 'layouts.app';
@endphp

@extends($layoutName)

@section('title', 'Ponude - Moj Kraj')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        @if($businessUser)
            <div class="flex items-center mb-4">
                <a href="{{ route('businesses.list') }}" class="text-blue-600 hover:text-blue-800 mr-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <span class="text-gray-500">← Nazad na sve biznise</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                Ponude od {{ $businessUser->company_name }}
            </h1>
            <p class="text-gray-600">
                Prikazane su ponude od {{ $businessUser->company_name }} iz {{ $currentUser ? $currentUser->neighborhood : 'Nepoznato' }}, {{ $currentUser ? $currentUser->city : 'Nepoznato' }}
            </p>
        @else
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Ponude u vašem komšiluku</h1>
            <p class="text-gray-600">
                Prikazane su ponude iz {{ $currentUser ? $currentUser->neighborhood : 'Nepoznato' }}, {{ $currentUser ? $currentUser->city : 'Nepoznato' }}
            </p>
        @endif
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

    <!-- Offers Grid -->
    @if($offers->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($offers as $offer)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    @if($offer->images && count($offer->images) > 0)
                        <a href="{{ route('offers.show', $offer) }}" class="block">
                            <img src="{{ Storage::url($offer->images[0]) }}" alt="{{ $offer->title }}" class="w-full h-48 object-cover hover:opacity-90 transition-opacity cursor-pointer">
                        </a>
                    @else
                        <a href="{{ route('offers.show', $offer) }}" class="block">
                            <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center hover:from-blue-200 hover:to-blue-300 transition-colors cursor-pointer">
                                <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                        </a>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $offer->title }}</h3>
                            @if($offer->is_featured)
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    Istaknuto
                                </span>
                            @endif
                        </div>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $offer->description }}</p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>{{ $offer->businessUser->company_name }}</span>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">
                                {{ ucfirst(str_replace('_', ' ', $offer->offer_type)) }}
                            </span>
                        </div>
                        
                        @if($offer->original_price || $offer->discount_price)
                            <div class="flex items-center justify-between mb-4">
                                @if($offer->discount_price)
                                    <div class="flex items-center space-x-2">
                                        <span class="text-lg font-semibold text-green-600">
                                            {{ number_format($offer->discount_price, 0, ',', '.') }} RSD
                                        </span>
                                        @if($offer->original_price)
                                            <span class="text-sm text-gray-500 line-through">
                                                {{ number_format($offer->original_price, 0, ',', '.') }} RSD
                                            </span>
                                        @endif
                                    </div>
                                @elseif($offer->original_price)
                                    <span class="text-lg font-semibold text-gray-900">
                                        {{ number_format($offer->original_price, 0, ',', '.') }} RSD
                                    </span>
                                @endif
                                
                                @if($offer->discount_percentage)
                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        -{{ $offer->discount_percentage }}%
                                    </span>
                                @endif
                            </div>
                        @endif
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>{{ $offer->views }} pregleda</span>
                            <span>{{ $offer->likes }} lajkova</span>
                            <span>{{ $offer->created_at->format('d.m.Y') }}</span>
                        </div>
                        
                        <div class="flex space-x-2">
                            <a href="{{ route('offers.show', $offer) }}" 
                               class="flex-1 bg-blue-600 text-white text-center py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                Pogledaj
                            </a>
                            
                            @if($isBusinessUser && $currentBusinessUser && $offer->business_user_id == $currentBusinessUser->id)
                                <a href="{{ route('offers.edit', $offer) }}" 
                                   class="bg-green-600 text-white py-2 px-3 rounded-md hover:bg-green-700 transition-colors" 
                                   title="Uredi ponudu">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('offers.destroy', $offer) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu ponudu?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-600 text-white py-2 px-3 rounded-md hover:bg-red-700 transition-colors" 
                                            title="Obriši ponudu">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-8">
            {{ $offers->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Nema ponuda</h3>
            <p class="mt-1 text-sm text-gray-500">
                Trenutno nema ponuda u vašem komšiluku ({{ $currentUser ? $currentUser->neighborhood : 'Nepoznato' }}, {{ $currentUser ? $currentUser->city : 'Nepoznato' }}).
            </p>
        </div>
    @endif
</div>
@endsection