<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TagList;
use App\ListTag;
use Validator;

class PembelianController extends Controller
{

    public function addBeli(){
        return view("pages.addBeli");
    }

    public function addBeliPost(Request $request)
    {
        $data = $request->validate([
            'noTransaksiBeli' => 'required|size:6',
            'tanggalTransaksiBeli' => 'required|date',
            'kodeSupplier' => 'required|size:6|exists:mastersupplier,kodeSupplier', //foreign key constraint check
            'periodeTransaksiBeli' => '',
            'kodeBarang' => 'required',
            'namaBarang' => 'required',
            'satuanBarang' => 'required',
            'quantity' => 'required'
        ]);

        $date = strtotime($request->input('tanggalTransaksiBeli'));
        $date2 = date('MY',$date);

        // $BeliHdr = tap(new \App\BeliHdr($data))->save();
        $BeliHdr = new \App\BeliHdr;
        $BeliHdr->noTransaksiBeli = $request->input('noTransaksiBeli');
        $BeliHdr->tanggalTransaksiBeli = $request->input('tanggalTransaksiBeli');
        $BeliHdr->kodeSupplier = $request->input('kodeSupplier');
        $BeliHdr->periodeTransaksiBeli = $date2;


        $rules = [];
        foreach($request->input('kodeBarang') as $key => $value) {
            $rules["kodeBarang.{$key}"] = 'required';
            $rules["namaBarang.{$key}"] = 'required';
            $rules["satuanBarang.{$key}"] = 'required';
            $rules["quantity.{$key}"] = 'required';
        }


        $kodeBarang = $request->input('kodeBarang');
        $namaBarang = $request->input('namaBarang');
        $satuanBarang = $request->input('satuanBarang');
        $quantity = $request->input('quantity');

        
        
        for($iter=0; $iter<=count($kodeBarang); $iter++)
        {
            // $kodeBarang
        }


        // for($i=0; $i<=count($report);$i++)
        //         {
        //             $news = new Reporting();
        //             $news->user_id = 1;
        //             $news->reporting = $report;
        //             $news->save();
        //         }









        $BeliHdr->save();

        

        return redirect('\dashboardadmin');
    }



}


?>