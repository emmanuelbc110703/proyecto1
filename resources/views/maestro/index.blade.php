<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Maestros</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <center><h1>Registro de Maestros</h1></center>
    <center><h3>Listado de Maestros</h3></center>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('maestro.create') }}" class="btn btn-success me-3 mb-3">
            <i class="fa-solid fa-plus"></i> Nuevo Maestro
        </a>

        <!-- BOTÓN MODIFICADO -->
        <a href="{{ route('usuario.index') }}" class="btn btn-info me-3 mb-3">
            Consultar Alumnos <i class="fa-solid fa-user"></i>
        </a>

        <form action="{{ route('cerrar') }}" method="POST">
            @csrf
            <button class="btn btn-danger me-3">
                <i class="fa-solid fa-arrow-left"></i> Cerrar Sesión
            </button>
        </form>

        @if(auth()->user()->is_admin)
        <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3">  
            Administrar Usuarios
        </a>
        @endif
    </div>

    @include('partials.alerts')

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Materias</th>
                <th>Correo</th>
                <th>Matrícula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maestros as $maestro)
            <tr>
                <td>{{ $maestro->id }}</td>
                <td>{{ $maestro->nombre }}</td>
                <td>{{ $maestro->materias }}</td>
                <td>{{ $maestro->correo }}</td>
                <td>{{ $maestro->matricula }}</td>
                <td>
                    <a href="{{ route('maestro.edit', $maestro) }}">
                        <button class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </a>

                    <form action="{{ route('maestro.destroy', $maestro) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger"
                        onclick="return confirm('¿Eliminar el Registro?')">
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