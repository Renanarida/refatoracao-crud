<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\PasswordResetController;

// Rotas da API continuam normais
Route::prefix('api')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/cadastrar', [CadastroController::class, 'store']);
    // outras rotas API
});

// Rotas do React (SPA)
Route::get('/{any}', function () {
    return view('react.index');
})->where('any', '.*');