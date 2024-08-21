<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
# use current logged in user 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateStudentRequest;


class StudentController extends Controller
{

    # use middleware auth 

    // function __construct(){
    //     $this->middleware('auth')->except(['index']);
    // }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
       return view("students.index", ["students"=>$students]);
        // return $students;
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
        // dd($request->user());

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
        // return [$student];

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        return view("students.edit", ["student"=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        
        # request object contains current logged in user 

        // dd($request->user());
        //

        if($request->user()->cannot('update', $student)){
                abort(403);
        }
        $image_path = $student->image;
   
        if($request->hasfile('image')){
            $image = $request->image;
            $image_path = $image->store("images", 'student_images');
        }
        $request_data = $request->all();
        $request_data['creator_id']= Auth::id();
        $request_data['image']= $image_path;
        $student->update($request_data);
        return to_route("students.index");
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
