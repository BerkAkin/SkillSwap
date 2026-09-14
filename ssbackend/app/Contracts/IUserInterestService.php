<?php

namespace App\Contracts;

use App\DTOs\UserInterestDTOs\StoreSkillDTO;
use App\DTOs\UserInterestDTOs\StoreWishlistDTO;

interface IUserInterestService
{
    public function CreateWishlist(StoreWishlistDTO $DTO);
    public function DestroyWishlist(int $Id);
    public function CreateSkill(StoreSkillDTO $DTO);
    public function DestroySkill(int $Id);
}
