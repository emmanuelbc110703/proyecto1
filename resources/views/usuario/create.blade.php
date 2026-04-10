<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

   <h1>Registro de Alumno</h1>

<form action="{{ route('usuario.store') }}" method="POST">
    @csrf

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-user"></i> </span>
        <input type="text" name="nombre" placeholder="Nombre" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-calendar"></i> </span>
        <input type="number" name="edad" placeholder="Edad" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-envelope"></i> </span>
        <input type="email" name="correo" placeholder="Correo" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-lock"></i> </span>
        <input type="password" name="contrasena" placeholder="Matricula" required>
    </div>

    <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-floppy-disk"></i> Guardar </button>
</form>

@endsection
</body>
</html>