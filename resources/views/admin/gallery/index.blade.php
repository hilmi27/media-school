@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Gallery</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">Add Photo</a>

        <a href="{{ route('admin.album.createalbum') }}" class="btn btn-success">Create Album</a>

    </div>

    <div class="card-body">

    <div class="row row-cols-1 row-cols-md-3">

        @foreach ($gallery as $gallery)
            
        <div class="col mb-4">

            <div class="card" style="width: 18rem;">

                <img src="{{ asset('storage/'.$gallery->photo) }}" class="card-img-top" alt="..." height="200px" width="200px">

                <div class="card-body">

                    <a href="#" class="btn btn-primary btn-sm card-link">Edit</a>

                    <a href="#" class="btn btn-danger btn-sm card-link">Delete</a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    </div>

</div> 

<div class="card shadow mb-4">   

    <div class="card-body">
    
        <h1 class="h3 mb-2 text-gray-800">Album: </h1>

        @foreach ($album as $album)

        <button type="button" class="btn btn-primary">

            {{ $album->name }} <span class="badge badge-light">8</span>

        </button>
        @endforeach

    </div>

</div>
@endsection