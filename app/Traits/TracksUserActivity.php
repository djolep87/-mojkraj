<?php

namespace App\Traits;

use App\Jobs\TrackActivityJob;

trait TracksUserActivity
{
    public function trackActivity(string $type, string $value): void
    {
        if (auth()->check()) {
            $job = new TrackActivityJob(
                auth()->id(),
                $type,
                $value
            );
            $job->handle();
        }
    }
}


