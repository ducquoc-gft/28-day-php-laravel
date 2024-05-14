<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "index(Todo)";
        return view('index', [
            'tasks' => Task::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create(Todo)";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return "store(Todo)";
        $task = Task::create($request->validated());

        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        // return "show(Todo)";
        return view('show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // return "edit(Todo)";
        return view('edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // return "update(Todo)";
        $task->update($request->validated());

        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // return "destroy(Todo)";
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }

    public function list()
    {
        // return "browseList(Todo)";
        return view('index', [
            'tasks' => Task::latest()->paginate(6)
        ]);
    }

    public function toggleComplete(Task $task)
    {
        // return "toggleComplete(Todo)";
        $task->toggleComplete();

        return redirect()->back()->with('success', 'Task updated successfully!');
    }
}
