<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendShipController;
use App\Http\Controllers\MessageController;


use App\Models\User;
use App\Models\Friendship;
use App\Models\Message;



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
    return view('welcome');
});

Route::get('/home', [FriendshipController::class, 'index']);

// All the corresponding routes for the associated resource are in its controller class
Route::resource('friendship', FriendshipController::class);

Route::resource('message', MessageController::class);

Route::resource('user', UserController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

