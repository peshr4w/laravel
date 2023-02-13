<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogDetails');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'heading' => 'required|max:255', 'body' => 'required'
        ]);

        $blog = new blogs;
        $blog->title = $request->get('title');
        $file = $request->file('image');
        $filename = time() . "." . $file->getClientOriginalExtension();
        $blog->image = $filename;
        $file->move('images', $filename);
        $blog->heading = $request->get('heading');
        $blog->body = $request->get('body');

        $blog->save();
        return back()->with('success','new blog added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog =  blogs::find($id);
         return view('blogDetails', compact('blog'));
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
}
