<?php

namespace App\Services;

use App\Contracts\IAuthService;
use App\DTOs\AuthDTOs\LoginDTO;
use App\DTOs\AuthDTOs\RegisterDTO;
use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService implements IAuthService
{

    public function __construct(){}


    public function Register(RegisterDTO $DTO):array{

        return DB::transaction(function() use ($DTO)
        {
            $user = $this->createUser($DTO);
            $this->createDefaultSettings($user);
            $this->createCredits($user);
            $this->createSocials($user);
            $token = $user->createToken('api-token',['*',now()->addDays(1)])->plainTextToken;
            return ['user'=> $user, 'token'=> $token];
        });
    }

    public function Login(LoginDTO $DTO):array{

        $user = User::where('email',$DTO->email)->first();
        if(!$user || !Hash::check($DTO->password, $user->password)){
            throw new \Exception('Invalid Credentials');
        }

        $token = $user->createToken('api-token',['*',now()->addDays(1)])->plainTextToken;

        return [
            'token'=> $token,
        ];
    }

    public function Logout(User $user):void{
        $user->currentAccessToken()->delete();
    }






    private function createUser(RegisterDTO $DTO):User{
        return User::create([
            'firstname'=> $DTO->firstname,
            'lastname'=> $DTO->lastname,
            'email'=> $DTO->email,
            'password'=>$DTO->password,
            'gender'=>$DTO->gender,
            'phone_number'=> $DTO->phoneNumber
        ]);
    }

    private function createDefaultSettings(User $user){
        $settings = Setting::all();
        foreach($settings as $setting){
            $user->settings()->attach($setting->id,['is_enabled'=>true]);
        }
    }

    private function createCredits(User $user){
        $user->credits()->create();
    }

    private function createSocials(User $user){
        $socials = Social::all();
        foreach ($socials as $social) {
            $user->socials()->attach($social->id,['url'=>'']);
        }
    }

}
