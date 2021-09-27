@extends('layouts.app')

@section('contenido')
<h2>EDITAR EMPRESAS</h2>

<form action="/empresas/{{$empresas->id}}" method="POST" enctype="multipart/form-data">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$empresas->nombre}}">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Correo</label>
    <input id="correo" name="correo" type="text" class="form-control" value="{{$empresas->correo}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Logotipo</label>
    <input id="logotipo" name="logotipo" type="file" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Sitio</label>
    <input id="sitio" name="sitio" type="text" step="any" class="form-control" value="{{$empresas->sitio}}">
  </div>
  <a href="/empresas" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection