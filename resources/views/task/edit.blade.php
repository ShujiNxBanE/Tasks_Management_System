
<h1>
    Vista para editar la tarea
</h1>
<br>
<h3>
    Editando la tarea
</h3>
<hr>
<form action="{{ route('task_update', ['task' => $task->id]) }}">
    @csrf
    @method('GET')
    <label for="">Titulo</label>
    <br>
    <input type="text" name="title" id="" maxlength="255" value="{{ $task->title }}">
    <br>
    <label for="">Descripcion</label>
    <br>
    <textarea name="description" id="" cols="30" rows="4" maxlength="255"> {{ $task->description }} </textarea>
    <br>
    <label for="">Fecha de vencimiento</label>
    <br>
    <input type="date" name="due_date" id="" value="{{ $task->due_date }}">
    <br>
    <label for="status">Estado:</label>
    <select id="status" name="status" required>
        <option value="pendiente" @selected($task->status == 'pendiente')>Pendiente</option>
        <option value="en progreso" @selected($task->status == 'en progreso')>En Progreso</option>
        <option value="completada" @selected($task->status == 'completada')>Completada</option>
    </select>
    <hr>
    <button type="submit">Actualizar tarea</button>
</form>
