<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->user_id = Auth::id();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('task_index');
    }

    public function edit($taskId)
    {
        $task = Task::find($taskId);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $taskId)
    {
        $task = Task::find($taskId);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('task_index');
    }

    public function destroy($taskId)
    {
        $task = Task::find($taskId);
        $task->delete();
        return redirect()->route('task_index');
    }

    public function show($taskId)
    {
        $task = Task::with('comments')->findOrFail($taskId);
        return view('task.show', compact('task'));
    }
}
