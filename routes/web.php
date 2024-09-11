<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

/**
 * Authentication
 * 
 */

 Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
 Route::post('/login/submit', [AuthController::class, 'loginSubmit']);
 Route::get('/forgotpass', [AuthController::class, 'forgotpass']);
 Route::get('/reg', [AuthController::class, 'register']);
 Route::post('/reg/submit', [AuthController::class, 'registerSubmit']);

/**
 * Admin Area
 * 
 */
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
Route::get('/check', function(){
    return response()->json(User::all());
});
