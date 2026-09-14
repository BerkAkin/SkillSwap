<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Contracts\IAuthService;
use App\Http\Requests\AuthRequests\LoginRequest;
use App\Http\Requests\AuthRequests\RegisterRequest;
use App\Http\Resources\AuthResources\RegisterResource;
use App\DTOs\AuthDTOs\LoginDTO;
use App\DTOs\AuthDTOs\RegisterDTO;

class AuthController extends Controller
{

    public function __construct(private readonly IAuthService $service) {}

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
        ],200);
    }

    public function Logout(Request $request,):JsonResponse{
        $this->service->Logout($request->user());
        return response()->json([
            'message' => 'Logged Out!',
        ],200);
    }

}
