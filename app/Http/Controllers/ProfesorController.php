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
        $profesor = new Profesor();
        $profesor->nombre = $request->nombre;
        $profesor->A_paterno = $request->A_paterno;
        $profesor->A_materno = $request->A_materno;
        $profesor->rut = $request->rut;
        $profesor->asignatura = $request->asignatura;
        $profesor->correo = $request->correo;
        $profesor->save();
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
    public function edit($id)
    {
        //
        $profesor = Profesor:: findOrFail($id);
        return view('profesor.edit',compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profesor =Profesor::findOrFail($request -> id);
        $profesor->delete();
        return "profesor eliminado";
        /*
        $profesor = Profesor::where('id', $request->id)->findOrFail();

        $profesor->id = $request->id;
        $profesor->nombre = $request->nombre;
        $profesor->A_paterno = $request->A_paterno;
        $profesor->A_materno = $request->A_materno;
        $profesor->rut = $request->rut;
        $profesor->asignatura = $request->asignatura;
        $profesor->correo = $request->correo;
        $profesor->save();
        return "esta editando";
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        return "profesor eliminado";
        /*
        $profesor =Profesor::findOrFail($request -> id);
        $profesor->delete();
        */
        
    }
    
}
