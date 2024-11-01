<h1>
    Soy la pagina principal de las tareas
</h1>

<form action="{{ route('task_create') }}">
    <Button type="submit">Crear una nueva Tarea</Button>
</form>

<ul>
    @foreach ($tasks as $task)
        <li>
            <hr>
            <h2>Titulo: {{ $task->title }}</h2>
            <h3>Descripcion: {{ $task->description }}</h3>
            <h3>Fecha de vencimiento: {{ $task->due_date }}</h3>
            <h1>Estado: {{ $task->status }}</h1>
            <a href="{{ route('task_edit', [ 'task' => $task->id]) }}">Editar Tarea</a>
            <form action="{{ route('task_destroy', ['task' => $task->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Eliminar Tarea</button>
            </form>
        </li>
    @endforeach
</ul>
