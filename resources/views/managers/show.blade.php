@extends('layouts.app')

@section('title')
   manager
@endsection

@section('main')

    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/managers/'.$manager->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$manager->name}}</h5>
            <p class="card-text"> {{$manager->email}}</p>
            <p class="card-text"> {{$manager->department_id }}</p>
            <p class="card-text"> {{$manager->department ? $manager->department->name: "None" }}</p>
            <a href="{{route('managers.index')}}" class="btn btn-primary">Back to all managers</a>
        </div>
    </div>

    <h1> See also your colleagues in this dept ?? </h1>

    // dept --> emps in this dept

{{--        @dump($manager->department->managers)--}}
    @if($manager->department)
        @foreach($manager->department->managers as $dept_emp)
            @if($manager->id!=$dept_emp->id)
            <li>{{$dept_emp->name}}</li>
            @endif
        @endforeach

    @endif


@endsection
