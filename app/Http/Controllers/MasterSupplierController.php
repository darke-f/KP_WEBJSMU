<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterSupplier;

class MasterSupplierController extends Controller
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
        $supplier = MasterSupplier::all();
        return view('pages.mastersupplier')->with('supplier',$supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.addsupplier');
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
            'kodesupplier' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'jenis' => 'required'
        ]);

        //create post
        $supplier = new MasterSupplier;
        $supplier->kodeSupplier = $request->input('kodesupplier');
        $supplier->namaSupplier = $request->input('nama');
        $supplier->alamatSupplier = $request->input('alamat');
        $supplier->kotaSupplier = $request->input('kota');
        $supplier->jenisSupplier = $request->input('jenis');

        $supplier->save();
        
        return redirect('/mastersuppliers')->with('success','Supplier Created');
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
        $supplier = MasterSupplier::find($id);
      
        return view('pages.updatesupplier')->with('supplier',$supplier);
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
            'alamat' => 'required',
            'kota' => 'required',
            'jenis' => 'required'
        ]);

        //create supplier
        $supplier = MasterSupplier::find($id);
        $supplier->namaSupplier = $request->input('nama');
        $supplier->alamatSupplier = $request->input('alamat');
        $supplier->kotaSupplier = $request->input('kota');
        $supplier->jenisSupplier = $request->input('jenis');

        $supplier->save();
        
        return redirect('/mastersuppliers')->with('success','Supplier Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = MasterSupplier::find($id);

        $supplier->delete();
        return redirect('/mastersuppliers')->with('success','Supplier Removed');
    }
}
