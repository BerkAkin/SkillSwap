<?php

namespace App\Providers;

use App\Contracts\IAchievementService;
use App\Contracts\IAuthService;
use App\Contracts\IAdvertService;
use App\Contracts\IChatService;
use App\Contracts\IMeetingService;
use App\Contracts\IOfferService;
use App\Contracts\ISettingService;
use App\Contracts\ISkillService;
use App\Contracts\ISocialService;
use App\Contracts\IUserInterestService;
use App\Contracts\IUserService;
use App\Services\AchievementService;
use App\Services\AdvertService;
use App\Services\AuthService;
use App\Services\ChatService;
use App\Services\MeetingService;
use App\Services\OfferService;
use App\Services\SettingService;
use App\Services\SkillService;
use App\Services\SocialService;
use App\Services\UserInterestsService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthService::class,AuthService::class);
        $this->app->bind(ISkillService::class,SkillService::class);
        $this->app->bind(ISocialService::class,SocialService::class);
        $this->app->bind(ISettingService::class, SettingService::class);
        $this->app->bind(IAchievementService::class,AchievementService::class);
        $this->app->bind(IAdvertService::class,AdvertService::class);
        $this->app->bind(IOfferService::class,OfferService::class);
        $this->app->bind(IUserService::class,UserService::class);
        $this->app->bind(IUserInterestService::class, UserInterestsService::class);
        $this->app->bind(IChatService::class, ChatService::class);
        $this->app->bind(IMeetingService::class, MeetingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
