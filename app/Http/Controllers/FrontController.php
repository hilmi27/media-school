<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{About, Guru, Pengumuman};

class FrontController extends Controller
{
    public function homepage()
    {
        return view('home');
    }

    public function about()
    {
        $about = About::find(1);
        return view ('about',compact('about'));
    }

    public function guru()
    {
        $gurus = Guru::orderBy('name','asc')->paginate(9);
        return view('guru',compact('gurus'));
    }

    public function agenda()
    {
        return view('agenda');
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::orderBy('date','desc')->paginate(8);
        return view('pengumuman',compact('pengumuman'));
    }

    public function pengumumanshow($slug)
    {
        $pengumuman = Pengumuman::where('slug',$slug)->first();
        return view('pengumumanshow',compact('pengumuman'));
    }

    public function kontak()
    {
        return view ('kontak');
    }
}
