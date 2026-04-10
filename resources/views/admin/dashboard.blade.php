<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>

@extends('layouts.app')

@section('content')

<center><h1>Panel de Administración</h1></center>
<center><h3>Usuarios Registrados</h3></center>

<div class="d-flex justify-content-end mb-3">

    <a href="{{ route('user.create') }}" class="btn btn-success me-3 mb-3">
        <i class="fa-solid fa-plus"></i> Nuevo Usuario
    </a>

    <a href="{{ route('maestro.index') }}" class="btn btn-info me-3 mb-3">
        <i class="fa-solid fa-user-tie"></i> Ver Maestros
    </a>

    <form action="{{ route('cerrar') }}" method="POST">
        @csrf
        <button class="btn btn-danger me-3">
            <i class="fa-solid fa-arrow-left"></i> Cerrar Sesión
        </button>
    </form>

</div>

@include('partials.alerts')

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Admin</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>

            <td>
                @if($user->is_admin)
                    <span class="badge bg-success">Sí</span>
                @else
                    <span class="badge bg-secondary">No</span>
                @endif
            </td>

            <td>
                <a href="{{ route('user.edit', $user) }}">
                    <button class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </a>

                <form action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger"
                    onclick="return confirm('¿Eliminar este usuario?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection

</body>
</html>