@extends('layouts.app')

@section('title')
    All Students
@endsection

@section('main')
    <a href="{{route('students.create')}}" class="btn btn-primary">Add new Student </a>
    <table class="table">
        <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Image</th> <th> Show</th>
            <th>Edit</th>
        <th>Delete</th></tr>
        @foreach($students as $std)


            <tr>
                <td>{{$std->id}}</td>
                <td>{{$std->name}}</td>
                <td>{{$std->email}}</td>
                <td> <img src="{{asset('images/students/'.$std->image)}}"
                          width="200" height="200"> </td>
                <td> <a href="{{route('students.show', $std->id)}}" class="btn btn-primary"> Show </a></td>
                <td> <a href="{{route('students.edit', $std->id)}}" class="btn btn-warning"> Edit </a></td>

                <td>
                    <form action="{{route("students.destroy",$std->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>

            </tr>

        @endforeach

    </table>
@endsection
