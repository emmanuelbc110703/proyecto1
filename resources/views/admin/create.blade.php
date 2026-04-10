<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>REGISTRO DE USUARIO</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Nombre" class="form-control" required>
        <br>

        <input type="email" name="email" placeholder="Correo" class="form-control" required>
        <br>

        <input type="text" name="phone" placeholder="Teléfono" class="form-control" required>
        <br>

        <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br>

        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" class="form-control" required>
        <br>

        <div class="form-check">
            @if(Auth::check() && Auth::user()->is_admin)
                <input type="checkbox" name="is_admin" value="1">
                <label> Es administrador</label>
            @endif
        </div>
        <br>

        <button type="submit" class="btn btn-outline-success">
            <i class="fa-solid fa-floppy-disk"></i> Guardar
        </button>
    </form>

    @endsection
</body>
</html>