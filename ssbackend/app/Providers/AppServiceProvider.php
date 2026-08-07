<?php

namespace App\Providers;

use App\Contracts\AuthServiceInterface;
use App\Contracts\SettingServiceInterface;
use App\Contracts\SkillServiceInterface;
use App\Contracts\SocialServiceInterface;
use App\Services\AuthService;
use App\Services\SettingService;
use App\Services\SkillService;
use App\Services\SocialService;
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
        $this->app->bind(SocialServiceInterface::class,SocialService::class);
        $this->app->bind(SettingServiceInterface::class, SettingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
