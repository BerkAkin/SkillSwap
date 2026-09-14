<?php

namespace App\Http\Controllers;

use App\Contracts\IUserInterestService;
use App\DTOs\UserInterestDTOs\StoreSkillDTO;
use App\DTOs\UserInterestDTOs\StoreWishlistDTO;
use Illuminate\Support\Facades\Auth;

class UserInterestController extends Controller
{
    public function __construct(private readonly IUserInterestService $service){ }

    public function storeSkill(int $skill_id){
        $dto = StoreSkillDTO::fromArray(Auth::user()->id,$skill_id);
        $result = $this->service->CreateSkill($dto);
        return response()->json([
            'message'=> 'Skill added to your skills successfully',
            'data'=> $result,
        ],201);
    }

    public function destroySkill(int $skill_id){
        $result = $this->service->DestroySkill($skill_id);
        return response()->json([
            'message'=> 'Skill removed from your skills successfully',
            'data'=> $result,
        ],200);
    }

    public function storeWish(int $skill_id){
        $dto = StoreWishlistDTO::fromArray(Auth::user()->id,$skill_id);
        $result = $this->service->CreateWishlist($dto);
        return response()->json([
            'message'=> 'Skill added to your wishlist successfully',
            'data'=> $result,
        ],201);
    }

    public function destroyWish(int $skill_id){
        $result = $this->service->DestroyWishlist($skill_id);
        return response()->json([
            'message'=> 'Skill removed from your wishlist successfully',
            'data'=> $result,
        ],200);
    }

}
