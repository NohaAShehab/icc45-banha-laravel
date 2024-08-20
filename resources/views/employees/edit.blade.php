@extends('layouts.app')

@section('title')
    All employees
@endsection

@section('content')

    <h1> Edit Employee </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('employees.update', $employee)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" value="{{$employee->name}}"
                   class="form-control"  aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{$employee->email}}"
                   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

        </div>

        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="file" name="image"
                   class="form-control"  aria-describedby="emailHelp">
            <img src="{{asset('images/employees/'.$employee->image)}}" width="100" height="100">
        </div>
        <div class="mb-3">
            <label  class="form-label">Salary</label>
            <input type="number" name="salary" value="{{$employee->salary}}"
                   class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Gender</label>
            @if($employee->gender==='male')
            <input type="radio" name="gender" value="male" id="male"
                  aria-describedby="emailHelp" checked>
            <label  for="male" class="form-label">Male</label>

            <input type="radio" name="gender" value="female" id="female"
                     aria-describedby="emailHelp">
            <label  for="female" class="form-label">Female</label>
            @elseif($employee->gender=='female')
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

        <div class="mb-3">
            <label  class="form-label">Department</label>
            <select class="form-select" name="department_id" aria-label="Default select example">
                @foreach($departments as $dept)
                    @if($dept->id== $employee->department_id)
                        <option value="{{$dept->id}}" selected>{{$dept->name}}</option>
                    @else
                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                    @endif
                @endforeach


            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
