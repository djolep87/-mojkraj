@extends('layouts.user')

@section('title', $business->title . ' - Moj Kraj')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('businesses.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Nazad na biznise
        </a>
    </div>

    <!-- Business Details -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Image -->
        @if($business->image)
            <div class="h-64 bg-gray-200">
                <img src="{{ Storage::url($business->image) }}" alt="{{ $business->title }}" 
                     class="w-full h-full object-cover">
            </div>
        @else
            <div class="h-64 bg-gray-200 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
        @endif

        <!-- Content -->
        <div class="p-6">
            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $business->title }}</h1>
            
            <!-- Business Info -->
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Biznis</p>
                    <p class="font-medium text-gray-900">{{ $business->businessUser->company_name }}</p>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Opis biznisa</h3>
                <p class="text-gray-700 leading-relaxed">{{ $business->description }}</p>
            </div>

            <!-- Contact Info -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Kontakt informacije</h3>
                <p class="text-gray-700">{{ $business->contact_info }}</p>
            </div>

            <!-- Address -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Adresa</h3>
                <p class="text-gray-700">{{ $business->address }}</p>
            </div>

            <!-- Created At -->
            <div class="text-sm text-gray-500">
                Registrovan: {{ $business->created_at->format('d.m.Y H:i') }}
            </div>
        </div>
    </div>
</div>
@endsection