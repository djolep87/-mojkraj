<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RelevantContentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public array $interests
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $topInterests = array_slice($this->interests, 0, 3);
        $messages = [];
        
        foreach ($topInterests as $interest) {
            switch ($interest['type']) {
                case 'view_page':
                    $messages[] = "Vidimo da često posete stranicu: {$interest['value']}";
                    break;
                case 'open_post':
                    $messages[] = "Interesuje vas: {$interest['value']}";
                    break;
                case 'click':
                    $messages[] = "Kliknete na: {$interest['value']}";
                    break;
            }
        }

        return [
            'title' => 'Preporučeni sadržaj za vas',
            'message' => implode('. ', $messages),
            'interests' => $this->interests,
        ];
    }
}
