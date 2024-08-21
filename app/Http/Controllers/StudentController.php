<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
       return view("students.index", ["students"=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
        dd($_POST,$request);
        // dd("Here");
        $image_path = null;
   
        if($request->hasfile('image')){
            $image = $request->image;
            $image_path = $image->store("images", 'student_images');
        }
        $request_data = $request->all();
        $request_data['image']= $image_path;
        // dd($request_data);
        $student = Student::create($request_data);

        return to_route("students.show", $student);

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return view("students.show", ['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return to_route("students.index")->with("success", "Student deleted successfully");
    }
}
