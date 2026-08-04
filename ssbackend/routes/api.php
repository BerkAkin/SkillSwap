<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/me',[AuthController::class,'me']);
});
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


Route::get('/skills',[SkillController::class,'index']);
Route::get('/skills/{skill}',[SkillController::class,'show']);


Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::put('/skills/{skill}',[SkillController::class,'update']);
    Route::delete('/skill/{skill}',[SkillController::class,'destroy']);
    Route::post('/skills',[SkillController::class,'store']);
});