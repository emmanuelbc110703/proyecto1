<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Maestro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>Editar Maestro: {{ $maestro->nombre }}</h1>
    
    <form action="{{ route('maestro.update', $maestro) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $maestro->nombre }}" class="form-control">
        <br>

        <!-- Materias -->
        <label>Materias</label>
        <input type="text" name="materias" value="{{ $maestro->materias }}" class="form-control">
        <br>

        <!-- Correo -->
        <label>Correo</label>
        <input type="text" name="correo" value="{{ $maestro->correo }}" class="form-control">
        <br>

        <!-- Matrícula -->
        <label>Matrícula</label>
        <input type="text" name="matricula" value="{{ $maestro->matricula }}" class="form-control">
        <br>

        <button type="submit" class="btn btn-outline-success">
            <i class="fa-solid fa-pen"></i> Guardar
        </button>
    </form>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('maestro.index') }}">
            <button class="btn btn-warning">
                <i class="fa-solid fa-share"></i> Volver
            </button>
        </a>
    </div>

    @endsection
</body>
</html>