<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Contracts\SkillServiceInterface;
use App\DTOs\SkillDTOs\DestroyDTO;
use App\Http\Requests\SkillRequests\StoreRequest;
use App\Http\Resources\SkillResources\GetResource;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\ShowDTO;
use App\DTOs\SkillDTOs\UpdateDTO;
use App\Http\Requests\SkillRequests\UpdateRequest;

class SkillController extends Controller
{
    public function __construct(private readonly SkillServiceInterface $service){}

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


    public function show(int $id){
        $dto = ShowDTO::fromRoute($id);
        $result = $this->service->Find($dto);
        return response()->json([
            'message'=>'Skill pulled successfully',
            'data' => new GetResource($result),
        ],200);
    }


    public function update(int $id, UpdateRequest $request){
        $dto = UpdateDTO::fromArray($request->validated(),$id);
        $result = $this->service->Update($dto);
        return response()->json([
            'message'=>'Skill Updated Successfully',
            'data'=> $result,
        ],200);
    }


    public function destroy(int $id){
        $dto = DestroyDTO::fromRoute($id);
        $this->service->Destroy($dto);
        return response()->json([
            'message'=>'Skill deleted successfully',
        ],201);
    }
}
