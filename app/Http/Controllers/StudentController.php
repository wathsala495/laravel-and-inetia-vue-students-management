<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentZrequest;
use App\Http\Requests\updateStudentrequest;
use App\Http\Resources\ClassesResource;
use App\Http\Resources\SectionResource;
use App\Http\Resources\StudentResource;
use App\Models\Classes;
use App\Models\Sections;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = StudentResource::collection(
            Students::paginate(10)
        );
        return inertia('Students/Index',[
            'students'=>$students
        ]);
    }
    public function create(){
        $classes=ClassesResource::collection(Classes::all());
        // $sections=SectionResource::collection(Sections::all());
        return inertia('Students/Create',[
            'classes'=>$classes,
            
        ]);
    }

    public function store(StoreStudentZrequest $request){
             Students::create($request->validated());
             return redirect()->route('students.index')->with('message','Student Added Successfully');
    }
    public function edit(Students $student){
        $classes=ClassesResource::collection(Classes::all());
        return inertia('Students/Edit',[
            'classes'=>$classes,
            'student'=>StudentResource::make($student)
        ]);
    }
    public function update(updateStudentrequest $request,Students $students){
        $students->update($request->validated());
        return redirect()->route('students.index')->with('message','Student Added Successfully');

    }
}
