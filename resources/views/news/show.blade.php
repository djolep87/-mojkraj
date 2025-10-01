@extends('layouts.user')

@section('title', $news->title . ' - Moj Kraj')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('news.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Nazad na vesti
        </a>
    </div>

    <!-- News Article -->
    <article class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Images -->
        @if($news->images->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
                @foreach($news->images as $image)
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ Storage::url($image->file_path) }}" alt="{{ $news->title }}" 
                             class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Content -->
        <div class="p-6">
            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>
            
            <!-- Author Info -->
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Autor</p>
                    <p class="font-medium text-gray-900">{{ $news->user->name }}</p>
                </div>
                <div class="ml-auto text-sm text-gray-500">
                    {{ $news->created_at->format('d.m.Y H:i') }}
                </div>
            </div>

            <!-- Content -->
            <div class="prose max-w-none mb-6">
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $news->content }}</p>
            </div>

            <!-- Videos -->
            @if($news->videos->count() > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Video snimci</h3>
                    <div class="space-y-4">
                        @foreach($news->videos as $video)
                            <div class="bg-gray-100 rounded-lg p-4">
                                <video controls class="w-full max-w-2xl mx-auto">
                                    <source src="{{ Storage::url($video->file_path) }}" type="video/mp4">
                                    Vaš browser ne podržava video tag.
                                </video>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Actions (if user owns the news) -->
            @if(auth()->check() && auth()->user()->id === $news->user_id)
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('news.edit', $news) }}" 
                       class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Uredi vest
                    </a>
                    <form action="{{ route('news.destroy', $news) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                onclick="return confirm('Da li ste sigurni da želite da obrišete ovu vest?')">
                            Obriši vest
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </article>
</div>
@endsection