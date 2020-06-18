@extends('layouts.admin')

@section('content')
       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Guru</h1>
    
       @if (session('success'))

        <div class="alert alert-success">

        {{ session('success') }}

        </div>

        @endif
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
         <div class="card-header py-3">
           <a href="{{ route('admin.guru.create') }}" class="btn btn-success">Create Data</a>
         </div>
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                 <tr>
                   <th>No.</th>
                   <th>Name</th>
                   <th>Study</th>
                   <th>Address</th>
                   <th>Phone</th>
                   <th>Option</th>
                 </tr>
               </thead>
              
               <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($guru as $guru)
               
                 <tr>
                   <td>{{ ++$no }}</td>
                   <td>{{ $guru->name }}</td>
                   <td>{{ $guru->study }}</td>
                   <td>{{ $guru->address }}</td>
                   <td>{{ $guru->phone }}</td>
                   <td>
                    <a href="{{route('admin.guru.edit', [$guru->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                    <form method="POST" action="{{route('admin.guru.destroy', [$guru->id])}}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
        
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