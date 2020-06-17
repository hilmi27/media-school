<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $about = About::find(1);
        return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $about = About::find(1);
        $about->title = $request->title;
        $about->desc = $request->desc;

        $new_logo = $request->file('logo');

        if($new_logo){
        if($about->logo && file_exists(storage_path('app/public/' . $about->logo))){
            \Storage::delete('public/'. $about->logo);
        }

        $new_cover_path = $new_logo->store('images/logo', 'public');

        $about->logo = $new_cover_path;
        }

        if ( $about->save()) {

            return redirect()->route('admin.about.edit')->with('success', 'About updated successfully');
    
           } else {
               
            return redirect()->route('admin.about.edit')->with('error', 'About failed to update');
    
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
        //
    }
}
