<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Создание новой задачи
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    // Получение всех задач с фильтрацией по статусу
    public function index(Request $request)
    {
        $tasks = Task::query();

        if ($request->has('is_completed')) {
            $tasks->where('is_completed', $request->is_completed);
        }

        return response()->json($tasks->paginate(10));
    }

    // Обновление задачи
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'is_completed' => 'sometimes|required|boolean',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    // Удаление задачи
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
