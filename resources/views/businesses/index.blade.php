@extends('layouts.user')

@section('title', 'Biznisi - Moj Kraj')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Biznisi u vašem komšiluku</h1>
        <p class="text-gray-600">
            Prikazani su biznisi iz {{ $user->neighborhood }}, {{ $user->city }}
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

    <!-- Businesses Grid -->
    @if($businesses->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($businesses as $business)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $business->title }}</h3>
                            @if($business->is_featured)
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    Istaknuto
                                </span>
                            @endif
                        </div>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $business->description }}</p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>{{ $business->businessUser->company_name }}</span>
                            <span>{{ $business->businessUser->business_type }}</span>
                        </div>
                        
                        @if($business->price)
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-lg font-semibold text-green-600">
                                    {{ number_format($business->price, 0, ',', '.') }} RSD
                                </span>
                                @if($business->discount_percentage)
                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        -{{ $business->discount_percentage }}%
                                    </span>
                                @endif
                            </div>
                        @endif
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>{{ $business->views }} pregleda</span>
                            <span>{{ $business->created_at->format('d.m.Y') }}</span>
                        </div>
                        
                        <a href="{{ route('businesses.show', $business) }}" 
                           class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
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
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Nema biznisa</h3>
            <p class="mt-1 text-sm text-gray-500">
                Trenutno nema biznisa u vašem komšiluku ({{ $user->neighborhood }}, {{ $user->city }}).
            </p>
        </div>
    @endif
</div>
@endsection