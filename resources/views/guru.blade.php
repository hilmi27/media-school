@extends('layouts.front')

@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Pengajar SMA Niki Tera</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          @foreach ($gurus as $guru)
              
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{asset('storage/' . $guru->photo)}}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>{{ $guru->name }}</h4>
                <span>{{ $guru->study }}</span>
              </div>
            </div>
          </div>

          @endforeach


        </div>
<div class="justify-content-center">
  {{ $gurus->links() }}
</div>

      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->
@endsection