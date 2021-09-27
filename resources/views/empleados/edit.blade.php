@extends('layouts.app')

@section('contenido')
<h2>EDITAR EMPLEADOS</h2>


<form action="/empleados/{{$empleados->id}}" method="POST" >
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$empleados->nombre}}">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido</label>
    <input id="apellido" name="apellido" type="text" class="form-control" value="{{$empleados->apellido}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Company_Id</label>
    <select name="empresas" id="empresas">
        <option  selected>Selecciona la empresa</option>
        @foreach ($empresas as $empresa)
        <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
        @endforeach
    </select>
</select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Correo</label>
    <input id="correo" name="correo" type="text" step="any" class="form-control" value="{{$empleados->correo}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono</label>
    <input id="telefono" name="telefono" type="text" step="any" class="form-control" value="{{$empleados->telefono}}">
  </div>
  <a href="/empleados" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection