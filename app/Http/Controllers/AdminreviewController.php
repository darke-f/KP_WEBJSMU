<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use DB;

class AdminreviewController extends Controller
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
        $reviews = Review::all();
        
        return view('admin.datareview')->with('reviews',$reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createreview');
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
        $review = new Review;
        $review->title = $request->input('title');
        $review->name = auth()->user()->name;
        $review->detail = $request->input('detail');

        $review->save();
        
        return redirect('/adminreviews')->with('success','Post Created');
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
        if (auth()->user()->bool !== 1) {
            return redirect('\about')->with('error','Unauthorized Page');
        }
        $post = Review::find($id);
      
        return view('admin.updatereview')->with('post',$post);
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
            'name' => 'required',
            'detail' => 'required'
        ]);

        //create post
        $review = Review::find($id);
        $review->title = $request->input('title');
        $review->name = $request->input('name');
        $review->detail = $request->input('detail');

        $review->save();
        
        return redirect('/adminreviews')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Review::find($id);

        $post->delete();
        return redirect('/adminreviews')->with('success','Post Removed');
    }
}
