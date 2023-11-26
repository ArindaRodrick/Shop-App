<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriorityController;
use Illuminate\Support\Facades\Route;




Route::middleware('guest')->group(function () {
Route::get('register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [SessionsController::class, 'create'])
    ->name('login');

Route::post('login', [SessionsController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::middleware('auth')->group(function () {
    //ITEMS
    
    Route::get('/', [ItemController::class, 'index'])->name('home');
    Route::get('items/create', [ItemController::class, 'create']);
    Route::post('items', [ItemController::class, 'store']);
    Route::get('items/{item}/edit', [ItemController::class, 'edit']);
    Route::patch('items/{item}', [ItemController::class, 'update']);
    Route::delete('items/{item}', [ItemController::class, 'destroy']);
    //CATEGORIES
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('categories', [CategoryController::class, 'store']);
Route::get('categories/{category}/edit', [CategoryController::class, 'edit']);
Route::patch('categories/{category}', [CategoryController::class, 'update']);
Route::delete('categories/{category}', [CategoryController::class, 'destroy']);
//PRIORITIES
Route::get('priorities', [PriorityController::class, 'index']);
Route::get('priorities/create', [PriorityController::class, 'create']);
Route::post('priorities', [PriorityController::class, 'store']);
Route::get('priorities/{priority}/edit', [PriorityController::class, 'edit']);
Route::patch('priorities/{priority}', [PriorityController::class, 'update']);
Route::delete('priorities/{priority}', [PriorityController::class, 'destroy']);
});


