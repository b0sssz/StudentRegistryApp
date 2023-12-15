<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;


class StudentController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $student = Student::where('name','LIKE','%' .$request->search.'%')
            ->orWhere('email','LIKE','%' .$request->search.'%')
            ->paginate (5);
            

          
        }else{
            $student = Student::paginate(5);
        }

      


       return view('student.index',compact('student'));
    }

  

    

    //create
    public function create(){
        return view ('student.create');
    }

    //store
    public function store(Request $request){
        Student::create($request->all());
        return redirect()->route('student')->with('success',"Student added successfully");
    }

    //edit
    public function edit(string $id){
        $student = Student::findOrFail($id);

        return view('student.edit',compact('student'));
    }

    //update
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
  
        $student->update($request->all());
  
        return redirect()->route('student')->with('success', 'student updated successfully');
    }
  
    //remove
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
  
        $student->delete();
  
        return redirect()->route('student')->with('success', 'student deleted successfully');
    }

    //import
    public function import(Request $request){

        $student =   Excel::import(new StudentImport,$request->file('file'));
       // dd($request->file('file'));
       return redirect()->route('student')->with('success', 'student import successfully');
    }
}
