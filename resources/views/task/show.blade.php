<h1>
    Hola soy el detalle de la tarea {{ $task->title }}
</h1>
<br>
<h2>Anotaciones de la tarea</h2>
<form action="{{ route('comment_store') }}">
    @csrf
    @method('GET')
    <input type="hidden" name="task_id" value="{{ $task->id }}">
    <textarea name="content" id="" cols="30" rows="5"></textarea>
    <br>
    <button type="submit">Realizar anotacion</button>
</form>

<ul>
    @foreach ($task->comments as $comment)
        <li>
            <h3>Contenido: </h3>
            <p> {{ $comment->content }} </p>
            <h4>Creado: {{ $comment->created_at }} </h4>
        </li>
        <br>
        <a href="{{ route('comment_edit', ['comment' => $comment->id]) }}">Editar comentario</a>
        <form action="{{ route('comment_destroy', ['comment' => $comment->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">Eliminar Comentario</button>
        </form>
        <hr>
    @endforeach
</ul>
