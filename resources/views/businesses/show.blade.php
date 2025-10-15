@php
    // Determine which layout to use based on user type
    $isBusinessUser = auth('business')->check();
    $layoutName = $isBusinessUser ? 'layouts.business' : 'layouts.app';
@endphp

@extends($layoutName)

@section('title', $businessUser->company_name . ' - Moj Kraj')

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
        <!-- Business Header -->
        <div class="h-64 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
            <div class="text-center text-white">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl font-bold">{{ substr($businessUser->company_name, 0, 1) }}</span>
                </div>
                <h1 class="text-3xl font-bold mb-2">{{ $businessUser->company_name }}</h1>
                <p class="text-lg opacity-90">{{ $businessUser->contact_person }}</p>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Business Type -->
            <div class="mb-6">
                <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                    {{ ucfirst(str_replace('_', ' ', $businessUser->business_type)) }}
                </span>
            </div>

            <!-- Description -->
            @if($businessUser->description)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">O biznisu</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $businessUser->description }}</p>
                </div>
            @endif

            <!-- Contact Info -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Kontakt informacije</h3>
                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-700 font-medium">{{ $businessUser->phone }}</span>
                    </div>
                    @if($businessUser->email)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-700 font-medium">{{ $businessUser->email }}</span>
                        </div>
                    @endif
                    @if($businessUser->website)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <a href="{{ $businessUser->website }}" target="_blank" class="text-green-600 hover:text-green-800 font-medium hover:underline">
                                {{ $businessUser->website }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Address -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Lokacija</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <p class="text-gray-700 font-medium">{{ $businessUser->address }}</p>
                            <p class="text-gray-600">{{ $businessUser->neighborhood }}, {{ $businessUser->city }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Created At -->
            <div class="text-sm text-gray-500 border-t pt-4">
                Registrovan: {{ $businessUser->created_at->format('d.m.Y H:i') }}
            </div>
        </div>
    </div>
</div>
@endsection