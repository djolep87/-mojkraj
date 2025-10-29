@extends('layouts.user')

@section('title', 'Stambene zajednice - Moj Kraj')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Stambene zajednice</h1>
                    <p class="mt-2 text-gray-600">Upravljajte zgradama u {{ auth()->user()->neighborhood }}, {{ auth()->user()->city }}</p>
                </div>
                <a href="{{ route('buildings.store') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Dodaj zgradu
                </a>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="mb-8">
            <form method="GET" action="{{ route('buildings.index') }}" id="searchForm" class="max-w-2xl">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="searchInput"
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Pretražite zgrade po nazivu ili adresi..." 
                        class="w-full pl-12 pr-32 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-gray-900 placeholder-gray-400 transition-all duration-200"
                        autocomplete="off"
                    >
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                        @if(request('search'))
                        <button 
                            type="button"
                            onclick="clearSearch()"
                            class="mr-2 p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors"
                            title="Obriši pretragu"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        @endif
                        <button 
                            type="submit"
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200 flex items-center"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Traži
                        </button>
                    </div>
                </div>
                @if(request('search'))
                <div class="mt-3 flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Pretraga za: <span class="font-semibold ml-1">"{{ request('search') }}"</span>
                    <span class="ml-2 text-gray-400">•</span>
                    <span class="ml-2">Pronađeno: {{ $buildings->total() }} 
                        @if($buildings->total() == 1)
                            zgrada
                        @elseif($buildings->total() < 5)
                            zgrade
                        @else
                            zgrada
                        @endif
                    </span>
                </div>
                @endif
            </form>
        </div>

        <!-- Buildings Grid -->
        @if($buildings->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($buildings as $building)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                        <!-- Building Header -->
                        <div class="p-6">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $building->name }}</h3>
                                    <p class="text-gray-600 mb-1">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $building->address }}
                                    </p>
                                    <p class="text-gray-500 text-sm">{{ $building->neighborhood }}, {{ $building->city }}</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    @if($building->hasUser(auth()->user()))
                                        @if($building->isManager(auth()->user()))
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                Manager
                                            </span>
                                        @else
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                Stanar
                                            </span>
                                        @endif
                                    @elseif($building->address === auth()->user()->address && 
                                            $building->city === auth()->user()->city && 
                                            $building->neighborhood === auth()->user()->neighborhood)
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                            Na vašoj adresi
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Building Stats -->
                        <div class="px-6 pb-4">
                            <div class="grid grid-cols-3 gap-4 text-center">
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="text-2xl font-bold text-gray-900">{{ $building->apartments->count() }}</div>
                                    <div class="text-xs text-gray-500">Stanova</div>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="text-2xl font-bold text-gray-900">{{ $building->users->count() }}</div>
                                    <div class="text-xs text-gray-500">Stanara</div>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="text-2xl font-bold text-gray-900">{{ $building->reports->where('status', 'open')->count() }}</div>
                                    <div class="text-xs text-gray-500">Aktivnih prijava</div>
                                </div>
                            </div>
                        </div>

                        <!-- Building Actions -->
                        <div class="px-6 pb-6">
                            @if($building->hasUser(auth()->user()))
                                <!-- User is already a member -->
                                <div class="flex space-x-2">
                                    <a href="{{ route('buildings.show', $building) }}" class="flex-1 bg-indigo-600 text-white text-center py-2 px-4 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200">
                                        Otvori
                                    </a>
                                    @if($building->isManager(auth()->user()))
                                        <button onclick="editBuilding({{ $building->id }})" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            @elseif($building->address === auth()->user()->address && 
                                    $building->city === auth()->user()->city && 
                                    $building->neighborhood === auth()->user()->neighborhood)
                                <!-- User can join (same address) -->
                                <div class="flex flex-col space-y-2">
                                    <button onclick="openSelfJoinModalFromList({{ $building->id }})" class="w-full bg-green-600 text-white text-center py-2 px-4 rounded-lg font-medium hover:bg-green-700 transition-colors duration-200 flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                        Pridruži se zgradi
                                    </button>
                                    <a href="{{ route('buildings.show', $building) }}" class="w-full bg-gray-200 text-gray-700 text-center py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                                        Pregledaj
                                    </a>
                                </div>
                            @else
                                <!-- User cannot join (different address) -->
                                <a href="{{ route('buildings.show', $building) }}" class="w-full bg-indigo-600 text-white text-center py-2 px-4 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200 block">
                                    Pregledaj
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $buildings->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                @if(request('search'))
                    <!-- No search results -->
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Nema rezultata pretrage</h3>
                    <p class="text-gray-600 mb-6">
                        Nije pronađena nijedna zgrada koja odgovara pretrazi <span class="font-semibold">"{{ request('search') }}"</span>.
                        Pokušajte sa drugim terminom ili <a href="{{ route('buildings.index') }}" class="text-indigo-600 hover:text-indigo-700 underline">pogledajte sve zgrade</a>.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <button onclick="clearSearch()" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                            Obriši pretragu
                        </button>
                        <a href="{{ route('buildings.store') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Dodaj zgradu
                        </a>
                    </div>
                @else
                    <!-- No buildings at all -->
                    <div class="w-24 h-24 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Nema zgrada</h3>
                    <p class="text-gray-600 mb-6">Još uvek niste dodali nijednu zgradu. Kliknite na dugme ispod da kreirate svoju prvu stambenu zajednicu.</p>
                    <a href="{{ route('buildings.store') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Dodaj prvu zgradu
                    </a>
                @endif
            </div>
        @endif
    </div>
