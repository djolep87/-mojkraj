<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Support\Collection;

class SmartNotificationService
{
    public function getUserInterests(User $user): array
    {
        $activities = UserActivity::where('user_id', $user->id)
            ->where('created_at', '>=', now()->subDays(7))
            ->get();

        $grouped = $activities->groupBy(function ($activity) {
            return $activity->type . ':' . $activity->value;
        });

        $ranked = $grouped->map(function ($group) {
            return [
                'type' => $group->first()->type,
                'value' => $group->first()->value,
                'count' => $group->count(),
            ];
        })->sortByDesc('count')->values();

        $interests = [];
        foreach ($ranked as $item) {
            $interests[] = [
                'type' => $item['type'],
                'value' => $item['value'],
                'score' => $item['count'],
            ];
        }

        return $interests;
    }
}


