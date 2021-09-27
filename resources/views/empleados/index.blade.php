@extends('layouts.app')

@section('contenido')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->
<a href="empleados/create" class="btn btn-primary">CREAR</a>


<table class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Company_Id</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($empleados as $empleado)
    <tr>
        <td>{{$empleado->id}}</td>
        <td>{{$empleado->nombre}}</td>
        <td>{{$empleado->apellido}}</td>
        <td>{{$empleado->company_id}}</td>
        <td>{{$empleado->correo}}</td>
        <td>{{$empleado->telefono}}</td>
        <td>
         <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
          <a href="/empleados/{{$empleado->id}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $empleados->links() !!}
</div>

@endsection