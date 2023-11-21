<?php

namespace App\Providers;

use App\Services\Jobtitle\JobTitleService;
use App\Services\Jobtitle\JobtitleServiceImplement;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(JobTitleService::class, JobtitleServiceImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
