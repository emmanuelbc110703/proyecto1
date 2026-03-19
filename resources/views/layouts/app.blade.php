<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Uso de botsatrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Uso de botsatrap javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Uso de fontaAwesome-->
    <script src="https://kit.fontawesome.com/51d7e3620b.js" crossorigin="anonymous"></script>    

</head>
<body>
        <div class="container p-5 my-5 border">
            <!-- Uso de yield para manejar el contenido del archivo -->
        @yield('content')
        </div>



</body>
</html>
