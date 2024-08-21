@extends('layouts.app')

@section('title')
    All Students
@endsection

@section('content')
@auth
    <h1> {{Auth::user()->name}} </h1>
@endauth
 

    

    <a class='btn btn-primary' href="{{route('students.create')}}"> Add new Student </a>

    @if(session("success"))
        <div class='alert alert-success'> 

            {{session("success")}}
        </div>
    @endif


    <table class="table">
        <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Image</th> <th> Show</th></tr>
        @foreach($students as $std)
            <tr>
                <td>{{$std['id']}}</td>
                <td>{{$std['name']}}</td>
                <td>{{$std['email']}}</td>
                <td>{{$std['image']}}</td>
                <td> <a href="{{route('students.show', $std['id'])}}" class="btn btn-primary"> Show </a></td>
                <td> 
                    <form method='post' action="{{route('students.destroy', $std)}}">
                        @csrf 
                        @method('delete') 

                        <input type='submit' class='btn btn-danger' onclick="return confirm('are you sure do you want to delete')"
                            value='Delete'
                        >


                    </form>    

                </td>
            </tr>

        @endforeach

    </table>
@endsection
