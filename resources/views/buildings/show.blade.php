@extends('layouts.user')

@section('title', $building->name . ' - Stambene zajednice')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <a href="{{ route('buildings.index') }}" class="hover:text-indigo-600">Stambene zajednice</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-900">{{ $building->name }}</span>
                    </nav>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $building->name }}</h1>
                    <p class="mt-2 text-gray-600">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $building->address }}, {{ $building->neighborhood }}, {{ $building->city }}
                    </p>
                </div>
                <div class="flex items-center space-x-3">
                    @if($building->isManager(auth()->user()))
                        <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                            Manager
                        </span>
                    @else
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                            Stanar
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        @if($building->hasUser(auth()->user()))
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 bg-indigo-100 rounded-lg">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Stanovi</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $building->apartments->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Stanari</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $building->users->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Aktivne prijave</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $building->reports->where('status', 'open')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Ukupni troškovi</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ number_format($building->expenses->sum('amount'), 0, ',', '.') }} RSD</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Navigation Tabs -->
        @if($building->hasUser(auth()->user()))
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 mb-8">
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6">
                    <button onclick="showTab('overview')" class="tab-button py-4 px-1 border-b-2 border-indigo-500 font-medium text-sm text-indigo-600" data-tab="overview">
                        Pregled
                    </button>
                    <button onclick="showTab('reports')" class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="reports">
                        Prijave kvarova
                    </button>
                    <button onclick="showTab('expenses')" class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="expenses">
                        Troškovi
                    </button>
                    <button onclick="showTab('votes')" class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="votes">
                        Glasanja
                    </button>
                    <button onclick="showTab('announcements')" class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700" data-tab="announcements">
                        Objave
                    </button>
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="p-6">
                <!-- Overview Tab -->
                <div id="overview-tab" class="tab-content">
                    <!-- Action Buttons -->
                    <div class="mb-6 flex flex-wrap gap-3">
                        @if($building->isManager(auth()->user()))
                            <button onclick="openAddResidentModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Dodaj stanara
                            </button>
                            <button onclick="loadJoinRequests()" class="bg-orange-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-orange-700 transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Zahtevi za pridruživanje
                                <span id="pendingRequestsBadge" class="ml-2 bg-white text-orange-600 text-xs font-bold px-2 py-0.5 rounded-full hidden">0</span>
                            </button>
                        @elseif(!$building->hasUser(auth()->user()))
                            <button id="selfJoinButton" onclick="checkJoinRequestStatus()" class="bg-green-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-green-700 transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                <span id="selfJoinText">Pridruži se zgradi</span>
                            </button>
                            <div id="joinRequestStatus" class="hidden mt-3 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <p class="text-sm text-yellow-800" id="joinRequestStatusText"></p>
                            </div>
                        @endif
                    </div>

                    <!-- Join Requests Section (for managers) -->
                    @if($building->isManager(auth()->user()))
                    <div id="joinRequestsSection" class="hidden mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Zahtevi za pridruživanje</h3>
                        <div id="joinRequestsList" class="space-y-3">
                            <!-- Zahtevi će biti učitani ovde -->
                        </div>
                    </div>
                    @endif

                    <!-- Members List -->
                    @if($building->hasUser(auth()->user()))
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Članovi zajednice</h3>
                            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                <div class="divide-y divide-gray-200">
                                    @foreach($building->users as $member)
                                        <div class="p-4 flex items-center justify-between hover:bg-gray-50">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                                    <span class="text-indigo-600 font-semibold">{{ substr($member->name, 0, 1) }}</span>
                                                </div>
                                                <div class="ml-4">
                                                    <p class="font-medium text-gray-900">{{ $member->name }}</p>
                                                    <p class="text-sm text-gray-500">{{ $member->email }}</p>
                                                </div>
                                            </div>
                                            <div>
                                                @if($member->pivot->role_in_building === 'manager')
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Manager</span>
                                                @else
                                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Stanar</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mb-8 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm text-yellow-800">
                                    <strong>Niste član ove zgrade.</strong> Detaljnije informacije su dostupne samo članovima. 
                                    Ako živite na ovoj adresi, možete se pridružiti klikom na dugme "Pridruži se zgradi".
                                </p>
                            </div>
                        </div>
                    @endif

                    @if($building->hasUser(auth()->user()))
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Recent Reports -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Poslednje prijave</h3>
                                <div class="space-y-3">
                                    @forelse($building->reports->take(5) as $report)
                                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $report->title }}</p>
                                                <p class="text-sm text-gray-500">{{ $report->created_at->diffForHumans() }}</p>
                                            </div>
                                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $report->status === 'open' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                                {{ $report->status === 'open' ? 'Otvoreno' : 'Zatvoreno' }}
                                            </span>
                                        </div>
                                    @empty
                                        <p class="text-gray-500 text-center py-4">Nema prijava</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Recent Announcements -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Poslednje objave</h3>
                                <div class="space-y-3">
                                    @forelse($building->announcements->take(5) as $announcement)
                                        <div class="p-3 bg-gray-50 rounded-lg">
                                            <p class="font-medium text-gray-900">{{ $announcement->title }}</p>
                                            <p class="text-sm text-gray-500">{{ $announcement->created_at->diffForHumans() }}</p>
                                        </div>
                                    @empty
                                        <p class="text-gray-500 text-center py-4">Nema objava</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Reports Tab -->
                <div id="reports-tab" class="tab-content hidden">
                    <div class="mb-6 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Prijave kvarova</h3>
                        <button onclick="openReportModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Prijavi kvar
                        </button>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-sm text-gray-500">Kliknite na prijavu da biste videli detalje</p>
                    </div>
                    
                    <div id="reports-list" class="space-y-3">
                        <div class="text-center py-8">
                            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
                            <p class="mt-2 text-gray-500">Učitavanje prijava...</p>
                        </div>
                    </div>
                </div>

                <div id="expenses-tab" class="tab-content hidden">
                    <p class="text-gray-500 text-center py-8">Učitavanje troškova...</p>
                </div>

                <!-- Votes Tab -->
                <div id="votes-tab" class="tab-content hidden">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Glasanja u zgradi</h3>
                        
                        @if($building->isManager(auth()->user()))
                            <!-- Manager Section -->
                            <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4 mb-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-indigo-900 mb-1">Vi ste upravnik zgrade</h4>
                                        <p class="text-sm text-indigo-700">Možete kreirati nova glasanja za stanare zgrade.</p>
                                    </div>
                                    <button onclick="openVoteModal()" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200 flex items-center shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Kreiraj novo glasanje
                                    </button>
                                </div>
                            </div>
                        @else
                            <!-- Non-Manager Info -->
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-sm text-blue-700">Samo upravnik zgrade može kreirati nova glasanja. Kontaktirajte upravnika za kreiranje novog glasanja.</p>
                                </div>
                            </div>
                        @endif
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-500">Kliknite na glasanje da biste videli detalje i glasali</p>
                        </div>
                    </div>
                    
                    <div id="votes-list" class="space-y-3">
                        <div class="text-center py-8">
                            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
                            <p class="mt-2 text-gray-500">Učitavanje glasanja...</p>
                        </div>
                    </div>
                </div>

                <!-- Announcements Tab -->
                <div id="announcements-tab" class="tab-content hidden">
                    @if($building->isManager(auth()->user()))
                        <div class="mb-6 flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Objave</h3>
                            <button onclick="openAnnouncementModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Nova objava
                            </button>
                        </div>
                    @else
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Objave</h3>
                        </div>
                    @endif
                    
                    <div class="mb-4">
                        <p class="text-sm text-gray-500">Kliknite na objavu da biste videli detalje</p>
                    </div>
                    
                    <div id="announcements-list" class="space-y-3">
                        <div class="text-center py-8">
                            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
                            <p class="mt-2 text-gray-500">Učitavanje objava...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Vote Modal -->
