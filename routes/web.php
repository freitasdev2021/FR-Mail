<?php

use App\Http\Controllers\RemetentesController;
use App\Http\Controllers\ProfileController;
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
    //Remetentes
    Route::get('Remetentes',[RemetentesController::class,'index'])->name('Remetentes/index');
    Route::get('Remetentes/list',[RemetentesController::class,'getRemetentes'])->name('Remetentes/list');
    Route::post('Remetentes/Save',[RemetentesController::class,'save'])->name('Remetentes/Save');
    //
});

require __DIR__.'/auth.php';
