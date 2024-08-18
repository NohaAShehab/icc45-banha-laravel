<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;


class StudentController extends Controller
{
    //
   private  $students = [
    ["id"=>1,"name" => "John Doe", "email" => "john@doe.com", "image"=>'pic1.png'],
    ["id"=>2,"name" => "abc Doe", "email" => "abc@doe.com","image"=>'pic2.png'],
    ["id"=>3,"name" => "Jim Doe", "email" => "jim@doe.com",'image'=>'pic3.png'],
    ["id"=>4,"name" => "Jm Doe", "email" => "jm@doe.com",'image'=>'pic4.png'],
    ];

    function index (){

        # direct connect to the database using query builder
//        $students = DB::table('students')->get();
//        dd($students[0]);
//        return $students;

        # *** use model class
        $students = Student::all();
//        dd($students); # print details of var then stop exexution

            # collection of model objects
        return view('students.index', ['students'=>$students]);
    }

    function show($id){
//        foreach($this->students as $student){
//            if($student['id'] == $id){
//                return view('students.show', ['student'=>$student]);
//            }
//        }
//        return view('notfound');
//        $student = Student::find($id); # accept id
//        if($student) {
//            return view('students.show', ['student' => $student]);  # I am send model object\
//        }
//        else {
//            return view('notfound');
//        }
        $student = Student::findorfail($id); # accept id if exists return object if not return 404 not found
        return view('students.show', ['student' => $student]);  # I am send model object\
    }

    function destroy($id){
        # 1- get object
        $student = Student::find($id);
//
        #2- destroy
        $student->delete();
        return to_route('students.index');
        // return 'removed';
    }


    function create(){
        return view('students.create');
    }

    function store()
    {
        # you need to have validation on form ??
        # define validation rules and customize error messsage
        request()->validate([
            'name' => 'required|min:3',
            'gender' => 'required',
            'email' => 'required|email|unique:App\Models\Student,email'

        ], [
            'name.required' => 'Student name is required.',
            'name.min' => 'Student name must be at least 3 characters.',
            'gender.required' => 'No student without gender.',
            'email.required' => 'Student email is required.',
            'email.email' => 'Student email must be a valid email.',
            'email.unique' => 'there is another student with the same email'
        ] // messages
        );

//        dd(request()->all());
        $data = request()->all();
        $name = $data['name'];
        $email = $data['email'];
        $image = $data['image'];
        $gender = $data['gender'];
        $grade = $data['grade'];
        ### use this data to create object
        $student = new Student();
        $student->name= $name;
        $student->email= $email;
        $student->image= $image;
        $student->grade= $grade;
        $student->gender= $gender;
        $student->save();

//        return "Data received";
        return to_route('students.index');
    }

    function edit($id){
        // return view of edit
        $student = Student::findOrfail($id);
        return view('students.edit', ['student' => $student]);
    }

    function update($id){
        $student = Student::findOrfail($id);

        $data = request()->all();
//        dump($data);
        $name = $data['name'];
        $email = $data['email'];
        $image = $data['image'];
        $gender = $data['gender'];
        $grade = $data['grade'];

        #### use $student object --> to save data to it.
    }
}

