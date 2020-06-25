<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{File, Kelas};

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::orderBy('id','desc')->get();
        return view('admin.file.index',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = new File();
        $file->title = $request->title;
        $file->desc = $request->desc;
        $file->class = $request->class;
        $file->by = $request->by;

        $softfile = $request->file('file');

        if($softfile){
        $file_path = $softfile->store('file', 'public');

        $file->file = $file_path;
        }

       if ( $file->save()) {

        return redirect()->route('admin.file')->with('success', 'File added successfully');

       } else {
           
        return redirect()->route('admin.file.create')->with('error', 'File failed to add');

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
        $file = File::findOrFail($id);

        $kelas = Kelas::all();

        return view('admin.file.edit',compact('file','kelas'));
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
