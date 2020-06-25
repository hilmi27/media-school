@extends('layouts.admin')

@section('content')
       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Siswa</h1>
    
       @if (session('success'))

        <div class="alert alert-success">

        {{ session('success') }}

        </div>

        @endif
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
         <div class="card-header py-3">
           <a href="{{ route('admin.siswa.create') }}" class="btn btn-success">Create Data</a>
         </div>
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                 <tr>
                   <th>No.</th>
                   <th>Name</th>
                   <th>Gender</th>
                   <th>Class</th>
                   <th>Address</th>
                   <th>Born Day</th>
                   <th>Phone</th>
                   
                   <th>Option</th>
                 </tr>
               </thead>
              
               <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($siswa as $siswa)
               
                 <tr>
                   <td>{{ ++$no }}</td>
                   <td>{{ $siswa->name }}</td>
                   <td>{{ $siswa->gender }}</td>
                   <td>{{ $siswa->kelas->name }}</td>
                   <td>{{ $siswa->address }}</td>
                   <td>{{ Carbon\Carbon::parse($siswa->birth_d)->format("d F, Y") }}</td>
                   <td>{{ $siswa->phone }}</td>
                   <td>
                    <a href="{{route('admin.siswa.edit', [$siswa->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                    <form method="POST" action="{{route('admin.siswa.destroy', [$siswa->id])}}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
        
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