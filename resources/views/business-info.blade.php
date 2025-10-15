@extends('layouts.app')

@section('title', 'Za Biznis Korisnike - Moj Kraj')

@section('content')
<style>
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-8px);
}
</style>

<!-- Hero Section - Split Design -->
<section class="min-h-screen bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center min-h-screen py-20">
            <!-- Left Side - Content -->
            <div>
                <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold mb-6">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                    Za lokalne biznise
                </div>
                
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Rastite sa<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-600">vašom zajednicom</span>
                </h1>
                
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Postanite deo najveće mreže lokalnih biznisa. Bez provizija, bez skrivenih troškova. Samo vi i vaši komšije.
                </p>
                
                <div class="space-y-4 mb-10">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-lg text-gray-700">Besplatna registracija zauvek</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-lg text-gray-700">Direktan kontakt sa kupcima</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-lg text-gray-700">Kreiranje ponuda i promocija</span>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('business.register') }}" class="bg-green-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-green-700 transition-all duration-300 shadow-lg hover:shadow-xl text-center">
                        Započnite besplatno →
                    </a>
                    <a href="{{ route('business.login') }}" class="bg-gray-100 text-gray-900 px-8 py-4 rounded-xl font-bold hover:bg-gray-200 transition-all duration-300 text-center">
                        Prijavite se
                    </a>
                </div>
            </div>
            
            <!-- Right Side - Illustration/Stats -->
            <div class="relative">
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-3xl p-8 text-white hover-lift shadow-xl" style="animation: float 3s ease-in-out infinite;">
                        <div class="text-5xl mb-4">🏪</div>
                        <div class="text-4xl font-bold mb-2">500+</div>
                        <div class="text-green-100">Aktivnih biznisa</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl p-8 text-white hover-lift shadow-xl mt-12" style="animation: float 3s ease-in-out infinite 0.5s;">
                        <div class="text-5xl mb-4">👥</div>
                        <div class="text-4xl font-bold mb-2">10K+</div>
                        <div class="text-blue-100">Potencijalnih kupaca</div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl p-8 text-white hover-lift shadow-xl" style="animation: float 3s ease-in-out infinite 1s;">
                        <div class="text-5xl mb-4">📈</div>
                        <div class="text-4xl font-bold mb-2">150%</div>
                        <div class="text-purple-100">Rast prometa</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-500 to-red-500 rounded-3xl p-8 text-white hover-lift shadow-xl mt-12" style="animation: float 3s ease-in-out infinite 1.5s;">
                        <div class="text-5xl mb-4">⭐</div>
                        <div class="text-4xl font-bold mb-2">4.9</div>
                        <div class="text-orange-100">Prosečna ocena</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section - Icon Grid -->
<section class="py-24 bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Zašto izabrati Moj Kraj?</h2>
            <p class="text-xl text-gray-600">Sve što vam treba za uspešan lokalni biznis</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Benefit 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Besplatno zauvek</h3>
                <p class="text-gray-600 mb-4">
                    Nema mesečnih troškova, nema provizija na prodaju. Koristite sve funkcije potpuno besplatno.
                </p>
                <div class="inline-flex items-center text-green-600 font-semibold">
                    0% provizija
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            
            <!-- Benefit 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Lokalna publika</h3>
                <p class="text-gray-600 mb-4">
                    Budite vidljivi ljudima koji žive u vašem komšiluku i lako mogu doći do vas.
                </p>
                <div class="inline-flex items-center text-blue-600 font-semibold">
                    Ciljana dostava
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                </div>
            </div>
            
            <!-- Benefit 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Analitika i statistika</h3>
                <p class="text-gray-600 mb-4">
                    Pratite broj pregleda, lajkova i komentara na vašem biznis profilu i ponudama.
                </p>
                <div class="inline-flex items-center text-purple-600 font-semibold">
                    Uvidi u realnom vremenu
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
            
            <!-- Benefit 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Direktna komunikacija</h3>
                <p class="text-gray-600 mb-4">
                    Razgovarajte sa kupcima kroz komentare, odgovorite na pitanja i gradite poverenje.
                </p>
                <div class="inline-flex items-center text-orange-600 font-semibold">
                    Instant poruke
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
            </div>
            
            <!-- Benefit 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Kreirajte ponude</h3>
                <p class="text-gray-600 mb-4">
                    Objavljujte akcije, popuste i specijalne ponude za komšije. Povećajte prodaju kroz promocije.
                </p>
                <div class="inline-flex items-center text-red-600 font-semibold">
                    Neograničeno ponuda
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
            </div>
            
            <!-- Benefit 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Lako za korišćenje</h3>
                <p class="text-gray-600 mb-4">
                    Intuitivni interface bez komplikacija. Postavite biznis profil za 5 minuta.
                </p>
                <div class="inline-flex items-center text-indigo-600 font-semibold">
                    Brzo postavljanje
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Šta kažu naši korisnici</h2>
            <p class="text-xl text-gray-600">Priče uspešnih lokalnih biznisa</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 border-2 border-green-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                        M
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Marko Petrović</div>
                        <div class="text-sm text-gray-600">Kafić "Kod Marka"</div>
                    </div>
                </div>
                <div class="flex mb-4">
                    <span class="text-yellow-400 text-xl">★★★★★</span>
                </div>
                <p class="text-gray-700 italic">
                    "Od kada sam se registrovao na Moj Kraj, broj gostiju se udvostrucio. Komšije me sada lako pronađu i dolaze na kafu!"
                </p>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-8 border-2 border-blue-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                        J
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Jelena Nikolić</div>
                        <div class="text-sm text-gray-600">Cvetara "Ruža"</div>
                    </div>
                </div>
                <div class="flex mb-4">
                    <span class="text-yellow-400 text-xl">★★★★★</span>
                </div>
                <p class="text-gray-700 italic">
                    "Besplatno, jednostavno i efikasno. Naše ponude vide svi iz kraja. Prodaja je porasla za 50%!"
                </p>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8 border-2 border-purple-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                        D
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Dragan Jović</div>
                        <div class="text-sm text-gray-600">Pekara "Topli hleb"</div>
                    </div>
                </div>
                <div class="flex mb-4">
                    <span class="text-yellow-400 text-xl">★★★★★</span>
                </div>
                <p class="text-gray-700 italic">
                    "Odlična platforma! Direktan kontakt sa komšijama je neprocenjiv. Svima preporučujem!"
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-24 bg-gradient-to-r from-green-600 to-emerald-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Spremni ste za sledeći korak?
        </h2>
        <p class="text-xl text-green-100 mb-10">
            Registrujte svoj biznis za 5 minuta i počnite da rastete sa lokalnom zajednicom
        </p>
        
        <a href="{{ route('business.register') }}" class="inline-block bg-white text-green-600 px-12 py-5 rounded-xl font-bold hover:bg-green-50 transition-all duration-300 shadow-2xl hover:shadow-3xl hover:scale-105 text-lg">
            Registrujte se besplatno
            <span class="ml-2">→</span>
        </a>
        
        <p class="text-green-100 mt-6 text-sm">
            Bez kreditnih kartica • Aktivacija za 1 minut • Podrška 24/7
        </p>
    </div>
</section>

@endsection
