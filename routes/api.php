<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\studentController;

// Define una ruta GET para recuperar una lista de todos los estudiantes
Route::get('/students', [studentController::class, 'index']);

// Define una ruta GET para recuperar información detallada sobre un estudiante específico
Route::get('/students/{id}', [studentController::class, 'show']);

// Define una ruta POST para crear un nuevo registro de estudiante
Route::post('/students', [studentController::class, 'store']);

// Define una ruta PUT para actualizar todos los campos de un registro de estudiante existente
Route::put('/students/{id}', [studentController::class, 'update']);

// Define una ruta PATCH para actualizar solo ciertos campos de un registro de estudiante existente
Route::patch('/students/{id}', [studentController::class, 'updatePartial']);

// Define una ruta DELETE para eliminar un registro de estudiante
Route::delete('/students/{id}', [studentController::class, 'destroy']);
