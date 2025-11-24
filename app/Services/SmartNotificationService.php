<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Support\Facades\DB;

class SmartNotificationService
{
    public function getUserInterests(User $user): array
    {
        $interests = UserActivity::where('user_id', $user->id)
            ->where('created_at', '>=', now()->subDays(7))
            ->select('type', 'value', DB::raw('COUNT(*) as count'))
            ->groupBy('type', 'value')
            ->orderByDesc('count')
            ->get()
            ->map(function ($item) {
                return [
                    'type' => $item->type,
                    'value' => $item->value,
                    'score' => $item->count,
                ];
            })
            ->toArray();

        return $interests;
    }
}


