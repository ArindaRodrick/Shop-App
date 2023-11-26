<?php


use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriorityController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //ITEMS
    Route::get('/', [ItemController::class, 'index'])->name('home');
    Route::get('items/create', [ItemController::class, 'create']);
    Route::post('items', [ItemController::class, 'store']);
    Route::get('items/{item}/edit', [ItemController::class, 'edit']);
    Route::patch('items/{item}', [ItemController::class, 'update']);
    Route::delete('items/{item}', [ItemController::class, 'destroy']);
//CATEGORIES
    Route::resource('categories', CategoryController::class)->except('show');
    //PRIORITIES
    Route::resource('priorities', PriorityController::class)->except('show');
//ITEMS
});

require __DIR__.'/auth.php';

