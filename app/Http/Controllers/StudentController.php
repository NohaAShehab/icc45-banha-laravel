<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
# use current logged in user 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



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

        
        # get current logged in user on system 
        // dd(Auth::user());
        // dd(Auth::id());
        //
        // dd($_POST,$request);
        // dd("Here");
        $image_path = null;
   
        if($request->hasfile('image')){
            $image = $request->image;
            $image_path = $image->store("images", 'student_images');
        }
        $request_data = $request->all();
        $request_data['creator_id']= Auth::id();
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

        // if($student->creator_id === Auth::id()){
        
        //     $student->delete();
        //     return to_route("students.index")->with("success", "Student deleted successfully");
        // }
        // else{
        //     return to_route("students.index")->with("error", "You are not the owner of this student to delete it ");

        // }

        if (! Gate::allows('delete-student', $student)) {
            abort(403);
            # you are not authorized to do this action 
        }

        $student->delete();
        return to_route("students.index")->with("success", "Student deleted successfully");


    }
}
