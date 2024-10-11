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
            'due_date' => 'nullable|date',
        ]);

        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->status = 'Pending'; // Default status as 'Pending'
        $task->due_date = $request->input('due_date'); // Store due date
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
            'status' => 'required|string|in:Pending,Completed', // Validate status
            'due_date' => 'nullable|date',
        ]);

        $task->title = $request->input('title', $task->title);
        $task->description = $request->input('description', $task->description);
        $task->status = $request->input('status', $task->status); // Update status
        $task->due_date = $request->input('due_date', $task->due_date); // Update due date
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Mark the specified task as completed
    public function markAsComplete($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }

        $task->status = 'Completed'; // Set status to 'Completed'
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task marked as complete!');
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
