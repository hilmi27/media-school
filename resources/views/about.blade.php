@extends('layouts.front')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Tentang Kami</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{asset('storage/' . $about->logo)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>{{ $about->title }}</h3>
         
            <p>
             {!! $about->desc !!}
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

 
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
         <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>
         <div id="accordion">

           @php
                $no = 0;
            @endphp

      @foreach ($faq as $faq)
          
      <div class="card">
        <div class="card-header" id="heading{{ $faq->id }}">
          <h5 class="mb-0">
           
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
              {{ ++$no }}. {{ $faq->question }}
            </button>
          </h5>
        </div>
    
        <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
          <div class="card-body">
            {{ $faq->answer }}
          </div>
        </div>
      </div>
 
      @endforeach

    </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection