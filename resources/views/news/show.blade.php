@extends('layouts.user')

@section('title', $news->title . ' - Moj Kraj')


@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
         <!-- Back Button -->
         <div class="mb-6">
             <a href="{{ route('news.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                 <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                 </svg>
                 Nazad na vesti
             </a>
         </div>

        <!-- Post Content -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Images -->
            @if($news->images && count($news->images) > 0)
                <div class="relative">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ Storage::url($news->images[0]) }}" alt="{{ $news->title }}" class="w-full h-96 object-cover">
                    </div>
                    @if(count($news->images) > 1)
                        <div class="absolute bottom-4 right-4 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm">
                            +{{ count($news->images) - 1 }} više slika
                        </div>
                    @endif
                </div>
            @endif

            <!-- Post Header -->
            <div class="p-8">
                <!-- Post Type and Urgent Badge -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ ucfirst($news->post_type) }}
                        </span>
                        @if($news->is_urgent)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                                Hitno
                            </span>
                        @endif
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $news->created_at->format('d.m.Y H:i') }}
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>

                <!-- Content -->
                <div class="prose max-w-none mb-8">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $news->content }}</p>
                </div>

                <!-- Additional Images -->
                @if($news->images && count($news->images) > 1)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Dodatne slike</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach(array_slice($news->images, 1) as $image)
                                <div class="aspect-w-16 aspect-h-9">
                                    <img src="{{ Storage::url($image) }}" alt="{{ $news->title }}" class="w-full h-32 object-cover rounded-lg">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Videos -->
                @if($news->videos && count($news->videos) > 0)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Video snimci</h3>
                        <div class="space-y-4">
                            @foreach($news->videos as $video)
                                <video controls class="w-full rounded-lg">
                                    <source src="{{ Storage::url($video) }}" type="video/mp4">
                                    Vaš browser ne podržava video tag.
                                </video>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Stats and Author -->
                <div class="pt-6 border-t border-gray-200">
                    <!-- Stats Row - Left aligned on all devices -->
                    <div class="flex items-center space-x-4 sm:space-x-6 mb-4">
                        <button id="like-btn" class="flex items-center space-x-2 text-gray-500 hover:text-red-500 transition-colors duration-200" data-news-id="{{ $news->id }}" data-liked="{{ $isLiked ? 'true' : 'false' }}">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 {{ $isLiked ? 'fill-current text-red-500' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span id="likes-count" class="text-sm sm:text-base">{{ $news->likes }}</span>
                        </button>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span class="text-sm sm:text-base">{{ $news->views }} pregleda</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-sm sm:text-base">{{ $news->comments->count() }} komentara</span>
                        </div>
                    </div>
                    
                    <!-- Author Info - Stacked on mobile, side by side on desktop -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <div class="flex items-center space-x-3">
                            @if($news->is_anonymous)
                                <div class="w-8 h-8 bg-gradient-to-br from-gray-500 to-gray-700 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                    <span class="text-sm font-medium text-gray-700">Anonimni korisnik</span>
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            @else
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-bold">{{ substr($news->user->name, 0, 1) }}</span>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                    <span class="text-sm font-medium text-gray-700">{{ $news->user->name }}</span>
                                    <span class="text-xs text-gray-500">{{ $news->user->neighborhood }}, {{ $news->user->city }}</span>
                                </div>
                            @endif
                        </div>
                        <span class="text-sm text-gray-500">{{ $news->created_at->format('d.m.Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Komentari</h3>
            
            <!-- Add Comment Form -->
            <form id="comment-form" class="mb-8">
                @csrf
                <div class="space-y-4">
                    <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                        <div class="flex-1">
                            <textarea id="comment-content" name="content" rows="4" placeholder="Napišite komentar..." required
                                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200 self-end sm:self-end">
                            Pošalji
                        </button>
                    </div>
                    
                    <!-- Anonymous Option -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-900 mb-1">Anonimni komentar</h4>
                                <p class="text-sm text-gray-600">Ako uključite ovu opciju, vaše ime neće biti prikazano uz komentar</p>
                            </div>
                            <div class="ml-4">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="comment-is-anonymous" name="is_anonymous" value="1" 
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Comments List -->
            <div id="comments-list" class="space-y-6">
                @foreach($news->comments as $comment)
                    <div class="flex space-x-4">
                        @if($comment->is_anonymous)
                            <div class="w-10 h-10 bg-gradient-to-br from-gray-500 to-gray-700 rounded-full flex items-center justify-center text-white font-semibold">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        @else
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ substr($comment->user->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    @if($comment->is_anonymous)
                                        <div class="flex items-center space-x-2">
                                            <h4 class="font-semibold text-gray-900">Anonimni korisnik</h4>
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    @else
                                        <h4 class="font-semibold text-gray-900">{{ $comment->user->name }}</h4>
                                    @endif
                                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-700 break-words overflow-wrap-anywhere">{{ $comment->content }}</p>
                            </div>
                            
                            <!-- Reply Button -->
                            <button class="reply-btn mt-2 text-sm text-blue-600 hover:text-blue-700" data-comment-id="{{ $comment->id }}">
                                Odgovori
                            </button>
                            
                            <!-- Reply Form (Hidden by default) -->
                            <form class="reply-form hidden mt-3" data-parent-id="{{ $comment->id }}">
                                @csrf
                                <div class="flex space-x-2">
                                    <input type="text" name="content" placeholder="Napišite odgovor..." required
                                           class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                        Pošalji
                                    </button>
                                </div>
                            </form>
                            
                            <!-- Replies -->
                            @if($comment->replies->count() > 0)
                                <div class="mt-4 ml-6 space-y-3">
                                    @foreach($comment->replies as $reply)
                                        <div class="flex space-x-3">
                                            @if($reply->is_anonymous)
                                                <div class="w-8 h-8 bg-gradient-to-br from-gray-500 to-gray-700 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-8 h-8 bg-gradient-to-br from-blue-300 to-purple-300 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                                    {{ substr($reply->user->name, 0, 1) }}
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="bg-gray-50 rounded-lg p-3">
                                                    <div class="flex items-center justify-between mb-1">
                                                        @if($reply->is_anonymous)
                                                            <div class="flex items-center space-x-2">
                                                                <h5 class="font-medium text-gray-900 text-sm">Anonimni korisnik</h5>
                                                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </div>
                                                        @else
                                                            <h5 class="font-medium text-gray-900 text-sm">{{ $reply->user->name }}</h5>
                                                        @endif
                                                        <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="text-gray-700 text-sm break-words overflow-wrap-anywhere">{{ $reply->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                
                @if($news->comments->count() == 0)
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Nema komentara</h3>
                        <p class="mt-1 text-sm text-gray-500">Budite prvi koji će komentarisati ovu vest.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Like functionality
    const likeBtn = document.getElementById('like-btn');
    const likesCount = document.getElementById('likes-count');
    
    likeBtn.addEventListener('click', function() {
        const newsId = this.dataset.newsId;
        
        fetch(`/vesti/${newsId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            likesCount.textContent = data.likes;
            if (data.isLiked) {
                likeBtn.querySelector('svg').classList.add('fill-current', 'text-red-500');
                likeBtn.dataset.liked = 'true';
            } else {
                likeBtn.querySelector('svg').classList.remove('fill-current', 'text-red-500');
                likeBtn.dataset.liked = 'false';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Došlo je do greške prilikom lajkovanja. Molimo pokušajte ponovo.');
        });
    });

    // Comment form submission
    document.getElementById('comment-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const content = document.getElementById('comment-content').value;
        const isAnonymous = document.getElementById('comment-is-anonymous').checked;
        const newsId = {{ $news->id }};
        
        fetch(`/vesti/${newsId}/komentar`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                content: content,
                is_anonymous: isAnonymous
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Add comment to list
            let commentHtml;
            if (isAnonymous) {
                commentHtml = `
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-gray-500 to-gray-700 rounded-full flex items-center justify-center text-white font-semibold">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center space-x-2">
                                        <h4 class="font-semibold text-gray-900">Anonimni korisnik</h4>
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm text-gray-500">Sada</span>
                                </div>
                                <p class="text-gray-700 break-words overflow-wrap-anywhere">${data.comment.content}</p>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                commentHtml = `
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-semibold text-gray-900">{{ auth()->user()->name }}</h4>
                                    <span class="text-sm text-gray-500">Sada</span>
                                </div>
                                <p class="text-gray-700 break-words overflow-wrap-anywhere">${data.comment.content}</p>
                            </div>
                        </div>
                    </div>
                `;
            }
            
            const commentsList = document.getElementById('comments-list');
            commentsList.insertAdjacentHTML('afterbegin', commentHtml);
            document.getElementById('comment-content').value = '';
            document.getElementById('comment-is-anonymous').checked = false;
            
            // Update comments count
            const commentsCountElement = document.querySelector('.flex.items-center.space-x-6 .flex.items-center.space-x-2.text-gray-500 span');
            if (commentsCountElement) {
                const currentCount = parseInt(commentsCountElement.textContent.split(' ')[0]);
                commentsCountElement.textContent = `${currentCount + 1} komentara`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Došlo je do greške prilikom slanja komentara. Molimo pokušajte ponovo.');
        });
    });

    // Reply functionality using event delegation
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('reply-btn')) {
            const commentId = e.target.dataset.commentId;
            const replyForm = document.querySelector(`.reply-form[data-parent-id="${commentId}"]`);
            replyForm.classList.toggle('hidden');
        }
    });

    // Reply form submission using event delegation
    document.addEventListener('submit', function(e) {
        if (e.target.classList.contains('reply-form')) {
            e.preventDefault();
            
            const content = e.target.querySelector('input[name="content"]').value;
            const newsId = {{ $news->id }};
            const parentId = e.target.dataset.parentId;
            
            fetch(`/vesti/${newsId}/komentar`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ content: content, parent_id: parentId })
            })
            .then(response => response.json())
            .then(data => {
                // Add reply to DOM
                const replyHtml = `
                    <div class="flex space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-1">
                                <h5 class="font-semibold text-gray-900 text-sm">{{ auth()->user()->name }}</h5>
                                <span class="text-xs text-gray-500">Sada</span>
                            </div>
                                <p class="text-gray-700 text-sm break-words overflow-wrap-anywhere">${data.comment.content}</p>
                        </div>
                    </div>
                `;
                
                const parentComment = e.target.closest('.flex.space-x-4');
                let repliesContainer = parentComment.querySelector('.mt-4.ml-6');
                
                if (!repliesContainer) {
                    // Create replies container if it doesn't exist
                    repliesContainer = document.createElement('div');
                    repliesContainer.className = 'mt-4 ml-6 space-y-3';
                    parentComment.querySelector('.flex-1').appendChild(repliesContainer);
                }
                
                repliesContainer.insertAdjacentHTML('afterbegin', replyHtml);
                
                // Clear form and hide it
                e.target.querySelector('input[name="content"]').value = '';
                e.target.classList.add('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
});
</script>
@endsection
