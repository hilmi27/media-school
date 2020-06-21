@extends('layouts.front')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Gallery</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gallery-container">

          <div class="col-lg-4 col-md-6 gallery-item filter-app">
            <div class="gallery-wrap">
              <img src="{{ asset('storage/images/logo/DmLFd8shnOY6QTSdZUKGbO5cW2FIiaSdxnjYLR6h.png') }}" class="img-fluid" alt="">
              <div class="gallery-info">
                <div class="gallery-links">
                  <a href="{{ asset('storage/images/logo/DmLFd8shnOY6QTSdZUKGbO5cW2FIiaSdxnjYLR6h.png') }}" data-gall="galleryGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                </div>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-6 gallery-item filter-app">
            <div class="gallery-wrap">
              <img src="{{ asset('storage/images/logo/DmLFd8shnOY6QTSdZUKGbO5cW2FIiaSdxnjYLR6h.png') }}" class="img-fluid" alt="">
              <div class="gallery-info">
                <div class="gallery-links">
                  <a href="{{ asset('storage/images/logo/DmLFd8shnOY6QTSdZUKGbO5cW2FIiaSdxnjYLR6h.png') }}" data-gall="galleryGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                </div>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-6 gallery-item filter-app">
            <div class="gallery-wrap">
              <img src="{{ asset('storage/images/logo/DmLFd8shnOY6QTSdZUKGbO5cW2FIiaSdxnjYLR6h.png') }}" class="img-fluid" alt="">
              <div class="gallery-info">
                <div class="gallery-links">
                  <a href="{{ asset('storage/images/logo/DmLFd8shnOY6QTSdZUKGbO5cW2FIiaSdxnjYLR6h.png') }}" data-gall="galleryGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                </div>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-6 gallery-item filter-app">
            <div class="gallery-wrap">
              <img src="{{ asset('storage/images/logo/DmLFd8shnOY6QTSdZUKGbO5cW2FIiaSdxnjYLR6h.png') }}" class="img-fluid" alt="">
              <div class="gallery-info">
                <div class="gallery-links">
                  <a href="{{ asset('storage/images/logo/DmLFd8shnOY6QTSdZUKGbO5cW2FIiaSdxnjYLR6h.png') }}" data-gall="galleryGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our gallery Section -->

  </main><!-- End #main -->
@endsection