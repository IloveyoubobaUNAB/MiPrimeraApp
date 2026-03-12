<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mi-ruta-a', function () {
    return "HOLA ESTA ES MI RUTA";
});
