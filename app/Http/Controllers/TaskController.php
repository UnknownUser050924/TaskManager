<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display a listing of tasks
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        return view('tasks.create');
    }

    // Store a newly created task in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->is_completed = false;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Display the specified task
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }

        return view('tasks.show', compact('task'));
    }

    // Show the form for editing the specified task
    public function edit($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }

        return view('tasks.edit', compact('task'));
    }

    // Update the specified task in storage
    public function update(Request $request, $id)
{
    $task = Task::find($id);

    if (!$task) {
        return redirect()->route('tasks.index')->with('error', 'Task not found');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_completed' => 'boolean',
    ]);

    $task->title = $request->input('title', $task->title);
    $task->description = $request->input('description', $task->description);
    $task->is_completed = $request->input('is_completed', $task->is_completed);
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
}


    // Remove the specified task from storage
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
