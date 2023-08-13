<?php

use App\Http\Controllers\categories\CategoriesController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\items\ItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::post('/store', [UsersController::class, 'store'])->name('users.store');
Route::post('/check', [UsersController::class, 'compareVerificationCode'])->name('compareVerificationCode');
Route::post('/login', [UsersController::class, 'login'])->name('login');


Route::post('/check_email', [ForgetPasswordController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/verify_code_forget_password', [ForgetPasswordController::class, 'checkVerificationCode'])->name('checkVerificationCode');
Route::post('/reset_password', [ForgetPasswordController::class, 'resetPassword'])->name('resetPassword');

//----------------------categories-----------------------
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');

//----------------------home-----------------------
Route::get('/home', [HomeController::class, 'getItemsWithDiscount'])->name('home');

//----------------------items-----------------------
// Route::get('/items', [ItemsController::class, 'index'])->name('items');

Route::get('/items/{id}', [ItemsController::class, 'showProducts'])->name('categories.items');

