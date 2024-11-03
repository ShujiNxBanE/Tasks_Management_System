<h1>
    Vista del comentario numero: {{ $comment->id }}
</h1>
<br>
<h3>Contenido:</h3>
<form action="{{ route('comment_update', [ 'comment' => $comment->id]) }}">
    @csrf
    @method('GET')
    <input type="hidden" name="task_id" value="{{ $comment->task_id }}">
    <textarea name="content" id="" cols="30" rows="5"> {{ $comment->content }} </textarea>
    <br>
    <button type="submit">Realizar comentario</button>
</form>
