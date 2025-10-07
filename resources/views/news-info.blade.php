@extends('layouts.app')

@section('title', 'Vesti - Moj Kraj')

@section('content')
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes float-delayed {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(5deg); }
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(-3deg); }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 8s ease-in-out infinite;
}

.animate-float-slow {
    animation: float-slow 10s ease-in-out infinite;
}
</style>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #8b5cf6 100%);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-yellow-300/20 rounded-full animate-bounce"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-pink-300/20 rounded-full animate-ping"></div>
        <div class="absolute top-1/3 right-1/3 w-20 h-20 bg-orange-300/20 rounded-full animate-pulse"></div>
    </div>
    
    <!-- Floating News Icons -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-6xl opacity-20 animate-float">📰</div>
        <div class="absolute top-1/3 right-1/4 text-5xl opacity-20 animate-float-delayed">📢</div>
        <div class="absolute bottom-1/3 left-1/3 text-4xl opacity-20 animate-float-slow">📱</div>
        <div class="absolute bottom-1/4 right-1/3 text-5xl opacity-20 animate-float">📺</div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/20 backdrop-blur-md text-white text-sm font-semibold mb-8 shadow-xl border border-white/30">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            Informisanost povezuje komšiluke
        </div>
        
        <h1 class="text-6xl md:text-8xl font-bold mb-8 leading-tight" style="text-shadow: 0 4px 8px rgba(0,0,0,0.3);">
            <span class="bg-gradient-to-r from-yellow-300 via-orange-300 to-pink-300 bg-clip-text text-transparent">Vesti</span><br>
            <span class="text-white">iz vašeg komšiluka</span>
        </h1>
        
        <p class="text-2xl md:text-3xl mb-12 max-w-5xl mx-auto leading-relaxed font-light" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            Budite u toku sa dešavanjima, novostima i pričama iz vašeg komšiluka. 
            Povezujte se sa komšijama kroz zajedničke teme i gradite jaču zajednicu.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16">
            <a href="{{ route('news.index') }}" class="group bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-12 py-5 rounded-full text-xl font-bold hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 shadow-2xl hover:shadow-yellow-500/25 hover:scale-105">
                <span class="flex items-center">
                    Pogledaj sve vesti
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </a>
            @if($isRegularUser)
                <a href="{{ route('news.create') }}" class="group bg-white/20 backdrop-blur-md text-white px-12 py-5 rounded-full text-xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105">
                    <span class="flex items-center">
                        Objavi vest
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </span>
                </a>
            @else
                <a href="{{ route('login') }}" class="group bg-white/20 backdrop-blur-md text-white px-12 py-5 rounded-full text-xl font-bold hover:bg-white/30 transition-all duration-300 border-2 border-white/60 shadow-2xl hover:shadow-white/20 hover:scale-105">
                    <span class="flex items-center">
                        Prijavi se da objaviš vest
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                    </span>
                </a>
            @endif
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">1,200+</div>
                <div class="text-white/80">Objavljenih vesti</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">5,000+</div>
                <div class="text-white/80">Aktivnih čitalaca</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">95%</div>
                <div class="text-white/80">Zadovoljstvo korisnika</div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-8 h-8 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>

<!-- Features Overview Section -->
<section id="features" class="py-24 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                Kompletna platforma za vesti
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                Sve što vam treba za <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">informisanost</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Budite u toku sa dešavanjima, podelite važne informacije, organizujte događaje 
                i gradite jaču zajednicu kroz lokalne vesti i priče.
            </p>
        </div>

        <!-- Main Features Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <!-- News Sharing -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-3xl p-10 shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Deljenje vesti</h3>
                            <p class="text-blue-600 font-semibold">Važne informacije i dešavanja</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Podelite važne obaveštenja, dešavanja i priče iz vašeg komšiluka. 
                        Informišite komšije o radovima, novim biznisima, sigurnosnim situacijama i pozitivnim promenama.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Važne obaveštenja</span>
                        <span class="px-4 py-2 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">Lokalni događaji</span>
                        <span class="px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">Sigurnosne vesti</span>
                    </div>
                    <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                        <span>Otkrij vesti</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Community Building -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-teal-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-3xl p-10 shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mr-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Gradnja zajednice</h3>
                            <p class="text-green-600 font-semibold">Povezivanje i saradnja</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Povezujte se sa komšijama kroz zajedničke teme, organizujte događaje, 
                        delite pozitivne priče i gradite jaču, informisaniju zajednicu.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium">Zajedničke teme</span>
                        <span class="px-4 py-2 bg-teal-100 text-teal-800 rounded-full text-sm font-medium">Organizovanje događaja</span>
                        <span class="px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium">Pozitivne priče</span>
                    </div>
                    <div class="flex items-center text-green-600 font-semibold group-hover:text-green-700">
                        <span>Pridruži se zajednici</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Features Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Real-time Updates -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Ažurne vesti</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Trenutne informacije o dešavanjima u vašem komšiluku</p>
            </div>

            <!-- Local Focus -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Lokalni fokus</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Vesti relevantne za vašu lokaciju i komšiluk</p>
            </div>

            <!-- Multimedia Content -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Multimedija</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Slike, video i dokumentovane promene</p>
            </div>

            <!-- Community Engagement -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Interakcija</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Komentari, lajkovi i diskusije sa komšijama</p>
            </div>
        </div>
    </div>
</section>

<!-- News Tips & Best Practices Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                Saveti za kvalitetno deljenje vesti
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                Kako da <span class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent">objavite kvalitetne vesti</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Stručni saveti, najbolje prakse i korisni tipovi koji će vam pomoći da podelite informacije koje će biti korisne komšijama
            </p>
        </div>

        <!-- Tips Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
            <!-- Writing Quality News -->
            <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Kvalitetno pisanje</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Jasni i kratki naslovi</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Objektivno i tačno informisanje</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Dodajte lokaciju i vreme</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite kategorije</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Uvek proverite činjenice pre objavljivanja!</p>
                </div>
            </div>

            <!-- Visual Content -->
            <div class="group bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 border border-purple-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Vizuelni sadržaj</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Dodajte slike i video snimke</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Koristite dobru osvetljenost</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Dokumentujte promene</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Dodajte opise slika</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Slike govore više od reči - koristite ih!</p>
                </div>
            </div>

            <!-- Community Engagement -->
            <div class="group bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-8 border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Angažovanje zajednice</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Odgovarajte na komentare</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Pozivajte na diskusiju</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Delite pozitivne vesti</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <p class="text-gray-600 text-sm">Budite konstruktivni</p>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-white/60 rounded-xl">
                    <p class="text-sm text-gray-700 font-medium">💡 Savet: Pozitivne vesti povezuju zajednicu!</p>
                </div>
            </div>
        </div>

        <!-- News Categories Guide -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-3xl p-12 text-white mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-4xl font-bold mb-6">Kategorije vesti</h3>
                    <p class="text-xl mb-8 opacity-90">
                        Izaberite pravu kategoriju da biste komšije lakše informisali
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Važne obaveštenja</h4>
                                <p class="text-white/80">Radovi, prekidi usluga, sigurnosne situacije</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Događaji</h4>
                                <p class="text-white/80">Festivali, okupljanja, sportski turniri</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold">Pozitivne priče</h4>
                                <p class="text-white/80">Uspešne priče, dobra dela, pozitivne promene</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-8xl mb-4">📰</div>
                    <h4 class="text-2xl font-bold mb-4">Informisanost je moć</h4>
                    <p class="text-lg opacity-90">Zajedno gradimo bolju zajednicu!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What You Can Share Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Šta možete da <span class="text-blue-600">objavite</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Podelite vesti, dešavanja i priče iz vašeg komšiluka sa ostalim komšijama
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- News Type 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Važne obaveštenja</h3>
                <p class="text-gray-600 mb-4">Podelite važne informacije o radovima, prekidu struje, vodi ili drugim značajnim dešavanjima.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Radovi na infrastrukturi</li>
                    <li>• Prekid komunalnih usluga</li>
                    <li>• Sigurnosna upozorenja</li>
                </ul>
            </div>
            
            <!-- News Type 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Događaji i aktivnosti</h3>
                <p class="text-gray-600 mb-4">Najavite lokalne događaje, okupljanja, sportsku aktivnost ili druge zajedničke aktivnosti.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Lokalni festivali</li>
                    <li>• Sportski turniri</li>
                    <li>• Okupljanja zajednice</li>
                </ul>
            </div>
            
            <!-- News Type 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Pozitivne priče</h3>
                <p class="text-gray-600 mb-4">Podelite pozitivne vesti, uspehe komšija ili lepe trenutke iz komšiluka.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Uspešne priče komšija</li>
                    <li>• Dobra dela u zajednici</li>
                    <li>• Pozitivne promene</li>
                </ul>
            </div>
            
            <!-- News Type 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Nove usluge</h3>
                <p class="text-gray-600 mb-4">Informišite komšije o novim uslugama, prodavnicama ili biznisima u komšiluku.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Novi biznisi</li>
                    <li>• Nove usluge</li>
                    <li>• Promene u radnom vremenu</li>
                </ul>
            </div>
            
            <!-- News Type 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Saveti i preporuke</h3>
                <p class="text-gray-600 mb-4">Podelite korisne savete, preporuke ili iskustva sa komšijama.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Saveti za domaćinstvo</li>
                    <li>• Preporuke majstora</li>
                    <li>• Iskustva sa uslugama</li>
                </ul>
            </div>
            
            <!-- News Type 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-pink-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Slike i video</h3>
                <p class="text-gray-600 mb-4">Podelite slike i video snimke dešavanja, lepih trenutaka ili važnih obaveštenja.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Fotografije događaja</li>
                    <li>• Video snimci</li>
                    <li>• Dokumentovane promene</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories & Testimonials Section -->
