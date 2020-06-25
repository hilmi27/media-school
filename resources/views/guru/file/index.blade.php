@extends('layouts.guru')

@section('content')
  <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">File</h1>
    
       @if (session('success'))

        <div class="alert alert-success">

        {{ session('success') }}

        </div>

        @endif
    <div class="card shadow mb-4">

    <div class="card-header py-3">

        <a href="{{ route('guru.file.create') }}" class="btn btn-success">Create File</a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                    <tr>

                        <th>No.</th>

                        <th>Title</th>

                        <th>Desc</th>

                        <th>Class</th>

                        <th>By</th>

                        <th>Option</th>

                    </tr>

                </thead>

                <tbody>

                @php
                
                $no=0;
                
                @endphp
                
                @foreach ($file as $file)
                     
                    <tr> 
             
                        <td>{{ ++$no }}</td>  
                
                        <td>{{ $file->title }}</td> 
                        
                        <td>{{ Str::limit( strip_tags( $file->desc ), 50 ) }}...</td>   

                        <td>{{ $file->class }}</td>

                        <td>{{ $file->by }}</td>
                
                        <td>    
                
                            <a href="{{route('admin.file.edit', [$file->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                            <form method="POST" action="{{route('admin.file.destroy', [$file->id])}}" class="d-inline" onsubmit="return confirm('Delete this file permanently?')">
                
                                @csrf
                
                                <input type="hidden" name="_method" value="DELETE">
                
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                
                            </form>
                
                        </td>
            
                    </tr>
            
                    @endforeach
        
                </tbody>
    
            </table>

        </div>

    </div>

</div>
@endsection