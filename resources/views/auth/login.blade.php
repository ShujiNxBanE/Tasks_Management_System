<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Iniciar Sesión</h2>

        <!-- Formulario de Registro -->
        <form action="{{ route('register') }}" class="mb-4">
            @csrf
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md transition">
                Registrarse
            </button>
        </form>

        <!-- Formulario de Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" required autofocus
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-300">
            </div>

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-md transition">
                Iniciar sesión
            </button>

            @if ($errors->any())
                <div class="mt-3 text-red-600 text-sm bg-red-100 border-l-4 border-red-500 p-2 rounded-md">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </form>
    </div>

</body>
</html>
