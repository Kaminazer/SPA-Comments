<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
Route::post('/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::get('/get-captcha', [\App\Http\Services\CaptchaService::class, 'getCaptcha'])->name('captcha.get');
Route::get('/check-captcha', [\App\Http\Services\CaptchaService::class, 'checkCaptcha'])->name('captcha.check');


