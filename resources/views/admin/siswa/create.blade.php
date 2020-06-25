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

<form action="{{ route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data">
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

        <label for="nis" class="col-sm-2 col-form-label">NIS</label>

        <div class="col-sm-7">

            <input type="number" name='nis' class="form-control {{$errors->first('nis') ? "is-invalid" : "" }} " value="{{old('nis')}}" id="nis" placeholder="NIS">

            <div class="invalid-feedback">
                {{ $errors->first('nis') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="name" class="col-sm-2 col-form-label">Name</label>

        <div class="col-sm-7">

            <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name')}}" id="name" placeholder="Cahyo">

            <div class="invalid-feedback">
                {{ $errors->first('name') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="kelas_id" class="col-sm-2 col-form-label">Class</label>

        <div class="col-sm-7">

            <select name="kelas_id" id="kelas_id" class="form-control {{$errors->first('kelas_id') ? "is-invalid" : "" }} ">
                <option selected disabled>Choose One</option>

                @foreach ($kelas as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                @endforeach
            </select>
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

        <label for="birth_p" class="col-sm-2 col-form-label">Tempat Lahir</label>

        <div class="col-sm-7">

            <input type="text" name='birth_p' class="form-control {{$errors->first('birth_p') ? "is-invalid" : "" }} " value="{{old('birth_p')}}" id="birth_p" placeholder="Banyuwangi">

            <div class="invalid-feedback">
                {{ $errors->first('birth_p') }}    
            </div>   

        </div>

    </div>

    <div class="form-group ml-5">

        <label for="birth_d" class="col-sm-2 col-form-label">Tanggal Lahir</label>

        <div class="col-sm-7">

            <input type="date" name='birth_d' class="form-control {{$errors->first('birth_d') ? "is-invalid" : "" }} " value="{{old('birth_d')}}" id="birth_d" >

            <div class="invalid-feedback">
                {{ $errors->first('birth_d') }}    
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

        <label for="password" class="col-sm-2 col-form-label">Password</label>

        <div class="col-sm-7">

            <input type="password" name='password' class="form-control {{$errors->first('password') ? "is-invalid" : "" }} " value="{{old('password')}}" id="password" placeholder="password">

            <div class="invalid-feedback">
                {{ $errors->first('password') }}    
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