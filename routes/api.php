<?php

use App\Http\Controllers\EletroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'create']);
Route::post('/eletros', [EletroController::class, 'create']);
Route::get('/eletros', [EletroController::class, 'allEletros']);
Route::get('/eletros/{id}', [EletroController::class, 'oneEletro']);