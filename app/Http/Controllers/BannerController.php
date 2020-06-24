<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('id','desc')->get();

        return view('admin.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->desc = $request->desc;
        $banner->link = $request->link;

        $cover = $request->file('cover');

        if($cover){
        $cover_path = $cover->store('images/banner', 'public');

        $banner->cover = $cover_path;
        }

       if ( $banner->save()) {

        return redirect()->route('admin.banner')->with('success', 'banner added successfully');

       } else {
           
        return redirect()->route('admin.banner.create')->with('error', 'banner failed to add');

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
        $banner = Banner::findOrFail($id);

        return view('admin.banner.edit',compact('banner'));
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
        $banner = Banner::findOrFail($id);
        $banner->title = $request->title;
        $banner->desc = $request->desc;
        $banner->link = $request->link;

        $new_cover = $request->file('cover');

        if($new_cover){
        if($banner->cover && file_exists(storage_path('app/public/' . $banner->cover))){
            \Storage::delete('public/'. $banner->cover);
        }

        $new_cover_path = $new_cover->store('images/banner', 'public');

        $banner->cover = $new_cover_path;
    }

       if ( $banner->save()) {

        return redirect()->route('admin.banner')->with('success', 'banner updated successfully');

       } else {
           
        return redirect()->route('admin.banner.create')->with('error', 'banner failed to update');

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        $banner->delete();
        
        return redirect()->route('admin.banner')->with('success', 'banner deleted successfully');
    }
}
