<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Gallery, Album};

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::orderBy('id','desc')->get();
        $album = Album::orderBy('name','asc')->get();
        return view('admin.gallery.index',compact('gallery','album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = Album::orderBy('name','asc')->get();

        return view('admin.gallery.create',compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = new Gallery();
        $gallery->album_id = $request->album_id;
        $photo = $request->file('photo');

        if($photo){
        $cover_path = $photo->store('images/gallery', 'public');

        $gallery->photo = $cover_path;
        }

        // dd($guru);
        if ( $gallery->save()) {

            return redirect()->route('admin.gallery')->with('success', 'Data added successfully');
    
           } else {
               
            return redirect()->route('admin.gallery.create')->with('error', 'Data failed to add');
    
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

    public function createalbum()
    {
        return view('admin.album.create');
    }

     public function storealbum(Request $request)
    {
        $album = new Album();
        $album->name = $request->name;
        $album->slug = \Str::slug( $request->name);
         if ( $album->save()) {

            return redirect()->route('admin.gallery')->with('success', 'Album created successfully');
    
           } else {
               
            return redirect()->route('admin.guru.create')->with('error', 'Album failed to add');
    
           }
    }
}
