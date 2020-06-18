<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengumuman;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('date','desc')->get();

        return view('admin.pengumuman.index',compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengumuman = new Pengumuman();
        $pengumuman->title = $request->title;
        $pengumuman->desc = $request->desc;
        $pengumuman->date = $request->date;
        $cover = $request->file('cover');

        if($cover){
        $cover_path = $cover->store('images/pengumuman', 'public');

        $pengumuman->cover = $cover_path;
        }

        if ( $pengumuman->save()) {

            return redirect()->route('admin.pengumuman')->with('success', 'Data added successfully');
    
           } else {
               
            return redirect()->route('admin.pengumuman.create')->with('error', 'Data failed to add');
    
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
        $pengumuman = Pengumuman::findOrFail($id);

        return view('admin.pengumuman.edit',compact('pengumuman'));
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
        $pengumuman           = Pengumuman::findOrFail($id);
        $pengumuman->title = $request->title;
        $pengumuman->slug = \Str::slug($request->title);
        $pengumuman->desc = $request->desc;
        $pengumuman->date = $request->date;

        $cover = $request->file('cover');

        if($cover){
        if($pengumuman->cover && file_exists(storage_path('app/public/' . $pengumuman->cover))){
            \Storage::delete('public/'. $pengumuman->cover);
        }

        $new_cover_path = $cover->store('images/pengumuman', 'public');

        $pengumuman->cover = $new_cover_path;
        }


        // dd($guru);
        if ( $pengumuman->save()) {

            return redirect()->route('admin.pengumuman')->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->route('admin.pengumuman.create')->with('error', 'Data failed to update');
    
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
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()->route('admin.pengumuman')->with('success', 'Data deleted successfully');

    }
}
