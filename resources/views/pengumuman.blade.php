@extends('layouts.front')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Pengumuman</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="pengumuman" class="pengumuman">
      <div class="container" data-aos="fade-up">

        <div class="row">

          @foreach ($pengumumans as $data)
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                @if (!empty($data->cover))
                  <img src="{{asset('storage/' . $data->cover)}}" class="card-img" alt="...">
                @else
                {{-- <div class="card"> --}}
                  <div class="card-body card-img align-self-center mr-3">
                    <h2 class="card-title">{{ Carbon\Carbon::parse($data->date)->format("d M, Y") }}</h2>
                  </div>
                {{-- </div> --}}
                @endif
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ Str::limit(strip_tags($data->title), 30) }}</h5>
                  <p class="card-text">{{ Str::limit( strip_tags( $data->desc ), 40 ) }}</p>
                  <a href="{{ route('pengumumanshow',$data->slug) }}" class="btn btn-success btn-sm">Lihat</a>
                  <p class="card-text"><small class="text-muted">Last updated {{ $data->updated_at->diffForHumans() }}</small></p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>

        <div class="pagination justify-content-center">
        {{ $pengumumans->links() }}
      </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection