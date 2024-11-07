<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\EnsenyamentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('alumne', AlumneController::class);
Route::resource('centre', CentreController::class);
Route::resource('ensenyament', EnsenyamentController::class);
