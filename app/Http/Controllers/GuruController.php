<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Guru;

class GuruController extends Controller
{
    public function dashboard()
    {
        return view('guru.dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::orderBy('name','asc')->get();

        return view('admin.guru.index',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->name = $request->name;
        $guru->gender = $request->gender;
        $guru->p_birth = $request->p_birth;
        $guru->d_birth = $request->d_birth;
        $guru->study = $request->study;
        $guru->address = $request->address;
        $guru->email = $request->email;
        $guru->password = \Hash::make($request->password);
        $guru->phone = $request->phone;
        $photo = $request->file('photo');

        if($photo){
        $cover_path = $photo->store('images/guru', 'public');

        $guru->photo = $cover_path;
        }

        // dd($guru);
        if ( $guru->save()) {

            return redirect()->route('admin.guru')->with('success', 'Guru added successfully');
    
           } else {
               
            return redirect()->route('admin.guru.create')->with('error', 'Guru failed to add');
    
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
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit',compact('guru'));
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
        $guru           = Guru::findOrFail($id);
        $guru->nip      = $request->nip;
        $guru->name     = $request->name;
        $guru->gender   = $request->gender;
        $guru->p_birth  = $request->p_birth;
        $guru->d_birth  = $request->d_birth;
        $guru->study    = $request->study;
        $guru->address  = $request->address;
        $guru->email    = $request->email;
        // $guru->password = \Hash::make($request->password);
        $guru->phone    = $request->phone;

        $photo = $request->file('photo');

        if($photo){
        if($guru->photo && file_exists(storage_path('app/public/' . $guru->photo))){
            \Storage::delete('public/'. $guru->photo);
        }

        $new_cover_path = $photo->store('images/guru', 'public');

        $guru->photo = $new_cover_path;
        }


        // dd($guru);
        if ( $guru->save()) {

            return redirect()->route('admin.guru')->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->route('admin.guru.create')->with('error', 'Data failed to update');
    
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
        $guru = Guru::findOrFail($id);

        $guru->delete();

        return redirect()->route('admin.guru')->with('success', 'Data deleted successfully');
    }

    public function editprofile($id)
    {
        $guru = Guru::findOrFail($id);

        return view('guru.profile.edit',compact('guru'));
    }

     public function updateprofile(Request $request, $id)
    {
        $guru           = Guru::findOrFail($id);
        $guru->nip      = $request->nip;
        $guru->name     = $request->name;
        $guru->gender   = $request->gender;
        $guru->p_birth  = $request->p_birth;
        $guru->d_birth  = $request->d_birth;
        $guru->study    = $request->study;
        $guru->address  = $request->address;
        $guru->email    = $request->email;
        // $guru->password = \Hash::make($request->password);
        $guru->phone    = $request->phone;

        $photo = $request->file('photo');

        if($photo){
        if($guru->photo && file_exists(storage_path('app/public/' . $guru->photo))){
            \Storage::delete('public/'. $guru->photo);
        }

        $new_cover_path = $photo->store('images/guru', 'public');

        $guru->photo = $new_cover_path;
        }


        // dd($guru);
        if ( $guru->save()) {

            return redirect()->back()->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->back()->with('error', 'Data failed to update');
    
           }
    }

}
