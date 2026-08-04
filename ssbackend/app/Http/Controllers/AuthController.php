<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Contracts\AuthServiceInterface;
use App\Http\Requests\AuthRequests\LoginRequest;
use App\Http\Requests\AuthRequests\MeRequest;
use App\Http\Requests\AuthRequests\RegisterRequest;
use App\Http\Resources\AuthResources\MeResource;
use App\Http\Resources\AuthResources\RegisterResource;
use App\DTOs\AuthDTOs\LoginDTO;
use App\DTOs\AuthDTOs\RegisterDTO;

class AuthController extends Controller
{

    public function __construct(private readonly AuthServiceInterface $service) {}

    public function Register(RegisterRequest $request):JsonResponse{

        $dto = RegisterDTO::fromValidated($request->validated());

        $result = $this->service->Register($dto);

        return response()->json([
            'message'=> 'Register successful',
            'data'=>[
                'user'=>new RegisterResource($result['user']),
                'token'=>$result['token']
            ]
        ],201);
    }

    public function Login(LoginRequest $request):JsonResponse{
        $dto = LoginDTO::fromArray($request->validated());
        $result = $this->service->Login($dto);
        return response()->json([ 
            'message'=>'Login Successful',
            'data'=> $result['token']
        ],201);
    }

    public function Logout(Request $request,){
        $this->service->Logout($request->user());
        return response()->json([
            'message' => 'Logged Out!',
        ],201);
    }

    public function Me(MeRequest $request):JsonResponse{
        $user = $request->user()->load('skills');
        return response()->json([
            'message'=> 'User found !',
            'data'=> [
                'user'=> new MeResource($user),
            ],
        ],201);
    }

}
