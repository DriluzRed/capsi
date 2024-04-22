<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User; 

class PDFController extends Controller
{
    public function downloadPDF($id)
    {
        // Buscar el usuario por ID y manejar el caso en que el usuario no se encuentre
        $paciente = User::where('id', $id)->first(); 

        // Pasar los datos del usuario a la vista
        $pdf = PDF::loadView('pdf.historia_clinica', compact('paciente'));
        $pdf->setPaper('oficio', 'portrait');

        // Devolver el PDF para descarga
        return $pdf->download('historia_clinica_' . $paciente->id . '.pdf');
    }
}
