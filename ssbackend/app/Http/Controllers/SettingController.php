<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\SettingRequests\StoreRequest;
use App\Http\Requests\SettingRequests\UpdateRequest;
use App\Http\Resources\SettingResources\GetResource;
use App\Contracts\SettingServiceInterface;
use App\DTOs\SettingDTOs\StoreDTO;
use App\DTOs\SettingDTOs\UpdateDTO;

class SettingController extends Controller
{
    public function __construct(private readonly SettingServiceInterface $service){}

    public function index():JsonResponse{
        $result = $this->service->GetAll();
        return response()->json([
            'message'=>'Settings fetched successfully',
            'data'=>GetResource::collection($result),
        ],200);
    }


    public function show(int $id):JsonResponse{
        $result = $this->service->Find($id);
        return response()->json([
            'message'=>'Setting fetched successfully',
            'data'=>new GetResource($result),
        ],200);
    }


    public function store(StoreRequest $request):JsonResponse{
        $dto = StoreDTO::fromArray($request->validated());
        $result = $this->service->Create($dto);
        return response()->json([
            'message'=>'Setting saved successfully',
            'data'=>$result,
        ],201);
    }


    public function update(int $id,UpdateRequest $request):JsonResponse{
        $dto = UpdateDTO::fromArray($id, $request->validated());
        $result = $this->service->Update($dto);
        return response()->json([
            'message'=>'Setting Updated Successfully',
            'data'=>$result,
        ],201);
    }


    public function destroy(int $id):JsonResponse{
        $result = $this->service->Destroy($id);
        return response()->json([
            'message'=>'Setting deleted successfully',
            'data'=>$result,
        ],200);
    }
}
