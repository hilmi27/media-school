<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Kelas;
use App\Siswa;
class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('name','asc')->get();

        return view('admin.siswa.index',compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.create',compact('kelas'));
    }

    public function store(Request $request)
    {
        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->name = $request->name;
        $siswa->gender = $request->gender;
        $siswa->birth_p = $request->birth_p;
        $siswa->birth_d = $request->birth_d;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->address = $request->address;
        $siswa->email = $request->email;
        $siswa->password = \Hash::make($request->password);
        $siswa->phone = $request->phone;
        $photo = $request->file('photo');

        if($photo){
        $cover_path = $photo->store('images/siswa', 'public');

        $siswa->photo = $cover_path;
        }

        // dd($siswa);
        if ( $siswa->save()) {

            return redirect()->route('admin.siswa')->with('success', 'siswa added successfully');
    
           } else {
               
            return redirect()->route('admin.siswa.create')->with('error', 'siswa failed to add');
    
           }
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.siswa.edit',compact('siswa','kelas'));
    }

     public function update(Request $request, $id)
    {
        $siswa           = Siswa::findOrFail($id);
        $siswa->nis      = $request->nis;
        $siswa->name     = $request->name;
        $siswa->gender   = $request->gender;
        $siswa->birth_p  = $request->birth_p;
        $siswa->birth_d  = $request->birth_d;
        $siswa->kelas_id    = $request->kelas_id;
        $siswa->address  = $request->address;
        $siswa->email    = $request->email;
        // $siswa->password = \Hash::make($request->password);
        $siswa->phone    = $request->phone;

        $photo = $request->file('photo');

        if($photo){
        if($siswa->photo && file_exists(storage_path('app/public/' . $siswa->photo))){
            \Storage::delete('public/'. $siswa->photo);
        }

        $new_cover_path = $photo->store('images/siswa', 'public');

        $siswa->photo = $new_cover_path;
        }


        // dd($siswa);
        if ( $siswa->save()) {

            return redirect()->route('admin.siswa')->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->back()->with('error', 'Data failed to update');
    
           }
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

         return redirect()->route('admin.siswa')->with('success', 'Data has been delete');
    }
    
    
    public function dashboard()
    {
        return view ('siswa.dashboard');
    }

    public function file()
    {
         $file = File::orderBy('id','desc')->get();
        return view('siswa.file.index',compact('file'));
    }

    public function unduh($id)
    {

        $file = File::findOrFail($id);
        $file->download++;
        $file->save();

        // $old = $file->download;

        // $new = $old + 1;
    
        // $file->download = DB::table('files')->increment('download');
    
        // $file->update();

        // dd($file);
        $file_path = public_path('storage/'.$file->file);
    return response()->download($file_path);
    }

    public function editprofile($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('siswa.profile.edit',compact('siswa'));
    }

    public function updateprofile(Request $request, $id)
    {
        $siswa           = Siswa::findOrFail($id);
        $siswa->nis      = $request->nis;
        $siswa->name     = $request->name;
        $siswa->gender   = $request->gender;
        $siswa->birth_p  = $request->birth_p;
        $siswa->birth_d  = $request->birth_d;
        $siswa->address  = $request->address;
        $siswa->email    = $request->email;
        // $siswa->password = \Hash::make($request->password);
        $siswa->phone    = $request->phone;

        $photo = $request->file('photo');

        if($photo){
        if($siswa->photo && file_exists(storage_path('app/public/' . $siswa->photo))){
            \Storage::delete('public/'. $siswa->photo);
        }

        $new_cover_path = $photo->store('images/siswa', 'public');

        $siswa->photo = $new_cover_path;
        }


        // dd($siswa);
        if ( $siswa->save()) {

            return redirect()->back()->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->back()->with('error', 'Data failed to update');
    
           }
    }
}
