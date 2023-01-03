<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Future\IndexController;
use App\Http\Controllers\Future\SearchController;
use App\Http\Controllers\Future\CreateController;
use App\Http\Controllers\GoogleLoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get("/future", [IndexController::class, 'index'])->name('future.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/future/mypage/{id}', [IndexController::class, 'mypage'])->name('future.mypage');
    Route::get('/future/otherpage/{id}', [IndexController::class, 'otherpage'])->name('future.otherpage');
    Route::get('/future/ownpage/{id}', [IndexController::class, 'ownpage']);
    Route::get('/future/register',[IndexController::class, 'register']);
    Route::post('/future/search', SearchController::class);
    Route::post('/future/create', CreateController::class);
    Route::get('/future/follow/{id}', [\App\Http\Controllers\Future\IndexController::class, 'follow'])->name('future.follow');
    Route::get('/future/follow_delete/{id}', [IndexController::class, 'follow_delete'])->name('future.follow_delete');
    Route::get('/future/following/display', [IndexController::class, 'following_display']);
    Route::get('/future/followed/display', [IndexController::class, 'followed_display']);
    
    Route::get('/future/first_setting/{id}', [IndexController::class, 'first_setting'])->name('future.setting');
    
    Route::post('/future/settingregister/{id}', \App\Http\Controllers\Future\Update\IndexController::class);
    
    Route::get('/future/settingregister/put/{id}', [\App\Http\Controllers\Future\Update\IndexController::class, 'put_display']);
    
    Route::put('/future/settingregister/update/{id}', \App\Http\Controllers\Future\Update\PutController::class);
    
    Route::get('/future/share', [IndexController::class, 'share']);
    Route::get('/future/outline', [IndexController::class, 'outline']);
    Route::get('/api', [\App\Http\Controllers\ApiTestController::class, 'test']);
});
Route::get('/auth/redirect', [GoogleLoginController::class, 'getGoogleAuth'])->name('future.auth');

Route::get('/login/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';