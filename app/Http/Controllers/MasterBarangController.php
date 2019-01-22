<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterBarang;

class MasterBarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = MasterBarang::all();
        return view('pages.masterbarang')->with('barang',$barang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.addbarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kodebarang' => 'required',
            'nama' => 'required',
            'satuan' => 'required',
            'note' => 'required'
        ]);

        //create post
        $barang = new MasterBarang;
        $barang->kodeBarang = $request->input('kodebarang');
        $barang->namaBarang = $request->input('nama');
        $barang->satuanBarang = $request->input('satuan');
        $barang->noteBarang = $request->input('note');

        $barang->save();
        
        return redirect('/masterbarangs')->with('success','Barang Created');
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
        $barang = MasterBarang::find($id);
      
        return view('pages.updatebarang')->with('barang',$barang);
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
        $this->validate($request,[
            'nama' => 'required',
            'satuan' => 'required',
            'note' => 'required'
        ]);

        //create barang
        $barang = MasterBarang::find($id);
        $barang->namaBarang = $request->input('nama');
        $barang->satuanBarang = $request->input('satuan');
        $barang->noteBarang = $request->input('note');

        $barang->save();
        
        return redirect('/masterbarangs')->with('success','Barang Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = MasterBarang::find($id);

        $barang->delete();
        return redirect('/masterbarangs')->with('success','Barang Removed');
    }
}
