@extends('layouts.app')
  
  @section('title', 'Edit Student')
    
  @section('contents')
      <h1 class="mb-0">Edit Student</h1>
      <hr />
      <form action="{{ route('student.update',$student->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
              <div class="col mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $student->name }}" >
              </div>
              <div class="col mb-3">
                  <label class="form-label">Address</label>
                  <input type="text" name="address" class="form-control" placeholder="Student Address" value="{{ $student->address }}" >
              </div>
          </div>
          <div class="row">
              <div class="col mb-3">
                  <label class="form-label">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Student Email" value="{{ $student->email }}" >
              </div>
              <div class="col mb-3">
                  <label class="form-label">Course</label>
                  <input type="text" name="course" class="form-control" placeholder="Student Course" value="{{ $student->course }}" >
              </div>
              
          </div>
          <div class="row">
              <div class="d-grid">
                  <button class="btn btn-warning">Update</button>
              </div>
          </div>
      </form>
  @endsection