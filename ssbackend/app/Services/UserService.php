<?php

namespace App\Services;

use App\Contracts\IUserService;
use App\DTOs\UserDTOs\UpdateInfoDTO;
use App\DTOs\UserDTOs\UpdateSocialDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService implements IUserService
{
    public function __construct()
    {
    }

    public function meInfo(): User
    {
        return User::with([
            'skills:id,name',
            'wishlist:id,name,description',
            'credits:user_id,credit_points',
            'settings' => function ($query) {
                $query->wherePivot('is_enabled', true)
                    ->select('settings.id');
            },
            'achievements:id,title,description',
            'socials:id,type',
        ])
            ->findOrFail(Auth::id());
    }

    public function updateInfo(UpdateInfoDTO $DTO): string
    {
        $user = Auth::user();
        $user->update([$DTO->type => $DTO->value]);
        return "Info updated succesfully";
    }

    public function updateSetting(int $id): void
    {
        $user = Auth::user();
        $currentSetting = $user->settings()->where('setting_id', $id)->first();

        if ($currentSetting) {
            $newState = !$currentSetting->pivot->is_enabled;
            $user->settings()->updateExistingPivot($id, ['is_enabled' => $newState]);
        }
    }
    public function updateSocial(UpdateSocialDTO $DTO): void
    {
        $user = Auth::user();
        $user->socials()->updateExistingPivot($DTO->id, ['url' => $DTO->url]);
    }
}
