@extends('layouts.user')

@section('title', 'Notifikacije - Moj Kraj')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">Notifikacije</h1>
                        <p class="text-blue-100">Pregledajte sve vaše obaveštenja</p>
                    </div>
                    @if($notifications->count() > 0)
                    <form method="POST" action="{{ route('notifications.markAllAsRead') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 backdrop-blur-sm">
                            Označi sve kao pročitano
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            <div class="p-6">
                @if($notifications->count() > 0)
                    <div class="space-y-4">
                        @foreach($notifications as $notification)
                            <div class="border border-gray-200 rounded-xl p-4 hover:shadow-md transition-all duration-200 {{ $notification->read_at ? 'bg-gray-50' : 'bg-blue-50 border-blue-200' }}">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            @if(!$notification->read_at)
                                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                            @endif
                                            <h3 class="font-semibold text-gray-900">{{ $notification->data['title'] ?? 'Notifikacija' }}</h3>
                                        </div>
                                        <p class="text-gray-600 mb-2">{{ $notification->data['message'] ?? '' }}</p>
                                        @if(isset($notification->data['offer_url']))
                                            <a href="{{ $notification->data['offer_url'] }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-block mt-1">Pogledaj ponudu →</a>
                                        @elseif(isset($notification->data['news_url']))
                                            <a href="{{ $notification->data['news_url'] }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-block mt-1">Pogledaj vest →</a>
                                        @endif
                                        <p class="text-xs text-gray-400 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="flex items-center space-x-2 ml-4">
                                        @if(!$notification->read_at)
                                        <form method="POST" action="{{ route('notifications.markAsRead', $notification->id) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-100 transition-colors" title="Označi kao pročitano">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                        <form method="POST" action="{{ route('notifications.destroy', $notification->id) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu notifikaciju?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-100 transition-colors" title="Obriši">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $notifications->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Nema notifikacija</h3>
                        <p class="text-gray-500">Nemate novih obaveštenja.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

