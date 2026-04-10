<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Maestro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>Registro de Maestro</h1>

    <form action="{{ route('maestro.store') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-user"></i>
            </span>
            <input type="text" name="nombre" placeholder="Nombre" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-book"></i>
            </span>
            <input type="text" name="materias" placeholder="Materias" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-envelope"></i>
            </span>
            <input type="email" name="correo" placeholder="Correo" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-id-card"></i>
            </span>
            <input type="text" name="matricula" placeholder="Matrícula" required>
        </div>

        <button type="submit" class="btn btn-outline-success">
            <i class="fa-solid fa-floppy-disk"></i> Guardar
        </button>
    </form>

    @endsection
</body>
</html>