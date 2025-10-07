@extends('layouts.auth')

@section('title', 'Registracija za pravna lica - Moj Kraj')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-50 via-white to-green-50 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/60"></div>
    <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23000000" fill-opacity="0.02"><circle cx="30" cy="30" r="2"/></g></svg></div>
    
    <div class="relative max-w-2xl w-full">
        <!-- Business Register Card -->
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-600 to-green-600 px-8 py-12 text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2">
                    Registrujte svoju kompaniju
                </h2>
                <p class="text-emerald-100">
                    Pridružite se business zajednici i počnite da reklamirate
                </p>
            </div>

            <!-- Form -->
            <div class="px-8 py-8">
                <form class="space-y-6" action="{{ route('business.register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Greška prilikom registracije</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Company Information Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Informacije o kompaniji
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Company Name -->
                            <div class="md:col-span-2">
                                <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Naziv kompanije *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <input id="company_name" name="company_name" type="text" required 
                                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('company_name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                           placeholder="Naziv vaše kompanije" value="{{ old('company_name') }}">
                                </div>
                                @error('company_name')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Contact Person -->
                            <div>
                                <label for="contact_person" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Kontakt osoba *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input id="contact_person" name="contact_person" type="text" required 
                                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('contact_person') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                           placeholder="Marko Petrović" value="{{ old('contact_person') }}">
                                </div>
                                @error('contact_person')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Telefon *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <input id="phone" name="phone" type="tel" required 
                                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('phone') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                           placeholder="+381 60 123 4567" value="{{ old('phone') }}">
                                </div>
                                @error('phone')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Business Type -->
                            <div class="md:col-span-2">
                                <label for="business_type" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Tip biznisa *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <select id="business_type" name="business_type" required 
                                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('business_type') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                                        <option value="">Izaberite tip biznisa</option>
                                        
                                        <!-- Hrana i piće -->
                                        <optgroup label="🍽️ Hrana i piće">
                                            <option value="Restoran" {{ old('business_type') == 'Restoran' ? 'selected' : '' }}>Restoran</option>
                                            <option value="Kafić" {{ old('business_type') == 'Kafić' ? 'selected' : '' }}>Kafić</option>
                                            <option value="Bakery" {{ old('business_type') == 'Bakery' ? 'selected' : '' }}>Pekara</option>
                                            <option value="Fast food" {{ old('business_type') == 'Fast food' ? 'selected' : '' }}>Fast food</option>
                                            <option value="Picerija" {{ old('business_type') == 'Picerija' ? 'selected' : '' }}>Picerija</option>
                                            <option value="Kafeterija" {{ old('business_type') == 'Kafeterija' ? 'selected' : '' }}>Kafeterija</option>
                                            <option value="Poslastičarnica" {{ old('business_type') == 'Poslastičarnica' ? 'selected' : '' }}>Poslastičarnica</option>
                                            <option value="Slatkiš" {{ old('business_type') == 'Slatkiš' ? 'selected' : '' }}>Slatkiš</option>
                                            <option value="Mesara" {{ old('business_type') == 'Mesara' ? 'selected' : '' }}>Mesara</option>
                                            <option value="Ribarnica" {{ old('business_type') == 'Ribarnica' ? 'selected' : '' }}>Ribarnica</option>
                                            <option value="Voćarnica" {{ old('business_type') == 'Voćarnica' ? 'selected' : '' }}>Voćarnica</option>
                                            <option value="Povrćarnica" {{ old('business_type') == 'Povrćarnica' ? 'selected' : '' }}>Povrćarnica</option>
                                            <option value="Mleko" {{ old('business_type') == 'Mleko' ? 'selected' : '' }}>Mlekara</option>
                                            <option value="Vinarija" {{ old('business_type') == 'Vinarija' ? 'selected' : '' }}>Vinarija</option>
                                            <option value="Pivara" {{ old('business_type') == 'Pivara' ? 'selected' : '' }}>Pivara</option>
                                        </optgroup>

                                        <!-- Prodavnice -->
                                        <optgroup label="🛍️ Prodavnice">
                                            <option value="Prodavnica" {{ old('business_type') == 'Prodavnica' ? 'selected' : '' }}>Prodavnica</option>
                                            <option value="Supermarket" {{ old('business_type') == 'Supermarket' ? 'selected' : '' }}>Supermarket</option>
                                            <option value="Minimarket" {{ old('business_type') == 'Minimarket' ? 'selected' : '' }}>Minimarket</option>
                                            <option value="Apoteka" {{ old('business_type') == 'Apoteka' ? 'selected' : '' }}>Apoteka</option>
                                            <option value="Drogerija" {{ old('business_type') == 'Drogerija' ? 'selected' : '' }}>Drogerija</option>
                                            <option value="Knjižara" {{ old('business_type') == 'Knjižara' ? 'selected' : '' }}>Knjižara</option>
                                            <option value="Cvećara" {{ old('business_type') == 'Cvećara' ? 'selected' : '' }}>Cvećara</option>
                                            <option value="Prodavnica odeće" {{ old('business_type') == 'Prodavnica odeće' ? 'selected' : '' }}>Prodavnica odeće</option>
                                            <option value="Obuvarnica" {{ old('business_type') == 'Obuvarnica' ? 'selected' : '' }}>Obuvarnica</option>
                                            <option value="Prodavnica igračaka" {{ old('business_type') == 'Prodavnica igračaka' ? 'selected' : '' }}>Prodavnica igračaka</option>
                                            <option value="Elektronika" {{ old('business_type') == 'Elektronika' ? 'selected' : '' }}>Prodavnica elektronike</option>
                                            <option value="Kucni aparati" {{ old('business_type') == 'Kucni aparati' ? 'selected' : '' }}>Kućni aparati</option>
                                            <option value="Mobilni telefoni" {{ old('business_type') == 'Mobilni telefoni' ? 'selected' : '' }}>Mobilni telefoni</option>
                                            <option value="Sport oprema" {{ old('business_type') == 'Sport oprema' ? 'selected' : '' }}>Sportska oprema</option>
                                            <option value="Kućni nameštaj" {{ old('business_type') == 'Kućni nameštaj' ? 'selected' : '' }}>Kućni nameštaj</option>
                                            <option value="Građevinski materijal" {{ old('business_type') == 'Građevinski materijal' ? 'selected' : '' }}>Građevinski materijal</option>
                                        </optgroup>

                                        <!-- Usluge -->
                                        <optgroup label="🔧 Usluge">
                                            <option value="Uslužni biznis" {{ old('business_type') == 'Uslužni biznis' ? 'selected' : '' }}>Uslužni biznis</option>
                                            <option value="Frizerski salon" {{ old('business_type') == 'Frizerski salon' ? 'selected' : '' }}>Frizerski salon</option>
                                            <option value="Kozmetički salon" {{ old('business_type') == 'Kozmetički salon' ? 'selected' : '' }}>Kozmetički salon</option>
                                            <option value="Manikir pedikir" {{ old('business_type') == 'Manikir pedikir' ? 'selected' : '' }}>Manikir i pedikir</option>
                                            <option value="Masaza" {{ old('business_type') == 'Masaza' ? 'selected' : '' }}>Masaza</option>
                                            <option value="Tatuaž" {{ old('business_type') == 'Tatuaž' ? 'selected' : '' }}>Tatuaž</option>
                                            <option value="Pralionica" {{ old('business_type') == 'Pralionica' ? 'selected' : '' }}>Pralionica</option>
                                            <option value="Čišćenje" {{ old('business_type') == 'Čišćenje' ? 'selected' : '' }}>Čišćenje</option>
                                            <option value="Klima servis" {{ old('business_type') == 'Klima servis' ? 'selected' : '' }}>Klima servis</option>
                                            <option value="Električar" {{ old('business_type') == 'Električar' ? 'selected' : '' }}>Električar</option>
                                            <option value="Vodoinstalater" {{ old('business_type') == 'Vodoinstalater' ? 'selected' : '' }}>Vodoinstalater</option>
                                            <option value="Molovanje" {{ old('business_type') == 'Molovanje' ? 'selected' : '' }}>Molovanje</option>
                                            <option value="Keramičar" {{ old('business_type') == 'Keramičar' ? 'selected' : '' }}>Keramičar</option>
                                            <option value="Stolar" {{ old('business_type') == 'Stolar' ? 'selected' : '' }}>Stolar</option>
                                            <option value="Bravar" {{ old('business_type') == 'Bravar' ? 'selected' : '' }}>Bravar</option>
                                            <option value="Krovopokrivač" {{ old('business_type') == 'Krovopokrivač' ? 'selected' : '' }}>Krovopokrivač</option>
                                        </optgroup>

                                        <!-- Zdravstvo i wellness -->
                                        <optgroup label="🏥 Zdravstvo i wellness">
                                            <option value="Zdravstvo" {{ old('business_type') == 'Zdravstvo' ? 'selected' : '' }}>Zdravstvo</option>
                                            <option value="Lekar" {{ old('business_type') == 'Lekar' ? 'selected' : '' }}>Lekar</option>
                                            <option value="Stomatolog" {{ old('business_type') == 'Stomatolog' ? 'selected' : '' }}>Stomatolog</option>
                                            <option value="Fizioterapeut" {{ old('business_type') == 'Fizioterapeut' ? 'selected' : '' }}>Fizioterapeut</option>
                                            <option value="Psiholog" {{ old('business_type') == 'Psiholog' ? 'selected' : '' }}>Psiholog</option>
                                            <option value="Nutricionista" {{ old('business_type') == 'Nutricionista' ? 'selected' : '' }}>Nutricionista</option>
                                            <option value="Terapeut" {{ old('business_type') == 'Terapeut' ? 'selected' : '' }}>Terapeut</option>
                                            <option value="Veterinar" {{ old('business_type') == 'Veterinar' ? 'selected' : '' }}>Veterinar</option>
                                            <option value="Fitness centar" {{ old('business_type') == 'Fitness centar' ? 'selected' : '' }}>Fitness centar</option>
                                            <option value="Yoga studio" {{ old('business_type') == 'Yoga studio' ? 'selected' : '' }}>Yoga studio</option>
                                            <option value="Pilates" {{ old('business_type') == 'Pilates' ? 'selected' : '' }}>Pilates</option>
                                            <option value="Sauna" {{ old('business_type') == 'Sauna' ? 'selected' : '' }}>Sauna</option>
                                        </optgroup>

                                        <!-- Edukacija i trening -->
                                        <optgroup label="📚 Edukacija i trening">
                                            <option value="Edukacija" {{ old('business_type') == 'Edukacija' ? 'selected' : '' }}>Edukacija</option>
                                            <option value="Privatni časovi" {{ old('business_type') == 'Privatni časovi' ? 'selected' : '' }}>Privatni časovi</option>
                                            <option value="Jezici" {{ old('business_type') == 'Jezici' ? 'selected' : '' }}>Kurs stranih jezika</option>
                                            <option value="Klavir" {{ old('business_type') == 'Klavir' ? 'selected' : '' }}>Klavir</option>
                                            <option value="Gitara" {{ old('business_type') == 'Gitara' ? 'selected' : '' }}>Gitara</option>
                                            <option value="Violina" {{ old('business_type') == 'Violina' ? 'selected' : '' }}>Violina</option>
                                            <option value="Balet" {{ old('business_type') == 'Balet' ? 'selected' : '' }}>Balet</option>
                                            <option value="Ples" {{ old('business_type') == 'Ples' ? 'selected' : '' }}>Ples</option>
                                            <option value="Karate" {{ old('business_type') == 'Karate' ? 'selected' : '' }}>Karate</option>
                                            <option value="Judo" {{ old('business_type') == 'Judo' ? 'selected' : '' }}>Judo</option>
                                            <option value="Tenis" {{ old('business_type') == 'Tenis' ? 'selected' : '' }}>Tenis</option>
                                            <option value="Fudbal" {{ old('business_type') == 'Fudbal' ? 'selected' : '' }}>Fudbal</option>
                                            <option value="Košarka" {{ old('business_type') == 'Košarka' ? 'selected' : '' }}>Košarka</option>
                                            <option value="Plivanje" {{ old('business_type') == 'Plivanje' ? 'selected' : '' }}>Plivanje</option>
                                        </optgroup>

                                        <!-- Automobili i transport -->
                                        <optgroup label="🚗 Automobili i transport">
                                            <option value="Automobili" {{ old('business_type') == 'Automobili' ? 'selected' : '' }}>Automobili</option>
                                            <option value="Auto servis" {{ old('business_type') == 'Auto servis' ? 'selected' : '' }}>Auto servis</option>
                                            <option value="Auto dijagnostika" {{ old('business_type') == 'Auto dijagnostika' ? 'selected' : '' }}>Auto dijagnostika</option>
                                            <option value="Vulkanizer" {{ old('business_type') == 'Vulkanizer' ? 'selected' : '' }}>Vulkanizer</option>
                                            <option value="Auto perionica" {{ old('business_type') == 'Auto perionica' ? 'selected' : '' }}>Auto perionica</option>
                                            <option value="Auto delovi" {{ old('business_type') == 'Auto delovi' ? 'selected' : '' }}>Auto delovi</option>
                                            <option value="Auto lakiranje" {{ old('business_type') == 'Auto lakiranje' ? 'selected' : '' }}>Auto lakiranje</option>
                                            <option value="Limarija" {{ old('business_type') == 'Limarija' ? 'selected' : '' }}>Limarija</option>
                                            <option value="Auto škola" {{ old('business_type') == 'Auto škola' ? 'selected' : '' }}>Auto škola</option>
                                            <option value="Taxi" {{ old('business_type') == 'Taxi' ? 'selected' : '' }}>Taxi</option>
                                            <option value="Prevoz" {{ old('business_type') == 'Prevoz' ? 'selected' : '' }}>Prevoz</option>
                                            <option value="Dostava" {{ old('business_type') == 'Dostava' ? 'selected' : '' }}>Dostava</option>
                                        </optgroup>

                                        <!-- Nekretnine i ugostiteljstvo -->
                                        <optgroup label="🏠 Nekretnine i ugostiteljstvo">
                                            <option value="Nekretnine" {{ old('business_type') == 'Nekretnine' ? 'selected' : '' }}>Nekretnine</option>
                                            <option value="Agencija za nekretnine" {{ old('business_type') == 'Agencija za nekretnine' ? 'selected' : '' }}>Agencija za nekretnine</option>
                                            <option value="Hoteli" {{ old('business_type') == 'Hoteli' ? 'selected' : '' }}>Hoteli</option>
                                            <option value="Pansioni" {{ old('business_type') == 'Pansioni' ? 'selected' : '' }}>Pansioni</option>
                                            <option value="Apartmani" {{ old('business_type') == 'Apartmani' ? 'selected' : '' }}>Apartmani</option>
                                            <option value="Sobe" {{ old('business_type') == 'Sobe' ? 'selected' : '' }}>Izdavanje soba</option>
                                            <option value="Turizam" {{ old('business_type') == 'Turizam' ? 'selected' : '' }}>Turizam</option>
                                            <option value="Turistička agencija" {{ old('business_type') == 'Turistička agencija' ? 'selected' : '' }}>Turistička agencija</option>
                                        </optgroup>

                                        <!-- Tehnologija i IT -->
                                        <optgroup label="💻 Tehnologija i IT">
                                            <option value="Tehnologija" {{ old('business_type') == 'Tehnologija' ? 'selected' : '' }}>Tehnologija</option>
                                            <option value="IT servis" {{ old('business_type') == 'IT servis' ? 'selected' : '' }}>IT servis</option>
                                            <option value="Web dizajn" {{ old('business_type') == 'Web dizajn' ? 'selected' : '' }}>Web dizajn</option>
                                            <option value="Softversko inženjerstvo" {{ old('business_type') == 'Softversko inženjerstvo' ? 'selected' : '' }}>Softversko inženjerstvo</option>
                                            <option value="Online marketing" {{ old('business_type') == 'Online marketing' ? 'selected' : '' }}>Online marketing</option>
                                            <option value="E-commerce" {{ old('business_type') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                                            <option value="Digitalna agencija" {{ old('business_type') == 'Digitalna agencija' ? 'selected' : '' }}>Digitalna agencija</option>
                                            <option value="Fotografija" {{ old('business_type') == 'Fotografija' ? 'selected' : '' }}>Fotografija</option>
                                            <option value="Video produkcija" {{ old('business_type') == 'Video produkcija' ? 'selected' : '' }}>Video produkcija</option>
                                        </optgroup>

                                        <!-- Mali proizvođači -->
                                        <optgroup label="🏭 Mali proizvođači">
                                            <option value="Mali proizvođači" {{ old('business_type') == 'Mali proizvođači' ? 'selected' : '' }}>Mali proizvođači</option>
                                            <option value="Domaci proizvodjaci" {{ old('business_type') == 'Domaci proizvodjaci' ? 'selected' : '' }}>Domaći proizvođači</option>
                                            <option value="Zanati" {{ old('business_type') == 'Zanati' ? 'selected' : '' }}>Zanati</option>
                                            <option value="Keramika" {{ old('business_type') == 'Keramika' ? 'selected' : '' }}>Keramika</option>
                                            <option value="Tekstil" {{ old('business_type') == 'Tekstil' ? 'selected' : '' }}>Tekstil</option>
                                            <option value="Koža" {{ old('business_type') == 'Koža' ? 'selected' : '' }}>Koža</option>
                                            <option value="Drvo" {{ old('business_type') == 'Drvo' ? 'selected' : '' }}>Drvo</option>
                                            <option value="Metal" {{ old('business_type') == 'Metal' ? 'selected' : '' }}>Metal</option>
                                            <option value="Kozmetika" {{ old('business_type') == 'Kozmetika' ? 'selected' : '' }}>Prirodna kozmetika</option>
                                            <option value="Med" {{ old('business_type') == 'Med' ? 'selected' : '' }}>Med</option>
                                            <option value="Rakija" {{ old('business_type') == 'Rakija' ? 'selected' : '' }}>Rakija</option>
                                            <option value="Sir" {{ old('business_type') == 'Sir' ? 'selected' : '' }}>Sir</option>
                                            <option value="Kobasice" {{ old('business_type') == 'Kobasice' ? 'selected' : '' }}>Kobasice</option>
                                        </optgroup>

                                        <!-- Online biznisi -->
                                        <optgroup label="🌐 Online biznisi">
                                            <option value="Online prodaja" {{ old('business_type') == 'Online prodaja' ? 'selected' : '' }}>Online prodaja</option>
                                            <option value="Dropshipping" {{ old('business_type') == 'Dropshipping' ? 'selected' : '' }}>Dropshipping</option>
                                            <option value="Afiliate marketing" {{ old('business_type') == 'Afiliate marketing' ? 'selected' : '' }}>Afiliate marketing</option>
                                            <option value="Online kursevi" {{ old('business_type') == 'Online kursevi' ? 'selected' : '' }}>Online kursevi</option>
                                            <option value="Freelancing" {{ old('business_type') == 'Freelancing' ? 'selected' : '' }}>Freelancing</option>
                                            <option value="YouTube" {{ old('business_type') == 'YouTube' ? 'selected' : '' }}>YouTube kanal</option>
                                            <option value="Podcast" {{ old('business_type') == 'Podcast' ? 'selected' : '' }}>Podcast</option>
                                            <option value="Blog" {{ old('business_type') == 'Blog' ? 'selected' : '' }}>Blog</option>
                                            <option value="Online konsultacije" {{ old('business_type') == 'Online konsultacije' ? 'selected' : '' }}>Online konsultacije</option>
                                            <option value="Virtualna pomoć" {{ old('business_type') == 'Virtualna pomoć' ? 'selected' : '' }}>Virtualna pomoć</option>
                                        </optgroup>

                                        <!-- Sport i rekreacija -->
                                        <optgroup label="⚽ Sport i rekreacija">
                                            <option value="Sport" {{ old('business_type') == 'Sport' ? 'selected' : '' }}>Sport</option>
                                            <option value="Teretana" {{ old('business_type') == 'Teretana' ? 'selected' : '' }}>Teretana</option>
                                            <option value="Sportski centar" {{ old('business_type') == 'Sportski centar' ? 'selected' : '' }}>Sportski centar</option>
                                            <option value="Bazen" {{ old('business_type') == 'Bazen' ? 'selected' : '' }}>Bazen</option>
                                            <option value="Skijanje" {{ old('business_type') == 'Skijanje' ? 'selected' : '' }}>Skijanje</option>
                                            <option value="Planinarenje" {{ old('business_type') == 'Planinarenje' ? 'selected' : '' }}>Planinarenje</option>
                                            <option value="Ribolov" {{ old('business_type') == 'Ribolov' ? 'selected' : '' }}>Ribolov</option>
                                            <option value="Lov" {{ old('business_type') == 'Lov' ? 'selected' : '' }}>Lov</option>
                                            <option value="Biciklizam" {{ old('business_type') == 'Biciklizam' ? 'selected' : '' }}>Biciklizam</option>
                                        </optgroup>

                                        <!-- Kultura i umetnost -->
                                        <optgroup label="🎨 Kultura i umetnost">
                                            <option value="Kultura" {{ old('business_type') == 'Kultura' ? 'selected' : '' }}>Kultura</option>
                                            <option value="Galerija" {{ old('business_type') == 'Galerija' ? 'selected' : '' }}>Galerija</option>
                                            <option value="Muzej" {{ old('business_type') == 'Muzej' ? 'selected' : '' }}>Muzej</option>
                                            <option value="Kazalište" {{ old('business_type') == 'Kazalište' ? 'selected' : '' }}>Kazalište</option>
                                            <option value="Kino" {{ old('business_type') == 'Kino' ? 'selected' : '' }}>Kino</option>
                                            <option value="Muzička škola" {{ old('business_type') == 'Muzička škola' ? 'selected' : '' }}>Muzička škola</option>
                                            <option value="Umjetnost" {{ old('business_type') == 'Umjetnost' ? 'selected' : '' }}>Umjetnost</option>
                                            <option value="Antikviteti" {{ old('business_type') == 'Antikviteti' ? 'selected' : '' }}>Antikviteti</option>
                                        </optgroup>

                                        <!-- Ostalo -->
                                        <optgroup label="🔧 Ostalo">
                                            <option value="Ostalo" {{ old('business_type') == 'Ostalo' ? 'selected' : '' }}>Ostalo</option>
                                            <option value="Advokatska kancelarija" {{ old('business_type') == 'Advokatska kancelarija' ? 'selected' : '' }}>Advokatska kancelarija</option>
                                            <option value="Računovodstvo" {{ old('business_type') == 'Računovodstvo' ? 'selected' : '' }}>Računovodstvo</option>
                                            <option value="Notar" {{ old('business_type') == 'Notar' ? 'selected' : '' }}>Notar</option>
                                            <option value="Osiguranje" {{ old('business_type') == 'Osiguranje' ? 'selected' : '' }}>Osiguranje</option>
                                            <option value="Banking" {{ old('business_type') == 'Banking' ? 'selected' : '' }}>Banking</option>
                                            <option value="Pohrana" {{ old('business_type') == 'Pohrana' ? 'selected' : '' }}>Pohrana</option>
                                            <option value="Benzinska pumpa" {{ old('business_type') == 'Benzinska pumpa' ? 'selected' : '' }}>Benzinska pumpa</option>
                                            <option value="Parking" {{ old('business_type') == 'Parking' ? 'selected' : '' }}>Parking</option>
                                        </optgroup>
                                    </select>
                                </div>
                                @error('business_type')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Opis kompanije
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3 left-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <textarea id="description" name="description" rows="4" 
                                              class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 resize-none @error('description') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                              placeholder="Kratko opišite vašu kompaniju, usluge i šta nudi komšiluku...">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <div class="mt-1 flex justify-between items-center">
                                    <p class="text-xs text-gray-500">
                                        Opciono polje - do 1000 karaktera
                                    </p>
                                    <span id="char-count" class="text-xs text-gray-400">0/1000</span>
                                </div>
                            </div>

                            <!-- Website -->
                            <div class="md:col-span-2">
                                <label for="website" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Website (opciono)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9" />
                                        </svg>
                                    </div>
                                    <input id="website" name="website" type="url" 
                                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('website') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                           placeholder="https://www.vasasajt.com" value="{{ old('website') }}">
                                </div>
                                @error('website')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">
                                    Unesite URL vašeg sajta (npr. https://www.vasasajt.com)
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Account Information Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Nalog informacije
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email adresa *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    <input id="email" name="email" type="email" required 
                                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('email') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
                                           placeholder="biznis@kompanija.com" value="{{ old('email') }}">
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

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Lozinka *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input id="password" name="password" type="password" required 
                                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('password') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
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

                            <!-- Password Confirmation -->
                            <div class="md:col-span-2">
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Potvrdite lozinku *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200" 
                                           placeholder="••••••••">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location Information Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Lokacija
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Adresa *
                                </label>
                                <input id="address" name="address" type="text" required 
                                       class="block w-full px-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('address') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" 
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

                            <!-- Neighborhood -->
                            <div>
                                <label for="neighborhood" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Deo grada *
                                </label>
                                <select id="neighborhood" name="neighborhood" required 
                                        class="block w-full px-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('neighborhood') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
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
                        </div>

                        <!-- City Field (Hidden - always Beograd) -->
                        <input type="hidden" name="city" value="Beograd">
                    </div>

                    <!-- Logo Upload Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Logo kompanije
                        </h3>
                        
                        <div>
                            <label for="logo" class="block text-sm font-semibold text-gray-700 mb-2">
                                Logo ili slika kompanije
                            </label>
                            <div id="drop-zone" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-emerald-400 transition-colors duration-200">
                                <div class="space-y-1 text-center">
                                    <!-- Image Preview -->
                                    <div id="image-preview" class="hidden mb-4">
                                        <img id="file-preview" src="" alt="Preview" class="mx-auto h-32 w-32 object-cover rounded-lg border border-gray-300">
                                        <p id="file-text" class="mt-2 text-sm text-gray-600"></p>
                                        <button type="button" id="remove-image" class="mt-2 text-sm text-red-600 hover:text-red-800">Ukloni sliku</button>
                                    </div>
                                    
                                    <!-- Upload Area -->
                                    <div id="upload-area">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="logo" class="relative cursor-pointer bg-white rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-emerald-500">
                                                <span>Uploadujte sliku</span>
                                                <input id="logo" name="logo" type="file" accept="image/*" 
                                                       class="sr-only @error('logo') border-red-500 @enderror">
                                            </label>
                                            <p class="pl-1">ili prevucite ovde</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF do 2MB
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @error('logo')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" id="submit-btn"
                                class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200 transform hover:scale-105 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                            <svg id="submit-icon" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <span id="submit-text">Registrujte kompaniju</span>
                            <svg id="loading-spinner" class="hidden w-5 h-5 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
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
                        Već imate business nalog? 
                        <a href="{{ route('business.login') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 transition-colors duration-200">
                            Prijavite se
                        </a>
                    </p>
                </div>

                <!-- Regular User Register -->
                <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl border border-blue-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-800">
                                <span class="font-semibold">Obični korisnik?</span>
                                <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-500 ml-1 transition-colors duration-200">
                                    Registrujte se kao obični korisnik
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // File upload preview
    const fileInput = document.getElementById('logo');
    const imagePreview = document.getElementById('image-preview');
    const uploadArea = document.getElementById('upload-area');
    const filePreview = document.getElementById('file-preview');
    const fileText = document.getElementById('file-text');
    const removeButton = document.getElementById('remove-image');
    const dropZone = document.getElementById('drop-zone');
    
    // Character counter for description
    const descriptionTextarea = document.getElementById('description');
    const charCount = document.getElementById('char-count');
    
    // Website validation
    const websiteInput = document.getElementById('website');
    
    if (fileInput && imagePreview && uploadArea && filePreview && fileText && removeButton) {
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Molimo izaberite sliku (PNG, JPG, GIF)');
                    return;
                }
                
                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Slika je prevelika. Maksimalna veličina je 2MB.');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.src = e.target.result;
                    fileText.textContent = file.name;
                    
                    // Show preview, hide upload area
                    imagePreview.classList.remove('hidden');
                    uploadArea.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
        
        // Remove image functionality
        removeButton.addEventListener('click', function() {
            fileInput.value = '';
            filePreview.src = '';
            fileText.textContent = '';
            
            // Hide preview, show upload area
            imagePreview.classList.add('hidden');
            uploadArea.classList.remove('hidden');
        });
    }
    
    // Drag and drop functionality
    if (dropZone) {
        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });
        
        // Highlight drop zone when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });
        
        // Handle dropped files
        dropZone.addEventListener('drop', handleDrop, false);
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        function highlight(e) {
            dropZone.classList.add('border-emerald-500', 'bg-emerald-50');
        }
        
        function unhighlight(e) {
            dropZone.classList.remove('border-emerald-500', 'bg-emerald-50');
        }
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                fileInput.files = files;
                // Trigger change event
                const event = new Event('change', { bubbles: true });
                fileInput.dispatchEvent(event);
            }
        }
    }
    
    // Character counter for description
    if (descriptionTextarea && charCount) {
        function updateCharCount() {
            const currentLength = descriptionTextarea.value.length;
            charCount.textContent = `${currentLength}/1000`;
            
            if (currentLength > 1000) {
                charCount.classList.add('text-red-500');
                charCount.classList.remove('text-gray-400');
            } else if (currentLength > 800) {
                charCount.classList.add('text-yellow-500');
                charCount.classList.remove('text-gray-400', 'text-red-500');
            } else {
                charCount.classList.add('text-gray-400');
                charCount.classList.remove('text-red-500', 'text-yellow-500');
            }
        }
        
        descriptionTextarea.addEventListener('input', updateCharCount);
        updateCharCount(); // Initial count
    }
    
    // Website validation
    if (websiteInput) {
        websiteInput.addEventListener('blur', function() {
            const url = this.value.trim();
            if (url && !isValidUrl(url)) {
                this.classList.add('border-red-500');
                this.classList.remove('border-gray-300');
                
                // Show error message
                let errorMsg = this.parentNode.querySelector('.url-error');
                if (!errorMsg) {
                    errorMsg = document.createElement('p');
                    errorMsg.className = 'url-error mt-2 text-sm text-red-600 flex items-center';
                    errorMsg.innerHTML = `
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Molimo unesite validan URL (npr. https://www.vasasajt.com)
                    `;
                    this.parentNode.appendChild(errorMsg);
                }
            } else {
                this.classList.remove('border-red-500');
                this.classList.add('border-gray-300');
                
                // Remove error message
                const errorMsg = this.parentNode.querySelector('.url-error');
                if (errorMsg) {
                    errorMsg.remove();
                }
            }
        });
        
        function isValidUrl(string) {
            try {
                new URL(string);
                return true;
            } catch (_) {
                return false;
            }
        }
    }
    
    // Form validation and loading state
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submit-btn');
    const submitIcon = document.getElementById('submit-icon');
    const submitText = document.getElementById('submit-text');
    const loadingSpinner = document.getElementById('loading-spinner');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('border-red-500');
                    isValid = false;
                } else {
                    field.classList.remove('border-red-500');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Molimo popunite sva obavezna polja.');
            } else {
                // Show loading state
                if (submitBtn && submitIcon && submitText && loadingSpinner) {
                    submitBtn.disabled = true;
                    submitIcon.classList.add('hidden');
                    loadingSpinner.classList.remove('hidden');
                    submitText.textContent = 'Registruje se...';
                }
            }
        });
    }
});
</script>
@endsection