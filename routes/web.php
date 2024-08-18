<?php

use App\Http\Controllers\RemetentesController;
use App\Http\Controllers\EmailsController;
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
    //Contatos
    Route::get('Contatos',[EmailsController::class,'index'])->name('Contatos/index');
    Route::get('Contatos/list',[EmailsController::class,'getContatos'])->name('Contatos/list');
    Route::post('Contatos/Save',[EmailsController::class,'save'])->name('Contatos/Save');
    //Contatos/Listas
    Route::get('Contatos/Listas',[EmailsController::class,'indexListas'])->name('Contatos/Listas/index');
    Route::get('Contatos/Listas/Cadastro',[EmailsController::class,'lista'])->name('Contatos/Listas/Novo');
    Route::get('Contatos/Listas/Cadastro/{id}',[EmailsController::class,'lista'])->name('Contatos/Listas/Edit');
    Route::get('Contatos/Listas/list',[EmailsController::class,'getListas'])->name('Contatos/Listas/list');
    Route::get('Listas/Emails/list/{IDLista}',[EmailsController::class,'getEmailsLista'])->name('Listas/Emails/list');
    Route::post('Contatos/Listas/Save',[EmailsController::class,'saveListas'])->name('Contatos/Listas/Save');
    //Envios
    //Mensagens
    //
});

require __DIR__.'/auth.php';
