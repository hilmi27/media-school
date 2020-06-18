@extends('layouts.front')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Pengumuman</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="pengumuman" class="pengumuman">
      <div class="container" data-aos="fade-up">

        <div class="row">

          @foreach ($pengumuman as $data)
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{asset('storage/' . $data->cover)}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $data->title }}</h5>
                  <p class="card-text">{{ Str::limit( strip_tags( $data->desc ), 50 ) }}</p>
                  <a href="{{ route('pengumumanshow',$data->slug) }}" class="btn btn-success btn-sm">Lihat</a>
                  <p class="card-text"><small class="text-muted">Last updated {{ $data->updated_at->diffForHumans() }}</small></p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>

        <div class="pagination justify-content-center">
        {{ $pengumuman->links() }}
      </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection