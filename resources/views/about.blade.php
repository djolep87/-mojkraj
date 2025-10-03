@extends('layouts.app')

@section('title', 'O nama - Moj Kraj')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-purple-600 to-pink-600 text-white py-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
        <div class="absolute bottom-10 right-10 w-24 h-24 bg-white rounded-full"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
            O <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Moj Kraj</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
            Povezujemo komšije, gradimo zajednicu i činimo vaš komšiluk boljim mestom za život
        </p>
    </div>
</section>

<!-- Mission Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Naša <span class="text-blue-600">misija</span>
                </h2>
                <p class="text-xl text-gray-600 mb-6">
                    Moj Kraj je platforma koja povezuje komšije i gradi jaču lokalnu zajednicu. 
                    Verujemo da je komšiluk osnova zdravog društva.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Povezujemo komšije kroz deljenje vesti, dešavanja i lokalnih informacija</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Podržavamo lokalne biznise i omogućavamo im da se povežu sa komšijama</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Gradimo sigurniju i bolju zajednicu kroz međusobnu podršku</p>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl p-8 shadow-xl">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                         alt="Komšije" 
                         class="w-full h-80 object-cover rounded-xl shadow-lg">
                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-4 shadow-lg">
                        <div class="text-2xl font-bold text-blue-600">1000+</div>
                        <div class="text-sm text-gray-600">Aktivnih komšija</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Kako <span class="text-blue-600">funkcioniše</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Jednostavno i intuitivno - sve što trebate da znate o korišćenju Moj Kraj platforme
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl font-bold text-blue-600">1</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Registrujte se</h3>
                <p class="text-gray-600 mb-4">Kreirajte nalog i unesite svoju adresu i deo grada gde živite.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Osnovni podaci o sebi</li>
                    <li>• Lokacija (adresa i deo grada)</li>
                    <li>• Tip naloga (običan korisnik ili biznis)</li>
                </ul>
            </div>
            
            <!-- Step 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl font-bold text-green-600">2</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Povezujte se</h3>
                <p class="text-gray-600 mb-4">Otkrijte komšije iz vašeg dela grada i povežite se sa njima.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Pregledajte vesti iz vašeg komšiluka</li>
                    <li>• Otkrijte lokalne biznise</li>
                    <li>• Delite svoje dešavanja</li>
                </ul>
            </div>
            
            <!-- Step 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl font-bold text-purple-600">3</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Delite i učestvujte</h3>
                <p class="text-gray-600 mb-4">Aktivno učestvujte u životu zajednice i delite korisne informacije.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Objavljujte vesti i dešavanja</li>
                    <li>• Pomažite komšijama</li>
                    <li>• Gradite jaču zajednicu</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Naše <span class="text-blue-600">funkcionalnosti</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Sve što vam treba za povezivanje sa komšijama i građenje jače zajednice
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-blue-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-3m-2 4H9m12 0h-3m-7 4h.01M7 16h.01" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Lokalne vesti</h3>
                <p class="text-gray-600">Delite i čitajte vesti iz vašeg komšiluka. Budite u toku sa svim dešavanjima u okolini.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-green-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Lokalni biznisi</h3>
                <p class="text-gray-600">Otkrijte i podržite lokalne biznise. Pronađite najbolje usluge u vašoj blizini.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-purple-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Specijalne ponude</h3>
                <p class="text-gray-600">Koristite ekskluzivne ponude i popuste koje lokalni biznisi nude komšijama.</p>
            </div>
            
            <!-- Feature 4 -->
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-orange-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Kućni ljubimci</h3>
                <p class="text-gray-600">Povezujte se sa komšijama kroz ljubav prema životinjama. Delite usluge i brigu.</p>
            </div>
            
            <!-- Feature 5 -->
            <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Dešavanja</h3>
                <p class="text-gray-600">Organizujte i učestvujte u lokalnim događajima. Gradite jaču zajednicu.</p>
            </div>
            
            <!-- Feature 6 -->
            <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl p-8">
                <div class="w-16 h-16 bg-indigo-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Zajednica</h3>
                <p class="text-gray-600">Gradite snažne veze sa komšijama i stvarajte sigurniju okolinu za sve.</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-6">Moj Kraj u brojkama</h2>
            <p class="text-xl opacity-90 max-w-3xl mx-auto">
                Brojke koje pokazuju koliko je naša platforma uspešna u povezivanju komšija
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-300 mb-2">10,000+</div>
                <div class="text-xl font-semibold mb-2">Aktivnih korisnika</div>
                <div class="text-blue-200">Komšija koji koriste platformu</div>
            </div>
            
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-300 mb-2">500+</div>
                <div class="text-xl font-semibold mb-2">Lokalnih biznisa</div>
                <div class="text-blue-200">Registrovanih na platformi</div>
            </div>
            
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-300 mb-2">2,000+</div>
                <div class="text-xl font-semibold mb-2">Objavljenih vesti</div>
                <div class="text-blue-200">Lokalnih dešavanja i vesti</div>
            </div>
            
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-300 mb-2">50+</div>
                <div class="text-xl font-semibold mb-2">Gradova</div>
                <div class="text-blue-200">Gde je platforma aktivna</div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                Naš <span class="text-blue-600">tim</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Strastveni ljudi koji rade na tome da vaš komšiluk bude bolje mesto za život
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="text-center">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <span class="text-4xl font-bold text-white">MK</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Moj Kraj Tim</h3>
                <p class="text-blue-600 font-medium mb-4">Osnivači platforme</p>
                <p class="text-gray-600">Strastveni o gradnji zajednice i povezivanju komšija kroz tehnologiju.</p>
            </div>
            
            <!-- Team Member 2 -->
            <div class="text-center">
                <div class="w-32 h-32 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <span class="text-4xl font-bold text-white">KZ</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Komšijska Zajednica</h3>
                <p class="text-green-600 font-medium mb-4">Moderatori</p>
                <p class="text-gray-600">Aktivni komšije koji pomažu u održavanju kvaliteta sadržaja na platformi.</p>
            </div>
            
            <!-- Team Member 3 -->
            <div class="text-center">
                <div class="w-32 h-32 bg-gradient-to-br from-orange-400 to-pink-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <span class="text-4xl font-bold text-white">VS</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Vi - Komšije</h3>
                <p class="text-orange-600 font-medium mb-4">Glavni tim</p>
                <p class="text-gray-600">Vi ste najvažniji deo našeg tima. Bez vas ne bi bilo Moj Kraj platforme.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-6">Pridružite se <span class="text-blue-600">Moj Kraj</span> zajednici!</h2>
        <p class="text-xl text-gray-600 mb-10">
            Bilo da želite da delite vesti, pronađete lokalne biznise ili se povežete sa komšijama, 
            Moj Kraj je pravo mesto za vas.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-blue-700 transition-colors duration-300 shadow-lg">
                Registrujte se besplatno
            </a>
            <a href="{{ route('login') }}" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-50 transition-colors duration-300 border-2 border-blue-600">
                Prijavite se
            </a>
        </div>
    </div>
</section>
@endsection

