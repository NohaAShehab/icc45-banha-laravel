@extends('layouts.app')

@section('title')
    All Students
@endsection

@section('content')
    <h1> Add new Student </h1>

    <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" value="{{$student->name}}"
                   class="form-control"  aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{$student->email}}"
                   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="text" name="image" value="{{$student->image}}"
                   class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Grade</label>
            <input type="number" name="grade" value="{{$student->grade}}"
                   class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Gender</label>
            @if($student->gender==='male')
            <input type="radio" name="gender" value="male" id="male"
                  aria-describedby="emailHelp" checked>
            <label  for="male" class="form-label">Male</label>

            <input type="radio" name="gender" value="female" id="female"
                     aria-describedby="emailHelp">
            <label  for="female" class="form-label">Female</label>
            @elseif($student->gender=='female')
                <input type="radio" name="gender" value="male" id="male"
                       aria-describedby="emailHelp" >
                <label  for="male" class="form-label">Male</label>

                <input type="radio" name="gender" value="female" id="female"
                       aria-describedby="emailHelp" checked>
                <label  for="female" class="form-label">Female</label>
            @else
                <input type="radio" name="gender" value="male" id="male"
                       aria-describedby="emailHelp" >
                <label  for="male" class="form-label">Male</label>

                <input type="radio" name="gender" value="female" id="female"
                       aria-describedby="emailHelp">
                <label  for="female" class="form-label">Female</label>
            @endif

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
