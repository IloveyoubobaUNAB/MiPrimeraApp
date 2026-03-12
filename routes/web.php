<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/formulario', function () {
    return view('form');
})->name('contact.show');

Route::post('/formulario', function (Request $request) {
    $request->validate();
})->name('contact.send');


Route::get('/contacto', function (Request $request) {
    echo "<pre>";
    print_r($request->get('email'));
    print_r($request->get('mensaje'));
    echo "</pre>";
});

// Esta es la ruta que viste en tu clase
Route::get('/php-basico', function () {

    // 1. Definimos la función primero
    function printUser($nombre_completo, $age) {
        return "<br>--- Datos del Usuario ---<br>Nombre: $nombre_completo <br>Edad: $age años<br>";
    }

    // 2. Variables y tipos de datos
    $nombre = "Martin";
    $apellido = "Rodriguez";
    $nombre_completo = $nombre . " " . $apellido;
    $age = rand(10, 54);
    $height = 1.86;
    $isLogin = (bool) rand(0, 1);

    // 3. Empezamos a mostrar resultados
    echo "Principal: " . $nombre_completo;
    echo "******************** ESTRUCTURAS DE CONTROL ********************<br>";

    $message = "<br>Soy $nombre_completo tengo $age años!!!!";

    // Condicionales
    if ($age < 18) {
        $message .= " Eres menor de edad.";
    } else if ($age > 50) {
        $message .= " Eres adulto mayor.";
    } else {
        $message .= " Eres adulto.";
    }

    echo $message;
    echo "<br>" . ($isLogin ? "Estas logueado" : "no estas logueado");

    echo "<br><br>******************** FUNCIONES ********************<br>";
    // Llamamos a la función que creamos arriba
    echo printUser($nombre_completo, $age);

    // 4. Arrays
    $productsNames = ["Computador", "Teclado", 25, true, false];

    $teclado = [
        'name' => "teclado hp",
        'marca' => "HP",
        'precio' => 20000,
        'distribuciones' => [
            'latino',
            'mexico',
            'americano'
        ]
    ];

    $teclado['marca'] = "LG";
    echo "<br>Marca del teclado: " . $teclado['marca'];
    echo "<br>Nombre del teclado: " . $teclado['name'];

    echo "<br><br>--- Lista de productos (Foreach) ---<br>";
    foreach ($productsNames as $item) {
        echo $item . "<br>";
    }

    return "<br><br><b>Fin del ejercicio de PHP Básico</b>";
});

// Esta es la ruta por defecto de Laravel
Route::get('/', function () {
    return view('welcome');
});