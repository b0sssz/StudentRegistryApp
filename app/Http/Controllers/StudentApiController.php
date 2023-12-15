<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentApiController extends Controller
{
    public function index(){
        $student = Student::all();

        return StudentResource::collection($student);

    }
}
