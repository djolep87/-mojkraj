<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanupReadNotifications extends Command
{
    protected $signature = 'notifications:cleanup-read';

    protected $description = 'Delete read notifications older than 24 hours';

    public function handle(): int
    {
        $deleted = DB::table('notifications')
            ->whereNotNull('read_at')
            ->where('read_at', '<', now()->subHours(24))
            ->delete();

        $this->info("Deleted {$deleted} read notifications older than 24 hours.");

        return Command::SUCCESS;
    }
}
