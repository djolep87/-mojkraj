@extends('layouts.auth')

@section('title', 'Registracija - Moj Kraj')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 via-white to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/60"></div>
    <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23000000" fill-opacity="0.02"><circle cx="30" cy="30" r="2"/></g></svg></div>
    
    <div class="relative max-w-lg w-full">
        <!-- Register Card -->
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-green-600 to-blue-600 px-8 py-12 text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2">
                    Pridružite se komšiluku
                </h2>
                <p class="text-green-100">
                    Registrujte se da vidite sadržaj iz vašeg dela grada
                </p>
            </div>

            <!-- Form -->
            <div class="px-8 py-8">
                <form class="space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Ime i prezime
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input id="name" name="name" type="text" required 
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="Marko Petrović" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email adresa
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('email') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="marko@email.com" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                Lozinka
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" autocomplete="new-password" required 
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('password') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                       placeholder="••••••••">
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                                Potvrdite lozinku
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200" 
                                       placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <!-- Location Fields -->
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Lokacija
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Adresa
                                </label>
                                <input id="address" name="address" type="text" required 
                                       class="block w-full px-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('address') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                       placeholder="Knez Mihailova 1" value="{{ old('address') }}">
                                @error('address')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="neighborhood" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Komšiluk/Deo grada
                                </label>
                                <select id="neighborhood" name="neighborhood" required 
                                        class="block w-full px-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('neighborhood') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                                    <option value="">Izaberite deo grada</option>
                                    <option value="Vračar" {{ old('neighborhood') == 'Vračar' ? 'selected' : '' }}>Vračar</option>
                                    <option value="Stari grad" {{ old('neighborhood') == 'Stari grad' ? 'selected' : '' }}>Stari grad</option>
                                    <option value="Zvezdara" {{ old('neighborhood') == 'Zvezdara' ? 'selected' : '' }}>Zvezdara</option>
                                    <option value="Palilula" {{ old('neighborhood') == 'Palilula' ? 'selected' : '' }}>Palilula</option>
                                    <option value="Zemun" {{ old('neighborhood') == 'Zemun' ? 'selected' : '' }}>Zemun</option>
                                    <option value="Novi Beograd" {{ old('neighborhood') == 'Novi Beograd' ? 'selected' : '' }}>Novi Beograd</option>
                                    <option value="Savski venac" {{ old('neighborhood') == 'Savski venac' ? 'selected' : '' }}>Savski venac</option>
                                    <option value="Voždovac" {{ old('neighborhood') == 'Voždovac' ? 'selected' : '' }}>Voždovac</option>
                                    <option value="Rakovica" {{ old('neighborhood') == 'Rakovica' ? 'selected' : '' }}>Rakovica</option>
                                    <option value="Čukarica" {{ old('neighborhood') == 'Čukarica' ? 'selected' : '' }}>Čukarica</option>
                                    <option value="Grocka" {{ old('neighborhood') == 'Grocka' ? 'selected' : '' }}>Grocka</option>
                                    <option value="Barajevo" {{ old('neighborhood') == 'Barajevo' ? 'selected' : '' }}>Barajevo</option>
                                    <option value="Obrenovac" {{ old('neighborhood') == 'Obrenovac' ? 'selected' : '' }}>Obrenovac</option>
                                    <option value="Lazarevac" {{ old('neighborhood') == 'Lazarevac' ? 'selected' : '' }}>Lazarevac</option>
                                    <option value="Mladenovac" {{ old('neighborhood') == 'Mladenovac' ? 'selected' : '' }}>Mladenovac</option>
                                    <option value="Sopot" {{ old('neighborhood') == 'Sopot' ? 'selected' : '' }}>Sopot</option>
                                    <option value="Surčin" {{ old('neighborhood') == 'Surčin' ? 'selected' : '' }}>Surčin</option>
                                    <option value="Zemun Polje" {{ old('neighborhood') == 'Zemun Polje' ? 'selected' : '' }}>Zemun Polje</option>
                                    <option value="Batajnica" {{ old('neighborhood') == 'Batajnica' ? 'selected' : '' }}>Batajnica</option>
                                    <option value="Karaburma" {{ old('neighborhood') == 'Karaburma' ? 'selected' : '' }}>Karaburma</option>
                                    <option value="Ripanj" {{ old('neighborhood') == 'Ripanj' ? 'selected' : '' }}>Ripanj</option>
                                    <option value="Beli Potok" {{ old('neighborhood') == 'Beli Potok' ? 'selected' : '' }}>Beli Potok</option>
                                    <option value="Leštane" {{ old('neighborhood') == 'Leštane' ? 'selected' : '' }}>Leštane</option>
                                    <option value="Vrčin" {{ old('neighborhood') == 'Vrčin' ? 'selected' : '' }}>Vrčin</option>
                                    <option value="Umka" {{ old('neighborhood') == 'Umka' ? 'selected' : '' }}>Umka</option>
                                    <option value="Veliko Selo" {{ old('neighborhood') == 'Veliko Selo' ? 'selected' : '' }}>Veliko Selo</option>
                                    <option value="Kovilovo" {{ old('neighborhood') == 'Kovilovo' ? 'selected' : '' }}>Kovilovo</option>
                                    <option value="Resnik" {{ old('neighborhood') == 'Resnik' ? 'selected' : '' }}>Resnik</option>
                                    <option value="Mirijevo" {{ old('neighborhood') == 'Mirijevo' ? 'selected' : '' }}>Mirijevo</option>
                                    <option value="Višnjica" {{ old('neighborhood') == 'Višnjica' ? 'selected' : '' }}>Višnjica</option>
                                    <option value="Sremčica" {{ old('neighborhood') == 'Sremčica' ? 'selected' : '' }}>Sremčica</option>
                                    <option value="Železnik" {{ old('neighborhood') == 'Železnik' ? 'selected' : '' }}>Železnik</option>
                                    <option value="Skojevsko naselje" {{ old('neighborhood') == 'Skojevsko naselje' ? 'selected' : '' }}>Skojevsko naselje</option>
                                    <option value="Banovo brdo" {{ old('neighborhood') == 'Banovo brdo' ? 'selected' : '' }}>Banovo brdo</option>
                                    <option value="Senjak" {{ old('neighborhood') == 'Senjak' ? 'selected' : '' }}>Senjak</option>
                                    <option value="Dedinje" {{ old('neighborhood') == 'Dedinje' ? 'selected' : '' }}>Dedinje</option>
                                    <option value="Dorćol" {{ old('neighborhood') == 'Dorćol' ? 'selected' : '' }}>Dorćol</option>
                                    <option value="Medaković" {{ old('neighborhood') == 'Medaković' ? 'selected' : '' }}>Medaković</option>
                                    <option value="Konjarnik" {{ old('neighborhood') == 'Konjarnik' ? 'selected' : '' }}>Konjarnik</option>
                                    <option value="Braće Jerković" {{ old('neighborhood') == 'Braće Jerković' ? 'selected' : '' }}>Braće Jerković</option>
                                    <option value="Jajinci" {{ old('neighborhood') == 'Jajinci' ? 'selected' : '' }}>Jajinci</option>
                                    <option value="Kumodraž" {{ old('neighborhood') == 'Kumodraž' ? 'selected' : '' }}>Kumodraž</option>
                                </select>
                                @error('neighborhood')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- City Field (Hidden - always Beograd) -->
                            <input type="hidden" name="city" value="Beograd">

                            <div>
                                <label for="postal_code" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Poštanski broj
                                </label>
                                <input id="postal_code" name="postal_code" type="text" 
                                       class="block w-full px-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 @error('postal_code') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                       placeholder="11000" value="{{ old('postal_code') }}">
                                @error('postal_code')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Registrujte se
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">ili</span>
                        </div>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Već imate nalog? 
                        <a href="{{ route('login') }}" class="font-semibold text-green-600 hover:text-green-500 transition-colors duration-200">
                            Prijavite se ovde
                        </a>
                    </p>
                </div>

                <!-- Business Register -->
                <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl border border-blue-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-800">
                                <span class="font-semibold">Imate biznis?</span>
                                <a href="{{ route('business.register') }}" class="font-semibold text-blue-600 hover:text-blue-500 ml-1 transition-colors duration-200">
                                    Registrujte se kao biznis korisnik
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Nazad na početnu
            </a>
        </div>
    </div>
</div>
@endsection