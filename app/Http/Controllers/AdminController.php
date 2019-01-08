<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Wisata;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user_id = auth()->user()->id;
        //$user = User::find($user_id);
        /*if (auth()->user()->bool !== 1) {
            return redirect('\about')->with('error','Unauthorized Page');
        }
        $admin = User::where('bool',1)->get();
        return view('admin.dashboard_admin')->with('admin',$admin);*/
        return view('admin.dashboard_admin');
    }

    public function setting()
    {
        return view('admin.setting');
    }

}
