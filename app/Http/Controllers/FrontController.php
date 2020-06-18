<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{About, Guru};

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
        return view('pengumuman');
    }

    public function kontak()
    {
        return view ('kontak');
    }
}
