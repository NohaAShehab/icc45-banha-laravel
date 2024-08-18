@extends('layouts.app')

@section('title')
    All Employees
@endsection

@section('main')
    <a href="{{route('employees.create')}}" class="btn btn-primary">Add new employee </a>
    <table class="table">
        <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Image</th> <th> Show</th>
            <th>Edit</th>
        <th>Delete</th></tr>
        @foreach($employees as $emp)


            <tr>
                <td>{{$emp->id}}</td>
                <td>{{$emp->name}}</td>
                <td>{{$emp->email}}</td>
                <td> <img src="{{asset('images/employees/'.$emp->image)}}"
                          width="200" height="200"> </td>
                <td> <a href="{{route('employees.show', $emp)}}" class="btn btn-primary"> Show </a></td>
                <td> <a href="{{route('employees.edit', $emp)}}" class="btn btn-warning"> Edit </a></td>

                <td>
                    <form action="{{route("employees.destroy",$emp)}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>

            </tr>

        @endforeach

    </table>
@endsection
