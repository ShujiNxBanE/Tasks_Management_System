
<h1>
    Vista para crear la tarea
</h1>
<br>
<h3>
    Creando la tarea
</h3>
<hr>
<form action="{{ route('create_new_task') }}">
    @csrf
    @method('GET')
    <label for="">Titulo</label>
    <br>
    <input type="text" name="title" id="" maxlength="255">
    <br>
    <label for="">Descripcion</label>
    <br>
    <textarea name="description" id="" cols="30" rows="4" maxlength="255"></textarea>
    <br>
    <label for="">Fecha de vencimiento</label>
    <br>
    <input type="date" name="due_date" id="">
    <br>
    <label for="status">Estado:</label>
    <select id="status" name="status" required>
        <option value="pendiente">Pendiente</option>
        <option value="en progreso">En Progreso</option>
        <option value="completada">Completada</option>
    </select>
    <hr>
    <button type="submit">Crear Tarea</button>
</form>
