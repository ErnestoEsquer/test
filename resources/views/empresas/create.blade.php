@extends('layouts.app')

@section('contenido')
<h2>CREAR EMPRESAS</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/empresas" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Correo</label>
    <input id="correo" name="correo" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Logotipo</label>
    <input id="logotipo" name="logotipo" type="file" class="form-control" tabindex="3">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Sitio</label>
    <input id="sitio" name="sitio" type="text" class="form-control" tabindex="4">
  </div>
  <a href="/empresas" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection