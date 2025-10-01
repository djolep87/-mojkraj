@extends('layouts.business')

@section('title', 'Kreiraj ponudu - Moj Kraj')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Kreiraj novu ponudu</h1>
        <p class="text-gray-600">Podelite svoju ponudu sa komšijama u vašem komšiluku</p>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg">
        <form action="{{ route('business.offers.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Naslov ponude *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('title') border-red-500 @enderror" 
                       placeholder="Unesite naslov ponude" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Opis ponude *</label>
                <textarea name="description" id="description" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-500 @enderror" 
                          placeholder="Detaljno opišite vašu ponudu" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Cena (RSD)</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('price') border-red-500 @enderror" 
                       placeholder="Unesite cenu u dinarima">
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Valid Until -->
            <div class="mb-6">
                <label for="valid_until" class="block text-sm font-medium text-gray-700 mb-2">Važi do</label>
                <input type="date" name="valid_until" id="valid_until" value="{{ old('valid_until') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('valid_until') border-red-500 @enderror">
                @error('valid_until')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Slika ponude</label>
                <input type="file" name="image" id="image" accept="image/*" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Preporučena veličina: 800x600px</p>
            </div>

            <!-- Contact Info -->
            <div class="mb-6">
                <label for="contact_info" class="block text-sm font-medium text-gray-700 mb-2">Kontakt informacije *</label>
                <input type="text" name="contact_info" id="contact_info" value="{{ old('contact_info') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('contact_info') border-red-500 @enderror" 
                       placeholder="Telefon, email ili adresa" required>
                @error('contact_info')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('business.dashboard') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Otkaži
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Kreiraj ponudu
                </button>
            </div>
        </form>
    </div>
</div>
@endsection