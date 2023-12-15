
@extends('layouts.app')
  
@section('title', 'Student')
@section('contents')


    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Student</h1>

        
        <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
        
    </div>
    
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <!-- Topbar Search -->
<form action="{{ route('student.search')}}" method="GET"
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-2 my-2 my-md-0 mw-50">
    <div class="input-group">
        <input name="search" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
           >
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
<hr />

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @if($student->count() > 0)
                @foreach($student as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">{{ $rs->address }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->course }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{ route('student.edit', $rs->id)}}" type="button" class="btn btn-warning ">Edit</a>
                                <form action="{{ route('student.destroy', $rs->id)}}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
        
    </table>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    

    @endsection