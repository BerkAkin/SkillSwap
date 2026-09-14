<?php

namespace App\Services;

use App\Contracts\IUserService;
use App\DTOs\UserDTOs\UpdateSocialDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService implements IUserService
{
    public function __construct(){}

    public function meInfo(): User{
        return User::with([
            'skills:id,name,description',
            'wishlist:id,name,description',
            'credits:user_id,credit_points',
            'settings:id,name,description',
            'achievements:id,title,description',
            'socials:id,type',
        ])
        ->findOrFail(Auth::id());
    }
    public function updateSetting(int $id): Void{
        $user = Auth::user();
        $currentSetting = $user->settings()->where('setting_id', $id)->first();

        if ($currentSetting) {
            $newState = !$currentSetting->pivot->is_enabled;
            $user->settings()->updateExistingPivot($id, ['is_enabled' => $newState]);
        }
    }
    public function updateSocial(UpdateSocialDTO $DTO): Void{
        $user = Auth::user();
        $user->socials()->updateExistingPivot($DTO->id,['url'=>$DTO->url]);
    }
}
