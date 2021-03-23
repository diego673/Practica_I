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
        return Estudiante::get();
        //$datos['estudiantes'] = Estudiante::paginate(15);
        //return view('estudiante.index',$datos);
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

        $estudiante = new Estudiante();
        $estudiante->id = $request->id;
        $estudiante->nombre = $request->nombre;
        $estudiante->A_paterno = $request->A_paterno;
        $estudiante->A_materno = $request->A_materno;
        $estudiante->rut = $request->rut;
        $estudiante->correo = $request->correo;
        $estudiante->save();
        return "estudiante agregado";
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
        return $estudiante;
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
    public function update(Request $request, Estudiante $estudiante)
    {
        
        $estudiante = Estudiante::where('id', $request->id)->findOrFail();

        $estudiante->id = $request->id;
        $estudiante->nombre = $request->nombre;
        $estudiante->A_paterno = $request->A_paterno;
        $estudiante->A_materno = $request->A_materno;
        $estudiante->rut = $request->rut;
        $estudiante->correo = $request->correo;
        $estudiante->save();
        return "estudiante actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return "estudiante eliminado";
    }
}
