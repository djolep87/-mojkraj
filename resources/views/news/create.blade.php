@extends('layouts.user')

@section('title', 'Nova vest - Moj Kraj')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Kreiraj novu vest</h1>
        <p class="text-gray-600">Podelite vesti sa komšijama u vašem komšiluku</p>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Naslov vesti *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror" 
                       placeholder="Unesite naslov vesti" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Sadržaj vesti *</label>
                <textarea name="content" id="content" rows="6" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror" 
                          placeholder="Napišite sadržaj vesti" required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategorija *</label>
                <select name="category" id="category" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror" 
                        required>
                    <option value="">Odaberite kategoriju</option>
                    <option value="opšte" {{ old('category') == 'opšte' ? 'selected' : '' }}>Opšte</option>
                    <option value="dešavanja" {{ old('category') == 'dešavanja' ? 'selected' : '' }}>Dešavanja</option>
                    <option value="bezbednost" {{ old('category') == 'bezbednost' ? 'selected' : '' }}>Bezbednost</option>
                    <option value="zdravstvo" {{ old('category') == 'zdravstvo' ? 'selected' : '' }}>Zdravstvo</option>
                    <option value="sport" {{ old('category') == 'sport' ? 'selected' : '' }}>Sport</option>
                    <option value="kultura" {{ old('category') == 'kultura' ? 'selected' : '' }}>Kultura</option>
                    <option value="ostalo" {{ old('category') == 'ostalo' ? 'selected' : '' }}>Ostalo</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Images -->
            <div class="mb-6">
                <label for="images[]" class="block text-sm font-medium text-gray-700 mb-2">Slike</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('images') border-red-500 @enderror">
                @error('images')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Možete odabrati više slika. Preporučena veličina: 800x600px</p>
            </div>

            <!-- Videos -->
            <div class="mb-6">
                <label for="videos[]" class="block text-sm font-medium text-gray-700 mb-2">Video snimci</label>
                <input type="file" name="videos[]" id="videos" accept="video/*" multiple 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('videos') border-red-500 @enderror">
                @error('videos')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Možete odabrati više video snimaka. Maksimalna veličina: 50MB</p>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('news.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Otkaži
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Objavi vest
                </button>
            </div>
        </form>
    </div>
</div>
@endsection