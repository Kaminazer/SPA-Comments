<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', [\App\Http\Controllers\Comment::class, 'index'])->name('comment.index');
Route::get('/create', [\App\Http\Controllers\Comment::class, 'create'])->name('comment.create');
Route::post('/store', [\App\Http\Controllers\Comment::class, 'store'])->name('comment.store');*/
Route::get('/', [\App\Http\Controllers\Index::class, 'index'])->name('index');
Route::get('/get-captcha', [\App\Http\Services\CaptchaService::class, 'getCaptcha'])->name('captcha.get');

