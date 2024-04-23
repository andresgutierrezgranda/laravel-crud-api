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
        $nombre = "bbbbbbb";

        // Devolver la vista 'hola' y pasarle el parámetro 'nombre'
        return view('hola', ['message' => $nombre]);
    }
    public function create()
    {
        // Obtener el parámetro 'nombre' de la solicitud
        $nombre = "aaaaaaa";

        // Devolver la vista 'hola' y pasarle el parámetro 'nombre'
        return view('hola', ['message' => $nombre]);
    }
}