<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <h1>CATALOGO DE USUARIOS</h1>
    <!--Div para ajustar la forma en la que los usuarios en la tabla-->
    <div style="display:flex; flex-wrap:wrap; gap:20px;">
        
        @foreach($usuarios as $usuario)
<!--Div para ajustar el tamaño-->
            <div style="width:200px;">
                    <!-- Nombre -->
                     <h3>
                        {{ $usuario['volumeInfo']['title'] ?? 'Sin nombre' }}
                     </h3>
                     <!-- Edad -->
                      <p>
                        {{ $usuario['volumeInfo']['authors'] ?? 'Autor desconocido ' }}
                      </p>
                      <!-- Imagen -->
                        @if(isset($usuario['volumeInfo']['imageLinks']['thumbnail']))

                        <img src="{{ $usuario['volumeInfo']['imageLinks']['thumbnail']' }}" alt="no hay xd">

                        @endif

            </div>

        @endforeach

    </div>
</body>
</html>