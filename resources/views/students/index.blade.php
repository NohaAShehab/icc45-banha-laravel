@extends('layouts.app')

@section('title')
    All Students
@endsection

@section('main')

    <table class="table">
        <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Image</th> <th> Show</th></tr>
        @foreach($students as $std)
            <tr>
                <td>{{$std['id']}}</td>
                <td>{{$std['name']}}</td>
                <td>{{$std['email']}}</td>
                <td>{{$std['image']}}</td>
                <td> <a href="{{route('students.show', $std['id'])}}" class="btn btn-primary"> Show </a></td>
            </tr>

        @endforeach

    </table>
@endsection
