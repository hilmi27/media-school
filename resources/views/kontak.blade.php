@extends('layouts.front')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Hubungi Kami</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="{{ $general->gmaps }}" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Alamat:</h4>
                <p>{{ $general->address }}</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $general->email }}</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telephone:</h4>
                <p>{{ $general->phone }}</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
  
            @if (session('success'))

            <div class="alert alert-success">

              {{ session('success') }}

            </div>

            @endif
             <form action="{{ route('message') }}" method="post" >
             
              @csrf
             
              <div class="form-row">
            
                <div class="col-md-6 form-group" style="padding-bottom: 8px;">
            
                  <input type="text" name="name" class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " id="name" placeholder="Your Name" value="{{old('name')}}" required>
            
                  <div class="invalid-feedback">
                  
                    {{ $errors->first('name') }}    
                
                  </div> 

                </div>
            
                <div class="col-md-6 form-group" style="padding-bottom: 8px;">
            
                  <input type="email" class="form-control {{$errors->first('email') ? "is-invalid" : "" }} " name="email" id="email" placeholder="Your Email" value="{{old('email')}}" required>
            
                  <div class="invalid-feedback">
                
                    {{ $errors->first('email') }}    
                
                  </div> 

                </div>
            
              </div>
            
              <div class="form-group" style="padding-bottom: 8px;">
            
                <input type="text" class="form-control {{$errors->first('subject') ? "is-invalid" : "" }} " name="subject" id="subject" placeholder="Subject" value="{{old('subject')}}" required>
            
                <div class="invalid-feedback">
              
                  {{ $errors->first('subject') }}    
              
                </div> 

              </div>
            
              <div class="form-group" style="padding-bottom: 8px;">
            
                <textarea class="form-control {{$errors->first('body') ? "is-invalid" : "" }} " name="body" rows="5" placeholder="Message" required>{{old('body')}}</textarea>
            
                <div class="invalid-feedback">
              
                  {{ $errors->first('body') }}    
              
                </div> 

              </div>
          
              <div class="text-center">
                <button type="submit" style="background: #d9232d; border: 0; padding: 10px 24px; color: #fff; transition: 0.4s; border-radius: 4px;">Send Message</button>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->    
@endsection