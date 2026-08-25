<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\PostApiController;

// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\TagController;


//Rest API (Restful API) => Http Standard



Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class);
});
