<?php

namespace App\Providers;

use App\Contracts\AuthServiceInterface;
use App\Contracts\SkillServiceInterface;
use App\Services\AuthService;
use App\Services\SkillService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class,AuthService::class);
        $this->app->bind(SkillServiceInterface::class,SkillService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
