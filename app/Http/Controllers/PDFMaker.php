<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class PDFMaker extends Controller
{
    public function make()
    {
        $data = ['data'=>'hello'];
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->stream('invoice.pdf');
    }
}
