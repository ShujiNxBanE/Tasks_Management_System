<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskExportController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('index');

Route::get('login', function (){
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/create-backup', [BackupController::class, 'createBackup'])->name('create_backup');

Route::prefix('/tasks')->middleware('auth')->group(function(){

    Route::get('/index', [TaskController::class, 'index'])->name('task_index');
    Route::get('/create', [TaskController::class, 'create'])->name('task_create');
    Route::get('/store', [TaskController::class, 'store'])->name('create_new_task');
    Route::get('/{task}/show', [TaskController::class, 'show'])->name('task_show');
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('task_edit');
    Route::get('/{task}/update', [TaskController::class, 'update'])->name('task_update');
    Route::delete('/{task}/destroy', [TaskController::class, 'destroy'])->name('task_destroy');

    Route::get('/export_pending_tasks', [TaskExportController::class, 'exportPendingTasks'])->name('export_pending_tasks');
    Route::get('/export_completed_tasks', [TaskExportController::class, 'exportCompletedTasks'])->name('export_completed_tasks');
    Route::get('/export_progress_tasks', [TaskExportController::class, 'exportProgressTasks'])->name('export_progress_tasks');
    Route::get('/export_all_tasks', [TaskExportController::class, 'exportAllTasks'])->name('export_all_tasks');

});

Route::prefix('/comments')->middleware('auth')->group(function(){

    Route::get('/store', [CommentController::class, 'store'])->name('comment_store');
    Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comment_edit');
    Route::get('/{comment}/update', [CommentController::class, 'update'])->name('comment_update');
    Route::delete('/{comment}/destroy', [CommentController::class, 'destroy'])->name('comment_destroy');
});
