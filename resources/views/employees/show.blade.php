@extends('layouts.app')

@section('title')
   employee
@endsection

@section('content')

    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/employees/'.$employee->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$employee->name}}</h5>
            <p class="card-text"> {{$employee->email}}</p>
            <p class="card-text"> {{$employee->department_id }}</p>
            <p class="card-text"> {{$employee->department ? $employee->department->name: "None" }}</p>
            <a href="{{route('employees.index')}}" class="btn btn-primary">Back to all employees</a>
        </div>
    </div>

    <h1> See also your colleagues in this dept ?? </h1>

    // dept --> emps in this dept

{{--        @dump($employee->department->employees)--}}
    @if($employee->department)
        @foreach($employee->department->employees as $dept_emp)
            @if($employee->id!=$dept_emp->id)
            <li>{{$dept_emp->name}}</li>
            @endif
        @endforeach

    @endif


@endsection
