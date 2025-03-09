<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la tarea</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen p-4">

    <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl w-full">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">
            Detalles de la tarea: <span class="text-blue-500">{{ $task->title }}</span>
        </h1>

        <!-- Sección de anotaciones -->
        <h2 class="text-lg font-semibold text-gray-700">Anotaciones de la tarea</h2>
        <form action="{{ route('comment_store') }}" class="mt-4">
            @csrf
            @method('GET')
            <input type="hidden" name="task_id" value="{{ $task->id }}">

            <textarea name="content" rows="4" placeholder="Escribe tu anotación aquí..."
                class="w-full p-3 border rounded-md shadow-sm focus:ring focus:ring-blue-300"></textarea>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md mt-3 transition">
                Realizar anotación
            </button>
        </form>

        <!-- Lista de comentarios -->
        <ul class="mt-6 space-y-4">
            @foreach ($task->comments as $comment)
                <li class="bg-gray-50 p-4 rounded-md shadow">
                    <h3 class="text-gray-700 font-medium">Contenido:</h3>
                    <p class="text-gray-600">{{ $comment->content }}</p>
                    <h4 class="text-sm text-gray-500 mt-2">Creado: {{ $comment->created_at }}</h4>

                    <div class="mt-4 flex gap-3">
                        <a href="{{ route('comment_edit', ['comment' => $comment->id]) }}"
                            class="text-blue-500 hover:underline">
                            Editar comentario
                        </a>

                        <form action="{{ route('comment_destroy', ['comment' => $comment->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="text-red-500 hover:text-red-600 font-semibold">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
