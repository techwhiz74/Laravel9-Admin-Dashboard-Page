<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;


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

// Route::middleware([Authenticate::class])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/del/{id}', [DashboardController::class, 'deleteUSer']);
    Route::get('/', [LoginController::class, 'index']);
    Route::get('register', function(){
        return view('register');
    })->name('signup');
    Route::post('submit', [LoginController::class, 'submitForm']);
    Route::post('insertUser', [RegisterController::class, 'registerUser']);
    Route::get('logout', [LoginController::class, 'logout']);
// });


// Route::get('/about/{name}', [Student::class, 'index', 'name']);


