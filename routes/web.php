<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{RegisterController, LoginController};
use App\Http\Controllers\{JobController, ChatController, TicketsInWork};
use App\Http\Controllers\Profile\TicketsController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('/profile')->middleware('auth:web')->name('profile.')->group(function () {
    Route::get('/', function (Request $request) {
        return view('profile.index', compact('request'));
    })->name('index');

    Route::prefix('/tickets')->name('tickets.')->group(function () {
        Route::get('/', [TicketsController::class, 'index'])->name('index');
        Route::get('/create', [TicketsController::class, 'create'])->name('create');
        Route::post('/store', [TicketsController::class, 'store'])->name('store');
        Route::prefix('/{id}')->group(function () {
            Route::get('/', [TicketsController::class, 'show'])->name('show');
            Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
            Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
        });
    })->middleware('role:customer,admin');

    Route::prefix('/jobs')->name('jobs.')->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('index');
        Route::post('/{id}', [JobController::class, 'store'])->name('store');
        Route::get('/{id}', [JobController::class, 'show'])->name('show');
    })->middleware('role:agent, admin');

    Route::prefix('/tickets-in-work')->name('tickets-work.')->group(function () {
        Route::get('/', [TicketsInWork::class, 'index'])->name('index');
    });
});

Route::prefix('/login')->name('login.')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('/', [LoginController::class, 'store'])->name('store');
});

Route::prefix('/register')->name('register.')->group(function () {
    Route::get('/', [RegisterController::class, 'index'])->name('index');
    Route::post('/', [RegisterController::class, 'store'])->name('store');
});

Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
