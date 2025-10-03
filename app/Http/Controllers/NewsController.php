<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsComment;
use App\Models\NewsLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NewsController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli vesti.');
        }
        
        $user = Auth::user();
        $query = News::with('user')->published();
        
        // Filter by user location
        $query->where(function($q) use ($user) {
            // Show user's own news
            $q->where('user_id', $user->id)
              // OR show news from same neighborhood and city
              ->orWhereHas('user', function($subQ) use ($user) {
                  $subQ->where('neighborhood', $user->neighborhood)
                       ->where('city', $user->city);
              });
        });
        
        $news = $query->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli vesti.');
        }
        
        $user = Auth::user();
        $newsUser = $news->user;
        
        // Allow user to see their own news
        if ($user->id !== $newsUser->id) {
            // Check if news is from same neighborhood and city
            if ($user->neighborhood !== $newsUser->neighborhood || $user->city !== $newsUser->city) {
                abort(403, 'Nemate dozvolu da vidite ovu vest. Vest je iz drugog dela grada.');
            }
        }
        
        $news->incrementViews();
        
        // Load comments and likes
        $news->load(['comments' => function($query) {
            $query->orderBy('created_at', 'desc');
        }, 'comments.user', 'comments.replies.user', 'likes']);
        
        // Check if current user liked this news
        $isLiked = false;
        if ($user) {
            $isLiked = $news->likes()->where('user_id', $user->id)->exists();
        }
        
        return view('news.show', compact('news', 'isLiked'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:10000'],
            'summary' => ['nullable', 'string', 'max:500'],
            'category' => ['required', 'string', 'in:opšte,dešavanja,bezbednost,zdravstvo,sport,kultura,ostalo'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'videos.*' => ['nullable', 'file', 'mimes:mp4,avi,mov,wmv', 'max:10240'],
        ]);

        $user = Auth::user();
        
        $images = [];
        if ($request->hasFile('images')) {
            // Ensure images directory exists
            Storage::disk('public')->makeDirectory('news/images');
            foreach ($request->file('images') as $image) {
                $path = $image->store('news/images', 'public');
                $images[] = $path;
            }
        }

        $videos = [];
        if ($request->hasFile('videos')) {
            // Ensure videos directory exists
            Storage::disk('public')->makeDirectory('news/videos');
            foreach ($request->file('videos') as $video) {
                $path = $video->store('news/videos', 'public');
                $videos[] = $path;
            }
        }

        $news = $user->news()->create([
            'title' => $request->title,
            'content' => $request->content,
            'summary' => $request->summary,
            'category' => $request->category,
            'images' => $images,
            'videos' => $videos,
            'is_published' => true,
            'city' => $user->city,
            'neighborhood' => $user->neighborhood,
        ]);

        return redirect()->route('news.show', $news)->with('success', 'Vest je uspešno kreirana!');
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);
        
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $this->authorize('update', $news);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:10000'],
            'summary' => ['nullable', 'string', 'max:500'],
            'category' => ['required', 'string', 'in:opšte,dešavanja,bezbednost,zdravstvo,sport,kultura,ostalo'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'videos.*' => ['nullable', 'file', 'mimes:mp4,avi,mov,wmv', 'max:10240'],
            'is_published' => ['boolean'],
        ]);

        $images = $news->images ?? [];
        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
            
            // Ensure images directory exists
            Storage::disk('public')->makeDirectory('news/images');
            
            // Upload new images
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('news/images', 'public');
                $images[] = $path;
            }
        }

        $videos = $news->videos ?? [];
        if ($request->hasFile('videos')) {
            // Delete old videos
            foreach ($videos as $video) {
                Storage::disk('public')->delete($video);
            }
            
            // Ensure videos directory exists
            Storage::disk('public')->makeDirectory('news/videos');
            
            // Upload new videos
            $videos = [];
            foreach ($request->file('videos') as $video) {
                $path = $video->store('news/videos', 'public');
                $videos[] = $path;
            }
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'summary' => $request->summary,
            'category' => $request->category,
            'images' => $images,
            'videos' => $videos,
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('news.show', $news)->with('success', 'Vest je uspešno ažurirana!');
    }

    public function destroy(News $news)
    {
        $this->authorize('delete', $news);
        
        // Delete associated files
        if ($news->images) {
            foreach ($news->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        if ($news->videos) {
            foreach ($news->videos as $video) {
                Storage::disk('public')->delete($video);
            }
        }
        
        $news->delete();

        return redirect()->route('dashboard')->with('success', 'Vest je uspešno obrisana!');
    }

    public function like(News $news)
    {
        $user = Auth::user();
        
        // Check if user already liked this news
        $existingLike = NewsLike::where('news_id', $news->id)
            ->where('user_id', $user->id)
            ->first();
        
        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $news->decrement('likes');
            $isLiked = false;
        } else {
            // Like
            NewsLike::create([
                'news_id' => $news->id,
                'user_id' => $user->id,
            ]);
            $news->increment('likes');
            $isLiked = true;
        }
        
        return response()->json([
            'likes' => $news->fresh()->likes,
            'isLiked' => $isLiked
        ]);
    }

    public function comment(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:news_comments,id'
        ]);

        $user = Auth::user();
        
        $comment = NewsComment::create([
            'news_id' => $news->id,
            'user_id' => $user->id,
            'parent_id' => $request->parent_id,
            'content' => $request->content,
        ]);

        $comment->load(['user', 'replies.user']);

        return response()->json([
            'success' => true,
            'comment' => $comment
        ]);
    }
}