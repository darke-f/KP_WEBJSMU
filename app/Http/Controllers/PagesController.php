<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\User;

class PagesController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        return view('welcome'); 
    }

    public function user() 
    {
        $users = User::where('level','user')->get();
        return view('pages.user')->with('users',$users); 
    }

    public function userpermission($id) 
    {
        $users = User::find($id);
        return view('pages.userpermission')->with('users',$users); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepermission(Request $request, $id)
    {

        /*$this->validate($request,[
            'title' => 'required',
            'detail' => 'required'
        ]);*/

        $users = User::find($id);

        if($request->input('masterperm')) $users->masterperm = $request->input('masterperm');
        else $users->masterperm = 0;
        if($request->input('stockperm')) $users->stockperm = $request->input('stockperm');
        else $users->stockperm = 0;
        if($request->input('pembelianperm')) $users->pembelianperm = $request->input('pembelianperm');
        else $users->pembelianperm = 0;
        if($request->input('penjualanperm')) $users->penjualanperm = $request->input('penjualanperm');
        else $users->penjualanperm = 0;
        if($request->input('reportbeliperm')) $users->reportbeliperm = $request->input('reportbeliperm');
        else $users->reportbeliperm = 0;
        if($request->input('reportjualperm')) $users->reportjualperm = $request->input('reportjualperm');
        else $users->reportjualperm = 0;

        $users->save();
        
        return redirect('/users')->with('success','User permisson updated.');;
    }

    public function showChangePasswordForm() 
    {
        return view('auth.changepassword'); 
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

}
