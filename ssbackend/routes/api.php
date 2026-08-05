<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/skills',[SkillController::class,'index']);
Route::get('/socials',[SocialController::class,'index']);


Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/me',[AuthController::class,'me']);
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
});