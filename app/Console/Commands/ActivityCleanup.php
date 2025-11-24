<?php

namespace App\Console\Commands;

use App\Models\UserActivity;
use Illuminate\Console\Command;

class ActivityCleanup extends Command
{
    protected $signature = 'activity:cleanup';

    protected $description = 'Clean up user activities older than 90 days';

    public function handle(): int
    {
        $deleted = UserActivity::where('created_at', '<', now()->subDays(90))->delete();

        $this->info("Deleted {$deleted} old activity records.");

        return Command::SUCCESS;
    }
}
