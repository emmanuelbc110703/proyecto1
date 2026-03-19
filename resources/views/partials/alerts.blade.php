@if(session('success'))

<div id="alert" class="alert alert-success alert-dismissible d-flex align-items-center fade show">
    <i class="fa-solid fa-circle-check"></i>
    <strong class="mx-2">¡Éxito!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<script>
setTimeout(function(){

    let alerta = document.getElementById('alert');

    if(alerta){
        alerta.classList.remove('show');
        alerta.classList.add('fade');

        setTimeout(() => alerta.remove(), 500);
    }

},5000);
</script>

@endif

@if(session('update'))

<div id="alert" class="alert alert-warning alert-dismissible d-flex align-items-center fade show">
    <i class="fa-solid fa-circle-check"></i>
    <strong class="mx-2">¡Éxito!</strong> {{ session('update') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<script>
setTimeout(function(){

    let alerta = document.getElementById('alert');

    if(alerta){
        alerta.classList.remove('show');
        alerta.classList.add('fade');

        setTimeout(() => alerta.remove(), 500);
    }

},5000);
</script>

@endif

@if(session('create'))

<div id="alert" class="alert alert-primary alert-dismissible d-flex align-items-center fade show">
    <i class="fa-solid fa-circle-check"></i>
    <strong class="mx-2">¡Éxito!</strong> {{ session('create') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<script>
setTimeout(function(){

    let alerta = document.getElementById('alert');

    if(alerta){
        alerta.classList.remove('show');
        alerta.classList.add('fade');

        setTimeout(() => alerta.remove(), 500);
    }

},5000);
</script>

@endif