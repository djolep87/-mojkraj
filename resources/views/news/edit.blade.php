@extends('layouts.user')

@section('title', 'Uredi vest - Moj Kraj')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Uredi vest</h1>
        <p class="text-gray-600">Izmenite sadržaj vaše vesti</p>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg">
        <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Naslov vesti *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" 
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
                          placeholder="Napišite sadržaj vesti" required>{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Images -->
            @if($news->images->count() > 0)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Trenutne slike</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($news->images as $image)
                            <div class="relative">
                                <img src="{{ Storage::url($image->file_path) }}" alt="Slika" class="w-full h-24 object-cover rounded">
                                <button type="button" onclick="removeImage({{ $image->id }})" 
                                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600">
                                    ×
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- New Images -->
            <div class="mb-6">
                <label for="images[]" class="block text-sm font-medium text-gray-700 mb-2">Dodaj nove slike</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('images') border-red-500 @enderror">
                @error('images')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Možete odabrati više slika. Preporučena veličina: 800x600px</p>
            </div>

            <!-- Current Videos -->
            @if($news->videos->count() > 0)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Trenutni video snimci</label>
                    <div class="space-y-2">
                        @foreach($news->videos as $video)
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                <span class="text-sm text-gray-700">{{ basename($video->file_path) }}</span>
                                <button type="button" onclick="removeVideo({{ $video->id }})" 
                                        class="text-red-500 hover:text-red-700 text-sm">
                                    Ukloni
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- New Videos -->
            <div class="mb-6">
                <label for="videos[]" class="block text-sm font-medium text-gray-700 mb-2">Dodaj nove video snimke</label>
                <input type="file" name="videos[]" id="videos" accept="video/*" multiple 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('videos') border-red-500 @enderror">
                @error('videos')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Možete odabrati više video snimaka. Maksimalna veličina: 50MB</p>
            </div>

            <!-- Anonymous Option -->
            <div class="mb-6">
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-900 mb-1">Anonimno objavljivanje</h3>
                            <p class="text-sm text-gray-600">Ako uključite ovu opciju, vaše ime i prezime neće biti prikazano uz vest</p>
                        </div>
                        <div class="ml-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_anonymous" value="1" 
                                       class="sr-only peer" 
                                       {{ old('is_anonymous', $news->is_anonymous) ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('news.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Otkaži
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Sačuvaj izmene
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function removeImage(imageId) {
    if (confirm('Da li ste sigurni da želite da uklonite ovu sliku?')) {
        // Add hidden input to mark image for deletion
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'remove_images[]';
        input.value = imageId;
        document.querySelector('form').appendChild(input);
        
        // Remove the image element
        event.target.closest('.relative').remove();
    }
}

function removeVideo(videoId) {
    if (confirm('Da li ste sigurni da želite da uklonite ovaj video?')) {
        // Add hidden input to mark video for deletion
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'remove_videos[]';
        input.value = videoId;
        document.querySelector('form').appendChild(input);
        
        // Remove the video element
        event.target.closest('.flex').remove();
    }
}
</script>
@endsection