<?php

use App\Http\Controllers\EnviosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelatoriosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('web')->group(function(){
    Route::get("/Relatorio",[RelatoriosController::class,'getRelatoriosApi']);
    Route::post("/Enviar",[EnviosController::class,'saveEnvioApi']);
});