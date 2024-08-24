<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{

    function __construct()
    {
        $this->middleware("auth:sanctum")->only(["store", "update", "destroy"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $students=  Student::all();
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        # only authenticated users can store new student

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

        $image_path = null;

        if($request->hasfile('image')){
            $image = $request->image;
            $image_path = $image->store("images", 'student_images');
        }
        $request_data = $request->all();
//        return $request_data;
//        return Auth::id();
        $request_data['image']= $image_path;
        $request_data['creator_id'] = Auth::id();
        $student = Student::create($request_data);
        return new StudentResource( $student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
//        dd($student);
//        return $student;
        return new StudentResource($student);
//        if($student) {
//            return new StudentResource($student);
//        }
//        return response()->json([
//            'message' => 'Student not found',
//
//        ],204);
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
//        return 'deleted';
        return response()->json([
            "message"=>"object deleted successfully"
        ],204);
    }
}
