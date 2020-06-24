@extends('layouts.front')

@section('content')
    <!-- ======= Hero Section ======= -->
  <section id="homecarousel" class="d-flex justify-content-center align-items-center">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">

          @foreach ($banner as $key => $banners)
              <div class="carousel-item {{$key == 0 ? 'active' : '' }}" >
            <img src="{{ asset('storage/'.$banners->cover) }}" class="d-block w-100" alt="..." style="height: 93vh">
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ $banners->title }}</h5>
              <p>{{ $banners->desc }}</p>
            </div>
          </div>
          @endforeach
        
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Mengapa Memilih Kami ?</h3>
              <p>
               {{substr(strip_tags($about->desc),0,200)}}
              </p>
              <div class="text-center">
                <a href="{{ route('about') }}" class="more-btn">Lanjutkan</a> <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Gratis</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Pengajar Berpengalaman</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Teknologi Terbaru</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Guru</h2>
          <p>Tenaga Pengajar Kami</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach ($guru as $guru)
              
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ asset('storage/'.$guru->photo) }}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>{{ $guru->name }}</h4>
                <span>{{ $guru->study }}</span>              
              </div>
            </div>
          </div>

          @endforeach

          

        </div>
      <a href="{{ route('guru') }}" class="btn btn-success rounded">Lihat Semua</a>
      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->
@endsection