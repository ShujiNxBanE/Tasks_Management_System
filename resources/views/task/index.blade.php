<h1>
    Soy la pagina principal de las tareas
</h1>

<form action="{{ route('task_create') }}">
    <button type="submit">Crear una nueva Tarea</button>
</form>

<a href="{{ route('export_pending_tasks') }}">Exportar tareas pendientes</a>

<a href="{{ route('export_completed_tasks') }}">Exportar tareas completadas</a>

<a href="{{ route('export_progress_tasks') }}">Exportar tareas en progreso</a>

<a href="{{ route('export_all_tasks') }}">Exportar todas las tareas</a>

<ul>
    @foreach ($tasks as $task)
        <li>
            <hr>
            <h2>Titulo: {{ $task->title }}</h2>
            <h1>Estado: {{ $task->status }}</h1>
            <a href="{{ route('task_show', [ 'task' => $task->id ]) }}">Ver detalles</a>
            <a href="{{ route('task_edit', [ 'task' => $task->id]) }}">Editar Tarea</a>
            <form action="{{ route('task_destroy', ['task' => $task->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Eliminar Tarea</button>
            </form>
        </li>
    @endforeach
</ul>
