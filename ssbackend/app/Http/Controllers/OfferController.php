<?php

namespace App\Http\Controllers;

use App\Contracts\IOfferService;
use App\DTOs\OfferDTOs\StoreDTO;
use App\Enums\StatusTypes;
use App\Http\Requests\OfferRequests\StoreRequest;
use App\Http\Resources\OfferResources\GetResource;
use Illuminate\Http\JsonResponse;

class OfferController extends Controller
{
    public function __construct(private readonly IOfferService $service){}

    public function index(int $advertId):JsonResponse{
        $result = $this->service->getAllOffers($advertId);
        return response()->json([
            'message'=>'Offers Fetched Successfully',
            'data' =>GetResource::collection($result),
        ],200);
    }

    public function show(int $id):JsonResponse{
        $result = $this->service->showOffer($id);
        return response()->json([
            'message'=>'Offer Fetched Successfully',
            'data' => new GetResource($result),
        ],200);
    }

    public function store(int $advertId, StoreRequest $request){
        $dto = StoreDTO::fromRoute($advertId,$request->validated());
        $result = $this->service->makeOffer($dto);
        return response()->json([
            'message'=> 'Offer has been made successfully',
            'data' => $result,
        ],201);
    }

    public function destroy(int $id){
        $result = $this->service->cancelOffer($id);
        return response()->json([
            'message'=> 'Offer has been cancelled',
            'data' => $result,
        ],201);
    }

    public function accept(int $id){
        $result = $this->service->decideOffer($id,StatusTypes::Accepted);
        return response()->json([
            'message'=> 'Offer has been accepted',
            'data' => $result,
        ],200);
    }

    public function reject(int $id){
        $result = $this->service->decideOffer($id,StatusTypes::Rejected);
        return response()->json([
            'message'=> 'Offer has been rejected',
            'data' => $result,
        ],200);
    }

    public function myOffers(){
        $result = $this->service->myOffers();
        return response()->json([
            'message'=> 'Your offers fetched successfully',
            'data'=> GetResource::collection($result),
        ],200);
    }
}
