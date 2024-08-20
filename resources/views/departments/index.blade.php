@extends('layouts.app')

@section('title')
    All departments
@endsection

@section('content')
    <a href="{{route('departments.create')}}" class="btn btn-primary">Add new department </a>
    <table class="table">
        <tr> <th>ID</th> <th>Name</th> <th>Description</th>  <th> Show</th>
            <th>Edit</th>
        <th>Delete</th></tr>
        @foreach($departments as $dept)


            <tr>
                <td>{{$dept->id}}</td>
                <td>{{$dept->name}}</td>
                <td>{{$dept->description}}</td>
                <td> <a href="{{route('departments.show', $dept)}}" class="btn btn-primary"> Show </a></td>
                <td> <a href="{{route('departments.edit', $dept)}}" class="btn btn-warning"> Edit </a></td>

                <td>
                    <form action="{{route("departments.destroy",$dept)}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>

            </tr>

        @endforeach

    </table>
@endsection
