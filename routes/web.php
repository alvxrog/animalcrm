<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('animals', AnimalController::class)
    ->except(['create'])
    ->middleware(['auth','verified']);

Route::get('animals/create_from_client/{client}', [AnimalController::class, 'create_from_client'])->name('animals.create_from_client');

Route::resource('clients',ClientController::class)
    ->middleware(['auth','verified']);

Route::resource('records', RecordController::class)
    ->middleware(['auth','verified']);

Route::get('records/create_from_animal/{animal}', [RecordController::class, 'create_from_animal'])->name('records.create_from_animal');
require __DIR__.'/auth.php';