</div>

<!-- Create/Edit Building Modal -->
<div id="buildingModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900" id="modalTitle">Dodaj zgradu</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="buildingForm" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Naziv zgrade</label>
                        <input type="text" id="name" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresa</label>
                        <input type="text" id="address" name="address" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Grad</label>
                        <input type="text" id="city" name="city" value="{{ auth()->user()->city }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label for="neighborhood" class="block text-sm font-medium text-gray-700 mb-1">Naselje</label>
                        <input type="text" id="neighborhood" name="neighborhood" value="{{ auth()->user()->neighborhood }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label for="apartment_number" class="block text-sm font-medium text-gray-700 mb-1">Broj stana (opciono)</label>
                        <input type="text" id="apartment_number" name="apartment_number" placeholder="npr. 5, 12A, ..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Ostavite prazno ako ne želite da unesete broj stana</p>
                    </div>
                    
                    <div class="flex space-x-3 pt-4">
                        <button type="submit" class="flex-1 bg-indigo-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200">
                            Sačuvaj
                        </button>
                        <button type="button" onclick="closeModal()" class="flex-1 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                            Otkaži
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Self Join Modal From List -->
<div id="selfJoinModalFromList" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Pridruži se zgradi</h3>
                <button onclick="closeSelfJoinModalFromList()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="space-y-4">
                <p class="text-sm text-gray-600">Pošaljite zahtev za pridruživanje ovoj zgradi. Manager će pregledati vaš zahtev.</p>
                
                <div>
                    <label for="selfJoinApartmentNumberFromList" class="block text-sm font-medium text-gray-700 mb-1">
                        Broj stana <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="selfJoinApartmentNumberFromList" name="apartment_number" placeholder="npr. 5, 12A, ..." required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <p class="mt-1 text-xs text-gray-500">Broj stana je obavezan</p>
                </div>
                
                <div class="flex space-x-3 pt-4">
                    <button onclick="selfJoinFromList(document.getElementById('selfJoinModalFromList').dataset.buildingId)" class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-700 transition-colors duration-200">
                        Pošalji zahtev
                    </button>
                    <button onclick="closeSelfJoinModalFromList()" class="flex-1 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                        Otkaži
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function editBuilding(buildingId) {
    // Implement edit functionality
    console.log('Edit building:', buildingId);
}

function closeModal() {
    const modal = document.getElementById('buildingModal');
    modal.classList.add('hidden');
    
    // Reset form
    const form = document.getElementById('buildingForm');
    if (form) {
        form.reset();
    }
}

