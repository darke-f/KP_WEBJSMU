<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BeliHdr;
use App\BeliDtl;
use Validator;

class PembelianController extends Controller
{

    public function addBeli(){
        return view("pages.addBeli");
    }

    public function addBeliPost(Request $request)
    {
        $data = $request->validate([
            'noTransaksiBeli' => 'required|size:6|unique:belihdr',
            'tanggalTransaksiBeli' => 'required|date',
            'kodeSupplier' => 'required|size:6|exists:mastersupplier,kodeSupplier', //foreign key constraint check
            'periodeTransaksiBeli' => '',
            'kodeBarang.*' => 'required|size:6|exists:masterbarang,kodeBarang',
            'namaBarang.*' => 'required',
            'satuanBarang.*' => 'required',
            'quantity.*' => 'required|numeric'
        ]);

        $date = strtotime($request->input('tanggalTransaksiBeli'));
        $date2 = date('MY',$date);

        // $BeliHdr = tap(new \App\BeliHdr($data))->save();
        $BeliHdr = new \App\BeliHdr;
        $BeliHdr->noTransaksiBeli = $request->input('noTransaksiBeli');
        $BeliHdr->tanggalTransaksiBeli = $request->input('tanggalTransaksiBeli');
        $BeliHdr->kodeSupplier = $request->input('kodeSupplier');
        $BeliHdr->periodeTransaksiBeli = $date2;

        $noTransaksiBeli = $request->input('noTransaksiBeli');
        $kodeBarang = $request->input('kodeBarang');
        $namaBarang = $request->input('namaBarang');
        $satuanBarang = $request->input('satuanBarang');
        $quantity = $request->input('quantity');

        
        $BeliHdr->save();
        
        // for($iter=0; $iter<=count($kodeBarang); $iter++)
        // {
        //     $BeliDtl = new \App\BeliDtl;
        //     $BeliDtl->noTransaksiBeli = $noTransaksiBeli;
        //     $BeliDtl->kodeBarang = $kodeBarang[$iter];
        //     $BeliDtl->namaBarang = $namaBarang[$iter];
        //     $BeliDtl->satuanBarang = $satuanBarang[$iter];
        //     $BeliDtl->quantity = $quantity[$iter];
        // }

        foreach($kodeBarang as $key => $value) 
        {
            $BeliDtl = new \App\BeliDtl;
            $BeliDtl->noTransaksiBeli = $noTransaksiBeli;
            $BeliDtl->kodeBarang = $kodeBarang[$key];
            $BeliDtl->namaBarang = $namaBarang[$key];
            $BeliDtl->satuanBarang = $satuanBarang[$key];
            $BeliDtl->quantity = $quantity[$key];

            $BeliDtl->save();
        }


        // $rules = [];
        // foreach($request->input('kodeBarang') as $key => $value) {
        //     $rules["noTransaksiBeli"] = 'required';
        //     $rules["tanggalTransaksiBeli"] = 'required';
        //     $rules["kodeSupplier"] = 'required';
        //     $rules["kodeBarang.{$key}"] = 'required';
        //     $rules["namaBarang.{$key}"] = 'required';
        //     $rules["satuanBarang.{$key}"] = 'required';
        //     $rules["quantity.{$key}"] = 'required';
        // }

        // $validator = Validator::make($request->all(), $rules);


        // $kodeBarang = $request->input('kodeBarang');
        // $namaBarang = $request->input('namaBarang');
        // $satuanBarang = $request->input('satuanBarang');
        // $quantity = $request->input('quantity');

        
        
        // for($iter=0; $iter<=count($request->kodeBarang); $iter++)
        // {
        //     $data->validate([
        //         'kodeBarang' => 'required',
        //         'namaBarang' => 'required',
        //         'satuanBarang' => 'required',
        //         'quantity' => 'required'
        //     ]);
        // }


        // for($i=0; $i<=count($report);$i++)
        //         {
        //             $news = new Reporting();
        //             $news->user_id = 1;
        //             $news->reporting = $report;
        //             $news->save();
        //         }


        return redirect('\dashboardadmin');
    }

    public function show(){
        return view("pages.showpembelian");
    }


}


?>