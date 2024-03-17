<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PolyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('users', UserController::class);

    route::prefix('patient')->name('patient')->group(function(){
        Route::get('newPatient', [UserController::class, 'newPatient'])->name('newPatient');
        Route::get('allPatient', [UserController::class, 'oldPatient'])->name('allPatient');
        Route::get('detailPatient/{id}', [UserController::class, 'showPatient'])->name('detailPatient');
        Route::put('addRmPatient/{id}', [UserController::class, 'addRm'])->name('addRm');
    });

    Route::resource('complaints', ComplaintController::class);
    Route::resource('polies', PolyController::class);
});