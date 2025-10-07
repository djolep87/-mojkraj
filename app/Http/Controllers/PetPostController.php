<?php

namespace App\Http\Controllers;

use App\Models\PetPost;
use App\Models\PetComment;
use App\Models\PetLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PetPostController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $query = PetPost::with(['user', 'comments', 'likes'])
            ->active()
            ->latest();

        // Filter by user's neighborhood/city - only show posts from same area
        if ($user) {
            $query->whereHas('user', function($q) use ($user) {
                $q->whereRaw('neighborhood COLLATE utf8mb4_unicode_ci = ?', [$user->neighborhood])
                  ->whereRaw('city COLLATE utf8mb4_unicode_ci = ?', [$user->city]);
            });
        }

        // Filter by post type
        if ($request->filled('type')) {
            $query->byType($request->type);
        }

        // Filter by pet type
        if ($request->filled('pet_type')) {
            $query->byPetType($request->pet_type);
        }

        // Filter by urgent posts
        if ($request->boolean('urgent')) {
            $query->urgent();
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('pet_breed', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(24);

        return view('pets.index', compact('posts'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'pet_type' => 'required|string|max:50',
            'pet_breed' => 'nullable|string|max:100',
            'pet_age' => 'nullable|string|max:50',
            'pet_gender' => 'nullable|string|max:20',
            'post_type' => 'required|string|max:50',
            'location' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videos.*' => 'nullable|file|mimes:mp4,avi,mov|max:10240',
            'is_urgent' => 'boolean'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        // Handle images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('pets/images', 'public');
                $images[] = $path;
            }
            $data['images'] = $images;
        }

        // Handle videos
        if ($request->hasFile('videos')) {
            $videos = [];
            foreach ($request->file('videos') as $video) {
                $path = $video->store('pets/videos', 'public');
                $videos[] = $path;
            }
            $data['videos'] = $videos;
        }

        PetPost::create($data);

        return redirect()->route('pets.dashboard')->with('success', 'Post je uspešno kreiran!');
    }

    public function show($id)
    {
        $pet = PetPost::findOrFail($id);
        $user = Auth::user();
        
        // Check if user can view this post (same neighborhood/city)
        if ($user && (strcasecmp($pet->user->neighborhood, $user->neighborhood) !== 0 || strcasecmp($pet->user->city, $user->city) !== 0)) {
            abort(403, 'Nemate pristup ovom postu. Možete videti samo postove iz vašeg dela grada.');
        }
        
        $pet->load(['user', 'comments' => function($query) {
            $query->orderBy('created_at', 'desc');
        }, 'comments.user', 'comments.replies.user', 'likes']);
        
        return view('pets.show', compact('pet'));
    }

    public function edit($id)
    {
        $pet = PetPost::findOrFail($id);
        $this->authorize('update', $pet);
        
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $pet = PetPost::findOrFail($id);
        $this->authorize('update', $pet);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'pet_type' => 'required|string|max:50',
            'pet_breed' => 'nullable|string|max:100',
            'pet_age' => 'nullable|string|max:50',
            'pet_gender' => 'nullable|string|max:20',
            'post_type' => 'required|string|max:50',
            'location' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videos.*' => 'nullable|file|mimes:mp4,avi,mov|max:10240',
            'is_urgent' => 'boolean'
        ]);

        $data = $request->all();

        // Handle new images
        if ($request->hasFile('images')) {
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('pets/images', 'public');
                $newImages[] = $path;
            }
            
            $existingImages = $pet->images ?? [];
            $data['images'] = array_merge($existingImages, $newImages);
        }

        // Handle new videos
        if ($request->hasFile('videos')) {
            $newVideos = [];
            foreach ($request->file('videos') as $video) {
                $path = $video->store('pets/videos', 'public');
                $newVideos[] = $path;
            }
            
            $existingVideos = $pet->videos ?? [];
            $data['videos'] = array_merge($existingVideos, $newVideos);
        }

        $pet->update($data);

        return redirect()->route('pets.show', $pet)->with('success', 'Post je uspešno ažuriran!');
    }

    public function destroy($id)
    {
        $pet = PetPost::findOrFail($id);
        $this->authorize('delete', $pet);

        // Delete associated files
        if ($pet->images) {
            foreach ($pet->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        if ($pet->videos) {
            foreach ($pet->videos as $video) {
                Storage::disk('public')->delete($video);
            }
        }

        $pet->delete();

        return redirect()->route('pets.dashboard')->with('success', 'Post je uspešno obrisan!');
    }

    public function like($id)
    {
        $pet = PetPost::findOrFail($id);
        $user = Auth::user();
        
        if ($pet->isLikedBy($user)) {
            $pet->likes()->where('user_id', $user->id)->delete();
            $pet->decrement('likes_count');
            $liked = false;
        } else {
            $pet->likes()->create(['user_id' => $user->id]);
            $pet->increment('likes_count');
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'likes_count' => $pet->fresh()->likes_count
        ]);
    }

    public function comment(Request $request, $id)
    {
        $pet = PetPost::findOrFail($id);
        
        $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:pets_comments,id'
        ]);

        $comment = $pet->allComments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'parent_id' => $request->parent_id
        ]);

        $pet->increment('comments_count');

        $comment->load('user');

        return response()->json([
            'comment' => $comment,
            'is_reply' => $comment->isReply()
        ]);
    }

    public function deleteImage($id, $imageIndex)
    {
        $pet = PetPost::findOrFail($id);
        $this->authorize('update', $pet);

        $images = $pet->images ?? [];
        if (isset($images[$imageIndex])) {
            Storage::disk('public')->delete($images[$imageIndex]);
            unset($images[$imageIndex]);
            $pet->update(['images' => array_values($images)]);
        }

        return response()->json(['success' => true]);
    }

    public function deleteVideo($id, $videoIndex)
    {
        $pet = PetPost::findOrFail($id);
        $this->authorize('update', $pet);

        $videos = $pet->videos ?? [];
        if (isset($videos[$videoIndex])) {
            Storage::disk('public')->delete($videos[$videoIndex]);
            unset($videos[$videoIndex]);
            $pet->update(['videos' => array_values($videos)]);
        }

        return response()->json(['success' => true]);
    }
}