function showNotification(message, type) {
    // Remove any existing notifications first
    const existingNotifications = document.querySelectorAll('.notification-toast');
    existingNotifications.forEach(n => n.remove());
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification-toast fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-2xl max-w-md ${
        type === 'success' 
            ? 'bg-gradient-to-r from-green-500 to-green-600 text-white' 
            : 'bg-gradient-to-r from-red-500 to-red-600 text-white'
    }`;
    
    // Add icon based on type
    const icon = type === 'success' 
        ? '<svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>'
        : '<svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
    
    notification.innerHTML = icon + '<span>' + message + '</span>';
    document.body.appendChild(notification);
    
    // Remove notification after 4 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateY(-20px)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 4000);
}

function openSelfJoinModalFromList(buildingId) {
    // Store building ID in modal
    const modal = document.getElementById('selfJoinModalFromList');
    modal.dataset.buildingId = buildingId;
    modal.classList.remove('hidden');
    // Reset form
    document.getElementById('selfJoinApartmentNumberFromList').value = '';
}

function closeSelfJoinModalFromList() {
    document.getElementById('selfJoinModalFromList').classList.add('hidden');
}

async function selfJoinFromList(buildingId) {
    const apartmentInput = document.getElementById('selfJoinApartmentNumberFromList');
    const apartmentNumber = apartmentInput?.value?.trim() || '';
    
    // Validacija - broj stana je obavezan
    if (!apartmentNumber) {
        showNotification('Morate uneti broj stana.', 'error');
        if (apartmentInput) {
            apartmentInput.focus();
            apartmentInput.classList.add('border-red-500');
            setTimeout(() => {
                apartmentInput.classList.remove('border-red-500');
            }, 3000);
        }
        return;
    }
    
    // Disable button during request
    const submitButton = document.querySelector('#selfJoinModalFromList button[onclick*="selfJoinFromList"]');
    const originalText = submitButton?.textContent || '';
    if (submitButton) {
        submitButton.disabled = true;
        submitButton.textContent = 'Slanje zahteva...';
    }
    
    try {
        const response = await fetch(`/stambene-zajednice/${buildingId}/self-join`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({
                apartment_number: apartmentNumber
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification(data.message, 'success');
            closeSelfJoinModalFromList();
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            let errorMessage = data.message || 'Greška pri pridruživanju zgradi';
            
            // Ako postoje greške validacije, prikaži ih
            if (data.errors && data.errors.apartment_number) {
                errorMessage = data.errors.apartment_number[0] || errorMessage;
                apartmentInput.classList.add('border-red-500');
                setTimeout(() => {
                    apartmentInput.classList.remove('border-red-500');
                }, 3000);
            }
            
            showNotification(errorMessage, 'error');
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri pridruživanju zgradi', 'error');
        if (submitButton) {
            submitButton.disabled = false;
            submitButton.textContent = originalText;
        }
    }
}

// Search Functions
function clearSearch() {
    window.location.href = '{{ route("buildings.index") }}';
}

// Initialize everything on page load
document.addEventListener('DOMContentLoaded', function() {
    // Enter key support for search
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('searchForm').submit();
            }
        });
    }
    
    // Close self join modal when clicking outside
    const selfJoinModalFromList = document.getElementById('selfJoinModalFromList');
    if (selfJoinModalFromList) {
        selfJoinModalFromList.addEventListener('click', function(e) {
            if (e.target === selfJoinModalFromList) {
                closeSelfJoinModalFromList();
            }
        });
    }
    
    // Close modal when clicking outside
    const modal = document.getElementById('buildingModal');
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Show modal when clicking "Dodaj zgradu" buttons on THIS page only
    // Select only buttons within the main content area, not in navigation menus
    const contentArea = document.querySelector('.min-h-screen.bg-gray-50');
    if (contentArea) {
        const addButtons = contentArea.querySelectorAll('a[href="{{ route("buildings.store") }}"]');
        addButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('modalTitle').textContent = 'Dodaj zgradu';
                document.getElementById('buildingForm').action = '{{ route("buildings.store") }}';
                document.getElementById('buildingForm').method = 'POST';
                
                // Reset form
                document.getElementById('name').value = '';
                document.getElementById('address').value = '';
                document.getElementById('city').value = '{{ auth()->user()->city }}';
                document.getElementById('neighborhood').value = '{{ auth()->user()->neighborhood }}';
                
                // Reset form state
                const submitButton = document.querySelector('#buildingForm button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Sačuvaj';
                }
                
                document.getElementById('buildingModal').classList.remove('hidden');
            });
        });
    }

    // Handle form submission with error display
    const buildingForm = document.getElementById('buildingForm');
    if (buildingForm) {
        buildingForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(buildingForm);
            const submitButton = buildingForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Čuvanje...';
            
            try {
                const response = await fetch(buildingForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();
                
                // Check if response is ok
                if (!response.ok) {
                    // Show error from response
                    throw new Error(data?.message || `Server error: ${response.status} ${response.statusText}`);
                }

                if (data.success) {
                    // Close modal
                    closeModal();
                    
                    // Show success message
                    showNotification('Zgrada je uspešno kreirana', 'success');
                    
                    // Reload page after short delay to show the new building
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    // Show error messages
                    if (data.errors) {
                        let errorMsg = '';
                        Object.keys(data.errors).forEach(key => {
                            if (Array.isArray(data.errors[key])) {
                                errorMsg += data.errors[key][0] + '\n';
                            } else {
                                errorMsg += data.errors[key] + '\n';
                            }
                        });
                        // Also highlight the problematic fields
                        Object.keys(data.errors).forEach(fieldName => {
                            const input = buildingForm.querySelector(`[name="${fieldName}"]`);
                            if (input) {
                                input.classList.add('border-red-500');
                                setTimeout(() => {
                                    input.classList.remove('border-red-500');
                                }, 5000);
                            }
                        });
                        showNotification(errorMsg.trim(), 'error');
                    } else if (data.message) {
                        showNotification(data.message, 'error');
                    }
                    
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Desila se greška pri čuvanju zgrade: ' + error.message, 'error');
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });
    }
});
</script>
@endsection
