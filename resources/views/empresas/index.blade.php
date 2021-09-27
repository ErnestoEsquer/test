@extends('layouts.app')

@section('contenido')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->
<a href="empresas/create" class="btn btn-primary">CREAR</a>


<table class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Logotipo</th>
      <th scope="col">Sitio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($empresas as $empresa)
    <tr>
        <td>{{$empresa->id}}</td>
        <td>{{$empresa->nombre}}</td>
        <td>{{$empresa->correo}}</td>
        <td><img src="{{$empresa->logotipo}}" alt="$empresa->nombre" class="img-fluid img-tumbnail" width="80px"></td>
        <td>{{$empresa->sitio}}</td>
        <td>
         <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST">
          <a href="/empresas/{{$empresa->id}}/edit" class="btn btn-info">Editar</a>         
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
    {!! $empresas->links() !!}
</div>

@endsection