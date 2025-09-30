<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uredi vest - Moj Kraj</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">Moj Kraj</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('news.show', $news) }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                        Nazad na vest
                    </a>
                    <a href="{{ route('dashboard') }}" class="text-gray-700 text-sm hover:text-blue-600">Dobrodošao, {{ $currentUser->name }}!</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                            Odjavi se
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Uredi vest</h1>
                <p class="mt-2 text-gray-600">Ažurirajte informacije o vašoj vesti</p>
            </div>

            <!-- Form -->
            <div class="bg-white shadow rounded-lg">
                <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')
                    
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-md">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Naslov vesti</label>
                        <input id="title" name="title" type="text" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('title', $news->title) }}">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Kategorija</label>
                        <select id="category" name="category" required 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Izaberite kategoriju</option>
                            <option value="opšte" {{ old('category', $news->category) == 'opšte' ? 'selected' : '' }}>Opšte</option>
                            <option value="dešavanja" {{ old('category', $news->category) == 'dešavanja' ? 'selected' : '' }}>Dešavanja</option>
                            <option value="bezbednost" {{ old('category', $news->category) == 'bezbednost' ? 'selected' : '' }}>Bezbednost</option>
                            <option value="zdravstvo" {{ old('category', $news->category) == 'zdravstvo' ? 'selected' : '' }}>Zdravstvo</option>
                            <option value="sport" {{ old('category', $news->category) == 'sport' ? 'selected' : '' }}>Sport</option>
                            <option value="kultura" {{ old('category', $news->category) == 'kultura' ? 'selected' : '' }}>Kultura</option>
                            <option value="ostalo" {{ old('category', $news->category) == 'ostalo' ? 'selected' : '' }}>Ostalo</option>
                        </select>
                    </div>

                    <!-- Summary -->
                    <div>
                        <label for="summary" class="block text-sm font-medium text-gray-700">Kratak sažetak (opciono)</label>
                        <textarea id="summary" name="summary" rows="3" 
                                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Kratak opis vesti...">{{ old('summary', $news->summary) }}</textarea>
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Sadržaj vesti</label>
                        <textarea id="content" name="content" rows="10" required 
                                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Opišite detaljno šta se dešava...">{{ old('content', $news->content) }}</textarea>
                    </div>

                    <!-- Current Images -->
                    @if($news->images && count($news->images) > 0)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Trenutne slike</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach($news->images as $image)
                                    <div class="relative">
                                        <img src="{{ Storage::url($image) }}" alt="Current image" class="w-full h-24 object-cover rounded">
                                    </div>
                                @endforeach
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Nove slike će zameniti trenutne slike.</p>
                        </div>
                    @endif

                    <!-- Images -->
                    <div>
                        <label for="images" class="block text-sm font-medium text-gray-700">Nove slike (opciono)</label>
                        <input id="images" name="images[]" type="file" multiple accept="image/*"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Možete odabrati više slika. Maksimalna veličina: 2MB po slici.</p>
                    </div>

                    <!-- Current Videos -->
                    @if($news->videos && count($news->videos) > 0)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Trenutni video zapisi</label>
                            <div class="space-y-2">
                                @foreach($news->videos as $video)
                                    <div class="flex items-center space-x-2">
                                        <video controls class="w-32 h-20 rounded">
                                            <source src="{{ Storage::url($video) }}" type="video/mp4">
                                        </video>
                                        <span class="text-sm text-gray-500">{{ basename($video) }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Novi video zapisi će zameniti trenutne video zapise.</p>
                        </div>
                    @endif

                    <!-- Videos -->
                    <div>
                        <label for="videos" class="block text-sm font-medium text-gray-700">Novi video zapisi (opciono)</label>
                        <input id="videos" name="videos[]" type="file" multiple accept="video/*"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Možete odabrati više video zapisa. Maksimalna veličina: 10MB po videu.</p>
                    </div>

                    <!-- Published Status -->
                    <div class="flex items-center">
                        <input id="is_published" name="is_published" type="checkbox" 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                               {{ old('is_published', $news->is_published) ? 'checked' : '' }}>
                        <label for="is_published" class="ml-2 block text-sm text-gray-900">
                            Objavi vest
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('news.show', $news) }}" 
                           class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Otkaži
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Ažuriraj vest
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
