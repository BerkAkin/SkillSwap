<?php

namespace App\Http\Controllers;

use App\DTOs\SkillDTOs\ShowDTO;
use App\DTOs\SkillDTOs\StoreDTO;
use App\Http\Requests\SkillRequests\StoreRequest;
use App\Http\Requests\SkillRequests\FindRequest;
use App\Http\Requests\SkillRequests\ShowRequest;
use App\Http\Resources\SkillResources\GetResource;
use App\Services\SkillService;
use Illuminate\Http\JsonResponse;

class SkillController extends Controller
{
    public function __construct(private readonly SkillService $service){}

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
