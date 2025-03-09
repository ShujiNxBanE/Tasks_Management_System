<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-blue-600">Tareas</h1>

        <div class="flex gap-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </header>

    <!-- Navegación -->
    <nav class="bg-white shadow-md py-4 px-6 my-4 rounded-lg flex flex-wrap justify-center gap-4">
        <form action="{{ route('task_create') }}">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition">
                Crear una nueva Tarea
            </button>
        </form>

        <a href="{{ route('export_pending_tasks') }}" class="text-blue-500 hover:underline">Exportar tareas pendientes</a>
        <a href="{{ route('export_completed_tasks') }}" class="text-blue-500 hover:underline">Exportar tareas completadas</a>
        <a href="{{ route('export_progress_tasks') }}" class="text-blue-500 hover:underline">Exportar tareas en progreso</a>
        <a href="{{ route('export_all_tasks') }}" class="text-blue-500 hover:underline">Exportar todas las tareas</a>
    </nav>

    <!-- Contenido principal -->
    <main class="max-w-4xl mx-auto mt-6">
        <ul class="grid gap-6">
            @foreach ($tasks as $task)
                <li class="bg-white shadow-md p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800">Título: {{ $task->title }}</h2>
                    <h3 class="text-md font-medium text-gray-600">Estado: <span class="font-bold text-blue-500">{{ $task->status }}</span></h3>

                    <div class="mt-4 flex gap-3">
                        <a href="{{ route('task_show', [ 'task' => $task->id ]) }}"
                           class="text-blue-500 hover:underline">
                            Ver detalles
                        </a>

                        <a href="{{ route('task_edit', [ 'task' => $task->id ]) }}"
                           class="text-green-500 hover:underline">
                            Editar Tarea
                        </a>

                        <form action="{{ route('task_destroy', ['task' => $task->id]) }}" method="POST" onsubmit="return confirmDelete()">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline">
                                Eliminar Tarea
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-md py-4 px-6 mt-10 text-center">
        <p class="text-gray-500">Todos los derechos reservados. Cristopher Roa y Roger Lopez Devs / 2025</p>
    </footer>

    <script>
        function confirmDelete() {
            return confirm('¿Estás seguro de que deseas eliminar esta tarea? Esta acción no se puede deshacer.');
        }
    </script>

</body>
</html>