<div id="voteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-10 mx-auto p-5 border w-full max-w-3xl shadow-xl rounded-lg bg-white mb-10">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900">Kreiraj novo glasanje</h3>
                    <p class="text-sm text-gray-500 mt-1">Kreirajte glasanje za stanare zgrade sa više opcija</p>
                </div>
                <button onclick="closeVoteModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="voteForm" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="vote_title" class="block text-sm font-medium text-gray-700 mb-1">Naslov glasanja</label>
                        <input type="text" id="vote_title" name="title" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="npr. Odabir upravnika zgrade">
                    </div>
                    
                    <div>
                        <label for="vote_description" class="block text-sm font-medium text-gray-700 mb-1">Opis glasanja</label>
                        <textarea id="vote_description" name="description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Detaljno opišite predmet glasanja..."></textarea>
                        <p class="mt-1 text-xs text-gray-500">Maksimalno 2000 karaktera</p>
                    </div>
                    
                    <div>
                        <label for="vote_deadline" class="block text-sm font-medium text-gray-700 mb-1">Rok za glasanje</label>
                        <input type="datetime-local" id="vote_deadline" name="deadline" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" min="{{ date('Y-m-d\TH:i') }}">
                        <p class="mt-1 text-xs text-gray-500">Izaberite datum i vreme do kada je glasanje aktivno</p>
                    </div>
                    
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-sm font-medium text-gray-700">Opcije za glasanje</label>
                            <button type="button" onclick="addVoteOption()" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">
                                + Dodaj opciju
                            </button>
                        </div>
                        <div id="vote-options-list" class="space-y-2">
                            <div class="flex items-center space-x-2">
                                <input type="text" name="options[]" required class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Opcija 1">
                                <button type="button" onclick="removeVoteOption(this)" class="text-red-600 hover:text-red-700 p-2 hidden">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="text" name="options[]" required class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Opcija 2">
                                <button type="button" onclick="removeVoteOption(this)" class="text-red-600 hover:text-red-700 p-2 hidden">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Minimum 2 opcije (maksimalno 10)</p>
                    </div>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mt-4">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-xs text-blue-700">
                                <p class="font-medium mb-1">Savet:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Unesite jasno i konkretno pitanje</li>
                                    <li>Dodajte najmanje 2 opcije za glasanje</li>
                                    <li>Postavite razuman rok za glasanje</li>
                                    <li>Stanari mogu glasati samo jednom</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-3 pt-4 border-t border-gray-200 mt-4">
                        <button type="submit" class="flex-1 bg-indigo-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200 shadow-md flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Kreiraj glasanje
                        </button>
                        <button type="button" onclick="closeVoteModal()" class="flex-1 bg-gray-200 text-gray-700 py-3 px-6 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                            Otkaži
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Announcement Modal -->
<div id="announcementModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Nova objava</h3>
                <button onclick="closeAnnouncementModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="announcementForm" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="announcement_title" class="block text-sm font-medium text-gray-700 mb-1">Naslov objave</label>
                        <input type="text" id="announcement_title" name="title" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="npr. Važna obaveštenje">
                    </div>
                    
                    <div>
                        <label for="announcement_content" class="block text-sm font-medium text-gray-700 mb-1">Sadržaj objave</label>
                        <textarea id="announcement_content" name="content" rows="6" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Unesite tekst objave..."></textarea>
                        <p class="mt-1 text-xs text-gray-500">Maksimalno 5000 karaktera</p>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="announcement_pinned" name="pinned" value="1" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="announcement_pinned" class="ml-2 text-sm text-gray-700">Prikvači objavu na vrh</label>
                    </div>
                    
                    <div class="flex space-x-3 pt-4">
                        <button type="submit" class="flex-1 bg-indigo-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200">
                            Objavi
                        </button>
                        <button type="button" onclick="closeAnnouncementModal()" class="flex-1 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                            Otkaži
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Report Modal -->
<div id="reportModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Prijavi kvar</h3>
                <button onclick="closeReportModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="reportForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="report_title" class="block text-sm font-medium text-gray-700 mb-1">Naslov prijave</label>
                        <input type="text" id="report_title" name="title" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="npr. Prokišnjavanje krova">
                    </div>
                    
                    <div>
                        <label for="report_description" class="block text-sm font-medium text-gray-700 mb-1">Opis kvara</label>
                        <textarea id="report_description" name="description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Detaljno opišite problem..."></textarea>
                    </div>
                    
                    <div>
                        <label for="report_photo" class="block text-sm font-medium text-gray-700 mb-1">Slika (opciono)</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-indigo-500 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg id="upload-icon" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="report_photo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Izaberi fajl</span>
                                        <input id="report_photo" name="photo" type="file" accept="image/*" class="sr-only" onchange="previewReportImage(this)">
                                    </label>
                                    <p class="pl-1">ili prevucite ovde</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF do 2MB</p>
                                <img id="photo-preview" class="mt-2 max-w-full max-h-48 mx-auto rounded-lg hidden" alt="Preview">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-3 pt-4">
                        <button type="submit" class="flex-1 bg-indigo-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200">
                            Prijavi kvar
                        </button>
                        <button type="button" onclick="closeReportModal()" class="flex-1 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                            Otkaži
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Resident Modal -->
<div id="addResidentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Dodaj stanara</h3>
                <button onclick="closeAddResidentModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div id="eligibleUsersList" class="max-h-96 overflow-y-auto">
                <div class="text-center py-8">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
                    <p class="mt-2 text-gray-500">Učitavanje korisnika...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-2xl max-w-md ${
        type === 'success' 
            ? 'bg-gradient-to-r from-green-500 to-green-600 text-white' 
            : 'bg-gradient-to-r from-red-500 to-red-600 text-white'
    }`;
    
    const icon = type === 'success' 
        ? '<svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>'
        : '<svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
    
    notification.innerHTML = icon + '<span>' + message + '</span>';
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateY(-20px)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 4000);
}

async function openAddResidentModal() {
    const modal = document.getElementById('addResidentModal');
    const listContainer = document.getElementById('eligibleUsersList');
    
    modal.classList.remove('hidden');
    listContainer.innerHTML = `
        <div class="text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
            <p class="mt-2 text-gray-500">Učitavanje korisnika...</p>
        </div>
    `;
    
    try {
        const response = await fetch('{{ route("buildings.eligibleUsers", $building->id) }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            }
        });
        
        const data = await response.json();
        
        if (data.success && data.data.length > 0) {
            listContainer.innerHTML = `
                <div class="space-y-2">
                    <p class="text-sm text-gray-600 mb-4">Korisnici koji žive na adresi <strong>{{ $building->address }}</strong> i mogu biti dodati:</p>
                    ${data.data.map(user => `
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <span class="text-indigo-600 font-semibold">${user.name.charAt(0)}</span>
                                </div>
                                <div class="ml-4">
                                    <p class="font-medium text-gray-900">${user.name}</p>
                                    <p class="text-sm text-gray-500">${user.email}</p>
                                </div>
                            </div>
                            <button onclick="addResident(${user.id})" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-200">
                                Dodaj
                            </button>
                        </div>
                    `).join('')}
                </div>
            `;
        } else {
            listContainer.innerHTML = `
                <div class="text-center py-8">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="text-gray-500">Nema korisnika sa ovom adresom koji mogu biti dodati.</p>
                    <p class="text-sm text-gray-400 mt-2">Svi korisnici sa ovom adresom su već članovi zgrade.</p>
                </div>
            `;
        }
    } catch (error) {
        console.error('Error:', error);
        listContainer.innerHTML = `
            <div class="text-center py-8 text-red-600">
                <p>Desila se greška pri učitavanju korisnika.</p>
            </div>
        `;
    }
}

function closeAddResidentModal() {
    document.getElementById('addResidentModal').classList.add('hidden');
}

async function addResident(userId) {
    try {
        const response = await fetch('{{ route("buildings.addResident", $building->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ user_id: userId })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification(data.message, 'success');
            closeAddResidentModal();
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            showNotification(data.message || 'Greška pri dodavanju korisnika', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri dodavanju korisnika', 'error');
    }
}

async function selfJoinBuilding() {
    if (!confirm('Da li ste sigurni da želite da se pridružite ovoj zgradi?')) {
        return;
    }
    
    try {
        const response = await fetch('{{ route("buildings.selfJoin", $building->id) }}', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification(data.message, 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            showNotification(data.message || 'Greška pri pridruživanju zgradi', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri pridruživanju zgradi', 'error');
    }
}

// Close modal when clicking outside
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('addResidentModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeAddResidentModal();
            }
        });
    }
});

function showTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });

    // Remove active class from all buttons
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('border-indigo-500', 'text-indigo-600');
        button.classList.add('border-transparent', 'text-gray-500');
    });

    // Show selected tab content
    document.getElementById(tabName + '-tab').classList.remove('hidden');

    // Add active class to selected button
    const activeButton = document.querySelector(`[data-tab="${tabName}"]`);
    activeButton.classList.remove('border-transparent', 'text-gray-500');
    activeButton.classList.add('border-indigo-500', 'text-indigo-600');

    // Load content via AJAX if needed
    if (tabName !== 'overview') {
        loadTabContent(tabName);
    }
}

async function loadTabContent(tabName) {
    const tabContent = document.getElementById(tabName + '-tab');
    
    switch(tabName) {
        case 'reports':
            await loadReports();
            break;
        case 'expenses':
            tabContent.innerHTML = '<p class="text-gray-500 text-center py-8">Funkcionalnost troškova će biti implementirana uskoro.</p>';
            break;
        case 'votes':
            await loadVotes();
            break;
        case 'announcements':
            await loadAnnouncements();
            break;
    }
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

async function loadReports() {
    const reportsList = document.getElementById('reports-list');
    if (!reportsList) return;
    
    reportsList.innerHTML = `
        <div class="text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
            <p class="mt-2 text-gray-500">Učitavanje prijava...</p>
        </div>
    `;
    
    try {
        const response = await fetch('{{ route("reports.index", $building->id) }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        const data = await response.json();
        
        const isManager = {{ $building->isManager(auth()->user()) ? 'true' : 'false' }};
        
        if (data.success && data.data.data.length > 0) {
            reportsList.innerHTML = data.data.data.map(report => `
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-lg hover:border-indigo-300 transition-all cursor-pointer group" onclick="toggleReportDetails(${report.id})">
                    <div class="p-4">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h4 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition-colors">${escapeHtml(report.title)}</h4>
                                <p class="text-sm text-gray-500">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    ${escapeHtml(report.user.name)} • 
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    ${new Date(report.created_at).toLocaleDateString('sr-RS')}
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="px-3 py-1 text-xs font-medium rounded-full ${report.status === 'open' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800'}">
                                    ${report.status === 'open' ? 'Otvoreno' : 'Zatvoreno'}
                                </span>
                                <svg id="report-arrow-${report.id}" class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Details (hidden by default) -->
                    <div id="report-details-${report.id}" class="hidden border-t border-gray-200 bg-gradient-to-br from-gray-50 to-white">
                        <div class="p-6 space-y-4">
                            <div class="bg-white rounded-lg p-4 border border-gray-100">
                                <h5 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Opis kvara:
                                </h5>
                                <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">${escapeHtml(report.description)}</p>
                            </div>
                            
                            ${report.photo ? `
                                <div class="bg-white rounded-lg p-4 border border-gray-100">
                                    <h5 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Pridružena slika:
                                    </h5>
                                    <div class="relative">
                                        <img src="/storage/${report.photo}" alt="Prijava slika" class="max-w-full h-auto rounded-lg border border-gray-200 cursor-pointer hover:opacity-90 transition-opacity shadow-sm" onclick="event.stopPropagation(); showImageModal('/storage/${report.photo}')">
                                        <div class="absolute top-2 right-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">
                                            Klik za uvećanje
                                        </div>
                                    </div>
                                </div>
                            ` : ''}
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-500 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Kreirano: ${new Date(report.created_at).toLocaleString('sr-RS')}
                                </p>
                                ${report.status === 'open' && isManager ? `
                                    <button onclick="event.stopPropagation(); closeReport(${report.id})" class="text-sm bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center shadow-sm">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Označi kao rešeno
                                    </button>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        } else {
            reportsList.innerHTML = `
                <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500">Još uvek nema prijava kvarova.</p>
                </div>
            `;
        }
    } catch (error) {
        console.error('Error loading reports:', error);
        reportsList.innerHTML = '<p class="text-red-500 text-center py-8">Greška pri učitavanju prijava.</p>';
    }
}

function openReportModal() {
    document.getElementById('reportModal').classList.remove('hidden');
    document.getElementById('reportForm').reset();
    document.getElementById('photo-preview').classList.add('hidden');
    document.getElementById('upload-icon').classList.remove('hidden');
}

function closeReportModal() {
    document.getElementById('reportModal').classList.add('hidden');
    document.getElementById('reportForm').reset();
    document.getElementById('photo-preview').classList.add('hidden');
    document.getElementById('upload-icon').classList.remove('hidden');
}

function previewReportImage(input) {
    const preview = document.getElementById('photo-preview');
    const uploadIcon = document.getElementById('upload-icon');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            uploadIcon.classList.add('hidden');
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
        uploadIcon.classList.remove('hidden');
    }
}

function toggleReportDetails(reportId) {
    const details = document.getElementById(`report-details-${reportId}`);
    const arrow = document.getElementById(`report-arrow-${reportId}`);
    
    if (details.classList.contains('hidden')) {
        // Close all other open reports
        document.querySelectorAll('[id^="report-details-"]').forEach(el => {
            if (!el.id.includes(reportId)) {
                el.classList.add('hidden');
                const otherReportId = el.id.replace('report-details-', '');
                const otherArrow = document.getElementById(`report-arrow-${otherReportId}`);
                if (otherArrow) {
                    otherArrow.classList.remove('rotate-180');
                }
            }
        });
        
        // Open this report
        details.classList.remove('hidden');
        if (arrow) {
            arrow.classList.add('rotate-180');
        }
    } else {
        // Close this report
        details.classList.add('hidden');
        if (arrow) {
            arrow.classList.remove('rotate-180');
        }
    }
}

function showImageModal(imageSrc) {
    // Create image modal
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center';
    modal.onclick = () => modal.remove();
    
    modal.innerHTML = `
        <div class="relative max-w-4xl max-h-full p-4">
            <button onclick="this.closest('.fixed').remove()" class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img src="${imageSrc}" alt="Prijava slika" class="max-w-full max-h-screen rounded-lg" onclick="event.stopPropagation()">
        </div>
    `;
    
    document.body.appendChild(modal);
}

// Handle report form submission
document.addEventListener('DOMContentLoaded', function() {
    const reportForm = document.getElementById('reportForm');
    if (reportForm) {
        reportForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(reportForm);
            const submitButton = reportForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Prijavljivanje...';
            
            try {
                const response = await fetch('{{ route("reports.store", $building->id) }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showNotification(data.message, 'success');
                    closeReportModal();
                    await loadReports();
                } else {
                    if (data.errors) {
                        let errorMsg = '';
                        Object.keys(data.errors).forEach(key => {
                            if (Array.isArray(data.errors[key])) {
                                errorMsg += data.errors[key][0] + '\n';
                            } else {
                                errorMsg += data.errors[key] + '\n';
                            }
                        });
                        showNotification(errorMsg.trim(), 'error');
                    } else {
                        showNotification(data.message || 'Greška pri prijavljivanju kvara', 'error');
                    }
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Desila se greška pri prijavljivanju kvara', 'error');
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });
    }
    
    // Close report modal when clicking outside
    const reportModal = document.getElementById('reportModal');
    if (reportModal) {
        reportModal.addEventListener('click', function(e) {
            if (e.target === reportModal) {
                closeReportModal();
            }
        });
    }
    
    // Handle announcement form submission
    const announcementForm = document.getElementById('announcementForm');
    if (announcementForm) {
        announcementForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(announcementForm);
            // Handle pinned checkbox - if not checked, explicitly set to false
            const pinnedCheckbox = document.getElementById('announcement_pinned');
            formData.delete('pinned'); // Remove first to avoid duplicates
            formData.append('pinned', pinnedCheckbox.checked ? '1' : '0');
            
            const submitButton = announcementForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Objavljivanje...';
            
            try {
                const response = await fetch('{{ route("announcements.store", $building->id) }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showNotification(data.message, 'success');
                    closeAnnouncementModal();
                    await loadAnnouncements();
                } else {
                    if (data.errors) {
                        let errorMsg = '';
                        Object.keys(data.errors).forEach(key => {
                            if (Array.isArray(data.errors[key])) {
                                errorMsg += data.errors[key][0] + '\n';
                            } else {
                                errorMsg += data.errors[key] + '\n';
                            }
                        });
                        showNotification(errorMsg.trim(), 'error');
                    } else {
                        showNotification(data.message || 'Greška pri objavljivanju', 'error');
                    }
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Desila se greška pri objavljivanju', 'error');
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });
    }
    
    // Close announcement modal when clicking outside
    const announcementModal = document.getElementById('announcementModal');
    if (announcementModal) {
        announcementModal.addEventListener('click', function(e) {
            if (e.target === announcementModal) {
                closeAnnouncementModal();
            }
        });
    }
    
    // Handle vote form submission
    const voteForm = document.getElementById('voteForm');
    if (voteForm) {
        voteForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(voteForm);
            const options = [];
            formData.getAll('options[]').forEach(option => {
                if (option.trim()) {
                    options.push(option.trim());
                }
            });
            
            if (options.length < 2) {
                showNotification('Potrebno je najmanje 2 opcije', 'error');
                return;
            }
            
            const submitButton = voteForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Kreiranje...';
            
            try {
                const response = await fetch('{{ route("votes.store", $building->id) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify({
                        title: formData.get('title'),
                        description: formData.get('description'),
                        deadline: formData.get('deadline'),
                        options: options
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showNotification(data.message, 'success');
                    closeVoteModal();
                    
                    // Make sure votes tab is visible and reload
                    const votesTab = document.getElementById('votes-tab');
                    if (votesTab && votesTab.classList.contains('hidden')) {
                        // Activate votes tab if not already active
                        document.querySelectorAll('.tab-button').forEach(btn => {
                            if (btn.getAttribute('onclick')?.includes('votes')) {
                                btn.click();
                            }
                        });
                    }
                    
                    // Reload votes after creation
                    setTimeout(async () => {
                        await loadVotes();
                    }, 300);
                } else {
                    if (data.errors) {
                        let errorMsg = '';
                        Object.keys(data.errors).forEach(key => {
                            if (Array.isArray(data.errors[key])) {
                                errorMsg += data.errors[key][0] + '\n';
                            } else {
                                errorMsg += data.errors[key] + '\n';
                            }
                        });
                        showNotification(errorMsg.trim(), 'error');
                    } else {
                        showNotification(data.message || 'Greška pri kreiranju glasanja', 'error');
                    }
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Desila se greška pri kreiranju glasanja', 'error');
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });
    }
    
    // Close vote modal when clicking outside
    const voteModal = document.getElementById('voteModal');
    if (voteModal) {
        voteModal.addEventListener('click', function(e) {
            if (e.target === voteModal) {
                closeVoteModal();
            }
        });
    }
});

async function loadAnnouncements() {
    const announcementsList = document.getElementById('announcements-list');
    if (!announcementsList) return;
    
    announcementsList.innerHTML = `
        <div class="text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
            <p class="mt-2 text-gray-500">Učitavanje objava...</p>
        </div>
    `;
    
    try {
        const response = await fetch('{{ route("announcements.index", $building->id) }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        const data = await response.json();
        
        const isManager = {{ $building->isManager(auth()->user()) ? 'true' : 'false' }};
        
        if (data.success && data.data.data.length > 0) {
            announcementsList.innerHTML = data.data.data.map(announcement => `
                <div class="bg-white rounded-lg border ${announcement.pinned ? 'border-indigo-300 border-2' : 'border-gray-200'} shadow-sm hover:shadow-lg hover:border-indigo-300 transition-all cursor-pointer group" onclick="toggleAnnouncementDetails(${announcement.id})">
                    <div class="p-4">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-2">
                                    ${announcement.pinned ? `
                                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                        </svg>
                                        <span class="text-xs text-indigo-600 font-medium">PRIKVAČENO</span>
                                    ` : ''}
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition-colors">${escapeHtml(announcement.title)}</h4>
                                <p class="text-sm text-gray-500">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    ${escapeHtml(announcement.user?.name || 'N/A')} • 
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    ${new Date(announcement.created_at).toLocaleDateString('sr-RS')} • 
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    ${announcement.comments?.length || 0} komentara
                                </p>
                            </div>
                            <svg id="announcement-arrow-${announcement.id}" class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Details (hidden by default) -->
                    <div id="announcement-details-${announcement.id}" class="hidden border-t border-gray-200 bg-gradient-to-br from-gray-50 to-white">
                        <div class="p-6 space-y-4">
                            <div class="bg-white rounded-lg p-4 border border-gray-100">
                                <h5 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                    Sadržaj objave:
                                </h5>
                                <div class="text-gray-700 whitespace-pre-wrap leading-relaxed">
                                    ${escapeHtml(announcement.content)}
                                </div>
                            </div>
                            
                            <!-- Comments Section -->
                            <div class="bg-white rounded-lg p-4 border border-gray-100">
                                <h5 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    Komentari (${announcement.comments?.length || 0}):
                                </h5>
                                
                                <!-- Existing Comments -->
                                <div id="comments-${announcement.id}" class="space-y-3 mb-4">
                                    ${(announcement.comments || []).length > 0 ? 
                                        (announcement.comments || []).map(comment => `
                                            <div class="bg-gray-50 rounded-lg p-3">
                                                <div class="flex items-start justify-between mb-1">
                                                    <p class="font-medium text-sm text-gray-900">${escapeHtml(comment.user?.name || 'N/A')}</p>
                                                    <p class="text-xs text-gray-500">${new Date(comment.created_at).toLocaleDateString('sr-RS')}</p>
                                                </div>
                                                <p class="text-gray-700 text-sm whitespace-pre-wrap">${escapeHtml(comment.content)}</p>
                                            </div>
                                        `).join('')
                                        : '<p class="text-sm text-gray-500 italic">Nema komentara. Budite prvi koji će komentarisati!</p>'
                                    }
                                </div>
                                
                                <!-- Add Comment Form -->
                                <div class="border-t border-gray-200 pt-3 mt-4">
                                    <textarea id="comment-${announcement.id}" rows="2" placeholder="Napišite komentar..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm mb-2" onclick="event.stopPropagation()"></textarea>
                                    <button onclick="event.stopPropagation(); addComment(${announcement.id})" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                                        Dodaj komentar
                                    </button>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-500 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Kreirano: ${new Date(announcement.created_at).toLocaleString('sr-RS')}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        } else {
            announcementsList.innerHTML = `
                <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <p class="text-gray-500">Još uvek nema objava.</p>
                </div>
            `;
        }
    } catch (error) {
        console.error('Error loading announcements:', error);
        announcementsList.innerHTML = '<p class="text-red-500 text-center py-8">Greška pri učitavanju objava.</p>';
    }
}

