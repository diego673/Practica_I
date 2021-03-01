<?php

namespace App\Http\Controllers;

use App\Models\Registro_Academico;
use Illuminate\Http\Request;

class Registro_AcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Registro_Academico::get();
        //$datos['registros_academicos'] = Registro_Academico::paginate(15);
        //return view('registro_Academico.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('registro_Academico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro_Academico=new Registro_Academico;
        $registro_Academico->create($request->all());

        /*$datosRegistroAcademico= request()-> except('_token');
        
        Registro_Academico::insert($datosRegistroAcademico);
        
        return response()-> json($datosRegistroAcademico);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro_Academico  $registro_Academico
     * @return \Illuminate\Http\Response
     */
    public function show(Registro_Academico $registro_Academico)
    {
        //
        return $registro_Academico;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro_Academico  $registro_Academico
     * @return \Illuminate\Http\Response
     */
    public function edit($id_estudiante)
    {
        //
        $registro_academico = Registro_Academico:: findOrFail($id_estudiante);
        return view('registro_Academico.edit',compact('registro_academico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro_Academico  $registro_Academico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro_Academico $registro_Academico)
    {
        //
        $registro_Academico->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro_Academico  $registro_Academico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro_Academico $registro_Academico)
    {
        $registro_Academico->delete();
        //Registro_Academico::destroy($id_estudiante);
        //return redirect('Registro_Academico');

    }
}
