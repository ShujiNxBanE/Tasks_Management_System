
<form action="{{route('register')}}">
    @csrf
    @method('GET')
    <Button type="submit">Registrarse</Button>
</form>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required autofocus>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Iniciar sesión</button>
    @if ($errors->any())
        <div>
            {{ $errors->first('email') }}
        </div>
    @endif
</form>
