<?php

namespace App\Http\Controllers;

use App\Contracts\SocialServiceInterface;
use App\Http\Requests\SocialRequests\StoreRequest;
use App\Http\Requests\SocialRequests\UpdateRequest;
use App\Http\Resources\SocialResources\GetResource;
use App\DTOs\SocialDTOs\DestroyDTO;
use App\DTOs\SocialDTOs\ShowDTO;
use App\DTOs\SocialDTOs\StoreDTO;
use App\DTOs\SocialDTOs\UpdateDTO;

class SocialController extends Controller
{
    public function __construct(private readonly SocialServiceInterface $service){}

    public function index(){
        $result = $this->service->GetAll();
        return response()->json([
            'message'=> 'Socials Pulled Successfully',
            'data' => GetResource::collection($result),
        ],200);
    }


    public function show(int $id){
        $dto = ShowDTO::fromRoute($id);
        $result = $this->service->Find($dto);
        return response()->json([
            'message'=>'Social Pulled Successfully',
            'data'=> new GetResource($result),
        ],200);
    }

    public function store(StoreRequest $request){
        $dto = StoreDTO::fromType($request->validated());
        $result = $this->service->Create($dto);
        return response()->json([
            'message'=> 'Social Created and Stored Successfully',
            'data'=> $result,
        ],201);
    }

    public function update(int $id, UpdateRequest $request){
        $dto = UpdateDTO::fromType($request->validated(),$id);
        $result= $this->service->Update($dto);
        return response()->json([
            'message'=> 'Social Updated Successfully',
            'data'=> new GetResource($result),
        ],201);
    }

    public function destroy(int $id){
        $dto = DestroyDTO::fromRoute($id);
        $this->service->Destroy($dto);
        return response()->json([
            'message'=> 'Social Deleted Successfully',
        ],200);
    }

}
