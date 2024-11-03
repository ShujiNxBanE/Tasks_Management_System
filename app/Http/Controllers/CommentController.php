<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->task_id = $request->task_id;
        $comment->user_id = Auth::id();
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('task_show', [ 'task' => $request->task_id]);
    }

    public function edit($commentId)
    {
        $comment = Comment::find($commentId);
        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, $commentId)
    {
        $comment = Comment::find($commentId);
        $comment->content = $request->content;
        $comment->updated_at = now();
        $comment->save();

        return redirect()->route('task_show', ['task' => $request->task_id]);
    }

    public function destroy($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        return redirect()->route('task_show', ['task' => $comment->task_id]);
    }
}
