@extends('layouts.app')

@section('title')
   student
@endsection

@section('content')

    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/students/'.$student->image)}}" class="card-img-top" alt="...">
        <img src ="{{$student->image}}" width=100 height=100> 
        <div class="card-body">
            <h5 class="card-title">{{$student->name}}</h5>
            <p class="card-text"> {{$student->email}}</p>
            <p class="card-text"> {{$student->department_id }}</p>
            <p class="card-text"> {{$student->department ? $student->department->name: "None" }}</p>
            <a href="{{route('students.index')}}" class="btn btn-primary">Back to all students</a>
        </div>

        <form method='post' action="{{route('students.destroy', $student)}}">
                        @csrf 
                        @method('delete') 

                        <input type='submit' class='btn btn-danger' onclick="return confirm('are you sure do you want to delete')"
                            value='Delete'
                        >


                    </form> 
    </div>


 


@endsection