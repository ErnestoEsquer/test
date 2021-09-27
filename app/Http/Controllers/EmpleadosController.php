<?php

namespace App\Http\Controllers;
use App\Models\Empresas;
use App\Models\Empleados;

use App\Http\Requests\EmpleadosStore;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $empleados=Empleados::Paginate(10);
        return view('empleados.index')->with('empleados',$empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas=Empresas::All();
        return view('empleados.create')->with('empresas',$empresas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadosStore $request)
    {
        
        $empleados = new Empleados();
        $empleados->nombre = $request->nombre;
        $empleados->apellido = $request->apellido;
        $empleados->company_id = $request->empresas;
        $empleados->correo = $request->correo;
        $empleados->telefono = $request->telefono;

        $empleados->save();

       
        return redirect('/empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleados::find($id);
        $empresas=Empresas::All();
        return view('empleados.edit')->with(compact('empleados','empresas',$empleados,$empresas));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleados =  Empleados::find($id);
        $empleados->nombre = $request->get('nombre');
        $empleados->apellido = $request->get('apellido');
        $empleados->company_id = $request->get('empresas');
        $empleados->correo = $request->get('correo');
        $empleados->telefono = $request->get('telefono');

        $empleados->save();
        return redirect('/empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleados = Empleados::find($id);        
        $empleados->delete();

        return redirect('/empleados');
    }

    public function empresas(){
        $empresas=Empresas::All();
        return $empresas;
    }
}