function toggleAnnouncementDetails(announcementId) {
    const details = document.getElementById(`announcement-details-${announcementId}`);
    const arrow = document.getElementById(`announcement-arrow-${announcementId}`);
    
    if (details.classList.contains('hidden')) {
        // Close all other open announcements
        document.querySelectorAll('[id^="announcement-details-"]').forEach(el => {
            if (!el.id.includes(announcementId.toString())) {
                el.classList.add('hidden');
                const otherAnnouncementId = el.id.replace('announcement-details-', '');
                const otherArrow = document.getElementById(`announcement-arrow-${otherAnnouncementId}`);
                if (otherArrow) {
                    otherArrow.classList.remove('rotate-180');
                }
            }
        });
        
        // Open this announcement
        details.classList.remove('hidden');
        if (arrow) {
            arrow.classList.add('rotate-180');
        }
    } else {
        // Close this announcement
        details.classList.add('hidden');
        if (arrow) {
            arrow.classList.remove('rotate-180');
        }
    }
}

function openAnnouncementModal() {
    document.getElementById('announcementModal').classList.remove('hidden');
    document.getElementById('announcementForm').reset();
}

function closeAnnouncementModal() {
    document.getElementById('announcementModal').classList.add('hidden');
    document.getElementById('announcementForm').reset();
}

