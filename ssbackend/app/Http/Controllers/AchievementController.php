<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\AchievementRequests\StoreRequest;
use App\Http\Requests\AchievementRequests\UpdateRequest;
use App\Http\Resources\AchievementResources\GetResource;
use App\Contracts\AchievementServiceInterface;
use App\DTOs\AchievementDTOs\StoreDTO;
use App\DTOs\AchievementDTOs\UpdateDTO;

class AchievementController extends Controller
{
    public function __construct(private readonly AchievementServiceInterface $service){}

     public function index():JsonResponse{
        $result = $this->service->GetAll();
        return response()->json([
            'message'=>'Achievements fetched successfully',
            'data'=>GetResource::collection($result),
        ],200);
    }


    public function show(int $id):JsonResponse{
        $result = $this->service->Find($id);
        return response()->json([
            'message'=>'Achievement fetched successfully',
            'data'=>new GetResource($result),
        ],200);
    }


    public function store(StoreRequest $request):JsonResponse{
        $dto = StoreDTO::fromArray($request->validated());
        $result = $this->service->Create($dto);
        return response()->json([
            'message'=>'Achievement saved successfully',
            'data'=>$result,
        ],201);
    }


    public function update(int $id,UpdateRequest $request):JsonResponse{
        $dto = UpdateDTO::fromArray($id, $request->validated());
        $result = $this->service->Update($dto);
        return response()->json([
            'message'=>'Achievement Updated Successfully',
            'data'=>$result,
        ],201);
    }


    public function destroy(int $id):JsonResponse{
        $result = $this->service->Destroy($id);
        return response()->json([
            'message'=>'Achievement deleted successfully',
            'data'=>$result,
        ],200);
    }

}
