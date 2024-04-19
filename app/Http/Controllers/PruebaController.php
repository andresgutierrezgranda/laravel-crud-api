<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    // Este método obtiene el parámetro 'nombre' de la solicitud
    // y devuelve la vista 'prueba' con el parámetro 'nombre' pasado a ella
    public function index()
    {
        // Obtener el parámetro 'nombre' de la solicitud
        $nombre = request('nombre');

        // Devolver la vista 'prueba' y pasarle el parámetro 'nombre'
        return view('prueba', ['nombre' => $nombre]);
    }
}