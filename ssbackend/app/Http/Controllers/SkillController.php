<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Contracts\SkillServiceInterface;
use App\Http\Requests\SkillRequests\StoreRequest;
use App\Http\Resources\SkillResources\GetResource;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\ShowDTO;

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


    public function update(){}
    public function destroy(){}
}
