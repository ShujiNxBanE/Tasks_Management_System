<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'task_id',
        'content',
    ];

    // Relación con la tarea
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
