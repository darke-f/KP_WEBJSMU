<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualHdr;
use App\JualDtl;
use Illuminate\Support\Facades\Input;
use App\MasterBarang;
use App\MasterCustomer;
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

    public function index_No() {
        return view('pages.penjualan_No');
    }

    public function index_Periode() {
        return view('pages.penjualan_Periode');
    }

    public function index_Barang() {
        return view('pages.penjualan_Barang');
    }

    public function index_Customer() {
        return view('pages.penjualan_Customer');
    }

    public function show_No(){
        $kode = Input::get('kodejual', 'default category');
        
        $header = JualHdr::where('noTransaksiJual',$kode)->get();
        //return $header;
        if(!$header->isEmpty()) {
            $customer = JualHdr::find($kode)->customer->namaCustomer;
            $detail = JualDtl::where('noTransaksiJual',$kode)->get();

            return view('pages.penjualan_No')->with('header',$header)->with('customer',$customer)->with('detail',$detail);
        }
        else return view('pages.penjualan_No')->with('nodata',1);
    }

    public function show_Periode(){
        $month = Input::get('month', 'default category');
        $year = Input::get('year', 'default category');

        if($month == 1){ $month = 'Jan';}
        else if($month == 2){ $month = 'Feb';}
        else if($month == 3){ $month = 'Mar';}
        else if($month == 4){ $month = 'Apr';}
        else if($month == 5){ $month = 'May';}
        else if($month == 6){ $month = 'Jun';}
        else if($month == 7){ $month = 'Jul';}
        else if($month == 8){ $month = 'Aug';}
        else if($month == 9){ $month = 'Sep';}
        else if($month == 10){ $month = 'Oct';}
        else if($month == 11){ $month = 'Nov';}
        else { $month = 'Dec';}
        
        $data = JualHdr::with('dtl')->with('customer')->where('periodeTransaksiJual',$month.$year)->get();

        if(!$data->isEmpty()) {
            return view('pages.penjualan_Periode')->with('periode',$month." ".$year)->with('data',$data);
        }
        else return view('pages.penjualan_Periode')->with('nodata',1);
    }

    public function show_Barang(){
        $kode = Input::get('namabarang', 'default category');
        
        $header = MasterBarang::where('namaBarang', $kode)->get();

        if(!$header->isEmpty()) {
            $data = JualDtl::with('hdr')->where('namaBarang',$kode)->get();
            
            $customer = MasterCustomer::where('kodeCustomer', $data[0]->hdr->kodeCustomer)->pluck('namaCustomer');

            return view('pages.penjualan_Barang')->with('header',$header)->with('customer',$customer)->with('data',$data);
        }
        else return view('pages.penjualan_Barang')->with('nodata',1);
    }

    public function show_Customer(){
        $kode = Input::get('namacustomer', 'default category');

        $header = MasterCustomer::where('namaCustomer', $kode)->get();

        if(!$header->isEmpty()) {
            $data = JualHdr::with('dtl')->where('kodeCustomer',$header[0]->kodeCustomer)->get();

            return view('pages.penjualan_Customer')->with('header',$header)->with('data',$data);
        }
        else return view('pages.penjualan_Customer')->with('nodata',1);
    }
}


?>