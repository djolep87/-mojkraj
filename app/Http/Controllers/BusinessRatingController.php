<?php

namespace App\Http\Controllers;

use App\Models\BusinessRating;
use App\Models\BusinessRatingHelpfulVote;
use App\Models\BusinessRatingReply;
use App\Models\BusinessUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BusinessRatingController extends Controller
{
    /**
     * Store or update a rating
     */
    public function store(Request $request, BusinessUser $businessUser)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Morate biti ulogovani da biste ocenili biznis.'
            ], 401);
        }

        // Validate request
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:200',
            'emoji' => 'nullable|string|in:😀,😐,😞',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Greška u validaciji.',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Auth::user();

        // Check if user already has a rating for this business
        $rating = BusinessRating::where('user_id', $user->id)
            ->where('business_user_id', $businessUser->id)
            ->first();

        if ($rating) {
            // Update existing rating
            $rating->update([
                'rating' => $request->rating,
                'review' => $request->review,
                'emoji' => $request->emoji,
            ]);
        } else {
            // Create new rating
            $rating = BusinessRating::create([
                'user_id' => $user->id,
                'business_user_id' => $businessUser->id,
                'rating' => $request->rating,
                'review' => $request->review,
                'emoji' => $request->emoji,
                'helpful_count' => 0,
            ]);
        }

        // Get updated average rating and total ratings
        $averageRating = BusinessRating::getAverageRating($businessUser->id);
        $totalRatings = BusinessRating::getTotalRatings($businessUser->id);

        // Load relationships
        $rating->load('user', 'reply.businessUser');

        return response()->json([
            'success' => true,
            'message' => $rating->wasRecentlyCreated ? 'Ocena je uspešno dodata.' : 'Ocena je uspešno ažurirana.',
            'rating' => $rating,
            'average_rating' => round($averageRating, 1),
            'total_ratings' => $totalRatings,
        ]);
    }

    /**
     * Mark a rating as helpful
     */
    public function helpful(Request $request, BusinessRating $businessRating)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Morate biti ulogovani da biste glasali.'
            ], 401);
        }

        $user = Auth::user();

        // Check if user already voted
        $existingVote = BusinessRatingHelpfulVote::where('business_rating_id', $businessRating->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingVote) {
            // Remove vote
            $existingVote->delete();
            $businessRating->decrement('helpful_count');
            
            return response()->json([
                'success' => true,
                'message' => 'Glas je uklonjen.',
                'helpful_count' => $businessRating->fresh()->helpful_count,
                'has_voted' => false,
            ]);
        } else {
            // Add vote
            BusinessRatingHelpfulVote::create([
                'business_rating_id' => $businessRating->id,
                'user_id' => $user->id,
            ]);
            $businessRating->increment('helpful_count');
            
            return response()->json([
                'success' => true,
                'message' => 'Glas je dodat.',
                'helpful_count' => $businessRating->fresh()->helpful_count,
                'has_voted' => true,
            ]);
        }
    }

    /**
     * Store or update owner reply
     */
    public function ownerReply(Request $request, BusinessRating $businessRating)
    {
        // Check if user is authenticated as business user
        if (!Auth::guard('business')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Morate biti ulogovani kao vlasnik biznisa da biste odgovorili.'
            ], 401);
        }

        $businessUser = Auth::guard('business')->user();

        // Check if the rating belongs to this business
        if ($businessRating->business_user_id !== $businessUser->id) {
            return response()->json([
                'success' => false,
                'message' => 'Nemate dozvolu da odgovorite na ovu recenziju.'
            ], 403);
        }

        // Validate request
        $validator = Validator::make($request->all(), [
            'reply' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Greška u validaciji.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Check if reply already exists
        $reply = BusinessRatingReply::where('business_rating_id', $businessRating->id)->first();

        if ($reply) {
            // Update existing reply
            $reply->update([
                'reply' => $request->reply,
            ]);
        } else {
            // Create new reply
            $reply = BusinessRatingReply::create([
                'business_rating_id' => $businessRating->id,
                'business_user_id' => $businessUser->id,
                'reply' => $request->reply,
            ]);
        }

        // Load relationships
        $reply->load('businessUser');

        return response()->json([
            'success' => true,
            'message' => $reply->wasRecentlyCreated ? 'Odgovor je uspešno dodat.' : 'Odgovor je uspešno ažuriran.',
            'reply' => $reply,
        ]);
    }

    /**
     * Get ratings for a business
     */
    public function index(Request $request, BusinessUser $businessUser)
    {
        $ratings = BusinessRating::where('business_user_id', $businessUser->id)
            ->with(['user', 'reply.businessUser', 'helpfulVotes'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $averageRating = BusinessRating::getAverageRating($businessUser->id);
        $totalRatings = BusinessRating::getTotalRatings($businessUser->id);

        // Check if current user has already rated
        $userRating = null;
        if (Auth::check()) {
            $userRating = BusinessRating::where('user_id', Auth::id())
                ->where('business_user_id', $businessUser->id)
                ->first();
        }

        // Check if current user has voted for helpful on each rating
        if (Auth::check()) {
            foreach ($ratings as $rating) {
                $rating->user_has_voted = $rating->userHasVoted(Auth::id());
            }
        }

        if ($request->ajax() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'ratings' => $ratings,
                'average_rating' => round($averageRating, 1),
                'total_ratings' => $totalRatings,
                'user_rating' => $userRating,
            ]);
        }

        return view('businesses.ratings', compact('ratings', 'businessUser', 'averageRating', 'totalRatings', 'userRating'));
    }
}
