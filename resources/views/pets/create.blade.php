@extends('layouts.user')

@section('title', 'Kreiraj post o ljubimcu - Moj Kraj')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Kreiraj post o ljubimcu</h1>
            <p class="text-gray-600">Podelite informacije, upite ili usluge vezane za kućne ljubimce</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <form method="POST" action="{{ route('pets.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Naslov posta <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('title') border-red-500 @enderror"
                           placeholder="Npr. Tražim veterinara za mog psa">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Sadržaj <span class="text-red-500">*</span>
                    </label>
                    <textarea id="content" name="content" rows="6" required
                              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('content') border-red-500 @enderror"
                              placeholder="Opisite detaljno šta želite da podelite...">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Post Type and Pet Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Post Type -->
                    <div>
                        <label for="post_type" class="block text-sm font-medium text-gray-700 mb-2">
                            Tip posta <span class="text-red-500">*</span>
                        </label>
                        <select id="post_type" name="post_type" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('post_type') border-red-500 @enderror">
                            <option value="">Izaberite tip posta</option>
                            <option value="upit" {{ old('post_type') == 'upit' ? 'selected' : '' }}>Upit</option>
                            <option value="informacija" {{ old('post_type') == 'informacija' ? 'selected' : '' }}>Informacija</option>
                            <option value="prodaja" {{ old('post_type') == 'prodaja' ? 'selected' : '' }}>Prodaja</option>
                            <option value="usluga" {{ old('post_type') == 'usluga' ? 'selected' : '' }}>Usluga</option>
                            <option value="udomljavanje" {{ old('post_type') == 'udomljavanje' ? 'selected' : '' }}>Udomljavanje</option>
                        </select>
                        @error('post_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pet Type -->
                    <div>
                        <label for="pet_type" class="block text-sm font-medium text-gray-700 mb-2">
                            Tip ljubimca <span class="text-red-500">*</span>
                        </label>
                        <select id="pet_type" name="pet_type" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('pet_type') border-red-500 @enderror">
                            <option value="">Izaberite tip ljubimca</option>
                            <option value="pas" {{ old('pet_type') == 'pas' ? 'selected' : '' }}>Pas</option>
                            <option value="mačka" {{ old('pet_type') == 'mačka' ? 'selected' : '' }}>Mačka</option>
                            <option value="ptica" {{ old('pet_type') == 'ptica' ? 'selected' : '' }}>Ptica</option>
                            <option value="riba" {{ old('pet_type') == 'riba' ? 'selected' : '' }}>Riba</option>
                            <option value="ostalo" {{ old('pet_type') == 'ostalo' ? 'selected' : '' }}>Ostalo</option>
                        </select>
                        @error('pet_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pet Details -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Pet Breed -->
                    <div>
                        <label for="pet_breed" class="block text-sm font-medium text-gray-700 mb-2">
                            Rasa
                        </label>
                        <input type="text" id="pet_breed" name="pet_breed" value="{{ old('pet_breed') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                               placeholder="Npr. Zlatni retriver">
                        @error('pet_breed')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pet Age -->
                    <div>
                        <label for="pet_age" class="block text-sm font-medium text-gray-700 mb-2">
                            Starost
                        </label>
                        <input type="text" id="pet_age" name="pet_age" value="{{ old('pet_age') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                               placeholder="Npr. 2 godine">
                        @error('pet_age')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pet Gender -->
                    <div>
                        <label for="pet_gender" class="block text-sm font-medium text-gray-700 mb-2">
                            Pol
                        </label>
                        <select id="pet_gender" name="pet_gender"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="">Izaberite pol</option>
                            <option value="muški" {{ old('pet_gender') == 'muški' ? 'selected' : '' }}>Muški</option>
                            <option value="ženski" {{ old('pet_gender') == 'ženski' ? 'selected' : '' }}>Ženski</option>
                        </select>
                        @error('pet_gender')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                        Lokacija
                    </label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                           placeholder="Npr. Novi Beograd, Beograd">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Contact Phone -->
                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Kontakt telefon
                        </label>
                        <input type="tel" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                               placeholder="+381 60 123 4567">
                        @error('contact_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contact Email -->
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Kontakt email
                        </label>
                        <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                               placeholder="vas@email.com">
                        @error('contact_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Images -->
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                        Slike
                    </label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <p class="mt-1 text-sm text-gray-500">Možete dodati više slika (max 2MB po slici)</p>
                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Videos -->
                <div>
                    <label for="videos" class="block text-sm font-medium text-gray-700 mb-2">
                        Video snimci
                    </label>
                    <input type="file" id="videos" name="videos[]" multiple accept="video/*"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <p class="mt-1 text-sm text-gray-500">Možete dodati video snimke (max 10MB po videu)</p>
                    @error('videos.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Urgent -->
                <div class="flex items-center">
                    <input type="checkbox" id="is_urgent" name="is_urgent" value="1" {{ old('is_urgent') ? 'checked' : '' }}
                           class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                    <label for="is_urgent" class="ml-2 block text-sm text-gray-700">
                        Označite kao hitno
                    </label>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('pets.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        Otkaži
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:from-orange-600 hover:to-pink-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Kreiraj post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