async function addComment(announcementId) {
    const textarea = document.getElementById(`comment-${announcementId}`);
    const content = textarea.value.trim();
    
    if (!content) {
        showNotification('Unesite tekst komentara', 'error');
        return;
    }
    
    const commentForm = textarea.closest('.border-t');
    const submitButton = commentForm.querySelector('button');
    const originalText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.textContent = 'Dodavanje...';
    
    try {
        const response = await fetch(`{{ route('announcements.comments.store', [$building->id, 0]) }}`.replace('/0/komentari', `/${announcementId}/komentari`), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ content: content })
        });
        
        const data = await response.json();
        
        if (data.success) {
            textarea.value = '';
            showNotification('Komentar je dodat', 'success');
            // Keep announcement open after reload
            const wasOpen = !document.getElementById(`announcement-details-${announcementId}`).classList.contains('hidden');
            await loadAnnouncements();
            // Reopen if it was open
            if (wasOpen) {
                setTimeout(() => toggleAnnouncementDetails(announcementId), 100);
            }
        } else {
            showNotification(data.message || 'Greška pri dodavanju komentara', 'error');
            submitButton.disabled = false;
            submitButton.textContent = originalText;
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri dodavanju komentara', 'error');
        submitButton.disabled = false;
        submitButton.textContent = originalText;
    }
}

