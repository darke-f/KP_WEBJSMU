<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use App\Stock;
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
        $tablename = "stokbarang_jan2019";
        /*$stock = new Stock();
        $stock->setTable($tablename);
        //$stock->kodeBarang = 'K00003';
        //$stock->get();
        //$stock->save();
        $stock->get();*/
        $stock = DB::table($tablename)->where('kodebarang', 'K00000')->get();
        //$stock = Stock::get();
        //return $stock;
        return view('pages.stockbarang')->with('stock',$stock)->with('month','')->with('year','')->with('flag_button',0);
        //return view('pages.stockbarang');
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

        if($month == 1){ $month = 'January';}
        else if($month == 2){ $month = 'February';}
        else if($month == 3){ $month = 'March';}
        else if($month == 4){ $month = 'April';}
        else if($month == 5){ $month = 'May';}
        else if($month == 6){ $month = 'June';}
        else if($month == 7){ $month = 'July';}
        else if($month == 8){ $month = 'August';}
        else if($month == 9){ $month = 'September';}
        else if($month == 10){ $month = 'October';}
        else if($month == 11){ $month = 'December';}
        else { $month = 'December';}

        $tablename = 'stokbarang_' . substr($month,0,3) . $year;

        $flag = Schema::hasTable($tablename);

        if ($flag) {

            $stock = DB::table($tablename)->get();

            $tutupbulan = DB::table('tutup_bulan')->get();

            //return $tutupbulan;

            $nextmonth = date('Y-m-d', strtotime($tutupbulan));

            return $nextmonth;

            //return $tutupbulan;

            $carbon = new Carbon("$tutupbulan");

            //return $tutupbulan;

            $nextmonth = date('D', strtotime($tutupbulan));
            $nextyear = date('Y', strtotime($tutupbulan)) + 49;

            //return $nextmonth . $nextyear;

            $newtablename = 'stokbarang_' . substr($nextmonth,0,3) . $nextyear;

            return $newtablename;

            $flag_button = Schema::hasTable($newtablename);

        } else {
            $tablename = "stokbarang_jan2019";
            $stock = DB::table($tablename)->where('kodebarang', 'K00000')->get();
            $month = '';
            $year = '';
            $flag_button = 0;
        }

        return view('pages.stockbarang')->with('stock',$stock)->with('month',$month)->with('year',$year)->with('flag_button',$flag_button);
    }
}
