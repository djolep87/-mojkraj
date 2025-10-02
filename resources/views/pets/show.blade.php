@extends('layouts.user')

@section('title', $pet->title . ' - Kućni ljubimci')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('pets.index') }}" class="inline-flex items-center text-orange-600 hover:text-orange-700 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Nazad na sve postove
            </a>
        </div>

        <!-- Post Content -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Images -->
            @if($pet->images && count($pet->images) > 0)
                <div class="relative">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ Storage::url($pet->images[0]) }}" alt="{{ $pet->title }}" class="w-full h-96 object-cover">
                    </div>
                    @if(count($pet->images) > 1)
                        <div class="absolute bottom-4 right-4 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm">
                            +{{ count($pet->images) - 1 }} više slika
                        </div>
                    @endif
                </div>
            @endif

            <!-- Post Header -->
            <div class="p-8">
                <!-- Post Type and Urgent Badge -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
                            {{ ucfirst($pet->post_type) }}
                        </span>
                        @if($pet->is_urgent)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                                Hitno
                            </span>
                        @endif
                    </div>
                    
                    @if(auth()->id() === $pet->user_id)
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('pets.edit', $pet) }}" class="text-orange-600 hover:text-orange-700 p-2 rounded-lg hover:bg-orange-50">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('pets.destroy', $pet) }}" class="inline" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 p-2 rounded-lg hover:bg-red-50">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $pet->title }}</h1>

                <!-- Pet Info -->
                <div class="flex flex-wrap items-center gap-4 mb-6 text-sm text-gray-600">
                    @if($pet->pet_type)
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            {{ ucfirst($pet->pet_type) }}
                        </span>
                    @endif
                    @if($pet->pet_breed)
                        <span class="text-gray-400">•</span>
                        <span>{{ $pet->pet_breed }}</span>
                    @endif
                    @if($pet->pet_age)
                        <span class="text-gray-400">•</span>
                        <span>{{ $pet->pet_age }}</span>
                    @endif
                    @if($pet->pet_gender)
                        <span class="text-gray-400">•</span>
                        <span>{{ ucfirst($pet->pet_gender) }}</span>
                    @endif
                </div>

                <!-- Content -->
                <div class="prose max-w-none mb-8">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $pet->content }}</p>
                </div>

                <!-- Contact Information -->
                @if($pet->contact_phone || $pet->contact_email || $pet->location)
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Kontakt informacije</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @if($pet->contact_phone)
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <a href="tel:{{ $pet->contact_phone }}" class="text-orange-600 hover:text-orange-700">{{ $pet->contact_phone }}</a>
                                </div>
                            @endif
                            @if($pet->contact_email)
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <a href="mailto:{{ $pet->contact_email }}" class="text-orange-600 hover:text-orange-700">{{ $pet->contact_email }}</a>
                                </div>
                            @endif
                            @if($pet->location)
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $pet->location }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Additional Images -->
                @if($pet->images && count($pet->images) > 1)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Dodatne slike</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach(array_slice($pet->images, 1) as $image)
                                <div class="aspect-w-16 aspect-h-9">
                                    <img src="{{ Storage::url($image) }}" alt="{{ $pet->title }}" class="w-full h-32 object-cover rounded-lg">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Videos -->
                @if($pet->videos && count($pet->videos) > 0)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Video snimci</h3>
                        <div class="space-y-4">
                            @foreach($pet->videos as $video)
                                <video controls class="w-full rounded-lg">
                                    <source src="{{ Storage::url($video) }}" type="video/mp4">
                                    Vaš browser ne podržava video tag.
                                </video>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Author and Stats -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-pink-400 rounded-full flex items-center justify-center text-white text-lg font-semibold">
                            {{ substr($pet->user->name, 0, 1) }}
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-900">{{ $pet->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $pet->user->neighborhood }}, {{ $pet->user->city }}</p>
                            <p class="text-sm text-gray-500">{{ $pet->created_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-6">
                        <button id="like-btn" class="flex items-center space-x-2 text-gray-500 hover:text-orange-600 transition-colors duration-200" data-post-id="{{ $pet->id }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span id="likes-count">{{ $pet->likes_count }}</span>
                        </button>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span>{{ $pet->comments_count }} komentara</span>
                        </div>
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
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <textarea id="comment-content" name="content" rows="3" placeholder="Napišite komentar..." required
                                  class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                    </div>
                    <button type="submit" class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors duration-200 self-end">
                        Pošalji
                    </button>
                </div>
            </form>

            <!-- Comments List -->
            <div id="comments-list" class="space-y-6">
                @foreach($pet->comments as $comment)
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-pink-400 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ substr($comment->user->name, 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-semibold text-gray-900">{{ $comment->user->name }}</h4>
                                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-700">{{ $comment->content }}</p>
                            </div>
                            
                            <!-- Reply Button -->
                            <button class="reply-btn mt-2 text-sm text-orange-600 hover:text-orange-700" data-comment-id="{{ $comment->id }}">
                                Odgovori
                            </button>
                            
                            <!-- Reply Form (Hidden by default) -->
                            <form class="reply-form hidden mt-3" data-parent-id="{{ $comment->id }}">
                                @csrf
                                <div class="flex space-x-2">
                                    <input type="text" name="content" placeholder="Napišite odgovor..." required
                                           class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors duration-200">
                                        Pošalji
                                    </button>
                                </div>
                            </form>
                            
                            <!-- Replies -->
                            @if($comment->replies->count() > 0)
                                <div class="mt-4 ml-6 space-y-3">
                                    @foreach($comment->replies as $reply)
                                        <div class="flex space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-orange-300 to-pink-300 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                                {{ substr($reply->user->name, 0, 1) }}
                                            </div>
                                            <div class="flex-1">
                                                <div class="bg-gray-50 rounded-lg p-3">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <h5 class="font-medium text-gray-900 text-sm">{{ $reply->user->name }}</h5>
                                                        <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="text-gray-700 text-sm">{{ $reply->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
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
        const postId = this.dataset.postId;
        
        fetch(`/dashboard/kucni-ljubimci/${postId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            likesCount.textContent = data.likes_count;
            if (data.liked) {
                likeBtn.classList.add('text-orange-600');
            } else {
                likeBtn.classList.remove('text-orange-600');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Comment functionality
    const commentForm = document.getElementById('comment-form');
    const commentsList = document.getElementById('comments-list');
    
    commentForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const content = document.getElementById('comment-content').value;
        const postId = {{ $pet->id }};
        
        fetch(`/dashboard/kucni-ljubimci/${postId}/komentar`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ content: content })
        })
        .then(response => response.json())
        .then(data => {
            // Add comment to list
            const commentHtml = `
                <div class="flex space-x-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-pink-400 rounded-full flex items-center justify-center text-white font-semibold">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-semibold text-gray-900">{{ auth()->user()->name }}</h4>
                                <span class="text-sm text-gray-500">Sada</span>
                            </div>
                            <p class="text-gray-700">${data.comment.content}</p>
                        </div>
                    </div>
                </div>
            `;
            
            commentsList.insertAdjacentHTML('afterbegin', commentHtml);
            document.getElementById('comment-content').value = '';
        })
        .catch(error => console.error('Error:', error));
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
            const postId = {{ $pet->id }};
            const parentId = e.target.dataset.parentId;
            
            fetch(`/dashboard/kucni-ljubimci/${postId}/komentar`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ content: content, parent_id: parentId })
            })
            .then(response => response.json())
            .then(data => {
                // Add reply to list
                const replyHtml = `
                    <div class="flex space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-orange-300 to-pink-300 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="flex items-center justify-between mb-1">
                                    <h5 class="font-medium text-gray-900 text-sm">{{ auth()->user()->name }}</h5>
                                    <span class="text-xs text-gray-500">Sada</span>
                                </div>
                                <p class="text-gray-700 text-sm">${data.comment.content}</p>
                            </div>
                        </div>
                    </div>
                `;
                
                // Find the parent comment and add reply
                const parentComment = e.target.closest('.flex.space-x-4');
                let repliesContainer = parentComment.querySelector('.mt-4.ml-6');
                
                if (!repliesContainer) {
                    repliesContainer = document.createElement('div');
                    repliesContainer.className = 'mt-4 ml-6 space-y-3';
                    parentComment.querySelector('.flex-1').appendChild(repliesContainer);
                }
                
                repliesContainer.insertAdjacentHTML('afterbegin', replyHtml);
                
                e.target.querySelector('input[name="content"]').value = '';
                e.target.classList.add('hidden');
            })
            .catch(error => console.error('Error:', error));
        }
    });
});
</script>
@endsection