async function loadVotes() {
    const votesList = document.getElementById('votes-list');
    if (!votesList) {
        console.error('votes-list element not found');
        return;
    }
    
    votesList.innerHTML = `
        <div class="text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
            <p class="mt-2 text-gray-500">Učitavanje glasanja...</p>
        </div>
    `;
    
    try {
        const response = await fetch('{{ route("votes.index", $building->id) }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
                const data = await response.json();
        console.log('Votes data received:', data);
        
        // Check if data structure is correct - handle both paginated and non-paginated responses
        let votes = [];
        if (data.success && data.data) {
            if (Array.isArray(data.data)) {
                votes = data.data;
            } else if (data.data.data && Array.isArray(data.data.data)) {
                votes = data.data.data;
            } else if (data.data.items && Array.isArray(data.data.items)) {
                votes = data.data.items;
            }
        }
        
        console.log('Parsed votes:', votes);
        console.log('Votes count:', votes.length);
        
        if (data.success && votes.length > 0) {
            votesList.innerHTML = votes.map(vote => {
                const isActive = vote.is_active;
                const userHasVoted = vote.user_has_voted;
                const deadline = new Date(vote.deadline);
                const now = new Date();
                const timeRemaining = deadline - now;
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                
                return `
                    <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-lg hover:border-indigo-300 transition-all cursor-pointer group" onclick="toggleVoteDetails(${vote.id})">
                        <div class="p-4">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        ${isActive ? `
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                                Aktivno
                                            </span>
                                        ` : `
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                                Završeno
                                            </span>
                                        `}
                                        ${userHasVoted ? `
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                                Već ste glasali
                                            </span>
                                        ` : ''}
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition-colors">${escapeHtml(vote.title)}</h4>
                                    <p class="text-sm text-gray-500 mb-2">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Rok: ${deadline.toLocaleDateString('sr-RS')} ${deadline.toLocaleTimeString('sr-RS', {hour: '2-digit', minute: '2-digit'})}
                                        ${isActive && days >= 0 ? ` • ${days}d ${hours}h preostalo` : ''}
                                    </p>
                                    <p class="text-xs text-gray-400 line-clamp-2">${escapeHtml(vote.description)}</p>
                                </div>
                                <svg id="vote-arrow-${vote.id}" class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Details (hidden by default) -->
                        <div id="vote-details-${vote.id}" class="hidden border-t border-gray-200 bg-gradient-to-br from-gray-50 to-white">
                            <div class="p-6 space-y-4">
                                <div class="bg-white rounded-lg p-4 border border-gray-100">
                                    <h5 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Opis glasanja:
                                    </h5>
                                    <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">${escapeHtml(vote.description)}</p>
                                </div>
                                
                                ${isActive && !userHasVoted ? `
                                    <div class="bg-white rounded-lg p-4 border border-gray-100" onclick="event.stopPropagation()">
                                        <h5 class="text-sm font-semibold text-gray-800 mb-3">Vaš glas:</h5>
                                        <div class="space-y-2">
                                            ${vote.options.map(option => `
                                                <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                                    <input type="radio" name="vote-option-${vote.id}" value="${option.id}" class="w-4 h-4 text-indigo-600 focus:ring-indigo-500">
                                                    <span class="ml-3 text-gray-700">${escapeHtml(option.option_text)}</span>
                                                </label>
                                            `).join('')}
                                        </div>
                                        <button onclick="event.stopPropagation(); submitVote(${vote.id})" class="mt-4 w-full bg-indigo-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                                            Pošalji glas
                                        </button>
                                    </div>
                                ` : ''}
                                
                                ${userHasVoted || !isActive ? `
                                    <div class="bg-white rounded-lg p-4 border border-gray-100">
                                        <h5 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                            Rezultati glasanja:
                                        </h5>
                                        <div class="space-y-3">
                                            ${vote.options.map(option => {
                                                const voteCount = option.results?.length || 0;
                                                const totalVotes = vote.options.reduce((sum, opt) => sum + (opt.results?.length || 0), 0);
                                                const percentage = totalVotes > 0 ? Math.round((voteCount / totalVotes) * 100) : 0;
                                                return `
                                                    <div>
                                                        <div class="flex items-center justify-between mb-1">
                                                            <span class="text-sm font-medium text-gray-700">${escapeHtml(option.option_text)}</span>
                                                            <span class="text-sm text-gray-600">${voteCount} glasova (${percentage}%)</span>
                                                        </div>
                                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-indigo-600 h-2 rounded-full transition-all" style="width: ${percentage}%"></div>
                                                        </div>
                                                    </div>
                                                `;
                                            }).join('')}
                                        </div>
                                        <p class="mt-3 text-xs text-gray-500 text-center">
                                            Ukupno glasova: ${vote.options.reduce((sum, opt) => sum + (opt.results?.length || 0), 0)}
                                        </p>
                                    </div>
                                ` : ''}
                                
                                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                    <p class="text-xs text-gray-500 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Kreirano: ${new Date(vote.created_at).toLocaleString('sr-RS')}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        } else {
            votesList.innerHTML = `
                <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-gray-500">Još uvek nema glasanja.</p>
                </div>
            `;
        }
    } catch (error) {
        console.error('Error loading votes:', error);
        votesList.innerHTML = `
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <p class="text-red-800 font-medium mb-2">Greška pri učitavanju glasanja</p>
                <p class="text-red-600 text-sm">${error.message || 'Došlo je do greške. Molimo osvežite stranicu.'}</p>
            </div>
        `;
    }
}

function toggleVoteDetails(voteId) {
    const details = document.getElementById(`vote-details-${voteId}`);
    const arrow = document.getElementById(`vote-arrow-${voteId}`);
    
    if (details.classList.contains('hidden')) {
        // Close all other open votes
        document.querySelectorAll('[id^="vote-details-"]').forEach(el => {
            if (!el.id.includes(voteId.toString())) {
                el.classList.add('hidden');
                const otherVoteId = el.id.replace('vote-details-', '');
                const otherArrow = document.getElementById(`vote-arrow-${otherVoteId}`);
                if (otherArrow) {
                    otherArrow.classList.remove('rotate-180');
                }
            }
        });
        
        // Open this vote
        details.classList.remove('hidden');
        if (arrow) {
            arrow.classList.add('rotate-180');
        }
    } else {
        // Close this vote
        details.classList.add('hidden');
        if (arrow) {
            arrow.classList.remove('rotate-180');
        }
    }
}

function openVoteModal() {
    document.getElementById('voteModal').classList.remove('hidden');
    document.getElementById('voteForm').reset();
    // Reset options to 2
    const optionsList = document.getElementById('vote-options-list');
    optionsList.innerHTML = `
        <div class="flex items-center space-x-2">
            <input type="text" name="options[]" required class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Opcija 1">
            <button type="button" onclick="removeVoteOption(this)" class="text-red-600 hover:text-red-700 p-2 hidden">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        <div class="flex items-center space-x-2">
            <input type="text" name="options[]" required class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Opcija 2">
            <button type="button" onclick="removeVoteOption(this)" class="text-red-600 hover:text-red-700 p-2 hidden">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
    `;
    updateRemoveButtons();
}

function closeVoteModal() {
    document.getElementById('voteModal').classList.add('hidden');
    document.getElementById('voteForm').reset();
}

function addVoteOption() {
    const optionsList = document.getElementById('vote-options-list');
    const optionCount = optionsList.children.length;
    
    if (optionCount >= 10) {
        showNotification('Maksimalno 10 opcija je dozvoljeno', 'error');
        return;
    }
    
    const newOption = document.createElement('div');
    newOption.className = 'flex items-center space-x-2';
    newOption.innerHTML = `
        <input type="text" name="options[]" required class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Opcija ${optionCount + 1}">
        <button type="button" onclick="removeVoteOption(this)" class="text-red-600 hover:text-red-700 p-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    `;
    optionsList.appendChild(newOption);
    updateRemoveButtons();
}

function removeVoteOption(button) {
    const optionsList = document.getElementById('vote-options-list');
    if (optionsList.children.length <= 2) {
        showNotification('Minimum 2 opcije je potrebno', 'error');
        return;
    }
    button.parentElement.remove();
    updateRemoveButtons();
}

function updateRemoveButtons() {
    const optionsList = document.getElementById('vote-options-list');
    const removeButtons = optionsList.querySelectorAll('button[onclick*="removeVoteOption"]');
    
    removeButtons.forEach(button => {
        if (optionsList.children.length > 2) {
            button.classList.remove('hidden');
        } else {
            button.classList.add('hidden');
        }
    });
}

async function submitVote(voteId) {
    const selectedOption = document.querySelector(`input[name="vote-option-${voteId}"]:checked`);
    
    if (!selectedOption) {
        showNotification('Molimo izaberite opciju', 'error');
        return;
    }
    
    if (!confirm('Da li ste sigurni da želite da pošaljete glas?')) {
        return;
    }
    
    try {
        const response = await fetch(`{{ route('votes.vote', [$building->id, 0]) }}`.replace('/0/vote', `/${voteId}/vote`), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ vote_option_id: selectedOption.value })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification(data.message, 'success');
            const wasOpen = !document.getElementById(`vote-details-${voteId}`).classList.contains('hidden');
            await loadVotes();
            if (wasOpen) {
                setTimeout(() => toggleVoteDetails(voteId), 100);
            }
        } else {
            showNotification(data.message || 'Greška pri slanju glasa', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri slanju glasa', 'error');
    }
}

async function closeReport(reportId) {
    if (!confirm('Da li ste sigurni da želite da označite ovu prijavu kao rešenu?')) {
        return;
    }
    
    try {
        const response = await fetch(`{{ route('reports.close', [$building->id, 0]) }}`.replace('/0/close', `/${reportId}/close`), {
            method: 'PATCH',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification(data.message, 'success');
            await loadReports();
        } else {
            showNotification(data.message || 'Greška pri zatvaranju prijave', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri zatvaranju prijave', 'error');
    }
}

// Join Request Functions
async function checkJoinRequestStatus() {
    try {
        const response = await fetch('{{ route("buildings.joinRequestStatus", $building->id) }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            if (data.is_member) {
                // Korisnik je već član, prikaži poruku
                document.getElementById('selfJoinButton').disabled = true;
                document.getElementById('selfJoinButton').classList.add('opacity-50', 'cursor-not-allowed');
                document.getElementById('selfJoinText').textContent = 'Već ste član ove zgrade';
            } else if (data.request) {
                // Postoji zahtev
                const statusDiv = document.getElementById('joinRequestStatus');
                const statusText = document.getElementById('joinRequestStatusText');
                const button = document.getElementById('selfJoinButton');
                const buttonText = document.getElementById('selfJoinText');
                
                if (data.request.status === 'pending') {
                    statusDiv.classList.remove('hidden');
                    statusText.textContent = 'Vaš zahtev za pridruživanje je na čekanju. Manager će ga pregledati.';
                    button.disabled = true;
                    button.classList.add('opacity-50', 'cursor-not-allowed');
                    buttonText.textContent = 'Zahtev na čekanju';
                    button.classList.remove('bg-green-600', 'hover:bg-green-700');
                    button.classList.add('bg-gray-400');
                } else if (data.request.status === 'approved') {
                    statusDiv.classList.remove('hidden');
                    statusDiv.classList.remove('bg-yellow-50', 'border-yellow-200');
                    statusDiv.classList.add('bg-green-50', 'border-green-200');
                    statusText.textContent = 'Vaš zahtev je odobren! Osvežite stranicu.';
                    statusText.classList.remove('text-yellow-800');
                    statusText.classList.add('text-green-800');
                } else if (data.request.status === 'rejected') {
                    statusDiv.classList.remove('hidden');
                    statusDiv.classList.remove('bg-yellow-50', 'border-yellow-200');
                    statusDiv.classList.add('bg-red-50', 'border-red-200');
                    statusText.textContent = 'Vaš zahtev je odbijen.';
                    statusText.classList.remove('text-yellow-800');
                    statusText.classList.add('text-red-800');
                    button.disabled = false;
                    button.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            } else {
                // Nema zahteva, omogući slanje
                document.getElementById('selfJoinButton').onclick = selfJoinBuilding;
            }
        }
    } catch (error) {
        console.error('Error checking join request status:', error);
    }
}

async function selfJoinBuilding() {
    const button = document.getElementById('selfJoinButton');
    const originalText = document.getElementById('selfJoinText').textContent;
    
    button.disabled = true;
    document.getElementById('selfJoinText').textContent = 'Slanje zahteva...';
    
    try {
        const response = await fetch('{{ route("buildings.selfJoin", $building->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification(data.message, 'success');
            // Ažuriraj UI da prikaže status zahteva
            checkJoinRequestStatus();
        } else {
            showNotification(data.message || 'Greška pri slanju zahteva', 'error');
            button.disabled = false;
            document.getElementById('selfJoinText').textContent = originalText;
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri slanju zahteva', 'error');
        button.disabled = false;
        document.getElementById('selfJoinText').textContent = originalText;
    }
}

async function loadJoinRequests() {
    const section = document.getElementById('joinRequestsSection');
    const list = document.getElementById('joinRequestsList');
    
    // Toggle sekcije
    if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
        list.innerHTML = '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div><p class="mt-2 text-gray-500">Učitavanje zahteva...</p></div>';
        
        try {
            const response = await fetch('{{ route("buildings.joinRequests", $building->id) }}', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                renderJoinRequests(data.data);
                updatePendingBadge(data.data);
            } else {
                showNotification(data.message || 'Greška pri učitavanju zahteva', 'error');
                section.classList.add('hidden');
            }
        } catch (error) {
            console.error('Error:', error);
            showNotification('Desila se greška pri učitavanju zahteva', 'error');
            section.classList.add('hidden');
        }
    } else {
        section.classList.add('hidden');
    }
}

// Funkcija za učitavanje zahteva bez toggla (za refresh)
async function refreshJoinRequests() {
    const list = document.getElementById('joinRequestsList');
    
    try {
        const response = await fetch('{{ route("buildings.joinRequests", $building->id) }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            renderJoinRequests(data.data);
            updatePendingBadge(data.data);
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

function renderJoinRequests(requests) {
    const list = document.getElementById('joinRequestsList');
    
    if (requests.length === 0) {
        list.innerHTML = '<p class="text-gray-500 text-center py-8">Nema aktivnih zahteva za pridruživanje.</p>';
        return;
    }
    
    list.innerHTML = requests.map(request => {
        const statusColors = {
            'pending': 'bg-yellow-100 text-yellow-800',
            'approved': 'bg-green-100 text-green-800',
            'rejected': 'bg-red-100 text-red-800'
        };
        
        const statusTexts = {
            'pending': 'Na čekanju',
            'approved': 'Odobren',
            'rejected': 'Odbijen'
        };
        
        const date = new Date(request.created_at).toLocaleDateString('sr-RS', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        
        let actions = '';
        if (request.status === 'pending') {
            actions = `
                <div class="flex space-x-2">
                    <button onclick="approveJoinRequest(${request.id})" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors">
                        Odobri
                    </button>
                    <button onclick="rejectJoinRequest(${request.id})" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-700 transition-colors">
                        Odbij
                    </button>
                </div>
            `;
        }
        
        return `
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center space-x-3 mb-2">
                            <h4 class="font-semibold text-gray-900">${escapeHtml(request.user.name)}</h4>
                            <span class="px-2 py-1 rounded-full text-xs font-medium ${statusColors[request.status]}">
                                ${statusTexts[request.status]}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-1">${escapeHtml(request.user.email)}</p>
                        <p class="text-sm text-gray-500">${escapeHtml(request.user.address || '')}, ${escapeHtml(request.user.neighborhood || '')}, ${escapeHtml(request.user.city || '')}</p>
                        ${request.message ? `<p class="text-sm text-gray-700 mt-2 italic">"${escapeHtml(request.message)}"</p>` : ''}
                        <p class="text-xs text-gray-400 mt-2">Poslato: ${date}</p>
                    </div>
                    ${actions}
                </div>
            </div>
        `;
    }).join('');
}

function updatePendingBadge(requests) {
    const badge = document.getElementById('pendingRequestsBadge');
    const pendingCount = requests.filter(r => r.status === 'pending').length;
    
    if (pendingCount > 0) {
        badge.textContent = pendingCount;
        badge.classList.remove('hidden');
    } else {
        badge.classList.add('hidden');
    }
}

async function approveJoinRequest(requestId) {
    if (!confirm('Da li ste sigurni da želite da odobrite ovaj zahtev?')) {
        return;
    }
    
    try {
        const response = await fetch(`{{ route("buildings.approveJoinRequest", [$building->id, 0]) }}`.replace('/0/odobri', `/${requestId}/odobri`), {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification(data.message, 'success');
            await refreshJoinRequests();
            // Reload member list if visible
            location.reload();
        } else {
            showNotification(data.message || 'Greška pri odobravanju zahteva', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri odobravanju zahteva', 'error');
    }
}

async function rejectJoinRequest(requestId) {
    if (!confirm('Da li ste sigurni da želite da odbijete ovaj zahtev?')) {
        return;
    }
    
    try {
        const response = await fetch(`{{ route("buildings.rejectJoinRequest", [$building->id, 0]) }}`.replace('/0/odbij', `/${requestId}/odbij`), {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification(data.message, 'success');
            await refreshJoinRequests();
        } else {
            showNotification(data.message || 'Greška pri odbijanju zahteva', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Desila se greška pri odbijanju zahteva', 'error');
    }
}

// Proveri status zahteva pri učitavanju stranice (samo za ne-članove)
@if(!$building->hasUser(auth()->user()))
document.addEventListener('DOMContentLoaded', function() {
    checkJoinRequestStatus();
});
@endif

// Proveri broj pending zahteva za manager-a pri učitavanju stranice (samo badge)
@if($building->isManager(auth()->user()))
document.addEventListener('DOMContentLoaded', async function() {
    try {
        const response = await fetch('{{ route("buildings.joinRequests", $building->id) }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            updatePendingBadge(data.data);
        }
    } catch (error) {
        console.error('Error loading join requests count:', error);
    }
});
@endif
</script>
@endsection
