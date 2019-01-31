<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BeliHdr;
use App\BeliDtl;
use App\JualHdr;
use App\JualDtl;
use App\MasterBarang;
use App\MasterSupplier;
use App\MasterCustomer;

use PDF;

class PDFMaker extends Controller
{
    public function makebeli($id)
    {
        $beli = \DB::table('belihdr')->get();
        $kode = $id;
        
        $header = BeliHdr::where('noTransaksiBeli',$kode)->get();
        //return $header;
        $supplier = BeliHdr::find($kode)->supplier;
        $detail = BeliDtl::where('noTransaksiBeli',$kode)->get();

        $data = compact('header','supplier','detail','beli');


        $pdf = PDF::loadView('pdf.invoice', $data)->setpaper('folio','portrait');
        return $pdf->stream('invoice.pdf');
    }

    public function makejual($id)
    {
        $jual = \DB::table('jualhdr')->get();
        $kode = $id;
        
        $header = JualHdr::where('noTransaksiJual',$kode)->get();
        $customer = JualHdr::find($kode)->customer;
        $detail = JualDtl::where('noTransaksiJual',$kode)->get();


        $data = compact('header','customer','detail','jual');


        $pdf = PDF::loadView('pdf.invoice2', $data)->setpaper('folio','portrait');
        return $pdf->stream('invoice2.pdf');
    }
}
