<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $students=  Student::all();
        //
        // return Student::all();
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



            # generate validator object ??

            $std_validator = Validator::make($request->all(),[
                'name'=>[
                    'required',
                    'min:3',
    
                ],
                'email'=>'required|unique:students,email',
                'image'=>'mimes:jpeg,jpg,png,gif',
                'gender'=>['required', Rule::in(['male', 'female'])],
                'grade'=>'required|numeric',
            ]);

            if($std_validator->fails()){
                return response()->json(
                    [
                        'validation_errors'=> $std_validator->errors(),
                        "message"=> "please review your inputs",
                        'typealert'=> 'danger'
                    ], 422
                );
            }

        // return $request->all();
        //
        # create new object 

        $image_path = null;
        // dd($request->user());

        if($request->hasfile('image')){
            $image = $request->image;
            $image_path = $image->store("images", 'student_images');
        }
        $request_data = $request->all();
        // $request_data['image']= asset('images/students/'.$image_path);
        $request_data['image']= $image_path;
        $student = Student::create($request_data);
        return new StudentResource( $student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
       // return $student;
       return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //

        // return $request->all();

        $std_validator = Validator::make($request->all(),[
            'name'=>[
                'required',
                'min:3',

            ],
            'email'=>["required", "email",
                    Rule::unique('students')->ignore($student)],
            'image'=>'mimes:jpeg,jpg,png,gif',
            'gender'=>['required', Rule::in(['male', 'female'])],
            'grade'=>'required|numeric',
        ]);

        if($std_validator->fails()){
            return response()->json(
                [
                    'validation_errors'=> $std_validator->errors(),
                    "message"=> "please review your inputs",
                    'typealert'=> 'danger'
                ], 422
            );
        }

        $image_path = $student->image;
        if($request->hasfile('image')){
            $image = $request->image;
            $image_path = $image->store("images", 'student_images');
        }
        $request_data = $request->all();
        // $request_data['image']= asset('images/students/'.$image_path);
        $request_data['image']= $image_path;
        $student->update($request_data);
        return new StudentResource($student);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return 'deleted';
    }
}
