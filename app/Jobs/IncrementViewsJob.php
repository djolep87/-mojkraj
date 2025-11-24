<?php

namespace App\Jobs;

use App\Models\News;
use App\Models\Offer;
use App\Models\PetPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class IncrementViewsJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $modelType,
        public int $modelId
    ) {}

    public function handle(): void
    {
        $model = match($this->modelType) {
            'news' => News::find($this->modelId),
            'offer' => Offer::find($this->modelId),
            'pet' => PetPost::find($this->modelId),
            default => null,
        };

        if ($model && method_exists($model, 'incrementViews')) {
            $model->incrementViews();
        }
    }
}
