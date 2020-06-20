@extends('layouts.front')

@section('content')
<main id="main">
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Pengumuman: {{ $pengumuman->title }}</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Cource Details Section ======= -->
  <section id="pengumuman-details" class="pengumuman-details">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-8">
            @if (!empty($pengumuman->cover))
            <img src="{{asset('storage/' . $pengumuman->cover)}}" class="img-fluid" alt="">
            @else
            {{-- <div class="panel panel-default">
                <h2>{{ Carbon\Carbon::parse($pengumuman->date)->format("d F, Y") }}</h2>
            </div> --}}
            <div class="card">
                <div class="card-header">
                  Pengumuman
                </div>
                <div class="card-body">
                  <h2 class="card-title">{{ Carbon\Carbon::parse($pengumuman->date)->format("d F, Y") }}</h2>
                </div>
              </div>
            @endif
          
          <br>
          <p>
              {!! $pengumuman->desc !!}
          </p>
        </div>
        <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Pengumuman Terbaru</h3>
              <div class="sidebar-item recent-posts">

                @foreach ($pengumumans as $pengumuman)
                    
                <div class="post-item clearfix">
                  <img src="{{asset('storage/' . $pengumuman->cover)}}" alt="">
                  <h4><a href="{{route('pengumumanshow',$pengumuman->slug)}}">{{ substr($pengumuman->title,0,50) }}....</a></h4>
                  <time datetime="2020-01-01">{{ Carbon\Carbon::parse($pengumuman->created_at)->format("d F, Y") }}</time>
                </div>

                @endforeach

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->
      </div>

    </div>
  </section><!-- End Cource Details Section -->

  </main><!-- End #main -->
@endsection