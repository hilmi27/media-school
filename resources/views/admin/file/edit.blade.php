@extends('layouts.admin')

@section('content')
    @section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.file.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container">

        <div class="form-group ml-5">

            <label for="title" class="col-sm-2 col-form-label">Title</label>

            <div class="col-sm-7">

                <input type="text" name='title' class="form-control {{$errors->first('title') ? "is-invalid" : "" }} " value="{{old('title')}}" id="title" placeholder="Title">

                <div class="invalid-feedback">
                    {{ $errors->first('title') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="desc" class="col-sm-2 col-form-label">Desc</label>

            <div class="col-sm-7">

                <textarea name="desc" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} "  id="summernote" cols="30" rows="10">{{old('desc')}}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('desc') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="class" class="col-sm-2 col-form-label">Class</label>

            <div class="col-sm-7">

                {{-- <input type="text" name='class' class="form-control {{$errors->first('class') ? "is-invalid" : "" }} " value="{{old('class')}}" id="class" placeholder="Class"> --}}

                <select name="class" id="" class="form-control {{$errors->first('class') ? "is-invalid" : "" }} ">
                
                <option selected disabled>Choose One!</option>

              @foreach ($kelas as $kelas)
                  <option {{ $kelas->id == $file->kelas_id ? 'selected' : '' }} value="{{ $file->kelas_id }}">{{ $file->name }}</option>
              @endforeach

                </select>
                <div class="invalid-feedback">
                    {{ $errors->first('class') }}    
                </div>   

            </div>

        </div>

         <div class="form-group ml-5">

            <label for="by" class="col-sm-2 col-form-label">By</label>

            <div class="col-sm-7">

                <input type="text" name='by' class="form-control {{$errors->first('by') ? "is-invalid" : "" }} " value="{{old('by')}}" id="by" placeholder="By">

                <div class="invalid-feedback">
                    {{ $errors->first('by') }}    
                </div>   

            </div>

        </div>

         <div class="form-group ml-5">

            <label for="file" class="col-sm-2 col-form-label">File</label>

            <div class="col-sm-7">

                <input type="file" name='file' class="form-control {{$errors->first('file') ? "is-invalid" : "" }} " value="{{old('file')}}" id="file">

                <div class="invalid-feedback">
                    {{ $errors->first('file') }}    
                </div>   

            </div>

        </div>

   
        <div class="form-group ml-5">
   
            <div class="col-sm-3">
   
                <button type="submit" class="btn btn-primary">Create</button>
   
            </div>
   
        </div>

    </div>      

  </form>
@endsection
@endsection