@extends('layouts.business')

@section('title', 'Biznis Dashboard - Moj Kraj')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <!-- Welcome Section -->
        <div class="bg-white overflow-hidden shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">
                    Dobrodošli, {{ $currentBusinessUser->contact_person }}!
                </h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Informacije o kompaniji:</h3>
                        <p class="text-gray-600"><strong>{{ $currentBusinessUser->company_name }}</strong></p>
                        <p class="text-gray-600">{{ $currentBusinessUser->business_type }}</p>
                        <p class="text-gray-600">{{ $currentBusinessUser->address }}, {{ $currentBusinessUser->neighborhood }}</p>
                        <p class="text-gray-600">{{ $currentBusinessUser->city }}</p>
                        @if($currentBusinessUser->website)
                            <p class="text-gray-600"><a href="{{ $currentBusinessUser->website }}" target="_blank" class="text-blue-600 hover:underline">{{ $currentBusinessUser->website }}</a></p>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Brze akcije:</h3>
                        <div class="space-y-2">
                            <a href="{{ route('businesses.create') }}" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors inline-block text-center">
                                Dodaj novi biznis
                            </a>
                            <a href="{{ route('offers.create') }}" class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors inline-block text-center">
                                Dodaj novu ponudu
                            </a>
                            <a href="{{ route('businesses.index') }}" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors inline-block text-center">
                                Pregledaj sve biznise
                            </a>
                            <a href="{{ route('offers.index') }}" class="w-full bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-orange-700 transition-colors inline-block text-center">
                                Pregledaj sve ponude
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Ukupno biznisa</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $businesses->total() }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Aktivni biznisi</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $businesses->where('is_active', true)->count() }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Ukupno ponuda</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $offers->total() }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-orange-500 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Aktivne ponude</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $offers->where('is_active', true)->count() }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Businesses -->
        <div class="bg-white shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Vaši najnoviji biznisi</h3>
                @if($businesses->count() > 0)
                    <div class="space-y-4">
                        @foreach($businesses as $business)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">{{ $business->title }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($business->description, 100) }}</p>
                                        <div class="mt-2 flex items-center space-x-4 text-xs text-gray-500">
                                            <span>{{ $business->views }} pregleda</span>
                                            <span>{{ $business->created_at->format('d.m.Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('businesses.show', $business) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            Pogledaj
                                        </a>
                                        <a href="{{ route('businesses.edit', $business) }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                            Uredi
                                        </a>
                                        <form method="POST" action="{{ route('businesses.destroy', $business) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj biznis?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Obriši
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Nema biznisa</h3>
                        <p class="mt-1 text-sm text-gray-500">Počnite da dodajete svoje biznise.</p>
                        <div class="mt-6">
                            <a href="{{ route('businesses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition-colors">
                                Dodaj prvi biznis
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Offers -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Vaše najnovije ponude</h3>
                @if($offers->count() > 0)
                    <div class="space-y-4">
                        @foreach($offers as $offer)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">{{ $offer->title }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($offer->description, 100) }}</p>
                                        <div class="mt-2 flex items-center space-x-4 text-xs text-gray-500">
                                            <span>{{ $offer->views }} pregleda</span>
                                            <span>{{ $offer->likes }} lajkova</span>
                                            <span>{{ $offer->created_at->format('d.m.Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('offers.show', $offer) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            Pogledaj
                                        </a>
                                        <a href="{{ route('offers.edit', $offer) }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                            Uredi
                                        </a>
                                        <form method="POST" action="{{ route('offers.destroy', $offer) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu ponudu?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Obriši
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Nema ponuda</h3>
                        <p class="mt-1 text-sm text-gray-500">Počnite da dodajete svoje ponude.</p>
                        <div class="mt-6">
                            <a href="{{ route('offers.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-purple-700 transition-colors">
                                Dodaj prvu ponudu
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection