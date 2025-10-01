@extends('layouts.user')

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
        <!-- Image -->
        @if($offer->image)
            <div class="h-64 bg-gray-200">
                <img src="{{ Storage::url($offer->image) }}" alt="{{ $offer->title }}" 
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

            <!-- Price -->
            @if($offer->price)
                <div class="mb-4">
                    <span class="text-2xl font-bold text-green-600">{{ number_format($offer->price, 0, ',', '.') }} RSD</span>
                </div>
            @endif

            <!-- Description -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Opis ponude</h3>
                <p class="text-gray-700 leading-relaxed">{{ $offer->description }}</p>
            </div>

            <!-- Contact Info -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Kontakt informacije</h3>
                <p class="text-gray-700">{{ $offer->contact_info }}</p>
            </div>

            <!-- Valid Until -->
            @if($offer->valid_until)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Važi do</h3>
                    <p class="text-gray-700">{{ \Carbon\Carbon::parse($offer->valid_until)->format('d.m.Y') }}</p>
                </div>
            @endif

            <!-- Created At -->
            <div class="text-sm text-gray-500">
                Objavljeno: {{ $offer->created_at->format('d.m.Y H:i') }}
            </div>
        </div>
    </div>
</div>
@endsection