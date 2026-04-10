{{-- ALERTA SUCCESS --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible d-flex align-items-center fade show alert-auto">
    <i class="fa-solid fa-circle-check"></i>
    <strong class="mx-2">¡Éxito!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- ALERTA UPDATE --}}
@if(session('update'))
<div class="alert alert-warning alert-dismissible d-flex align-items-center fade show alert-auto">
    <i class="fa-solid fa-circle-check"></i>
    <strong class="mx-2">¡Éxito!</strong> {{ session('update') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- ALERTA CREATE --}}
@if(session('create'))
<div class="alert alert-primary alert-dismissible d-flex align-items-center fade show alert-auto">
    <i class="fa-solid fa-circle-check"></i>
    <strong class="mx-2">¡Éxito!</strong> {{ session('create') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- ALERTA ERROR (LOGIN, VALIDACIONES, ETC) --}}
@if($errors->any())
<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show alert-auto">
    <i class="fa-solid fa-circle-xmark"></i>
    <strong class="mx-2">Error:</strong> {{ $errors->first() }}
</div>
@endif

{{-- SCRIPT GLOBAL PARA TODAS LAS ALERTAS --}}
<script>
setTimeout(function(){

    let alertas = document.querySelectorAll('.alert-auto');

    alertas.forEach(alerta => {
        alerta.classList.remove('show');
        alerta.classList.add('fade');

        setTimeout(() => alerta.remove(), 500);
    });

},5000);
</script>