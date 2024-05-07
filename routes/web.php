<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingListController;
use App\Models\ShoppingList;
use App\Http\Controllers\ItemController;

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

Route::get('/', [ShoppingListController::class, 'index']);

Route::prefix("shoppingList")->group(function () {
    Route::get('/', [ShoppingListController::class, 'index'])->name('shoppingList.index');
    Route::get('/{id}', [ShoppingListController::class, 'show'])->name('shoppingList.show');
    Route::get('/{id}/create', [ShoppingListController::class, 'create'])->name('shoppingList.create');
    Route::post('/store', [ShoppingListController::class, 'store'])->name('shoppingList.store');
    Route::get('/{id}/edit', [ShoppingListController::class, 'edit'])->name('shoppingList.edit');
    Route::put('/{id}/update', [ShoppingListController::class, 'update'])->name('shoppingList.update');
    Route::delete('/{id}/delete', [ShoppingListController::class, 'delete'])->name('shoppingList.delete');
});

Route::prefix("item")->group(function () {
    Route::get('/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/{id}/update', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/{id}/delete', [ItemController::class, 'delete'])->name('item.delete');
    Route::get('/{id}/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/{id}/store', [ItemController::class, 'store'])->name('item.store');
});
