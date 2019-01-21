<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BeliHdr;
use App\BeliDtl;
use Illuminate\Support\Facades\Input;
use Validator;

class PembelianController extends Controller
{

    public function addBeli(){
        $barang = \DB::table('masterbarang')->get();
        $supplier = \DB::table('mastersupplier')->get();
        return view("pages.addBeli")->with('barang',$barang)->with('supplier',$supplier);
    }

    public function addBeliPost(Request $request)
    {
        $data = $request->validate([
            'noTransaksiBeli' => 'required|size:6|unique:belihdr',
            'tanggalTransaksiBeli' => 'required|date',
            'kodeSupplier' => 'required|size:6|exists:mastersupplier,kodeSupplier', //foreign key constraint check
            'periodeTransaksiBeli' => '',
            'kodeBarangH.*' => 'required|size:6|exists:masterbarang,kodeBarang',
            'namaBarangH.*' => 'required',
            'satuanBarangH.*' => 'required',
            'quantity.*' => 'required|numeric',
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
        $kodeBarang = $request->input('kodeBarangH');
        $namaBarang = $request->input('namaBarangH');
        $satuanBarang = $request->input('satuanBarangH');
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

        foreach($namaBarang as $key => $value) 
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

    public function index_No() {
        return view('pages.pembelian_No');
    }

    public function index_Periode() {
        return view('pages.pembelian_Periode');
    }

    public function index_Barang() {
        return view('pages.pembelian_Barang');
    }

    public function index_Supplier() {
        return view('pages.pembelian_Supplier');
    }

    public function show_No(){
        $kode = Input::get('kodebeli', 'default category');
        
        $header = BeliHdr::where('noTransaksiBeli',$kode)->get();
        //return $header;
        if(!$header->isEmpty()) {
            $supplier = BeliHdr::find($kode)->supplier->namaSupplier;
            $detail = BeliDtl::where('noTransaksiBeli',$kode)->get();

            return view('pages.pembelian_No')->with('header',$header)->with('supplier',$supplier)->with('detail',$detail);
        }
        else return view('pages.pembelian_No')->with('nodata',1);
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
        
        $data = BeliHdr::with('dtl')->with('supplier')->where('periodeTransaksiBeli',$month.$year)->get();
        foreach($data as $dt){
            return $dt;
        }
        return $data->dtl;

        if(!$data->isEmpty()) {
            return view('pages.showpembelian')->with('periode',$month.$year)->with('data',$data);
        }
        else return view('pages.showpembelian')->with('nodata',1);
    }

    public function show_Barang(){
        $kode = Input::get('kode', 'default category');
        
        $header = BeliHdr::where('noTransaksiBeli',$kode)->get();
        //return $header;
        if(!$header->isEmpty()) {
            $supplier = BeliHdr::find($kode)->supplier->namaSupplier;
            $detail = BeliDtl::where('noTransaksiBeli',$kode)->get();

            return view('pages.showpembelian')->with('header',$header)->with('supplier',$supplier)->with('detail',$detail);
        }
        else return view('pages.showpembelian')->with('nodata',1);
    }

    public function show_Supplier(){
        $kode = Input::get('kode', 'default category');
        
        $header = BeliHdr::where('noTransaksiBeli',$kode)->get();
        //return $header;
        if(!$header->isEmpty()) {
            $supplier = BeliHdr::find($kode)->supplier->namaSupplier;
            $detail = BeliDtl::where('noTransaksiBeli',$kode)->get();

            return view('pages.showpembelian')->with('header',$header)->with('supplier',$supplier)->with('detail',$detail);
        }
        else return view('pages.showpembelian')->with('nodata',1);
    }
}


?>