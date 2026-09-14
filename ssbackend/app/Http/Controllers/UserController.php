<?php

namespace App\Http\Controllers;

use App\Contracts\IUserService;
use App\DTOs\UserDTOs\UpdateSocialDTO;
use App\Http\Requests\UserRequests\UpdateSocialRequest;
use App\Http\Resources\UserResources\GetResource;
use Illuminate\Http\JsonResponse;

class UserController extends Controller 
{
    public function __construct(private readonly IUserService $service){}

    public function meInfo():JsonResponse{
        $result = $this->service->meInfo();
        return response()->json([
            'message'=> 'Your information fetched successfully',
            'data'=> new GetResource($result),
        ],200);
    }

    public function updateSetting(int $id):JsonResponse{
        $result = $this->service->updateSetting($id);
        return response()->json([
            'message'=> 'setting changed successfully',
            'data'=> $result,
        ],200);
    }

    public function updateSocial(int $id, UpdateSocialRequest $request):JsonResponse{
        $dto = UpdateSocialDTO::fromType($request->validated(),$id);
        $result = $this->service->updateSocial($dto);
        return response()->json([
            'message'=> 'Social info updated successfully',
            'data'=> $result,
        ],200);
    } 
}
