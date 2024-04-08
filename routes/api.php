<?php
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\StoresBooksController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::controller(BooksController::class)->group(function () {
        Route::post('/books', 'create');
        Route::get('/books/{id}', 'read');
        Route::put('/books/{id}', 'update');
        Route::delete('/books/{id}', 'delete');
    });
    Route::controller(StoresController::class)->group(function () {
        Route::post('/stores', 'create');
        Route::get('/stores/{id}', 'read');
        Route::put('/stores/{id}', 'update');
        Route::delete('/stores/{id}', 'delete');
    });
    Route::controller(StoresBooksController::class)->group(function () {
        Route::post('/stores/{store}/{book}', 'link');
        Route::delete('/stores/{store}/{book}', 'unlink');
    });
});

Route::post('/login', [AuthController::class, 'login']);
