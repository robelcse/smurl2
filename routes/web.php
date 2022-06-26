<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortnarController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', [ShortnarController::class, 'index']);
Route::post('/', [ShortnarController::class, 'shorts']);
Route::post('/checkemail',[DashboardController::class,'checkEmail']);
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('/custom-link', [DashboardController::class, 'storeCustomLink'])->name('custom_url');
    
    Route::get('/my-links', [DashboardController::class, 'myLinks'])->name('my-links');
    Route::get('/all-links', [DashboardController::class, 'zehadLinks'])->name('my-links');
    Route::get('/my-links/{key}', [DashboardController::class, 'myLink']);
    Route::get('/check-session', [DashboardController::class, 'sessionChecker']);
});
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::get('/{key}', [ShortnarController::class, 'redirectTo']);