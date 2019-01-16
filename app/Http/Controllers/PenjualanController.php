<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualHdr;
use App\JualDtl;
use Validator;
use Illuminate\Support\Facades\Input;

class PenjualanController extends Controller
{

    public function addJual(){
        return view("pages.addJual");
    }

    public function addJualPost(Request $request)
    {
        $data = $request->validate([
            'noTransaksiJual' => 'required|size:6|unique:Jualhdr',
            'tanggalTransaksiJual' => 'required|date',
            'kodeCustomer' => 'required|size:6|exists:mastercustomer,kodeCustomer', //foreign key constraint check
            'periodeTransaksiJual' => '',
            'kodeBarang.*' => 'required|size:6|exists:masterbarang,kodeBarang',
            'namaBarang.*' => 'required',
            'satuanBarang.*' => 'required',
            'quantity.*' => 'required|numeric'
        ]);

        $date = strtotime($request->input('tanggalTransaksiJual'));
        $date2 = date('MY',$date);

        // $JualHdr = tap(new \App\JualHdr($data))->save();
        $JualHdr = new \App\JualHdr;
        $JualHdr->noTransaksiJual = $request->input('noTransaksiJual');
        $JualHdr->tanggalTransaksiJual = $request->input('tanggalTransaksiJual');
        $JualHdr->kodeCustomer = $request->input('kodeCustomer');
        $JualHdr->periodeTransaksiJual = $date2;

        $noTransaksiJual = $request->input('noTransaksiJual');
        $kodeBarang = $request->input('kodeBarang');
        $namaBarang = $request->input('namaBarang');
        $satuanBarang = $request->input('satuanBarang');
        $quantity = $request->input('quantity');

        
        $JualHdr->save();


        foreach($kodeBarang as $key => $value) 
        {
            $JualDtl = new \App\JualDtl;
            $JualDtl->noTransaksiJual = $noTransaksiJual;
            $JualDtl->kodeBarang = $kodeBarang[$key];
            $JualDtl->namaBarang = $namaBarang[$key];
            $JualDtl->satuanBarang = $satuanBarang[$key];
            $JualDtl->quantity = $quantity[$key];

            $JualDtl->save();
        }

        return redirect('\dashboardadmin');
    }
    public function index() {
        return view('pages.showpenjualan');
    }

    public function show(){
        $kode = Input::get('kode', 'default category');
        
        $header = JualHdr::where('noTransaksiJual',$kode)->get();
        //return $header;
        if(!$header->isEmpty()) {
            $customer = JualHdr::find($kode)->customer->namaCustomer;
            $detail = JualDtl::where('noTransaksiJual',$kode)->get();

            return view('pages.showpenjualan')->with('header',$header)->with('customer',$customer)->with('detail',$detail);
        }
        else return view('pages.showpenjualan')->with('nodata',1);
    }
}


?>