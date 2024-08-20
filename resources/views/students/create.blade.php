@extends('layouts.app')

@section('title')
    All Students
@endsection

@section('content')
    <h1> Add new Student </h1>



    <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="form-control"  aria-describedby="emailHelp">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="text" name="image" value="{{ old('image') }}"
                   class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Grade</label>
            <input type="number" name="grade" value="{{ old('grade') }}"
                   class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">

            <label  class="form-label">Gender</label>

            @if(old('gender')=='male')
            <input type="radio" name="gender" value="male" id="male" checked >
                <label  for="male" class="form-label">Male</label>
            <input type="radio" name="gender" value="female" id="male"  >
            <label  for="female" class="form-label">Female</label>

            @elseif(old('gender')=='female')

            <input type="radio" name="gender" value="female" id="female"
                     aria-describedby="emailHelp" checked>
            <label  for="female" class="form-label">Female</label>
                <input type="radio" name="gender" value="male" id="male"  >
                <label  for="female" class="form-label">Male</label>
            @else
                <input type="radio" name="gender" value="female" id="female"
                       aria-describedby="emailHelp" >
                <label  for="female" class="form-label">Female</label>
                <input type="radio" name="gender" value="male" id="male"  >
                <label  for="female" class="form-label">Male</label>
            @endif
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
