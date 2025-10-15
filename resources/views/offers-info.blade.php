@extends('layouts.app')

@section('title', 'Ponude - Moj Kraj')

@section('content')
<style>
@keyframes shine {
    0% { background-position: -200% center; }
    100% { background-position: 200% center; }
}

.shine-effect {
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    background-size: 200% 100%;
    animation: shine 3s infinite;
}

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(139, 92, 246, 0.5); }
    50% { box-shadow: 0 0 40px rgba(139, 92, 246, 0.8); }
}

.deal-badge {
    animation: pulse-glow 2s ease-in-out infinite;
}
</style>

<!-- Hero - E-commerce Style -->
<section class="relative bg-gradient-to-r from-purple-900 via-purple-800 to-indigo-900 overflow-hidden">
    <!-- Geometric Patterns -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-pink-300 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <!-- Badge -->
                <div class="inline-flex items-center bg-purple-500/30 backdrop-blur-sm px-5 py-2 rounded-full text-purple-100 font-semibold mb-8 border border-purple-400/50">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
                    </svg>
                    Ekskluzivne ponude
                </div>
                
                <h1 class="text-5xl md:text-6xl font-black text-white mb-6 leading-tight">
                    Uštedite novac<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-pink-300">
                        u komšiluku
                    </span>
                </h1>
                
                <p class="text-xl text-purple-100 mb-8 leading-relaxed">
                    Otkrijte najbolje ponude, popuste do 70% i ekskluzivne deals od lokalnih biznisa. Samo za komšije!
                </p>
                
                <!-- Stats Bar -->
                <div class="grid grid-cols-3 gap-4 mb-10">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-300 mb-1">300+</div>
                        <div class="text-purple-200 text-sm">Aktivnih ponuda</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-300 mb-1">70%</div>
                        <div class="text-purple-200 text-sm">Maks. popust</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-300 mb-1">24/7</div>
                        <div class="text-purple-200 text-sm">Nove ponude</div>
                    </div>
                </div>
                
                <a href="{{ route('offers.index') }}" class="inline-flex items-center bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-10 py-5 rounded-2xl font-bold text-lg hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 shadow-2xl hover:scale-105">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Pregledaj sve ponude
                </a>
            </div>
            
            <!-- Right - Deal Cards -->
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Deal Card 1 -->
                    <div class="deal-badge bg-white rounded-3xl p-6 transform rotate-3 hover:rotate-0 transition-all duration-300">
                        <div class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-3">
                            -50% POPUST
                        </div>
                        <div class="text-2xl font-bold text-gray-900 mb-2">Kafić</div>
                        <div class="text-gray-600 text-sm mb-3">Svaka druga kafa gratis!</div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-purple-600">150 RSD</span>
                            <span class="text-sm text-gray-400 line-through">300 RSD</span>
                        </div>
                    </div>
                    
                    <!-- Deal Card 2 -->
                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-3xl p-6 transform -rotate-2 hover:rotate-0 transition-all duration-300 mt-8">
                        <div class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-3">
                            -30% AKCIJA
                        </div>
                        <div class="text-2xl font-bold text-gray-900 mb-2">Pekara</div>
                        <div class="text-gray-600 text-sm mb-3">Dnevna akcija na sve proizvode</div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-green-600">70 RSD</span>
                            <span class="text-sm text-gray-400 line-through">100 RSD</span>
                        </div>
                    </div>
                    
                    <!-- Deal Card 3 -->
                    <div class="bg-gradient-to-br from-yellow-100 to-orange-100 rounded-3xl p-6 transform rotate-2 hover:rotate-0 transition-all duration-300">
                        <div class="bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-3">
                            NOVO
                        </div>
                        <div class="text-2xl font-bold text-gray-900 mb-2">Frizerski salon</div>
                        <div class="text-gray-600 text-sm mb-3">Popust za nove klijente</div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-orange-600">1500 RSD</span>
                            <span class="text-sm text-gray-400 line-through">2000 RSD</span>
                        </div>
                    </div>
                    
                    <!-- Deal Card 4 -->
                    <div class="bg-white rounded-3xl p-6 transform -rotate-3 hover:rotate-0 transition-all duration-300 mt-4 shadow-xl">
                        <div class="bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full inline-block mb-3">
                            -40% OFF
                        </div>
                        <div class="text-2xl font-bold text-gray-900 mb-2">Restoran</div>
                        <div class="text-gray-600 text-sm mb-3">Happy hour 17-19h</div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-blue-600">600 RSD</span>
                            <span class="text-sm text-gray-400 line-through">1000 RSD</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Offer Types Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Vrste ponuda 🎯</h2>
            <p class="text-xl text-gray-600">Za svaki ukus i potrebu</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Type 1 -->
            <div class="bg-gradient-to-br from-red-500 to-pink-500 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 cursor-pointer">
                <div class="text-5xl mb-4">🔥</div>
                <h3 class="text-2xl font-bold mb-3">Dnevne ponude</h3>
                <p class="text-white/80 mb-4">Svakodnevne akcije koje se menjaju</p>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold inline-block">
                    50+ aktivnih
                </div>
            </div>
            
            <!-- Type 2 -->
            <div class="bg-gradient-to-br from-purple-500 to-indigo-500 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 cursor-pointer">
                <div class="text-5xl mb-4">⭐</div>
                <h3 class="text-2xl font-bold mb-3">Specijalne ponude</h3>
                <p class="text-white/80 mb-4">Ekskluzivno samo za komšije</p>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold inline-block">
                    30+ aktivnih
                </div>
            </div>
            
            <!-- Type 3 -->
            <div class="bg-gradient-to-br from-orange-500 to-yellow-500 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 cursor-pointer">
                <div class="text-5xl mb-4">💰</div>
                <h3 class="text-2xl font-bold mb-3">Popusti</h3>
                <p class="text-white/80 mb-4">Trajni popusti na proizvode</p>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold inline-block">
                    100+ aktivnih
                </div>
            </div>
            
            <!-- Type 4 -->
            <div class="bg-gradient-to-br from-green-500 to-emerald-500 rounded-3xl p-8 text-white hover:scale-105 transition-all duration-300 cursor-pointer">
                <div class="text-5xl mb-4">🎁</div>
                <h3 class="text-2xl font-bold mb-3">Akcije</h3>
                <p class="text-white/80 mb-4">Vremenske akcije i promocije</p>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold inline-block">
                    20+ aktivnih
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works - Shopping Steps -->
<section class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Kako koristiti ponude? 🛍️</h2>
            <p class="text-xl text-gray-600">Jednostavno i brzo</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="bg-white rounded-3xl p-8 shadow-xl text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-6 shadow-lg">
                    1
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Pronađi ponudu</h3>
                <p class="text-gray-600 leading-relaxed">
                    Pretraži ponude iz tvog kraja. Filtriraj po kategorijama, popustu ili lokaciji.
                </p>
            </div>
            
            <!-- Step 2 -->
            <div class="bg-white rounded-3xl p-8 shadow-xl text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-red-500 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-6 shadow-lg">
                    2
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Proveri detalje</h3>
                <p class="text-gray-600 leading-relaxed">
                    Pogledaj period važenja, uslove korišćenja i kontakt informacije biznisa.
                </p>
            </div>
            
            <!-- Step 3 -->
            <div class="bg-white rounded-3xl p-8 shadow-xl text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-6 shadow-lg">
                    3
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Iskoristi popust</h3>
                <p class="text-gray-600 leading-relaxed">
                    Poseti biznis i iskoristi ponudu. Jednostavno pomeni Moj Kraj i uživaj!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Categories Grid -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Kategorije ponuda 📦</h2>
            <p class="text-xl text-gray-600">Sve što ti treba na jednom mestu</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-orange-100 rounded-2xl p-6 text-center hover:bg-orange-200 transition-all duration-300 cursor-pointer">
                <div class="text-4xl mb-2">🍕</div>
                <div class="font-bold text-gray-900">Hrana</div>
                <div class="text-sm text-gray-600">80+ ponuda</div>
            </div>
            
            <div class="bg-blue-100 rounded-2xl p-6 text-center hover:bg-blue-200 transition-all duration-300 cursor-pointer">
                <div class="text-4xl mb-2">💇</div>
                <div class="font-bold text-gray-900">Usluge</div>
                <div class="text-sm text-gray-600">60+ ponuda</div>
            </div>
            
            <div class="bg-green-100 rounded-2xl p-6 text-center hover:bg-green-200 transition-all duration-300 cursor-pointer">
                <div class="text-4xl mb-2">🛒</div>
                <div class="font-bold text-gray-900">Proizvodima</div>
                <div class="text-sm text-gray-600">100+ ponuda</div>
            </div>
            
            <div class="bg-purple-100 rounded-2xl p-6 text-center hover:bg-purple-200 transition-all duration-300 cursor-pointer">
                <div class="text-4xl mb-2">🎉</div>
                <div class="font-bold text-gray-900">Zabava</div>
                <div class="text-sm text-gray-600">40+ ponuda</div>
            </div>
            
            <div class="bg-pink-100 rounded-2xl p-6 text-center hover:bg-pink-200 transition-all duration-300 cursor-pointer">
                <div class="text-4xl mb-2">🏋️</div>
                <div class="font-bold text-gray-900">Sport</div>
                <div class="text-sm text-gray-600">30+ ponuda</div>
            </div>
            
            <div class="bg-yellow-100 rounded-2xl p-6 text-center hover:bg-yellow-200 transition-all duration-300 cursor-pointer">
                <div class="text-4xl mb-2">👗</div>
                <div class="font-bold text-gray-900">Moda</div>
                <div class="text-sm text-gray-600">50+ ponuda</div>
            </div>
            
            <div class="bg-red-100 rounded-2xl p-6 text-center hover:bg-red-200 transition-all duration-300 cursor-pointer">
                <div class="text-4xl mb-2">🏥</div>
                <div class="font-bold text-gray-900">Zdravlje</div>
                <div class="text-sm text-gray-600">35+ ponuda</div>
            </div>
            
            <div class="bg-indigo-100 rounded-2xl p-6 text-center hover:bg-indigo-200 transition-all duration-300 cursor-pointer">
                <div class="text-4xl mb-2">🎓</div>
                <div class="font-bold text-gray-900">Edukacija</div>
                <div class="text-sm text-gray-600">25+ ponuda</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-r from-purple-600 via-pink-600 to-red-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-6xl mb-8">🎉</div>
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Počnite da štedite danas!
        </h2>
        <p class="text-2xl text-white/90 mb-10">
            Stotine ponuda čeka da ih iskoristite
        </p>
        
        <a href="{{ route('offers.index') }}" class="inline-block bg-white text-purple-600 px-12 py-5 rounded-2xl font-bold text-lg hover:bg-purple-50 transition-all duration-300 shadow-2xl hover:scale-105">
            Otkrij ponude
            <span class="ml-2">🛍️</span>
        </a>
        
        <p class="text-white/80 mt-6">
            Bez registracije • Besplatno pregledanje • Nove ponude svaki dan
        </p>
    </div>
</section>

@endsection
