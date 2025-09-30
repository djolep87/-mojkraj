<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova vest - Moj Kraj</title>
    
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
                    <a href="{{ route('news.index') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                        Nazad na vesti
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
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            
            <!-- Error Message -->
            @if(session('error'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Nova vest</h1>
                <p class="mt-2 text-gray-600">Podelite vesti iz vašeg komšiluka</p>
            </div>

            <!-- Form -->
            <div class="bg-white shadow rounded-lg">
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    
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
                               value="{{ old('title') }}">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Kategorija</label>
                        <select id="category" name="category" required 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Izaberite kategoriju</option>
                            <option value="opšte" {{ old('category') == 'opšte' ? 'selected' : '' }}>Opšte</option>
                            <option value="dešavanja" {{ old('category') == 'dešavanja' ? 'selected' : '' }}>Dešavanja</option>
                            <option value="bezbednost" {{ old('category') == 'bezbednost' ? 'selected' : '' }}>Bezbednost</option>
                            <option value="zdravstvo" {{ old('category') == 'zdravstvo' ? 'selected' : '' }}>Zdravstvo</option>
                            <option value="sport" {{ old('category') == 'sport' ? 'selected' : '' }}>Sport</option>
                            <option value="kultura" {{ old('category') == 'kultura' ? 'selected' : '' }}>Kultura</option>
                            <option value="ostalo" {{ old('category') == 'ostalo' ? 'selected' : '' }}>Ostalo</option>
                        </select>
                    </div>

                    <!-- Summary -->
                    <div>
                        <label for="summary" class="block text-sm font-medium text-gray-700">Kratak sažetak (opciono)</label>
                        <textarea id="summary" name="summary" rows="3" 
                                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Kratak opis vesti...">{{ old('summary') }}</textarea>
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Sadržaj vesti</label>
                        <textarea id="content" name="content" rows="10" required 
                                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Opišite detaljno šta se dešava...">{{ old('content') }}</textarea>
                    </div>

                    <!-- Images -->
                    <div>
                        <label for="images" class="block text-sm font-medium text-gray-700">Slike (opciono)</label>
                        <input id="images" name="images[]" type="file" multiple accept="image/*"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Možete odabrati više slika. Maksimalna veličina: 2MB po slici.</p>
                    </div>

                    <!-- Videos -->
                    <div>
                        <label for="videos" class="block text-sm font-medium text-gray-700">Video zapisi (opciono)</label>
                        <input id="videos" name="videos[]" type="file" multiple accept="video/*"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Možete odabrati više video zapisa. Maksimalna veličina: 10MB po videu.</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('news.index') }}" 
                           class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Otkaži
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Objavi vest
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
