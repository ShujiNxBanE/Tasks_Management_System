<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Tarea</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen p-4">

    <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl w-full">

        <h3 class="text-lg text-gray-700 mb-6">
            Creando una nueva tarea
        </h3>

        <form action="{{ route('create_new_task') }}" method="GET" class="space-y-4">
            @csrf
            @method('GET')

            <div>
                <label for="title" class="block text-gray-600 font-medium">Título</label>
                <input type="text" name="title" id="title" maxlength="255"
                    class="w-full p-3 border rounded-md shadow-sm focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label for="description" class="block text-gray-600 font-medium">Descripción</label>
                <textarea name="description" id="description" cols="30" rows="4" maxlength="255"
                    class="w-full p-3 border rounded-md shadow-sm focus:ring focus:ring-blue-300" required></textarea>
            </div>

            <div>
                <label for="due_date" class="block text-gray-600 font-medium">Fecha de vencimiento</label>
                <input type="date" name="due_date" id="due_date"
                    class="w-full p-3 border rounded-md shadow-sm focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label for="status" class="block text-gray-600 font-medium">Estado</label>
                <select id="status" name="status" required
                    class="w-full p-3 border rounded-md shadow-sm focus:ring focus:ring-blue-300">
                    <option value="pendiente">Pendiente</option>
                    <option value="en progreso">En Progreso</option>
                    <option value="completada">Completada</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md mt-6 transition">
                Crear tarea
            </button>
        </form>
    </div>

</body>
</html>
