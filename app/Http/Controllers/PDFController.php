<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Profesor;
use App\Models\Estudiante;
use App\Models\Asignatura;
use App\Models\Registro_Academico;


class PDFController extends Controller
{
    //

    public function PDFProfesores(){
        $profesores = Profesor::all();
        $pdf =PDF::loadView('PDF\profesoresPDF', compact('profesores'));
        return $pdf->download('profesores.pdf');

    }
    public function PDFEstudiantes(){
        $estudiantes = Estudiante::all();
        $pdf =PDF::loadView('PDF\estudiantesPDF', compact('estudiantes'));
        return $pdf->download('estudiantes.pdf');

    }
    public function PDFAsignaturas(){
        $asignaturas = Asignatura::all();
        $pdf =PDF::loadView('PDF\asignaturasPDF', compact('asignaturas'));
        return $pdf->download('asignaturas.pdf');

    }
    public function PDFRegistrosAcademicos(){
        $registros_academicos = Registro_Academico::all();
        $pdf =PDF::loadView('PDF\registrosAcademicosPDF', compact('registros_academicos'));
        return $pdf->download('registros_academicos.pdf');

    }

}