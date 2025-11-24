<?php

namespace App\Jobs;

use App\Models\UserActivity;

class TrackActivityJob
{
    public function __construct(
        public int $userId,
        public string $type,
        public string $value
    ) {}

    public function handle(): void
    {
        UserActivity::create([
            'user_id' => $this->userId,
            'type' => $this->type,
            'value' => $this->value,
        ]);
    }
}