<section class="py-24 bg-gradient-to-br from-purple-50 via-pink-50 to-red-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 text-sm font-semibold mb-8 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm5 3a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                </svg>
                Uspešne priče iz komšiluka
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-red-600 bg-clip-text text-transparent">Informisanost</span> povezuje komšiluke
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Upoznajte komšije koji su kroz vesti pronašli prijatelje, rešili probleme i gradili jaču zajednicu
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            <!-- Testimonial 1 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-purple-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        M
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Milica Petrović</h4>
                        <p class="text-gray-600 text-sm">Aktivna čitala vesti</p>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">5.0</span>
                        </div>
                    </div>
                </div>
                <blockquote class="text-gray-700 leading-relaxed mb-4">
                    "Zahvaljujući vestima na platformi, saznala sam o radovima na ulici pre nego što su počeli. 
                    Uštedela sam vreme i izbegla gužve!"
                </blockquote>
                <div class="flex items-center text-purple-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Novi Beograd, Beograd
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-pink-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-red-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        S
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Stefan Jovanović</h4>
                        <p class="text-gray-600 text-sm">Redovan objavljivač vesti</p>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">5.0</span>
                        </div>
                    </div>
                </div>
                <blockquote class="text-gray-700 leading-relaxed mb-4">
                    "Kroz vesti sam upoznao komšije koji dele iste interese. 
                    Organizovali smo lokalni festival i sada se družimo redovno!"
                </blockquote>
                <div class="flex items-center text-pink-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Vračar, Beograd
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-red-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                        A
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Ana Stojanović</h4>
                        <p class="text-gray-600 text-sm">Moderator vesti</p>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">5.0</span>
                        </div>
                    </div>
                </div>
                <blockquote class="text-gray-700 leading-relaxed mb-4">
                    "Kada sam objavila vest o problemu sa parkingom, komšije su se ujedinile i rešile problem zajedno. 
                    Platforma je stvarno povezala naš komšiluk!"
                </blockquote>
                <div class="flex items-center text-red-600 font-semibold text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    Zvezdara, Beograd
                </div>
            </div>
        </div>

        <!-- Success Stats -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl p-12 text-white">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">1,200+</div>
                    <div class="text-purple-200">Objavljenih vesti</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">5,000+</div>
                    <div class="text-purple-200">Aktivnih čitalaca</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">95%</div>
                    <div class="text-purple-200">Zadovoljstvo korisnika</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">24/7</div>
                    <div class="text-purple-200">Ažurne informacije</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What Community Can Learn Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Šta komšiluk može da <span class="text-blue-600">sazna</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kroz vesti, komšije mogu da saznaju sve što je važno za njihov svakodnevni život
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                     alt="Komšiluk" 
                     class="w-full h-96 object-cover rounded-2xl shadow-xl">
            </div>
            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Informacije koje pomažu</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Planiranje dana</h4>
                            <p class="text-gray-600">Saznajte o radovima, prekidu usluga ili događajima da biste planirali svoj dan.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Sigurnost i bezbednost</h4>
                            <p class="text-gray-600">Budite obavešteni o sigurnosnim situacijama, sumnjivim aktivnostima ili važnim upozorenjima.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Zajedničke aktivnosti</h4>
                            <p class="text-gray-600">Učestvujte u događajima, aktivnostima i inicijativama koje organizuje zajednica.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Korisni saveti</h4>
                            <p class="text-gray-600">Dobijte preporuke za usluge, majstore, prodavnice ili druge korisne informacije.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-blue-600 mb-2">95%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Komšija čita lokalne vesti</div>
                <div class="text-gray-600">Većina ljudi prati dešavanja u svom komšiluku</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-blue-600 mb-2">3x</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Brže informisanje</div>
                <div class="text-gray-600">Lokalne vesti stižu tri puta brže od tradicionalnih medija</div>
            </div>
            
            <div class="text-center bg-gray-50 rounded-2xl p-8">
                <div class="text-4xl font-bold text-blue-600 mb-2">87%</div>
                <div class="text-lg font-semibold text-gray-900 mb-2">Korisnost informacija</div>
                <div class="text-gray-600">Komšije smatraju da su lokalne vesti veoma korisne</div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
