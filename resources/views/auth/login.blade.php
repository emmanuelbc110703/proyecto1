<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
</head>
<body>
    @extends('layouts.app')
    @include('partials.alerts')
    @section('content')

    <h1>INICIO DE SESION</h1>
    <form action="{{ route('acceso.store') }}" method="POST">

        @csrf

        <input type="email" name="email" placeholder="Correo" class="form-control" required>
        <br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br>

        <button type="submit" class="btn btn-primary">Iniciar <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
    </form>
    <br><center>
                <a href="{{ url('/auth/google') }}">
                <button class="btn btn-dark">Iniciar sesión con Google 
                    <i class="fa-brands fa-google fa-lg" style="color: rgb(116, 192, 252);"></i></button>
                </a>
                <br><br>
                <p>Ó puedes crear una cuenta nueva</p>
                <a href="{{ route('registro') }}">
                <button class="btn btn-secondary">Crear Cuenta <i class="fa-solid fa-address-book"></i></button>
                </a>
            </center>
    @endsection
</body>
</html>