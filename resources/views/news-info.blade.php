@extends('layouts.app')

@section('title', 'Vesti - Moj Kraj')

@section('content')
<style>
@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.timeline-item {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

.timeline-item:nth-child(1) { animation-delay: 0.1s; }
.timeline-item:nth-child(2) { animation-delay: 0.2s; }
.timeline-item:nth-child(3) { animation-delay: 0.3s; }
</style>

<!-- Minimal Hero with Pattern Background -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 overflow-hidden">
    <!-- Dotted Pattern -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Text Content -->
            <div>
                <div class="inline-block mb-6">
                    <span class="bg-blue-500/20 text-blue-200 px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm border border-blue-400/30">
                        📰 Info Portal
                    </span>
                </div>
                
                <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
                    Informacije iz komšiluka<br>
                    <span class="text-blue-300">u realnom vremenu</span>
                </h1>
                
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    Budite prvi koji će saznati šta se dešava u vašem komšiluku. Delite važne vesti, događaje i priče koje su važne za lokalnu zajednicu.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('news.index') }}" class="bg-white text-blue-900 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 inline-flex items-center">
                        Čitaj vesti
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    @if($isRegularUser)
                    <a href="{{ route('news.create') }}" class="bg-blue-500/20 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-500/30 transition-all duration-300 backdrop-blur-sm border border-blue-400/30 inline-flex items-center">
                        Objavi vest
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
            
            <!-- Right Side - Stats Cards -->
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                    <div class="text-4xl mb-2">📊</div>
                    <div class="text-3xl font-bold text-white mb-1">1,200+</div>
                    <div class="text-blue-200 text-sm">Objavljenih vesti</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                    <div class="text-4xl mb-2">👥</div>
                    <div class="text-3xl font-bold text-white mb-1">5,000+</div>
                    <div class="text-blue-200 text-sm">Aktivnih čitalaca</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                    <div class="text-4xl mb-2">⏱️</div>
                    <div class="text-3xl font-bold text-white mb-1">24/7</div>
                    <div class="text-blue-200 text-sm">Ažuriranje</div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                    <div class="text-4xl mb-2">🌍</div>
                    <div class="text-3xl font-bold text-white mb-1">100%</div>
                    <div class="text-blue-200 text-sm">Lokalne vesti</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section - How It Works -->
<section class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Kako funkcioniše</h2>
            <p class="text-xl text-gray-600">Jednostavan proces u tri koraka</p>
        </div>
        
        <!-- Vertical Timeline -->
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-blue-500 via-blue-400 to-blue-300"></div>
            
            <!-- Timeline Items -->
            <div class="space-y-12">
                <!-- Step 1 -->
                <div class="timeline-item relative grid md:grid-cols-2 gap-8 items-center">
                    <div class="text-right pr-12">
                        <div class="inline-block bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300">
                            <div class="text-5xl mb-4">📝</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Napišite vest</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Podelite informacije o događajima, novostima ili važnim dešavanjima u vašem komšiluku. Dodajte fotografije i video zapise za bolju priču.
                            </p>
                        </div>
                    </div>
                    <!-- Timeline Dot -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                    <div></div>
                </div>
                
                <!-- Step 2 -->
                <div class="timeline-item relative grid md:grid-cols-2 gap-8 items-center">
                    <div></div>
                    <div class="pl-12">
                        <div class="inline-block bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300">
                            <div class="text-5xl mb-4">🔔</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Obaveštenja komšijama</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Vaša vest se automatski prikazuje svim komšijama iz istog kraja. Komšije dobijaju notifikacije o važnim dešavanjima.
                            </p>
                        </div>
                    </div>
                    <!-- Timeline Dot -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-blue-400 rounded-full border-4 border-white shadow-lg"></div>
                </div>
                
                <!-- Step 3 -->
                <div class="timeline-item relative grid md:grid-cols-2 gap-8 items-center">
                    <div class="text-right pr-12">
                        <div class="inline-block bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300">
                            <div class="text-5xl mb-4">💬</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Interakcija i diskusija</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Komšije mogu komentarisati, lajkovati i deliti vest. Kreirajte smislene diskusije i jačajte lokalnu zajednicu.
                            </p>
                        </div>
                    </div>
                    <!-- Timeline Dot -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-blue-300 rounded-full border-4 border-white shadow-lg"></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Categories Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Vrste vesti</h2>
            <p class="text-xl text-gray-600">Delite sve što je važno za vaš komšiluk</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Category 1 -->
            <div class="group bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-blue-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">🏘️</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Lokalni događaji</h3>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-blue-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Manifestacije i proslave
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-blue-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Sportski turniri
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-blue-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Kulturne aktivnosti
                    </li>
                </ul>
            </div>
            
            <!-- Category 2 -->
            <div class="group bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-green-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">⚠️</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Važne informacije</h3>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Planirana isključenja
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Radovi na infrastrukturi
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Bezbednosna upozorenja
                    </li>
                </ul>
            </div>
            
            <!-- Category 3 -->
            <div class="group bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <span class="text-3xl">🎉</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Zajednica i pomoć</h3>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-purple-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Volonterske akcije
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-purple-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Pozivi za pomoć
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-purple-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Uspešne priče
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-blue-600 to-blue-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Započnite sa vestima danas
        </h2>
        <p class="text-xl text-blue-100 mb-8">
            Budite deo lokalne zajednice koja deli informacije i pomaže jedni drugima
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if($isRegularUser)
                <a href="{{ route('news.create') }}" class="bg-white text-blue-900 px-10 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all duration-300 shadow-xl hover:scale-105">
                    Objavi svoju prvu vest
                </a>
            @else
                <a href="{{ route('register') }}" class="bg-white text-blue-900 px-10 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all duration-300 shadow-xl hover:scale-105">
                    Registruj se besplatno
                </a>
            @endif
            <a href="{{ route('news.index') }}" class="bg-blue-500/30 text-white px-10 py-4 rounded-xl font-bold hover:bg-blue-500/40 transition-all duration-300 backdrop-blur-sm border border-white/30">
                Pregledaj vesti
            </a>
        </div>
    </div>
</section>

@endsection