@if(auth()->check() && $latestNews->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Poslednje <span class="text-blue-600">vesti</span> iz vašeg komšiluka
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pogledajte šta se dešava u vašem komšiluku
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($latestNews as $news)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                @if($news->images && count($news->images) > 0)
                    <a href="{{ route('news.show', $news) }}">
                        <img src="{{ Storage::url($news->images[0]) }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                    </a>
                @else
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
                        <span>{{ $news->user->name }}</span>
                        <span>•</span>
                        <span>{{ $news->created_at->diffForHumans() }}</span>
                    </div>
                    <a href="{{ route('news.show', $news) }}">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2 hover:text-blue-600 transition-colors duration-200">{{ $news->title }}</h3>
                    </a>
                    <p class="text-gray-600 mb-4">{{ Str::limit($news->content, 120) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-blue-600 font-medium">{{ ucfirst($news->category) }}</span>
                        <span class="text-sm text-gray-500">{{ $news->neighborhood }}, {{ $news->city }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="{{ route('news.index') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                Pogledaj sve vesti
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</section>
@elseif(auth()->check() && $latestNews->count() == 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Poslednje <span class="text-blue-600">vesti</span> iz vašeg komšiluka
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Trenutno nema vesti iz vašeg komšiluka
            </p>
        </div>
        
        <div class="text-center bg-white rounded-2xl p-12 shadow-lg">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Nema vesti iz vašeg komšiluka</h3>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">
                Budite prvi koji će podeliti vesti iz vašeg komšiluka sa ostalim komšijama.
            </p>
            <a href="{{ route('news.create') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                Objavi prvu vest
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a>
        </div>
    </div>
</section>
@else
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Poslednje <span class="text-blue-600">vesti</span> iz komšiluka
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Prijavite se da vidite vesti iz vašeg komšiluka
            </p>
        </div>
        
        <div class="text-center bg-white rounded-2xl p-12 shadow-lg">
            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Prijavite se da vidite vesti</h3>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">
                Da biste videli vesti iz vašeg komšiluka, potrebno je da se prijavite. Tako možemo da vam prikažemo sadržaj relevantan za vašu lokaciju.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Prijavite se
                </a>
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-green-600 to-teal-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Registrujte se
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6">Spremni da podelite vesti?</h2>
        <p class="text-xl mb-8 opacity-90">
            Pridružite se zajednici i budite deo informisanog komšiluka
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if($isRegularUser)
                <a href="{{ route('news.create') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Objavi svoju vest
                </a>
                <a href="{{ route('news.index') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Pogledaj sve vesti
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Prijavi se da objaviš vest
                </a>
                <a href="{{ route('news.index') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                    Pogledaj sve vesti
                </a>
            @endif
        </div>
    </div>
</section>
@endsection

