<?php

use App\Http\Controllers\ChampionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\WinnerController;

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

//route resource
Route::resource('players', PlayerController::class);
/*
Verb        URI                    Action             Route Name
------------------------------------------------------------------
GET         /players               index              players.index
GET         /players/create        create             players.create
POST        /players               store              players.store
GET         /players/{player}      show               players.show
GET         /players/{player}/edit edit               players.edit
PUT/PATCH   /players/{player}      update             players.update
DELETE      /players/{player}      destroy            players.destroy

 */
// Route::get('Addplayer', [PlayerController::class, 'create'])->name('Addplayer');
// Route::post('storeplayer', [PlayerController::class, 'store'])->name('storeplayer');
// Route::get('Viewplayer', [PlayerController::class, 'index'])->name('Viewplayer');
// Route::get('deletePlayer/{id}', [PlayerController::class, 'destroy'])->name('deletePlayer');
// Route::get('editPlayer/{id}', [PlayerController::class, 'edit'])->name('editPlayer');
// Route::put('updatePlayer/{id}', [PlayerController::class, 'update'])->name('updatePlayer');
// Route::get('showPlayer/{id}', [PlayerController::class, 'show'])->name('showPlayer');

//QR
Route::get('/qr', function () {
    return view('layouts.Qr');
});
/*
Using a GET request for a delete action is not recommended according to RESTful conventions and can have unintended consequences.

When you use a GET request for deletion, you're making the deletion action accessible via a simple link, which can be triggered accidentally by a search engine crawler, a browser prefetching mechanism, or even a user mistyping a URL. This can lead to data loss or unexpected behavior in your application.

It's recommended to use the appropriate HTTP method for each action:

GET for retrieving data.
POST for creating data.
PUT/PATCH for updating data.
DELETE for deleting data.
To follow best practices and adhere to RESTful principles, you should use a POST or DELETE request for delete actions. Laravel's resourceful routes automatically map DELETE requests to the destroy method of the controller, ensuring adherence to RESTful conventions.
 */


 Route::resource('offers', OfferController::class);

 Route::resource('products', ProductController::class);
 Route::resource('champions', ChampionController::class);
 Route::resource('winners', WinnerController::class);
