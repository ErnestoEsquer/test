@extends('layouts.app')

@section('contenido')
<h2>CREAR EMPLEADOS</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/empleados" method="POST" >
    @csrf
    <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" >    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido</label>
    <input id="apellido" name="apellido" type="text" class="form-control" >
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
    <input id="correo" name="correo" type="text" step="any" class="form-control" >
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono</label>
    <input id="telefono" name="telefono" type="text" step="any" class="form-control" >
  </div>
  <a href="/empleados" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>


@endsection