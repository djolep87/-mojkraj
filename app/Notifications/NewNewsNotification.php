<?php

namespace App\Notifications;

use App\Models\News;
use Illuminate\Notifications\Notification;

class NewNewsNotification extends Notification
{
    public function __construct(
        public News $news
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $authorName = $this->news->is_anonymous ? 'Anonimni korisnik' : $this->news->user->name;
        
        return [
            'title' => 'Nova vest u vašem kraju',
            'message' => "{$authorName} je objavio novu vest: {$this->news->title}",
            'news_id' => $this->news->id,
            'news_url' => route('news.show', $this->news),
        ];
    }
}
