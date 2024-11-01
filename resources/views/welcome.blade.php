<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <form action="{{ route('logout')}}" method="POST">
        @csrf
        <Button type="submit">Cerrar Sesion</Button>
    </form>
    <a href="{{ route('task_index') }}">Ir a las Tareas</a>
</body>
</html>
