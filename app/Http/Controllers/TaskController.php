<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = auth()->user()->tasks;
        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks found'], 404);
        }
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'in:pending,in-progress,completed',
        ]);

        $task = auth()->user()->tasks()->create([
            'title' => $request->title,
            'status' => $request->status ?? 'pending',
        ]);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Ensure the task belongs to the authenticated user
        if ($task->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'string|max:255',
            'status' => 'in:pending,in-progress,completed',
        ]);

        $task->update($request->only(['title', 'status']));

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Ensure the task belongs to the authenticated user
        if ($task->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $task->delete();

        return response()->json(null, 204);
    }
}
