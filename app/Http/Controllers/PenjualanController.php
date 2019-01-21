<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualHdr;
use App\JualDtl;
use Illuminate\Support\Facades\Input;
use Validator;

class PenjualanController extends Controller
{

    public function addJual(){
        $barang = \DB::table('masterbarang')->get();
        $customer = \DB::table('mastercustomer')->get();
        return view("pages.addJual")->with('barang',$barang)->with('customer',$customer);
    }

    public function addJualPost(Request $request)
    {
        $data = $request->validate([
            'noTransaksiJual' => 'required|size:6|unique:Jualhdr',
            'tanggalTransaksiJual' => 'required|date',
            'kodeCustomer' => 'required|size:6|exists:mastercustomer,kodeCustomer', //foreign key constraint check
            'periodeTransaksiJual' => '',
            'subtotalH' => '',
            'discount' => '',
            'grandtotalH' => '',
            'kodeBarangH.*' => 'required|size:6|exists:masterbarang,kodeBarang',
            'namaBarangH.*' => 'required',
            'satuanBarangH.*' => 'required',
            'quantity.*' => 'required|numeric',
            'hargaSatuan.*' => 'required|numeric',
            'hargaTotal.*' => 'required|numeric',
        ]);

        $date = strtotime($request->input('tanggalTransaksiJual'));
        $date2 = date('MY',$date);

        // $JualHdr = tap(new \App\JualHdr($data))->save();
        $JualHdr = new \App\JualHdr;
        $JualHdr->noTransaksiJual = $request->input('noTransaksiJual');
        $JualHdr->tanggalTransaksiJual = $request->input('tanggalTransaksiJual');
        $JualHdr->kodeCustomer = $request->input('kodeCustomer');
        $JualHdr->periodeTransaksiJual = $date2;
        $JualHdr->subtotal = $request->input('subtotalH');
        $JualHdr->discount = $request->input('discount');
        $JualHdr->grandtotal = $request->input('grandtotalH');

        $noTransaksiJual = $request->input('noTransaksiJual');
        $kodeBarang = $request->input('kodeBarangH');
        $namaBarang = $request->input('namaBarangH');
        $satuanBarang = $request->input('satuanBarangH');
        $quantity = $request->input('quantity');
        $hargaSatuan = $request->input('hargaSatuan');
        $hargaTotal = $request->input('hargaTotal');

        
        $JualHdr->save();


        foreach($kodeBarang as $key => $value) 
        {
            $JualDtl = new \App\JualDtl;
            $JualDtl->noTransaksiJual = $noTransaksiJual;
            $JualDtl->kodeBarang = $kodeBarang[$key];
            $JualDtl->namaBarang = $namaBarang[$key];
            $JualDtl->satuanBarang = $satuanBarang[$key];
            $JualDtl->quantity = $quantity[$key];
            $JualDtl->hargaSatuan = $hargaSatuan[$key];
            $JualDtl->hargaTotal = $hargaTotal[$key];

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