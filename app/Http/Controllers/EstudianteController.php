<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['estudiantes'] = Estudiante::paginate(15);
        return view('estudiante.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estudiante.create');
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
        //$datosEstudiante=request()-> all();

        $datosEstudiante=request() -> except('_token');

        Estudiante:: insert($datosEstudiante);
        
        return redirect('estudiante')-> with('Mensaje', 'Estudiante agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estudiantes= Estudiante::findOrFail($id);
        return view('estudiante.edit',compact('estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEstudiante=request() -> except(['_token','_method']);
        Estudiante::where('id','=',$id)-> update( $datosEstudiante);

        $estudiantes= Estudiante::findOrFail($id);
        return redirect('estudiante')-> with('Mensaje', 'Estudiante editado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Estudiante::destroy($id);
        return redirect('estudiante')-> with('Mensaje', 'Estudiante eliminado con exito');


    }
}
