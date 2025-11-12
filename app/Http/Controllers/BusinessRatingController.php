<?php

namespace App\Http\Controllers;

use App\Models\BusinessRating;
use App\Models\BusinessRatingHelpfulVote;
use App\Models\BusinessRatingReply;
use App\Models\BusinessUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
    public function helpful(Request $request, $businessRating)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Morate biti ulogovani da biste glasali.'
            ], 401);
        }

        $user = Auth::user();

        // Find the rating by ID
        $rating = BusinessRating::findOrFail($businessRating);

        // Check if user already voted
        $existingVote = BusinessRatingHelpfulVote::where('business_rating_id', $rating->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingVote) {
            // Remove vote
            $existingVote->delete();
            $rating->decrement('helpful_count');
            
            return response()->json([
                'success' => true,
                'message' => 'Glas je uklonjen.',
                'helpful_count' => $rating->fresh()->helpful_count,
                'has_voted' => false,
            ]);
        } else {
            // Add vote
            BusinessRatingHelpfulVote::create([
                'business_rating_id' => $rating->id,
                'user_id' => $user->id,
            ]);
            $rating->increment('helpful_count');
            
            return response()->json([
                'success' => true,
                'message' => 'Glas je dodat.',
                'helpful_count' => $rating->fresh()->helpful_count,
                'has_voted' => true,
            ]);
        }
    }

    /**
     * Store or update owner reply
     */
    public function ownerReply(Request $request, $businessRating)
    {
        // Log at the very beginning - use multiple methods to ensure we see it
        $logData = [
            'timestamp' => now()->toDateTimeString(),
            'businessRating_param' => $businessRating,
            'request_method' => $request->method(),
            'request_url' => $request->fullUrl(),
            'request_data' => $request->all(),
            'auth_check_web' => Auth::check(),
            'auth_check_business' => Auth::guard('business')->check(),
        ];
        
        // Log to file directly
        file_put_contents(
            storage_path('logs/owner_reply.log'),
            date('Y-m-d H:i:s') . ' - ownerReply METHOD CALLED' . PHP_EOL .
            json_encode($logData, JSON_PRETTY_PRINT) . PHP_EOL . PHP_EOL,
            FILE_APPEND
        );
        
        // Also log using Laravel's Log facade
        Log::info('=== ownerReply METHOD CALLED ===', $logData);
        
        try {

            // Check if user is authenticated as business user
            if (!Auth::guard('business')->check()) {
                Log::warning('Business user not authenticated');
                return response()->json([
                    'success' => false,
                    'message' => 'Morate biti ulogovani kao vlasnik biznisa da biste odgovorili.'
                ], 401);
            }

            $businessUser = Auth::guard('business')->user();
            Log::info('Business user authenticated', ['business_user_id' => $businessUser->id]);

            // Find the rating by ID - try both find and findOrFail
            try {
                $rating = BusinessRating::find($businessRating);
                
                if (!$rating) {
                    Log::warning('Rating not found with find()', ['rating_id' => $businessRating]);
                    // Try findOrFail to see if it gives more info
                    try {
                        $rating = BusinessRating::findOrFail($businessRating);
                    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                        Log::error('Rating not found with findOrFail', [
                            'rating_id' => $businessRating,
                            'error' => $e->getMessage(),
                        ]);
                        return response()->json([
                            'success' => false,
                            'message' => 'Recenzija nije pronađena.'
                        ], 404);
                    }
                }
            } catch (\Exception $e) {
                Log::error('Error finding rating', [
                    'rating_id' => $businessRating,
                    'error' => $e->getMessage(),
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Greška pri pronalaženju recenzije: ' . $e->getMessage()
                ], 500);
            }

            Log::info('Rating found', [
                'rating_id' => $rating->id,
                'rating_business_user_id' => $rating->business_user_id,
                'current_business_user_id' => $businessUser->id,
            ]);

            // Check if the rating belongs to this business
            if ($rating->business_user_id != $businessUser->id) {
                Log::warning('Business user does not own this rating', [
                    'rating_business_user_id' => $rating->business_user_id,
                    'current_business_user_id' => $businessUser->id,
                ]);
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
                Log::warning('Validation failed', ['errors' => $validator->errors()->toArray()]);
                return response()->json([
                    'success' => false,
                    'message' => 'Greška u validaciji: ' . $validator->errors()->first('reply'),
                    'errors' => $validator->errors()
                ], 422);
            }

            Log::info('Validation passed', ['reply' => substr($request->reply, 0, 50) . '...']);

            // Check if reply already exists
            $existingReply = BusinessRatingReply::where('business_rating_id', $rating->id)->first();
            
            Log::info('Checking for existing reply', [
                'rating_id' => $rating->id,
                'existing_reply' => $existingReply ? 'yes' : 'no',
                'existing_reply_id' => $existingReply ? $existingReply->id : null,
            ]);

            $wasRecentlyCreated = false;
            
            try {
                if ($existingReply) {
                    Log::info('Updating existing reply', ['reply_id' => $existingReply->id]);
                    // Update existing reply
                    $existingReply->reply = $request->reply;
                    $saved = $existingReply->save();
                    
                    Log::info('Update result', [
                        'saved' => $saved,
                        'reply_id' => $existingReply->id,
                        'reply_text' => substr($existingReply->reply, 0, 50) . '...',
                    ]);
                    
                    if (!$saved) {
                        throw new \Exception('Failed to update reply');
                    }
                    
                    $reply = $existingReply;
                } else {
                    Log::info('Creating new reply', [
                        'business_rating_id' => $rating->id,
                        'business_user_id' => $businessUser->id,
                        'reply_length' => strlen($request->reply),
                    ]);
                    
                    // Create new reply using DB transaction to ensure it's saved
                    DB::beginTransaction();
                    
                    try {
                        $reply = new BusinessRatingReply();
                        $reply->business_rating_id = $rating->id;
                        $reply->business_user_id = $businessUser->id;
                        $reply->reply = $request->reply;
                        $saved = $reply->save();
                        
                        Log::info('Save result', [
                            'saved' => $saved,
                            'reply_id' => $reply->id ?? 'no id',
                            'reply_text' => substr($reply->reply, 0, 50) . '...',
                        ]);
                        
                        if (!$saved) {
                            throw new \Exception('Failed to save reply - save() returned false');
                        }
                        
                        if (!$reply->id) {
                            throw new \Exception('Failed to save reply - no ID generated');
                        }
                        
                        DB::commit();
                        $wasRecentlyCreated = true;
                        
                        Log::info('Reply created successfully', [
                            'reply_id' => $reply->id,
                            'business_rating_id' => $reply->business_rating_id,
                            'business_user_id' => $reply->business_user_id,
                        ]);
                    } catch (\Exception $e) {
                        DB::rollBack();
                        Log::error('Error creating reply in transaction', [
                            'error' => $e->getMessage(),
                            'trace' => $e->getTraceAsString(),
                        ]);
                        throw $e;
                    }
                }

                // Verify reply was saved
                $verifyReply = BusinessRatingReply::find($reply->id);
                if (!$verifyReply) {
                    throw new \Exception('Reply was not saved to database');
                }
                
                Log::info('Reply verified in database', [
                    'reply_id' => $verifyReply->id,
                    'reply_text' => substr($verifyReply->reply, 0, 50) . '...',
                ]);

                // Load relationships
                $reply->refresh();
                $reply->load('businessUser');

                Log::info('Reply saved successfully', [
                    'reply_id' => $reply->id,
                    'has_business_user' => $reply->businessUser ? 'yes' : 'no',
                ]);

                // Check if request expects JSON (AJAX)
                if ($request->wantsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => true,
                        'message' => $wasRecentlyCreated ? 'Odgovor je uspešno dodat.' : 'Odgovor je uspešno ažuriran.',
                        'reply' => [
                            'id' => $reply->id,
                            'reply' => $reply->reply,
                            'created_at' => $reply->created_at->toIso8601String(),
                            'updated_at' => $reply->updated_at->toIso8601String(),
                            'business_user' => [
                                'id' => $reply->businessUser->id,
                                'company_name' => $reply->businessUser->company_name,
                            ],
                        ],
                    ]);
                } else {
                    // Regular form submission - redirect back
                    return redirect()->back()->with('success', $wasRecentlyCreated ? 'Odgovor je uspešno dodat.' : 'Odgovor je uspešno ažuriran.');
                }
            } catch (\Illuminate\Database\QueryException $e) {
                Log::error('Database error in ownerReply', [
                    'error' => $e->getMessage(),
                    'sql' => $e->getSql(),
                    'bindings' => $e->getBindings(),
                    'trace' => $e->getTraceAsString(),
                ]);
                
                if ($request->wantsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Greška pri čuvanju odgovora u bazu: ' . $e->getMessage()
                    ], 500);
                } else {
                    return redirect()->back()->with('error', 'Greška pri čuvanju odgovora u bazu: ' . $e->getMessage());
                }
            } catch (\Exception $e) {
                Log::error('Error in ownerReply: ' . $e->getMessage());
                Log::error('Stack trace: ' . $e->getTraceAsString());
                
                if ($request->wantsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Greška pri slanju odgovora: ' . $e->getMessage()
                    ], 500);
                } else {
                    return redirect()->back()->with('error', 'Greška pri slanju odgovora: ' . $e->getMessage());
                }
            }
        } catch (\Exception $e) {
            Log::error('Outer exception in ownerReply: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Greška pri slanju odgovora: ' . $e->getMessage()
                ], 500);
            } else {
                return redirect()->back()->with('error', 'Greška pri slanju odgovora: ' . $e->getMessage());
            }
        }
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
