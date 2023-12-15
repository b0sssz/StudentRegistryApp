@extends('layouts.app')
  
@section('title', 'Student')
  
@section('contents')
    <h1 class="mb-0">Add Student</h1>
    <hr />
    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
        <div class="col">
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
          
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
            <div class="col">
                <input type="text" name="course" class="form-control"  placeholder="Study Course">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection