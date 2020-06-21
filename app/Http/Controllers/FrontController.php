<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{About, Guru, Pengumuman, Faq, Message, Subscribe};

class FrontController extends Controller
{
    public function homepage()
    {
        return view('home');
    }

    public function about()
    {
        $about = About::find(1);
        $faq = Faq::orderBy('question','asc')->get();
        return view ('about',compact('about','faq'));
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
        $pengumumans = Pengumuman::orderBy('id','desc')->limit(5)->get();
        return view('pengumumanshow',compact('pengumuman','pengumumans'));
    }

    public function kontak()
    {
        return view ('kontak');
    }

    public function message(Request $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->body = $request->body;
        $message->save();

        return redirect()->back()->with('success','message sent successfully');

    }

    public function subscribe(Request $request)
    {
        $subs = new Subscribe();
        $subs->email = $request->email;
        $subs->save();
        return redirect()->back()->with('subssuccess','You have successfully subscribed');
    }
    public function gallery()
    {
        return view('gallery');
    }
}
