<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

//aqui inicia as rotas
Route::get('/home', function () {
    return view('index');
});

Route::get('/cadastrar', function () {
    return view('cadastrar');
})->name('form.cadastrar');

// rota para processar o cadastro
Route::post('/cadastrar', [CadastroController::class, 'store'])->name('cadastrar');

Route::get('/login', function () {
    return view('login');
})->name('form.login');

// rota para exibir login
Route::get('/login', [LoginController::class, 'login'])->name('login');

// rota para autenticar
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

// rota para logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
