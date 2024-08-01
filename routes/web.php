<?php

use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);
Route::put('tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

//Rutas de Tareas
/*Route::get('/tasks/create', [TaskController::class, 'create']);
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show')->middleware('auth')->can('view', 'task');
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit')->middleware('auth')->can('update', 'task');      
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');*/


//Rutas Nuevas
Route::get('/registrar', [RegisterUserController::class, 'create'])->name('registrar.create');    
Route::post('/registrar', [RegisterUserController::class, 'store'])->name('registrar.store');
Route::get('/login', [SessionController::class, 'create'])->name('login.create');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');


/*Route::middleware(['auth'])->group(function () {
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
});*/