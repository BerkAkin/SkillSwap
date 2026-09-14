<?php

namespace App\Services;

use App\Contracts\IUserInterestService;
use App\DTOs\UserInterestDTOs\StoreSkillDTO;
use App\DTOs\UserInterestDTOs\StoreWishlistDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserInterestsService implements IUserInterestService
{

    public function CreateSkill(StoreSkillDTO $DTO){
        $user = User::find($DTO->user_id);
        $user->skills()->syncWithoutDetaching($DTO->skill_id);
        return;
    }

    public function DestroySkill(int $Id){
        $user = User::find(Auth::user()->id);  
        $user->skills()->detach($Id);  
    }
            
    public function CreateWishlist(StoreWishlistDTO $DTO){
        $user = User::find($DTO->user_id);
        $user->wishlist()->syncWithoutDetaching($DTO->skill_id);
        return;
    }

    public function DestroyWishlist(int $Id){
        $user = User::find(Auth::user()->id);  
        $user->wishlist()->detach($Id);  
    }
}
