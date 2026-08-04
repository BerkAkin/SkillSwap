<?php

namespace App\Services;

use App\Contracts\AuthServiceInterface;
use App\DTOs\AuthDTOs\LoginDTO;
use App\DTOs\AuthDTOs\RegisterDTO;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{

    public function __construct(){}



    public function Register(RegisterDTO $DTO):array{

        return DB::transaction(function() use ($DTO)
        {
            $user = User::create([
                'firstname'=> $DTO->firstname,
                'lastname'=> $DTO->lastname,
                'email'=> $DTO->email,
                'password'=>$DTO->password,
                'gender'=>$DTO->gender,
                'phone_number'=> $DTO->phoneNumber
            ]);

            $user->credits()->create();
            /*             
            $user->settings()->attach([
                1=>['is_enabled'=>true],
                2=>['is_enabled'=>true],
                3=>['is_enabled'=>true],
                4=>['is_enabled'=>true],
            ]); */

            $token = $user->createToken('api-token')->plainTextToken;
            return ['user'=> $user, 'token'=> $token];
        });
    }



    public function Login(LoginDTO $DTO):array{

        $user = User::where('email',$DTO->email)->first();
        if(!$user || !Hash::check($DTO->password, $user->password)){
            throw new \Exception('Invalid Credentials');
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return [
            'token'=> $token,
        ];
    }



    public function Logout(User $user):void{
        $user->currentAccessToken()->delete();
    }

}
