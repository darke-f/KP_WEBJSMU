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
            'periodeTransaksiBeli' => ''
        ]);

        $date = strtotime($request->input('tanggalTransaksiBeli'));
        $date2 = date('MY',$date);

        // $BeliHdr = tap(new \App\BeliHdr($data))->save();
        $BeliHdr = new \App\BeliHdr;
        $BeliHdr->noTransaksiBeli = $request->input('noTransaksiBeli');
        $BeliHdr->tanggalTransaksiBeli = $request->input('tanggalTransaksiBeli');
        $BeliHdr->kodeSupplier = $request->input('kodeSupplier');
        $BeliHdr->periodeTransaksiBeli = $date2;

        $BeliHdr->save();
        return redirect('\dashboardadmin');
    }



}


?>