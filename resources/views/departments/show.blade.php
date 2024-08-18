@extends('layouts.app')

@section('title')
   employee
@endsection

@section('main')

    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/employees/'.$employee->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$employee->name}}</h5>
            <p class="card-text"> {{$employee->email}}</p>
            <a href="{{route('employees.index')}}" class="btn btn-primary">Back to all employees</a>
        </div>
    </div>
@endsection
