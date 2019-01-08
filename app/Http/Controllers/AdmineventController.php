<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;

class AdmineventController extends Controller
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
        if (auth()->user()->bool !== 1) {
            return redirect('\about')->with('error','Unauthorized Page');
        }
        $events = Event::all();
        return view('admin.dataevent')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createevent');
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
            'title' => 'required',
            'detail' => 'required'
        ]);

        //create post
        $event = new Event;
        $event->title = $request->input('title');
        $event->detail = $request->input('detail');

        $event->save();
        
        return redirect('/adminevents')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->bool !== 1) {
            return redirect('\about')->with('error','Unauthorized Page');
        }
        
        $post = Event::find($id);
      
        return view('admin.updateevent')->with('post',$post);
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
            'title' => 'required',
            'detail' => 'required'
        ]);

        //create post
        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->detail = $request->input('detail');

        $event->save();
        
        return redirect('/adminevents')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Event::find($id);

        $post->delete();
        return redirect('/adminevents')->with('success','Post Removed');
    }
}
