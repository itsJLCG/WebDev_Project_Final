<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\MassSchedule;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf(){
        $leaders = Leader::all();
        $massSched = MassSchedule::all();
        $data = [
            'title' => 'Mga Namumuno',
            'date' => date('m/d/Y'),
            'leaders' => $leaders,
            'massSched' => $massSched
        ];
        $pdf = Pdf::loadView('generate-product-pdf', $data);
        return $pdf->download('parishleaders.pdf');
    }
}
