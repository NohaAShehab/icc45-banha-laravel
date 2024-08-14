<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
//       return $this->students;
        return view('students.index', ['students'=>$this->students]);
    }

    function show($id){
        foreach($this->students as $student){
            if($student['id'] == $id){
                return view('students.show', ['student'=>$student]);
            }
        }
        return view('notfound');
    }
}
