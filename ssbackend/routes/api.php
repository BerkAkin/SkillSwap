<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInterestController;
use Illuminate\Support\Facades\Route;


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/skills',[SkillController::class,'index']);
Route::get('/adverts',[AdvertController::class,'index']);
Route::get('/adverts/{id}',[AdvertController::class,'show']);


Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::post('/logout',[AuthController::class,'logout']);
    
    //USER GENERAL INFO
    Route::get('/me',[UserController::class,'meInfo']); 
    Route::put('/me/settings/{id}',[UserController::class,'updateSetting']);
    Route::put('/me/socials/{id}',[UserController::class,'updateSocial']);

    //ADVERTS
    Route::post('/adverts',[AdvertController::class,'store']);
    Route::delete('/adverts/{id}',[AdvertController::class,'destroy']);
    Route::get('/me/adverts',[AdvertController::class,'myAdverts']); 
    
    //OFFERS
    Route::get('adverts/{advertId}/offers',[OfferController::class,'index']); 
    Route::post('adverts/{advertId}/offers',[OfferController::class,'store']);
    Route::get('/offers/{id}',[OfferController::class,'show']); 
    Route::delete('/me/offers/{id}',[OfferController::class,'destroy']);
    Route::get('/me/offers',[OfferController::class,'myOffers']); 
    Route::post('/offers/{id}/accept',[OfferController::class,'accept']);
    Route::post('/offers/{id}/reject',[OfferController::class,'reject']);

    //SKILL AND WISHLIST
    Route::post('/me/skills/{id}',[UserInterestController::class,'storeSkill']); 
    Route::delete('/me/skills/{id}',[UserInterestController::class,'destroySkill']); 
    Route::post('/me/wishlist/{id}',[UserInterestController::class,'storeWish']); 
    Route::delete('/me/wishlist/{id}',[UserInterestController::class,'destroyWish']); 
    
    //CHATS
    Route::get('/chats/{id}',[ChatController::class,'getMessages']); 
    Route::post('/chats/{id}/messages',[ChatController::class,'sendMessage']); 
    
    //MEETINGS
    Route::post('/meetings',[MeetingController::class,'store']);
    Route::get('/me/meetings',[MeetingController::class,'index']);
    Route::put('/me/meetings/{id}',[MeetingController::class,'update']); 
    
});
    

//ADMIN CRUD OPS
Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::get('/skills/{id}',[SkillController::class,'show']);
    Route::post('/skills',[SkillController::class,'store']);
    Route::put('/skills/{id}',[SkillController::class,'update']);
    Route::delete('/skills/{id}',[SkillController::class,'destroy']);
    
    Route::get('/socials',[SocialController::class,'index']);
    Route::get('/socials/{id}',[SocialController::class,'show']);
    Route::post('/socials',[SocialController::class,'store']);
    Route::put('/socials/{id}',[SocialController::class,'update']);
    Route::delete('/socials/{id}',[SocialController::class,'destroy']);
    
    Route::get('/achievements',[AchievementController::class,'index']);
    Route::get('/achievements/{id}',[AchievementController::class,'show']);
    Route::post('/achievements',[AchievementController::class,'store']);
    Route::put('/achievements/{id}',[AchievementController::class,'update']);
    Route::delete('/achievements/{id}',[AchievementController::class,'destroy']);
    
    Route::get('/settings',[SettingController::class,'index']);  
    Route::get('/settings/{id}',[SettingController::class,'show']);
    Route::post('/settings',[SettingController::class,'store']);
    Route::put('/settings/{id}',[SettingController::class,'update']);
    Route::delete('/settings/{id}',[SettingController::class,'destroy']);

    
});