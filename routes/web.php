<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/future', \App\Http\Controllers\Future\IndexController::class)->name('future.index');
Route::get('/', function () {return view('welcome');});
Route::get('/dashboard', function(){return view('dashboard');})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/future/mypage/{id}', [\App\Http\Controllers\Future\IndexController::class, 'mypage'])->name('future.mypage');
    Route::get('/future/otherpage/{id}', [\App\Http\Controllers\Future\IndexController::class, 'otherpage'])->name('future.otherpage');
    Route::get('/future/ownpage/{id}', [\App\Http\Controllers\Future\IndexController::class, 'ownpage'])->name('future.index.ownpage');
    Route::get('/register0',[\App\Http\Controllers\Future\IndexController::class, 'register']) ->name('future.register');
    Route::post('/future/search', \App\Http\Controllers\Future\SearchController::class)->name('future.search');
    Route::post('/future/create', \App\Http\Controllers\Future\CreateController::class)->name('future.create');
    Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/future/follow/{id}', [\App\Http\Controllers\Future\IndexController::class, 'follow'])->name('future.follow');
    Route::get('/future/follow_delete/{id}', [\App\Http\Controllers\Future\IndexController::class, 'follow_delete'])->name('future.follow_delete');
    Route::get('/future/following/display', [\App\Http\Controllers\Future\IndexController::class, 'following_display'])->name('future.followdisplay');
    Route::get('/future/followed/display', [\App\Http\Controllers\Future\IndexController::class, 'followed_display'])->name('future.followeddisplay');
    Route::get('/future/setting/{id}', [\App\Http\Controllers\Future\IndexController::class, 'setting'])->name('future.setting');
    Route::post('/future/settingregister/{id}', \App\Http\Controllers\Future\Update\IndexController::class)->name('future.settingregister')->where('id', '[0-9]+');
    
    Route::get('/future/settingregister/put/{id}', [\App\Http\Controllers\Future\Update\IndexController::class, 'put_display'])->name('future.settingregister.put');
    Route::put('/future/settingregister/update/{id}', \App\Http\Controllers\Future\Update\PutController::class)->name('future.settingregister.update')->where('id', '[0-9]+');
    Route::get('/future/share', [\App\Http\Controllers\Future\IndexController::class, 'share'])->name('future.share');
});

require __DIR__.'/auth.php';
