<?php

namespace App\Http\Controllers;

use App\Contracts\ISkillService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SkillRequests\StoreRequest;
use App\Http\Resources\SkillResources\GetResource;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;
use App\Http\Requests\SkillRequests\UpdateRequest;

class SkillController extends Controller
{
    public function __construct(private readonly ISkillService $service){}

    public function index():JsonResponse{
       $result = $this->service->GetAll();
       return response()->json([
        'message'=>'Skills Pulled Successfully',
        'data' => GetResource::collection($result),
       ],200);
    }

    public function store(StoreRequest $request):JsonResponse{
        $dto = StoreDTO::fromValidation($request->validated());
        $this->service->Create($dto);
        return response()->json([
            'message'=> 'Skill Stored Successfully',
        ],201);
    }


    public function show(int $id):JsonResponse{
        $result = $this->service->Find($id);
        return response()->json([
            'message'=>'Skill pulled successfully',
            'data' => new GetResource($result),
        ],200);
    }


    public function update(int $id, UpdateRequest $request):JsonResponse{
        $dto = UpdateDTO::fromArray($request->validated(),$id);
        $result = $this->service->Update($dto);
        return response()->json([
            'message'=>'Skill Updated Successfully',
            'data'=> $result,
        ],200);
    }


    public function destroy(int $id):JsonResponse{
        $this->service->Destroy($id);
        return response()->json([
            'message'=>'Skill deleted successfully',
        ],201);
    }
}
