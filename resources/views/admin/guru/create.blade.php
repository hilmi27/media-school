@extends('layouts.admin')

@section('styles')
<style>
   .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}
 .picture {
  width: 300px;
  height: 400px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  /* border-radius: 50%; */
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
}
.picture:hover {
  border-color: #2ca8ff;
}
.picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.picture-src {
  width: 100%;
  height: 100%;
}
</style>

@endsection

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">

        <div class="picture-container">

            <div class="picture">

                <img src="" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>

                <input type="file" id="wizard-picture" name="photo" class="form-control {{$errors->first('photo') ? "is-invalid" : "" }} ">

                <div class="invalid-feedback">
                    {{ $errors->first('photo') }}    
                </div>  

            </div>

            <h6>Pilih Foto</h6>

        </div>

    </div>   

    <div class="form-group ml-5">

        <label for="nip" class="col-sm-2 col-form-label">NIP</label>

        <div class="col-sm-7">

            <input type="number" name='nip' class="form-control {{$errors->first('nip') ? "is-invalid" : "" }} " value="{{old('nip')}}" id="nip" placeholder="NIP">

            <div class="invalid-feedback">
                {{ $errors->first('nip') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="name" class="col-sm-2 col-form-label">Name</label>

        <div class="col-sm-7">

            <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name')}}" id="name" placeholder="PT. Angin Ribut">

            <div class="invalid-feedback">
                {{ $errors->first('name') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="study" class="col-sm-2 col-form-label">Mata Pelajaran</label>

        <div class="col-sm-7">

            <input type="text" name='study' class="form-control {{$errors->first('study') ? "is-invalid" : "" }} " value="{{old('study')}}" id="study" placeholder="Fisika">

            <div class="invalid-feedback">
                {{ $errors->first('study') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="gender" class="col-sm-2 col-form-label">Gender</label>

        <div class="col-sm-7">

            <select name="gender" id="" class="form-control {{$errors->first('gender') ? "is-invalid" : "" }} ">

                <option selected disabled>Pilih Gender</option>

                <option value="Laki-laki">Laki-laki</option>

                <option value="Perempuan">Perempuan</option>

            </select>

            <div class="invalid-feedback">
                {{ $errors->first('gender') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="p_birth" class="col-sm-2 col-form-label">Tempat Lahir</label>

        <div class="col-sm-7">

            <input type="text" name='p_birth' class="form-control {{$errors->first('p_birth') ? "is-invalid" : "" }} " value="{{old('p_birth')}}" id="p_birth" placeholder="Banyuwangi">

            <div class="invalid-feedback">
                {{ $errors->first('p_birth') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="d_birth" class="col-sm-2 col-form-label">Tanggal Lahir</label>

        <div class="col-sm-7">

            <input type="date" name='d_birth' class="form-control {{$errors->first('d_birth') ? "is-invalid" : "" }} " value="{{old('d_birth')}}" id="d_birth" placeholder="Banyuwangi">

            <div class="invalid-feedback">
                {{ $errors->first('d_birth') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="address" class="col-sm-2 col-form-label">Address</label>

        <div class="col-sm-7">

            <input type="text" name='address' class="form-control {{$errors->first('address') ? "is-invalid" : "" }} " value="{{old('address')}}" id="address" placeholder="Kota Ngastino">

            <div class="invalid-feedback">
                {{ $errors->first('address') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="phone" class="col-sm-2 col-form-label">Phone</label>

        <div class="col-sm-7">

            <input type="number" name='phone' class="form-control {{$errors->first('phone') ? "is-invalid" : "" }} " value="{{old('phone')}}" id="phone" placeholder="62121221211">

            <div class="invalid-feedback">
                {{ $errors->first('phone') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="email" class="col-sm-2 col-form-label">E-mail</label>

        <div class="col-sm-7">

            <input type="email" name='email' class="form-control {{$errors->first('email') ? "is-invalid" : "" }} " value="{{old('email')}}" id="email" placeholder="example@mail.com">

            <div class="invalid-feedback">
                {{ $errors->first('email') }}    
            </div>   

        </div>

    </div>

      <div class="form-group ml-5">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
      </div>
  </form>
@endsection

@push('scripts')
<script>
    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
      readURL(this);
  });
  //Function to show image before upload
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
      }
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
  
@endpush