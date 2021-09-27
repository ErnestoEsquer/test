<?php

namespace App\Http\Controllers;
use App\Mail\CorreoRegistroMailable;
use Mail;
use App\Models\Empresas;
use App\Http\Requests\EmpresasStore;

use Illuminate\Http\Request;

class EmpresasController extends Controller
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
        $empresas=Empresas::paginate(10);
        return view('empresas.index')->with('empresas',$empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresasStore $request)
    {
        $empresas = new Empresas();
        $empresas->nombre = $request->nombre;
        $empresas->correo = $request->correo;
        if($request->hasFile('logotipo')){
            $file = $request->file('logotipo');
            $destinationPath =  'images/logos/';
            $filename = time() . '-' .$file->getClientOriginalName();
            $uploadSucces = $request->file('logotipo')->move($destinationPath,$filename);
            $empresas->logotipo = $destinationPath . $filename;
            
        }
        $empresas->sitio = $request->sitio;

        $empresas->save();

        $destinatario = $request->correo;
    	Mail::to($destinatario)->send(new CorreoRegistroMailable());

        return redirect('/empresas');
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
        
        $empresas = Empresas::find($id);
        return view('empresas.edit')->with('empresas',$empresas);
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
        $empresas = Empresas::find($id);
        $empresas->nombre = $request->get('nombre');
        $empresas->correo = $request->get('correo');
        if($request->hasFile('logotipo')){
            $file = $request->file('logotipo');
            $destinationPath =  'images/logos/';
            $filename = time() . '-' .$file->getClientOriginalName();
            $uploadSucces = $request->file('logotipo')->move($destinationPath,$filename);
            $empresas->logotipo = $destinationPath . $filename;
            
        }
        $empresas->sitio = $request->get('sitio');
        $empresas->save();

        return redirect('/empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresas = Empresas::find($id);        
        $empresas->delete();

        return redirect('/empresas');
    }
}
