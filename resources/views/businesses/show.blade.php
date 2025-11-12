@php
    // Determine which layout to use based on user type
    $isBusinessUser = auth('business')->check();
    $layoutName = $isBusinessUser ? 'layouts.business' : 'layouts.app';
@endphp

@extends($layoutName)

@section('title', $businessUser->company_name . ' - Moj Kraj')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('businesses.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Nazad na biznise
        </a>
    </div>

    <!-- Business Details -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Business Header -->
        <div class="h-64 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
            <div class="text-center text-white">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl font-bold">{{ substr($businessUser->company_name, 0, 1) }}</span>
                </div>
                <h1 class="text-3xl font-bold mb-2">{{ $businessUser->company_name }}</h1>
                <p class="text-lg opacity-90">{{ $businessUser->contact_person }}</p>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Business Type -->
            <div class="mb-6">
                <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                    {{ ucfirst(str_replace('_', ' ', $businessUser->business_type)) }}
                </span>
            </div>

            <!-- Description -->
            @if($businessUser->description)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">O biznisu</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $businessUser->description }}</p>
                </div>
            @endif

            <!-- Contact Info -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Kontakt informacije</h3>
                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-700 font-medium">{{ $businessUser->phone }}</span>
                    </div>
                    @if($businessUser->email)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-700 font-medium">{{ $businessUser->email }}</span>
                        </div>
                    @endif
                    @if($businessUser->website)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <a href="{{ $businessUser->website }}" target="_blank" class="text-green-600 hover:text-green-800 font-medium hover:underline">
                                {{ $businessUser->website }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Address -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Lokacija</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <p class="text-gray-700 font-medium">{{ $businessUser->address }}</p>
                            <p class="text-gray-600">{{ $businessUser->neighborhood }}, {{ $businessUser->city }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Created At -->
            <div class="text-sm text-gray-500 border-t pt-4">
                Registrovan: {{ $businessUser->created_at->format('d.m.Y H:i') }}
            </div>
        </div>
    </div>

    <!-- Ratings Section -->
    <div class="mt-8 bg-white shadow rounded-lg overflow-hidden">
        <div class="p-6">
            <!-- Average Rating Header -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Recenzije</h2>
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-2 sm:space-y-0">
                    <div class="flex items-center">
                        <span class="text-4xl font-bold text-gray-900">{{ $totalRatings > 0 ? number_format($averageRating, 1) : '0.0' }}</span>
                        <div class="ml-2">
                            <div class="flex items-center">
                                @php
                                    $avgRating = $totalRatings > 0 ? $averageRating : 0;
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 {{ $avgRating >= $i ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <span class="text-gray-600 text-sm sm:text-base">na osnovu {{ $totalRatings ?? 0 }} {{ ($totalRatings ?? 0) == 1 ? 'ocene' : 'ocena' }}</span>
                </div>
            </div>

            @auth('web')
            <!-- Rating Form -->
            <div class="mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Ocenite ovaj biznis</h3>
                
                <form id="rating-form" class="space-y-4">
                    @csrf
                    <input type="hidden" name="business_user_id" value="{{ $businessUser->id }}">
                    
                    <!-- Star Rating -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ocena</label>
                        <div class="flex items-center space-x-1 sm:space-x-2 flex-wrap" id="star-rating">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" class="star-button focus:outline-none transition-transform duration-200 hover:scale-110 active:scale-95" data-rating="{{ $i }}">
                                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-gray-300 hover:text-yellow-400 transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-input" value="{{ $userRating->rating ?? 0 }}" required>
                    </div>

                    <!-- Review Comment -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Komentar (opciono, max 200 karaktera)</label>
                        <textarea name="review" id="review-input" rows="3" maxlength="200" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none" placeholder="Podelite svoje iskustvo...">{{ $userRating->review ?? '' }}</textarea>
                        <div class="mt-1 text-sm text-gray-500 text-right">
                            <span id="char-count">0</span>/200
                        </div>
                    </div>

                    <!-- Emoji Reaction -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Emoji reakcija (opciono)</label>
                        <div class="flex items-center space-x-2 sm:space-x-3 flex-wrap">
                            <button type="button" class="emoji-button px-3 py-2 sm:px-4 sm:py-2 rounded-lg border-2 border-gray-300 hover:border-green-500 hover:bg-green-50 transition-all duration-200 focus:outline-none active:scale-95 {{ ($userRating->emoji ?? '') == '😀' ? 'border-green-500 bg-green-50' : '' }}" data-emoji="😀">
                                <span class="text-xl sm:text-2xl">😀</span>
                            </button>
                            <button type="button" class="emoji-button px-3 py-2 sm:px-4 sm:py-2 rounded-lg border-2 border-gray-300 hover:border-green-500 hover:bg-green-50 transition-all duration-200 focus:outline-none active:scale-95 {{ ($userRating->emoji ?? '') == '😐' ? 'border-green-500 bg-green-50' : '' }}" data-emoji="😐">
                                <span class="text-xl sm:text-2xl">😐</span>
                            </button>
                            <button type="button" class="emoji-button px-3 py-2 sm:px-4 sm:py-2 rounded-lg border-2 border-gray-300 hover:border-green-500 hover:bg-green-50 transition-all duration-200 focus:outline-none active:scale-95 {{ ($userRating->emoji ?? '') == '😞' ? 'border-green-500 bg-green-50' : '' }}" data-emoji="😞">
                                <span class="text-xl sm:text-2xl">😞</span>
                            </button>
                        </div>
                        <input type="hidden" name="emoji" id="emoji-input" value="{{ $userRating->emoji ?? '' }}">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full sm:w-auto bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-3 rounded-lg font-medium hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl focus:outline-none active:scale-95">
                            {{ $userRating ? 'Ažuriraj ocenu' : 'Pošalji ocenu' }}
                        </button>
                    </div>
                </form>
            </div>
            @endauth

            <!-- Ratings List -->
            <div class="space-y-6" id="ratings-list">
                @forelse($ratings as $rating)
                    <div class="border-b border-gray-200 pb-6 last:border-b-0 last:pb-0" data-rating-id="{{ $rating->id }}">
                        <!-- Rating Header -->
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between mb-3 space-y-2 sm:space-y-0">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-sm font-semibold">{{ substr($rating->user->name, 0, 1) }}</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="font-semibold text-gray-900 truncate">{{ $rating->user->name }}</div>
                                    <div class="flex items-center space-x-2 flex-wrap">
                                        <div class="flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-3 h-3 sm:w-4 sm:h-4 {{ $rating->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        @if($rating->emoji)
                                            <span class="text-lg sm:text-xl">{{ $rating->emoji }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs sm:text-sm text-gray-500 whitespace-nowrap">{{ $rating->created_at->format('d.m.Y') }}</span>
                        </div>

                        <!-- Review Comment -->
                        @if($rating->review)
                            <p class="text-gray-700 mb-3">{{ $rating->review }}</p>
                        @endif

                        <!-- Helpful Vote Button -->
                        @auth('web')
                        <div class="flex items-center space-x-4 mb-3">
                            <button type="button" class="helpful-button flex items-center space-x-2 px-3 py-1.5 rounded-lg border border-gray-300 hover:border-green-500 hover:bg-green-50 transition-all duration-200 focus:outline-none active:scale-95 {{ ($rating->user_has_voted ?? false) ? 'border-green-500 bg-green-50 text-green-700' : 'text-gray-600' }}" data-rating-id="{{ $rating->id }}">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                <span class="text-xs sm:text-sm font-medium whitespace-nowrap">Korisna recenzija</span>
                                <span class="text-xs sm:text-sm helpful-count font-medium">{{ $rating->helpful_count }}</span>
                            </button>
                        </div>
                        @endauth

                        <!-- Owner Reply -->
                        @if($rating->reply)
                            <div class="mt-4 ml-0 sm:ml-6 pl-0 sm:pl-4 border-l-0 sm:border-l-4 border-green-500 bg-gray-50 rounded-lg sm:rounded-r-lg p-4">
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-green-600 to-emerald-700 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-white text-xs font-semibold">{{ substr($rating->reply->businessUser->company_name, 0, 1) }}</span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="font-semibold text-gray-900 text-sm truncate">{{ $rating->reply->businessUser->company_name }}</div>
                                        <div class="text-xs text-gray-500">Vlasnik biznisa</div>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-sm break-words">{{ $rating->reply->reply }}</p>
                                <span class="text-xs text-gray-500 mt-2 block">{{ $rating->reply->created_at->format('d.m.Y H:i') }}</span>
                            </div>
                        @elseif(auth('business')->check() && auth('business')->id() == $businessUser->id)
                            <!-- Owner Reply Form -->
                            <div class="mt-4 ml-0 sm:ml-6 pl-0 sm:pl-4 border-l-0 sm:border-l-4 border-gray-300 bg-gray-50 rounded-lg sm:rounded-r-lg p-4">
                                <form class="owner-reply-form" data-rating-id="{{ $rating->id }}">
                                    @csrf
                                    <textarea name="reply" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none text-sm" placeholder="Odgovorite na ovu recenziju..." required></textarea>
                                    <button type="submit" class="mt-2 w-full sm:w-auto bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors duration-200 focus:outline-none active:scale-95">
                                        Pošalji odgovor
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500">Još nema recenzija za ovaj biznis.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Star Rating
    const starButtons = document.querySelectorAll('.star-button');
    const ratingInput = document.getElementById('rating-input');
    let currentRating = parseInt(ratingInput.value) || 0;
    let hoveredRating = 0;

    // Initialize stars based on user rating
    if (currentRating > 0) {
        updateStars(currentRating);
    }

    starButtons.forEach((button, index) => {
        const rating = index + 1;
        
        button.addEventListener('mouseenter', function() {
            hoveredRating = rating;
            updateStars(hoveredRating);
        });
        
        button.addEventListener('mouseleave', function() {
            hoveredRating = 0;
            updateStars(currentRating);
        });
        
        button.addEventListener('click', function() {
            currentRating = rating;
            ratingInput.value = currentRating;
            updateStars(currentRating);
        });
    });

    function updateStars(rating) {
        starButtons.forEach((button, index) => {
            const starRating = index + 1;
            const svg = button.querySelector('svg');
            if (starRating <= rating) {
                svg.classList.remove('text-gray-300');
                svg.classList.add('text-yellow-400');
            } else {
                svg.classList.remove('text-yellow-400');
                svg.classList.add('text-gray-300');
            }
        });
    }

    // Character Counter
    const reviewInput = document.getElementById('review-input');
    const charCount = document.getElementById('char-count');
    
    if (reviewInput && charCount) {
        charCount.textContent = reviewInput.value.length;
        reviewInput.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    }

    // Emoji Selection
    const emojiButtons = document.querySelectorAll('.emoji-button');
    const emojiInput = document.getElementById('emoji-input');
    let selectedEmoji = emojiInput.value || '';

    emojiButtons.forEach(button => {
        button.addEventListener('click', function() {
            const emoji = this.dataset.emoji;
            if (selectedEmoji === emoji) {
                selectedEmoji = '';
                emojiInput.value = '';
                this.classList.remove('border-green-500', 'bg-green-50');
                this.classList.add('border-gray-300');
            } else {
                selectedEmoji = emoji;
                emojiInput.value = emoji;
                emojiButtons.forEach(btn => {
                    btn.classList.remove('border-green-500', 'bg-green-50');
                    btn.classList.add('border-gray-300');
                });
                this.classList.remove('border-gray-300');
                this.classList.add('border-green-500', 'bg-green-50');
            }
        });
    });

    // Rating Form Submit
    const ratingForm = document.getElementById('rating-form');
    if (ratingForm) {
        ratingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const data = {
                rating: parseInt(formData.get('rating')),
                review: formData.get('review'),
                emoji: formData.get('emoji'),
            };

            if (data.rating === 0) {
                alert('Molimo izaberite ocenu (1-5 zvezdica).');
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            
            fetch(`/biznisi/{{ $businessUser->id }}/recenzije`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert(data.message || 'Greška pri slanju ocene.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Greška pri slanju ocene.');
            });
        });
    }

    // Helpful Vote
    const helpfulButtons = document.querySelectorAll('.helpful-button');
    helpfulButtons.forEach(button => {
        button.addEventListener('click', function() {
            const ratingId = this.dataset.ratingId;
            const button = this;
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            
            fetch(`/biznisi/recenzije/${ratingId}/korisno`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const helpfulCount = button.querySelector('.helpful-count');
                    helpfulCount.textContent = data.helpful_count;
                    
                    if (data.has_voted) {
                        button.classList.add('border-green-500', 'bg-green-50', 'text-green-700');
                        button.classList.remove('text-gray-600');
                    } else {
                        button.classList.remove('border-green-500', 'bg-green-50', 'text-green-700');
                        button.classList.add('text-gray-600');
                    }
                } else {
                    alert(data.message || 'Greška pri glasanju.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Greška pri glasanju.');
            });
        });
    });

    // Owner Reply Form
    const ownerReplyForms = document.querySelectorAll('.owner-reply-form');
    ownerReplyForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const ratingId = this.dataset.ratingId;
            const formData = new FormData(this);
            const reply = formData.get('reply');

            if (!reply.trim()) {
                alert('Molimo unesite odgovor.');
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            
            fetch(`/biznisi/recenzije/${ratingId}/odgovor`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ reply: reply }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert(data.message || 'Greška pri slanju odgovora.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Greška pri slanju odgovora.');
            });
        });
    });
});
</script>
@endpush
@endsection