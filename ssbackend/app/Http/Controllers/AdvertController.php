<?php

namespace App\Http\Controllers;

use App\Contracts\IAdvertService;
use App\DTOs\AdvertDTOs\StoreDTO;
use App\Http\Requests\AdvertRequests\StoreRequest;
use App\Http\Resources\AdvertResource\GetResource;
use Illuminate\Http\JsonResponse;

class AdvertController extends Controller
{
    public function __construct(private readonly IAdvertService $service){}

    public function index():JsonResponse{
        $result = $this->service->GetAll();
        return response()->json([
            'message'=>'Adverts fetched successfully',
            'data'=>GetResource::collection($result),
        ],200);
    }


    public function show(int $id):JsonResponse{
        $result = $this->service->Find($id);
        return response()->json([
            'message'=>'Advert fetched successfully',
            'data'=>new GetResource($result),
        ],200);
    }


    public function store(StoreRequest $request):JsonResponse{
        $dto = StoreDTO::fromArray($request->validated());
        $result = $this->service->Create($dto);
        return response()->json([
            'message'=>'Advert saved successfully',
            'data'=>new GetResource($result),
        ],201);
    }
 
    public function destroy(int $id):JsonResponse{
        $result = $this->service->Destroy($id);
        return response()->json([
            'message'=>'Advert deleted successfully',
            'data'=>$result,
        ],200);
    }

    public function myAdverts():JsonResponse{
        $result= $this->service->myAdverts();
        return response()->json([
            'message'=>'Your adverts fetched successfully',
            'data'=> GetResource::collection($result),
        ]);
    }
    
}
