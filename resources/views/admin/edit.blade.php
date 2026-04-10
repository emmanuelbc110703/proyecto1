<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>Editar Usuario: {{ $user->name }}</h1>

    <form action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <label>Nombre</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        <br>

        <!-- Email -->
        <label>Correo</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
        <br>

        <!-- Teléfono -->
        <label>Teléfono</label>
        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
        <br>

        <!-- Nueva contraseña -->
        <label>Nueva Contraseña (opcional)</label>
        <input type="password" name="password" class="form-control">
        <br>

        <!-- Confirmar contraseña -->
        <label>Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control">
        <br>

        <!-- Admin -->
        <div class="form-check">
            @if(Auth::check() && Auth::user()->is_admin)
                <input type="checkbox" name="is_admin" value="1"
                {{ $user->is_admin ? 'checked' : '' }}>
                <label> Es administrador</label>
            @endif
        </div>
        <br>

        <button type="submit" class="btn btn-outline-success">
            <i class="fa-solid fa-pen"></i> Guardar
        </button>
    </form>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('admin-dashboard') }}">
            <button class="btn btn-warning">
                <i class="fa-solid fa-share"></i> Volver
            </button>
        </a>
    </div>

    @endsection
</body>
</html>