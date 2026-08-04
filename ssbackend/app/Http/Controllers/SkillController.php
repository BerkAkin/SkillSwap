<?php

namespace App\Http\Controllers;

use App\DTOs\SkillDTOs\StoreDTO;
use App\Http\Requests\SkillRequests\AddRequest;
use App\Http\Resources\SkillResources\GetResource;
use App\Services\SkillService;

class SkillController extends Controller
{
    public function __construct(private readonly SkillService $service){}

    public function index(){
       $result = $this->service->GetAll();
       return response()->json([
        'message'=>'Skills Pulled Successfully',
        'data' => GetResource::collection($result),
       ],200);
    }

    public function store(AddRequest $request){
        $dto = StoreDTO::fromValidation($request->validated());
        $result = $this->service->Create($dto);
        return response()->json([
            'message'=> 'Skill Stored Succesfully',
        ],201);
    }


    public function show(){}

    
    public function update(){}
    public function destroy(){}
}
