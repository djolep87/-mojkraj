<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\RelevantContentNotification;
use App\Services\SmartNotificationService;
use Illuminate\Console\Command;

class SendSmartNotifications extends Command
{
    protected $signature = 'notifications:send-smart';

    protected $description = 'Send smart notifications based on user activity';

    public function handle(SmartNotificationService $service): int
    {
        $sent = 0;

        User::chunk(100, function ($users) use ($service, &$sent) {
            foreach ($users as $user) {
                $interests = $service->getUserInterests($user);

                if (count($interests) >= 3) {
                    $user->notify(new RelevantContentNotification($interests));
                    $sent++;
                }
            }
        });

        $this->info("Sent {$sent} smart notifications.");

        return Command::SUCCESS;
    }
}
