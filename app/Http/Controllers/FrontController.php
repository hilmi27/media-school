<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homepage()
    {
        return view('home');
    }

    public function about()
    {
        return view ('about');
    }

    public function guru()
    {
        return view('guru');
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
