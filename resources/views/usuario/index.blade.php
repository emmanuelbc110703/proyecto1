<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
   <h1>Usuarios Registrados</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('registro') }}" class="btn btn-primary me-3 mb-3">
        <i class="fa-solid fa-plus"></i> Agregar Tipos de Usuarios
        </a>
        <a href="{{ route('usuario.create') }}" class="btn btn-success me-3 mb-3">
        <i class="fa-solid fa-plus"></i> Nuevo Usuario
        </a>
        <form action="{{ route('cerrar') }}" method="POST">
            @csrf
        <button class="btn btn-danger me-3"><i class="fa-solid fa-arrow-left"></i> Cerrar Sesion</button>
        </form>

        @if(auth()->user()->is_admin)
        <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3">  
        Admin
        </a>
        @endif

</div>

@include('partials.alerts')

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Correo</th>
            <th>Contraseña</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->edad }}</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->contrasena }}</td>
            <td>
            <a href="{{ route('usuario.edit', $usuario) }}">
            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
            </a>
            <td>

            <form action="{{ route('usuario.destroy', $usuario) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')


                <button class="btn btn-danger"
                onclick="return confirm('¿Eliminar el Registro?')">
                <i class="fa-solid fa-trash"></i></button>

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
</body>
</html>