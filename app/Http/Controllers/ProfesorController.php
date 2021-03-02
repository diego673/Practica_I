<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profesor::get();
        
        //$datos['profesores'] = Profesor::paginate(15);
        //return view('profesor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $profesor=new Profesor;
        $profesor->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
        return $profesor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($rut)
    {
        //
        $profesor = Profesor:: findOrFail($rut);
        return view('profesor.edit',compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {

        $profesor->update($request->all());
        //
        /*$datosProfesor=request()-> except(['_token','_method']);
        Profesor::where('rut','=',$rut)->update($datosProfesor);

        $profesor = Profesor:: findOrFail($rut);
        return redirect('profesor')-> with('Mensaje','Profesor editado con exito');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor  $profesor)
    {
        
        $profesor->delete();

    }
    public function eliminar(Request $request){
        $profesor = Profesor::findOrFail($request->rut);
        $profesor->delete();

    }
}
