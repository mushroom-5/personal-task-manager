<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display all tasks
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    // Show Add Task form
    public function create()
    {
        return view('tasks.create');
    }

    // Save new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task added successfully!');
    }

    // Show Edit Task form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully!');
    }
}
