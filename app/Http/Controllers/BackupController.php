<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class BackupController extends Controller
{
    public function createBackup()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('task.index', compact('tasks'));
    }
}
