<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use App\TutupBulan;
use Carbon\Carbon;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tablename = "stockbarang_2019";
        $stock = DB::table($tablename)->where('kodebarang', 'B00000')->get();
        return view('pages.stockbarang')->with('stock',$stock)->with('month','')->with('year','')->with('flag_button',0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showTable()
    {
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

        $tablename = 'stockbarang_'.$year;
        $pemasukan = 'pemasukan_' . $month;
        $pengeluaran = 'pengeluaran_' . $month;
        $saldoAwal = 'saldoAwal_' . $month;
        $saldoAkhir = 'saldoAkhir_' . $month;

        $flag = Schema::hasTable($tablename);

        if ($flag) {

            $stock = DB::table($tablename)->get(array(
                'kodeBarang',
                'namaBarang',
                'satuanBarang',
                "$saldoAwal AS saldoAwal" , "$pemasukan AS pemasukan", "$pengeluaran AS pengeluaran", "$saldoAkhir as saldoAkhir"));

            $tutupbulan = DB::table('tutup_bulan')->where('periode',$month.$year)->get();

            foreach ($tutupbulan as $tb) {
                if(!$tb->istutup) { $flag_button = 1; }
                else $flag_button = 0;
            }

        } else {
            $tablename = "stockbarang_2019";
            $stock = DB::table($tablename)->where('kodebarang', 'B00000')->get();
            $month = '';
            $year = '';
            $flag_button = 0;
        }

        return view('pages.stockbarang')->with('stock',$stock)->with('month',$month)->with('year',$year)->with('flag_button',$flag_button);
    }

    public function calcTable($month,$year)
    {
        $tablename = 'stockbarang_' . $year;
        $pemasukan = 'pemasukan_' . $month;
        $pengeluaran = 'pengeluaran_' . $month;
        $saldoAwal = 'saldoAwal_' . $month;
        $saldoAkhir = 'saldoAkhir_' . $month;

        $data = DB::table($tablename)->get();

        if (!$data->isEmpty()) { 
            DB::table($tablename)->update([$pemasukan=>0]);
            DB::table($tablename)->update([$pengeluaran=>0]);
        }

        //Calculate pemasukan

        $result  = DB::table('masterbarang')->join('belidtl', 'belidtl.kodeBarang', '=', 'masterbarang.kodeBarang')
        ->join('belihdr', 'belihdr.noTransaksiBeli', '=', 'belidtl.noTransaksiBeli')->groupBy('masterbarang.kodeBarang','masterbarang.namaBarang','masterbarang.satuanBarang')->where('periodeTransaksiBeli', '=', $month.$year)->get(array(
            'masterbarang.kodeBarang',
            'masterbarang.namaBarang',
            'masterbarang.satuanBarang',
            DB::raw('SUM(belidtl.quantity) AS Jumlah')));

        foreach ($result as $row) {
            //return $row->kodeBarang;
            $flag_data = DB::table($tablename)->where('kodeBarang', $row->kodeBarang)->exists();
            if(!$flag_data) { 
                DB::table($tablename)->insert(
                    ['kodeBarang' => $row->kodeBarang, 'namaBarang' => $row->namaBarang, 'satuanBarang' =>  $row->satuanBarang, $pemasukan => $row->Jumlah]
                );
            }
            else DB::table($tablename)->where('kodeBarang', $row->kodeBarang)->increment($pemasukan,$row->Jumlah);
        }

        //Calculate pengeluaran

        $result  = DB::table('masterbarang')->join('jualdtl', 'jualdtl.kodeBarang', '=', 'masterbarang.kodeBarang')
        ->join('jualhdr', 'jualhdr.noTransaksiJual', '=', 'jualdtl.noTransaksiJual')->groupBy('masterbarang.kodeBarang','masterbarang.namaBarang','masterbarang.satuanBarang')->where('periodeTransaksiJual', '=', $month.$year)->get(array(
            'masterbarang.kodeBarang',
            'masterbarang.namaBarang',
            'masterbarang.satuanBarang',
            DB::raw('SUM(jualdtl.quantity) AS Jumlah')));

        foreach ($result as $row) {
            //return $row->kodeBarang;
            $flag_data = DB::table($tablename)->where('kodeBarang', $row->kodeBarang)->exists();
            if(!$flag_data) { 
                DB::table($tablename)->insert(
                    ['kodeBarang' => $row->kodeBarang, 'namaBarang' => $row->namaBarang, 'satuanBarang' =>  $row->satuanBarang, $pengeluaran => $row->Jumlah]
                );
            }
            else DB::table($tablename)->where('kodeBarang', $row->kodeBarang)->increment($pengeluaran,$row->Jumlah);
        }

        DB::table($tablename)->update([$saldoAkhir => DB::raw("$saldoAwal + $pemasukan - $pengeluaran")]);

        $stock = DB::table($tablename)->get(array(
            'kodeBarang',
            'namaBarang',
            'satuanBarang',
            "$saldoAwal AS saldoAwal" , "$pemasukan AS pemasukan", "$pengeluaran AS pengeluaran", "$saldoAkhir as saldoAkhir"));

        $tutupbulan = DB::table('tutup_bulan')->where('periode',$month.$year)->get();

        foreach ($tutupbulan as $tb) {
            if(!$tb->istutup) { $flag_button = 1; }
            else $flag_button = 0;
        }
        
        return view('pages.stockbarang')->with('stock',$stock)->with('month',$month)->with('year',$year)->with('flag_button',$flag_button);
    }

    public function closeTable($month,$year)
    {
        $tutupbulan = TutupBulan::find($month.$year);
        $tutupbulan->istutup = 1;
        $tutupbulan->save();
        
        $tablename = 'stockbarang_' . $year;
        $pemasukan = 'pemasukan_' . $month;
        $pengeluaran = 'pengeluaran_' . $month;
        $saldoAwal = 'saldoAwal_' . $month;
        $saldoAkhir = 'saldoAkhir_' . $month;

        $stock = DB::table($tablename)->get(array(
            'kodeBarang',
            'namaBarang',
            'satuanBarang',
            "$saldoAwal AS saldoAwal" , "$pemasukan AS pemasukan", "$pengeluaran AS pengeluaran", "$saldoAkhir as saldoAkhir"));
        
        return view('pages.stockbarang')->with('stock',$stock)->with('month',$month)->with('year',$year)->with('flag_button',0);

    }
}
