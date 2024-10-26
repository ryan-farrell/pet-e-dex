<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', [PetController::class, 'index'])->name('home');
Route::get('pet/{id}', [PetController::class, 'show'])->name('pet.show');
