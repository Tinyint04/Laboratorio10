<?php

use App\Http\Controllers\Api\TaskController as ApiTaskController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta para obtener el usuario autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Endpoint público para listar todas las tareas con su id y nombre
Route::get('/tasks', [ApiTaskController::class, 'index']);

// Endpoint privado para obtener las tareas de un usuario específico
Route::get('/user/{user}/tasks', [ApiTaskController::class, 'userTasks'])->middleware('auth:sanctum');

// Endpoint privado para actualizar una tarea
Route::put('/tasks/{task}', [ApiTaskController::class, 'update'])->middleware('auth:sanctum');

// Endpoint privado para eliminar una tarea
Route::delete('/tasks/{task}', [ApiTaskController::class, 'destroy'])->middleware('auth:sanctum');



