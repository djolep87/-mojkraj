<?php

namespace App\Providers;

use App\Models\News;
use App\Models\Building;
use App\Models\Report;
use App\Models\Expense;
use App\Models\Vote;
use App\Models\Announcement;
use App\Policies\NewsPolicy;
use App\Policies\BuildingPolicy;
use App\Policies\ReportPolicy;
use App\Policies\ExpensePolicy;
use App\Policies\VotePolicy;
use App\Policies\AnnouncementPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        News::class => NewsPolicy::class,
        Building::class => BuildingPolicy::class,
        Report::class => ReportPolicy::class,
        Expense::class => ExpensePolicy::class,
        Vote::class => VotePolicy::class,
        Announcement::class => AnnouncementPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
