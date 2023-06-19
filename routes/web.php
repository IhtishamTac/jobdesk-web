<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('loginform', [AuthController::class, 'loginform'])->name('loginform');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('registerform', [AuthController::class, 'registerform'])->name('registerform');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('alljob', [JobController::class, 'alljob'])->name('alljob');
Route::get('req-dash', [JobController::class, 'reqdash'])->name('reqdash');
Route::post('add-job', [JobController::class, 'addjob'])->name('addjob');
Route::post('apply-job', [JobController::class, 'applyjob'])->name('applyjob');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth:sanctum')->group(function () {
});

Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::post('deljob/{id}', [AdminController::class, 'deljob'])->name('deljob');

Route::get('getujob/{id}', [JobController::class, 'getujob'])->name('getujob');
Route::post('editjob/{id}', [JobController::class, 'editjob'])->name('editjob');
