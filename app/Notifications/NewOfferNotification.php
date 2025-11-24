<?php

namespace App\Notifications;

use App\Models\Offer;
use Illuminate\Notifications\Notification;

class NewOfferNotification extends Notification
{
    public function __construct(
        public Offer $offer
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Nova ponuda u vašem kraju',
            'message' => "Biznis {$this->offer->businessUser->company_name} je objavio novu ponudu: {$this->offer->title}",
            'offer_id' => $this->offer->id,
            'offer_url' => route('offers.show', $this->offer),
        ];
    }
}
