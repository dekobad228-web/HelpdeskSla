<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profile\TicketsController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/profile')->name('profile.')->group(function () {
    Route::get('/', function (Request $request) {
        return view('profile.index', compact('request'));
    })->middleware('auth')->name('index');

    Route::prefix('/tickets')->name('tickets.')->group(function () {
        Route::get('/', [TicketsController::class, 'index'])->name('index');
        Route::get('/create', [TicketsController::class, 'create'])->name('create');
        Route::post('/store', [TicketsController::class, 'store'])->name('store');
    })->middleware('role:customer, agent, admin');

    Route::prefix('/login')->name('login.')->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('index');
        Route::post('/', [LoginController::class, 'store'])->name('store');
    });

    Route::prefix('/register')->name('register.')->group(function () {
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::post('/', [RegisterController::class, 'store'])->name('store');
    });
});
