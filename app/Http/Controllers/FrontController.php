<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{About, Guru, Pengumuman, Faq, Message, Subscribe, General, Link, Banner};

class FrontController extends Controller
{
    public function homepage()
    {
        $guru = Guru::orderBy('name','asc')->limit(6)->get();
        $about = About::find(1);
        $general = General::find(1);
        $newpengumuman = Pengumuman::orderBy('id','desc')->limit(5)->get();
        $link = Link::orderBy('id','asc')->get();
        $banner = Banner::orderBy('id','desc')->get();
        return view('home',compact('guru','about','newpengumuman','general','link','banner'));
    }

    public function about()
    {
        $about = About::find(1);
        $faq = Faq::orderBy('question','asc')->get();
        $general = General::find(1);
        $newpengumuman = Pengumuman::orderBy('id','desc')->limit(5)->get();
        $link = Link::orderBy('id','asc')->get();
        return view ('about',compact('about','faq','newpengumuman','general','link'));
    }

    public function guru()
    {
        $gurus = Guru::orderBy('name','asc')->paginate(9);
        $general = General::find(1);
        $newpengumuman = Pengumuman::orderBy('id','desc')->limit(5)->get();
        $link = Link::orderBy('id','asc')->get();
        return view('guru',compact('gurus','newpengumuman','general','link'));
    }

    public function agenda()
    {
        $newpengumuman = Pengumuman::orderBy('id','desc')->limit(5)->get();
        $general = General::find(1);
        $link = Link::orderBy('id','asc')->get();
        return view('agenda',compact('newpengumuman','general','link'));
    }

    public function pengumuman()
    {
        $pengumumans = Pengumuman::orderBy('date','desc')->paginate(8);
        $newpengumuman = Pengumuman::orderBy('id','desc')->limit(5)->get();
        $general = General::find(1);
        $link = Link::orderBy('id','asc')->get();
        return view('pengumuman',compact('newpengumuman','pengumumans','general','link'));
    }

    public function pengumumanshow($slug)
    {
        $pengumuman = Pengumuman::where('slug',$slug)->first();
        $pengumumans = Pengumuman::orderBy('id','desc')->limit(5)->get();
        $newpengumuman = Pengumuman::orderBy('id','desc')->limit(5)->get();
        $general = General::find(1);
        $link = Link::orderBy('id','asc')->get();
        return view('pengumumanshow',compact('pengumuman','pengumumans','newpengumuman','general','link'));
    }

    public function kontak()
    {
        $newpengumuman = Pengumuman::orderBy('id','desc')->limit(5)->get();
        $general = General::find(1);
        $link = Link::orderBy('id','asc')->get();
        return view ('kontak',compact('newpengumuman','general','link'));
    }

    public function message(Request $request)
    {
          \Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "subject" => "required",
            "body" => "required"    
        ])->validate();

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
