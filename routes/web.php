<?php

use App\Livewire\Dashboard2;
use App\Livewire\Units;
use App\Livewire\Users;
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

Route::get('/units', Units::class)->name('units');

Route::get('/users', Users::class)->name('users');


Route::get('/dashboard', Dashboard2::class)->name('dashboard');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard3', function () {
        return view('dashboard3');
    })->name('dashboard3');
});
