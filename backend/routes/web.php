<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/registrar', function () {
    return view('cadastrar');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/visitantes', function () {
    return view('visitantes');
});

Route::get('/participantes', function () {
    return view('participantes');
});