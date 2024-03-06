<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PlayerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('Addcoach', [CoachController::class, 'create'])->name('Addcoach');
Route::post('storecoach', [CoachController::class, 'store'])->name('storecoach');
Route::get('Viewcoach', [CoachController::class, 'index'])->name('Viewcoach');

Route::get('editCoach/{id}', [CoachController::class, 'edit'])->name('editCoach');
Route::put('updateCoach/{id}', [CoachController::class, 'update'])->name('updateCoach');
Route::get('deleteCoach/{id}', [CoachController::class, 'destroy'])->name('deleteCoach');
Route::get('showCoach/{id}', [CoachController::class, 'show'])->name('showCoach');


Route::get('Addplayer', [PlayerController::class, 'create'])->name('Addplayer');
Route::post('storeplayer', [PlayerController::class, 'store'])->name('storeplayer');
Route::get('Viewplayer', [PlayerController::class, 'index'])->name('Viewplayer');

Route::get('deletePlayer/{id}', [PlayerController::class, 'destroy'])->name('deletePlayer');
Route::get('editPlayer/{id}', [PlayerController::class, 'edit'])->name('editPlayer');
Route::put('updatePlayer/{id}', [PlayerController::class, 'update'])->name('updatePlayer');
Route::get('showPlayer/{id}', [PlayerController::class, 'show'])->name('showPlayer');

//QR
Route::get('/qr', function () {
    return view('layouts.Qr');
});
