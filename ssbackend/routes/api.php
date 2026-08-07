<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/skills',[SkillController::class,'index']);


Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    
    Route::get('/me',[AuthController::class,'me']); //USER CONTROLLERA ALINACAK 

    Route::get('/socials',[SocialController::class,'index']);
    Route::get('/settings',[SettingController::class,'index']);  //USER CONTROLLERA ALINACAK me altına yeni kullanıcı bazlı yollar eklenecek
});



Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::get('/skills/{id}',[SkillController::class,'show']);
    Route::post('/skills',[SkillController::class,'store']);
    Route::put('/skills/{id}',[SkillController::class,'update']);
    Route::delete('/skills/{id}',[SkillController::class,'destroy']);


    Route::get('/socials/{id}',[SocialController::class,'show']);
    Route::post('/socials',[SocialController::class,'store']);
    Route::put('/socials/{id}',[SocialController::class,'update']);
    Route::delete('/socials/{id}',[SocialController::class,'destroy']);

    Route::get('/settings/{id}',[SettingController::class,'show']);
    Route::post('/settings',[SettingController::class,'store']);
    Route::put('/settings/{id}',[SettingController::class,'update']);
    Route::delete('/settings/{id}',[SettingController::class,'destroy']);

    
});