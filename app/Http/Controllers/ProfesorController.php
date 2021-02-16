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
        //
        
        $datos['profesores'] = Profesor::paginate(15);
        return view('profesor.index', $datos);
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
        /*$validated = $request->validate([
            'nombre' => 'requiered|string|max:191',
            'A_paterno' => 'requiered|string|max;191',
            'A_materno' => 'requiered|string|max:191',
            'rut' => 'requiered|string|max:191',
            'asignatura' => 'requiered|string|max:191',
            'correo' => 'requiered|email'

        ]);
        */
        //$datosProfesor=request()-> all();

        $datosProfesor=request()-> except('_token');
        
        Profesor::insert($datosProfesor);

        //return response()->json($datosProfesor);
        return redirect('profesor')-> with('Mensaje','Profesor agregado con exito');
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
    public function update(Request $request, $rut)
    {
        //
        $datosProfesor=request()-> except(['_token','_method']);
        Profesor::where('rut','=',$rut)->update($datosProfesor);

        $profesor = Profesor:: findOrFail($rut);
        return redirect('profesor')-> with('Mensaje','Profesor editado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $rut)
    {
        //
        Profesor::destroy($rut);

        return redirect('profesor')-> with('Mensaje','Profesor eliminado con exito');

    }
}
