@extends('layouts.business')

@section('title', 'Uredi ponudu - Moj Kraj')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Uredi ponudu</h1>
        <p class="text-gray-600">Ažurirajte informacije o vašoj ponudi</p>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg">
        <form action="{{ route('offers.update', $offer) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Naslov ponude *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $offer->title) }}" 
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
                          placeholder="Detaljno opišite vašu ponudu" required>{{ old('description', $offer->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Offer Type -->
            <div class="mb-6">
                <label for="offer_type" class="block text-sm font-medium text-gray-700 mb-2">Tip ponude *</label>
                <select name="offer_type" id="offer_type" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('offer_type') border-red-500 @enderror" required>
                    <option value="">Izaberite tip ponude</option>
                    <option value="dnevna_ponuda" {{ old('offer_type', $offer->offer_type) == 'dnevna_ponuda' ? 'selected' : '' }}>Dnevna ponuda</option>
                    <option value="specijalna_ponuda" {{ old('offer_type', $offer->offer_type) == 'specijalna_ponuda' ? 'selected' : '' }}>Specijalna ponuda</option>
                    <option value="akcija" {{ old('offer_type', $offer->offer_type) == 'akcija' ? 'selected' : '' }}>Akcija</option>
                    <option value="popust" {{ old('offer_type', $offer->offer_type) == 'popust' ? 'selected' : '' }}>Popust</option>
                    <option value="ostalo" {{ old('offer_type', $offer->offer_type) == 'ostalo' ? 'selected' : '' }}>Ostalo</option>
                </select>
                @error('offer_type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategorija *</label>
                <select name="category" id="category" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('category') border-red-500 @enderror" required>
                    <option value="">Izaberite kategoriju</option>
                    <option value="hrana" {{ old('category', $offer->category) == 'hrana' ? 'selected' : '' }}>Hrana</option>
                    <option value="usluge" {{ old('category', $offer->category) == 'usluge' ? 'selected' : '' }}>Usluge</option>
                    <option value="proizvodi" {{ old('category', $offer->category) == 'proizvodi' ? 'selected' : '' }}>Proizvodi</option>
                    <option value="opšte" {{ old('category', $offer->category) == 'opšte' ? 'selected' : '' }}>Opšte</option>
                    <option value="ostalo" {{ old('category', $offer->category) == 'ostalo' ? 'selected' : '' }}>Ostalo</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Original Price -->
            <div class="mb-6">
                <label for="original_price" class="block text-sm font-medium text-gray-700 mb-2">Originalna cena (RSD)</label>
                <input type="number" name="original_price" id="original_price" value="{{ old('original_price', $offer->original_price) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('original_price') border-red-500 @enderror" 
                       placeholder="Unesite originalnu cenu u dinarima" step="0.01">
                @error('original_price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Discount Price -->
            <div class="mb-6">
                <label for="discount_price" class="block text-sm font-medium text-gray-700 mb-2">Cena sa popustom (RSD)</label>
                <input type="number" name="discount_price" id="discount_price" value="{{ old('discount_price', $offer->discount_price) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('discount_price') border-red-500 @enderror" 
                       placeholder="Unesite cenu sa popustom u dinarima" step="0.01">
                @error('discount_price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Discount Percentage -->
            <div class="mb-6">
                <label for="discount_percentage" class="block text-sm font-medium text-gray-700 mb-2">Procenat popusta</label>
                <input type="text" name="discount_percentage" id="discount_percentage" value="{{ old('discount_percentage', $offer->discount_percentage) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('discount_percentage') border-red-500 @enderror" 
                       placeholder="npr. 20% ili 20">
                @error('discount_percentage')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Valid From -->
            <div class="mb-6">
                <label for="valid_from" class="block text-sm font-medium text-gray-700 mb-2">Važi od</label>
                <input type="date" name="valid_from" id="valid_from" value="{{ old('valid_from', $offer->valid_from) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('valid_from') border-red-500 @enderror">
                @error('valid_from')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Valid Until -->
            <div class="mb-6">
                <label for="valid_until" class="block text-sm font-medium text-gray-700 mb-2">Važi do</label>
                <input type="date" name="valid_until" id="valid_until" value="{{ old('valid_until', $offer->valid_until) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('valid_until') border-red-500 @enderror">
                @error('valid_until')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Valid Time From -->
            <div class="mb-6">
                <label for="valid_time_from" class="block text-sm font-medium text-gray-700 mb-2">Vreme od</label>
                <input type="time" name="valid_time_from" id="valid_time_from" value="{{ old('valid_time_from', $offer->valid_time_from) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('valid_time_from') border-red-500 @enderror">
                @error('valid_time_from')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Valid Time Until -->
            <div class="mb-6">
                <label for="valid_time_until" class="block text-sm font-medium text-gray-700 mb-2">Vreme do</label>
                <input type="time" name="valid_time_until" id="valid_time_until" value="{{ old('valid_time_until', $offer->valid_time_until) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('valid_time_until') border-red-500 @enderror">
                @error('valid_time_until')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Images -->
            @if($offer->images && count($offer->images) > 0)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Trenutne slike</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($offer->images as $image)
                            <div class="relative">
                                <img src="{{ Storage::url($image) }}" alt="Slika ponude" class="w-full h-24 object-cover rounded-lg">
                                <div class="absolute top-1 right-1">
                                    <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Stara slika</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Nove slike će zameniti stare slike</p>
                </div>
            @endif

            <!-- Images -->
            <div class="mb-6">
                <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Nove slike ponude</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('images') border-red-500 @enderror">
                @error('images')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Možete izabrati više slika. Preporučena veličina: 800x600px</p>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('offers.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Otkaži
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Ažuriraj ponudu
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        console.log('Form submitted');
        
        // Check if required fields are filled
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const offerType = document.getElementById('offer_type').value;
        const category = document.getElementById('category').value;
        
        if (!title || !description || !offerType || !category) {
            e.preventDefault();
            alert('Molimo popunite sva obavezna polja.');
            return false;
        }
        
        // Show loading state
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Ažurira se ponuda...';
    });
});
</script>
@endpush
@endsection




