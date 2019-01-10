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
            'kodeSupplier' => 'required|size:6'
        ]);

        $BeliHdr = tap(new \App\BeliHdr($data))->save();
        return redirect('\dashboardadmin');
    }



}


?>