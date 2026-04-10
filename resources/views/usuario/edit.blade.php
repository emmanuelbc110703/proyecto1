<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>Editar Alumno: {{ $usuario->nombre }}
    </h1>
    
    <form action="{{ route('usuario.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ $usuario->nombre }}" placeholder="Nombre" class="form-control">
        <br>
        <input type="number" name="edad" value="{{ $usuario->edad }}" placeholder="Edad" class="form-control">
        <br>
        <input type="text" name="correo" value="{{ $usuario->correo }}" placeholder="Correo" class="form-control">
        <br>
        <input type="text" name="contrasena" value="{{ $usuario->contrasena }}" placeholder="Matricula" class="form-control">
        <br>

        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-pen"></i> Guardar </button>
    </form>

    <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('usuario.index') }}">
    <button class="btn btn-warning"><i class="fa-solid fa-share"></i> Volver </button>
    </a>
    </div>


    @endsection
</body>
</html>