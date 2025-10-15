@php
    // Determine which layout to use based on user type
    $isBusinessUser = auth('business')->check();
    $layoutName = $isBusinessUser ? 'layouts.business' : 'layouts.app';
@endphp

@extends($layoutName)

@section('title', $offer->title . ' - Moj Kraj')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('offers.index') }}" class="inline-flex items-center text-green-600 hover:text-green-800">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Nazad na ponude
        </a>
    </div>

    <!-- Offer Details -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Images -->
        @if($offer->images && count($offer->images) > 0)
            <div class="h-64 bg-gray-200">
                <img src="{{ Storage::url($offer->images[0]) }}" alt="{{ $offer->title }}" 
                     class="w-full h-full object-cover">
            </div>
        @else
            <div class="h-64 bg-gray-200 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif

        <!-- Content -->
        <div class="p-6">
            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $offer->title }}</h1>
            
            <!-- Business Info -->
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Biznis</p>
                    <p class="font-medium text-gray-900">{{ $offer->businessUser->company_name }}</p>
                </div>
            </div>

            <!-- Offer Type -->
            <div class="mb-4">
                <span class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full">
                    {{ ucfirst(str_replace('_', ' ', $offer->offer_type)) }}
                </span>
            </div>

            <!-- Price -->
            <div class="mb-4">
                @if($offer->discount_price)
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl font-bold text-green-600">{{ number_format($offer->discount_price, 0, ',', '.') }} RSD</span>
                        @if($offer->original_price)
                            <span class="text-lg text-gray-500 line-through">{{ number_format($offer->original_price, 0, ',', '.') }} RSD</span>
                        @endif
                    </div>
                    @if($offer->discount_percentage)
                        <p class="text-sm text-red-600 font-medium">{{ $offer->discount_percentage }} popusta!</p>
                    @endif
                @elseif($offer->original_price)
                    <span class="text-2xl font-bold text-green-600">{{ number_format($offer->original_price, 0, ',', '.') }} RSD</span>
                @endif
            </div>

            <!-- Description -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Opis ponude</h3>
                <p class="text-gray-700 leading-relaxed">{{ $offer->description }}</p>
            </div>

            <!-- Business Contact Info -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Kontakt informacije</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-700"><strong>Kompanija:</strong> {{ $offer->businessUser->company_name }}</p>
                    <p class="text-gray-700"><strong>Kontakt osoba:</strong> {{ $offer->businessUser->contact_person }}</p>
                    <p class="text-gray-700"><strong>Telefon:</strong> {{ $offer->businessUser->phone }}</p>
                    <p class="text-gray-700"><strong>Email:</strong> {{ $offer->businessUser->email }}</p>
                    @if($offer->businessUser->address)
                        <p class="text-gray-700"><strong>Adresa:</strong> {{ $offer->businessUser->address }}, {{ $offer->businessUser->neighborhood }}, {{ $offer->businessUser->city }}</p>
                    @endif
                </div>
            </div>

            <!-- Validity Period -->
            @if($offer->valid_from || $offer->valid_until)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Period važenja</h3>
                    <div class="bg-blue-50 rounded-lg p-4">
                        @if($offer->valid_from)
                            <p class="text-gray-700"><strong>Važi od:</strong> {{ \Carbon\Carbon::parse($offer->valid_from)->format('d.m.Y') }}</p>
                        @endif
                        @if($offer->valid_until)
                            <p class="text-gray-700"><strong>Važi do:</strong> {{ \Carbon\Carbon::parse($offer->valid_until)->format('d.m.Y') }}</p>
                        @endif
                        @if($offer->valid_time_from || $offer->valid_time_until)
                            <p class="text-gray-700">
                                <strong>Vreme:</strong> 
                                @if($offer->valid_time_from)
                                    {{ $offer->valid_time_from }}
                                @endif
                                @if($offer->valid_time_from && $offer->valid_time_until)
                                    - 
                                @endif
                                @if($offer->valid_time_until)
                                    {{ $offer->valid_time_until }}
                                @endif
                            </p>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Statistics -->
            <div class="mb-6">
                <div class="flex items-center space-x-6 text-sm text-gray-500">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{ $offer->views }} pregleda
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        {{ $offer->likes }} lajkova
                    </span>
                </div>
            </div>

            <!-- Created At -->
            <div class="text-sm text-gray-500 border-t pt-4">
                Objavljeno: {{ $offer->created_at->format('d.m.Y H:i') }}
            </div>
        </div>
    </div>
</div>
@endsection