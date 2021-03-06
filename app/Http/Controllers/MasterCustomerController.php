<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterCustomer;

class MasterCustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('masterperm');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = MasterCustomer::all();
        return view('pages.mastercustomer')->with('customer',$customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.addcustomer');
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
            'kodecustomer' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'note' => 'required'
        ]);

        try {
            $customer = new MasterCustomer;
            $customer->kodeCustomer = $request->input('kodecustomer');
            $customer->namaCustomer = $request->input('nama');
            $customer->alamatCustomer = $request->input('alamat');
            $customer->keteranganCustomer = $request->input('note');

            $customer->save();
            
            return redirect('/mastercustomers')->with('success','Customer Created.');
         } catch ( \Exception $e) {
             return redirect('/mastercustomers')->with('error','Customer cannot be added.');
              //var_dump($e->errorInfo );
         }
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
        $customer = MasterCustomer::find($id);
      
        return view('pages.updatecustomer')->with('customer',$customer);
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
            'note' => 'required'
        ]);

        //create customer
        $customer = MasterCustomer::find($id);
        $customer->namaCustomer = $request->input('nama');
        $customer->alamatCustomer = $request->input('alamat');
        $customer->keteranganCustomer = $request->input('note');

        $customer->save();
        
        return redirect('/mastercustomers')->with('success','Customer Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = MasterCustomer::find($id);

        try {
            $customer->delete();
            return redirect('/mastercustomers')->with('success','Customer Removed.');
         } catch ( \Exception $e) {
            return redirect('/mastercustomers')->with('error','Customer cannot be deleted.');
              //var_dump($e->errorInfo );
         }
    }
}
