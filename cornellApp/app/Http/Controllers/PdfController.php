<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
class PdfController extends Controller
{
    /**
     * Método creado para cargar la vista e imprimir el pdf
     * Devuelve la descarga del pdf.
     * Recogemos todos los términos en una variable para imprimirlos en el pdf.
     */
   function printPdf()
   {
    $terms = Term::all();
    $pdf = \PDF::loadView('pdf.pdf', compact('terms'));
    return $pdf->download('terms.pdf');
   }
}