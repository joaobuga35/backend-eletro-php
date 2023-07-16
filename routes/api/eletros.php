<?php 

use App\Http\Controllers\EletroController;
use Illuminate\Support\Facades\Route;

Route::post('/eletros', [EletroController::class, 'create']);
Route::get('/eletros', [EletroController::class, 'allEletros']);
Route::get('/eletros/{id}', [EletroController::class, 'oneEletro']);
Route::patch('/eletros/{id}', [EletroController::class, 'editEletro']);
Route::delete('/eletros/{id}', [EletroController::class, 'deleteEletro']);