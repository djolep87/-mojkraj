<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registracija za pravna lica - Moj Kraj</title>
    
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
                    <a href="{{ route('business.login') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                        Prijavi se
                    </a>
                    <a href="{{ route('register') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                        Registracija za fizička lica
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Registration Form -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    Registracija za pravna lica
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Registrujte svoj biznis i počnite da delite reklame i ponude
                </p>
            </div>
            
            <form class="mt-8 space-y-6" method="POST" action="{{ route('business.register') }}">
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Company Name -->
                    <div class="md:col-span-2">
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Naziv kompanije</label>
                        <input id="company_name" name="company_name" type="text" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('company_name') }}">
                    </div>

                    <!-- Contact Person -->
                    <div>
                        <label for="contact_person" class="block text-sm font-medium text-gray-700">Kontakt osoba</label>
                        <input id="contact_person" name="contact_person" type="text" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('contact_person') }}">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email adresa</label>
                        <input id="email" name="email" type="email" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('email') }}">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telefon</label>
                        <input id="phone" name="phone" type="text" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('phone') }}">
                    </div>

                    <!-- Business Type -->
                    <div>
                        <label for="business_type" class="block text-sm font-medium text-gray-700">Tip biznisa</label>
                        <select id="business_type" name="business_type" required 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Izaberite tip biznisa</option>
                            <option value="restoran" {{ old('business_type') == 'restoran' ? 'selected' : '' }}>Restoran</option>
                            <option value="prodavnica" {{ old('business_type') == 'prodavnica' ? 'selected' : '' }}>Prodavnica</option>
                            <option value="usluga" {{ old('business_type') == 'usluga' ? 'selected' : '' }}>Usluga</option>
                            <option value="zdravstvo" {{ old('business_type') == 'zdravstvo' ? 'selected' : '' }}>Zdravstvo</option>
                            <option value="sport" {{ old('business_type') == 'sport' ? 'selected' : '' }}>Sport</option>
                            <option value="kultura" {{ old('business_type') == 'kultura' ? 'selected' : '' }}>Kultura</option>
                            <option value="ostalo" {{ old('business_type') == 'ostalo' ? 'selected' : '' }}>Ostalo</option>
                        </select>
                    </div>

                    <!-- Website -->
                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700">Website (opciono)</label>
                        <input id="website" name="website" type="url" 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               placeholder="https://www.example.com"
                               value="{{ old('website') }}">
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Adresa</label>
                        <input id="address" name="address" type="text" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('address') }}">
                    </div>

                    <!-- Neighborhood -->
                    <div>
                        <label for="neighborhood" class="block text-sm font-medium text-gray-700">Kraj/Deo grada</label>
                        <input id="neighborhood" name="neighborhood" type="text" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('neighborhood') }}">
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Grad</label>
                        <input id="city" name="city" type="text" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('city') }}">
                    </div>

                    <!-- Postal Code -->
                    <div>
                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Poštanski broj</label>
                        <input id="postal_code" name="postal_code" type="text" 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('postal_code') }}">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Lozinka</label>
                        <input id="password" name="password" type="password" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Password Confirmation -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Potvrdi lozinku</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Opis biznisa (opciono)</label>
                        <textarea id="description" name="description" rows="3" 
                                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Registruj biznis
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Već imaš biznis nalog? 
                        <a href="{{ route('business.login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Prijavi se ovde
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
