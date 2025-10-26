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

        <!-- Navigation Tabs -->
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
                </div>

                <!-- Other tabs will be loaded via AJAX -->
                <div id="reports-tab" class="tab-content hidden">
                    <p class="text-gray-500 text-center py-8">Učitavanje prijava...</p>
                </div>

                <div id="expenses-tab" class="tab-content hidden">
                    <p class="text-gray-500 text-center py-8">Učitavanje troškova...</p>
                </div>

                <div id="votes-tab" class="tab-content hidden">
                    <p class="text-gray-500 text-center py-8">Učitavanje glasanja...</p>
                </div>

                <div id="announcements-tab" class="tab-content hidden">
                    <p class="text-gray-500 text-center py-8">Učitavanje objava...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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

function loadTabContent(tabName) {
    const tabContent = document.getElementById(tabName + '-tab');
    
    // Simple implementation - in real app you'd make AJAX calls
    switch(tabName) {
        case 'reports':
            tabContent.innerHTML = '<p class="text-gray-500 text-center py-8">Funkcionalnost prijava će biti implementirana uskoro.</p>';
            break;
        case 'expenses':
            tabContent.innerHTML = '<p class="text-gray-500 text-center py-8">Funkcionalnost troškova će biti implementirana uskoro.</p>';
            break;
        case 'votes':
            tabContent.innerHTML = '<p class="text-gray-500 text-center py-8">Funkcionalnost glasanja će biti implementirana uskoro.</p>';
            break;
        case 'announcements':
            tabContent.innerHTML = '<p class="text-gray-500 text-center py-8">Funkcionalnost objava će biti implementirana uskoro.</p>';
            break;
    }
}
</script>
@endsection
