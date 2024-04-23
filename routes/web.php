<?php

use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

// Ruta principal que devuelve la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta que recibe un nombre como parámetro en la URL
Route::get('/hola/{nombre}', function ($nombre) {
    $message = $nombre; // Crea un mensaje de saludo con el nombre
    $title = "Página de Saludo"; // Define el título de la página
    // Devuelve la vista 'hola' pasando el mensaje y el título como parámetros
    return view('hola', compact('message', 'title'));
});

// Ruta que devuelve la vista 'prueba' y cargar el controlador PruebaController

Route::get('prueba/{nombre}', [PruebaController::class, 'index']);
Route::resource('user', PruebaController::class);
