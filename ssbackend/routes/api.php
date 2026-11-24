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

Route::middleware('throttle:general')->group(function () {
    Route::get('/skills', [SkillController::class, 'index']); //DONE
    Route::get('/adverts', [AdvertController::class, 'index']); //DONE
    Route::get('/adverts/{id}', [AdvertController::class, 'show']); //DONE
    Route::post('/register', [AuthController::class, 'register']); //DONE
    Route::post('/login', [AuthController::class, 'login']); //DONE
});

Route::get('/meetings/types', [MeetingController::class, 'meetingTypes']);

Route::middleware(['auth:sanctum', 'throttle:general'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    //USER GENERAL INFO
    Route::get('/me', [UserController::class, 'meInfo']); //DONE
    Route::put('/me', [UserController::class, 'updateMeInfo']); //DONE
    Route::put('/me/settings/{id}', [UserController::class, 'updateSetting']); //DONE
    Route::put('/me/socials/{id}', [UserController::class, 'updateSocial']); //DONE

    //ADVERTS
    Route::get('/me/adverts', [AdvertController::class, 'myAdverts']); //DONE
    Route::get('/me/adverts/{id}', [AdvertController::class, 'myAdvertDetails']); //DONE
    Route::post('/adverts', [AdvertController::class, 'store']);
    Route::delete('/adverts/{id}', [AdvertController::class, 'destroy']);

    //OFFERS
    Route::get('advert/offers', [OfferController::class, 'index']); //DONE

    Route::post('adverts/{advertId}/offers', [OfferController::class, 'store']);
    Route::get('/offers/{id}', [OfferController::class, 'show']);
    Route::delete('/me/offers/{id}', [OfferController::class, 'destroy']);
    Route::get('/me/offers', [OfferController::class, 'myOffers']);
    Route::post('/offers/{id}/accept', [OfferController::class, 'accept']);
    Route::post('/offers/{id}/reject', [OfferController::class, 'reject']);

    //SKILL AND WISHLIST
    Route::post('/me/skills/{id}', [UserInterestController::class, 'storeSkill']); //DONE
    Route::delete('/me/skills/{id}', [UserInterestController::class, 'destroySkill']);
    Route::post('/me/wishlist/{id}', [UserInterestController::class, 'storeWish']); //DONE
    Route::delete('/me/wishlist/{id}', [UserInterestController::class, 'destroyWish']);

    //CHATS
    Route::get('/chats/{offerId}', [ChatController::class, 'getMessages']);
    Route::post('/chats/{chatId}', [ChatController::class, 'sendMessage']);

    //MEETINGS
    Route::post('/meetings', [MeetingController::class, 'store']);
    Route::get('/me/meetings', [MeetingController::class, 'index']);
    Route::put('/me/meetings/{id}', [MeetingController::class, 'update']);

});

Route::get('/skills/{id}', [SkillController::class, 'show']);

//ADMIN CRUD OPS
Route::middleware(['auth:sanctum', 'role:admin', 'throttle:admin'])->group(function () {
    Route::post('/skills', [SkillController::class, 'store']);
    Route::put('/skills/{id}', [SkillController::class, 'update']);
    Route::delete('/skills/{id}', [SkillController::class, 'destroy']);

    Route::get('/socials', [SocialController::class, 'index']);
    Route::get('/socials/{id}', [SocialController::class, 'show']);
    Route::post('/socials', [SocialController::class, 'store']);
    Route::put('/socials/{id}', [SocialController::class, 'update']);
    Route::delete('/socials/{id}', [SocialController::class, 'destroy']);

    Route::get('/achievements', [AchievementController::class, 'index']); //DONE
    Route::get('/achievements/{id}', [AchievementController::class, 'show']);
    Route::post('/achievements', [AchievementController::class, 'store']);
    Route::put('/achievements/{id}', [AchievementController::class, 'update']);
    Route::delete('/achievements/{id}', [AchievementController::class, 'destroy']);

    Route::get('/settings', [SettingController::class, 'index']); //DONE
    Route::get('/settings/{id}', [SettingController::class, 'show']);
    Route::post('/settings', [SettingController::class, 'store']);
    Route::put('/settings/{id}', [SettingController::class, 'update']);
    Route::delete('/settings/{id}', [SettingController::class, 'destroy']);


});