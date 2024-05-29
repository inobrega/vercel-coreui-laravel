<?php

use Illuminate\Support\Facades\Route;
use \Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Volt::route('login', 'pages.auth.login')
        ->name('login');
});

Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
