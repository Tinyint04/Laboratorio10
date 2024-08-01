<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::select('id', 'name')->get();
        return response()->json($tasks);
    }

    public function userTasks($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        if (Auth::id() !== $userId) {
            return response()->json(['error' => 'No tienes permiso para ver las tareas de este usuario'], 403);
        }
        $tasks = $user->tasks; // Obtiene todas las tareas asociadas a este usuario
        return response()->json($tasks);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if ($task->user_id !== Auth::id()) {
            return response()->json(['error' => 'No tienes permiso para actualizar esta tarea'], 403);
        }
        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task->user_id !== Auth::id()) {
            return response()->json(['error' => 'No tienes permiso para eliminar esta tarea'], 403);
        }
        $task->delete();
        return response()->json(['message' => 'Tarea eliminada con éxito']);
    }
}
