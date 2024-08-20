@extends('layouts.app')

@section('title')
    All managers
@endsection

@section('main')
    <a href="{{route('managers.create')}}" class="btn btn-primary">Add new manager </a>
    <table class="table">
        <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Image</th> <th> Show</th>
            <th>Edit</th>
        <th>Delete</th></tr>
        @foreach($managers as $emp)


            <tr>
                <td>{{$emp->id}}</td>
                <td>{{$emp->name}}</td>
                <td>{{$emp->email}}</td>
                <td> <img src="{{asset('images/managers/'.$emp->image)}}"
                          width="200" height="200"> </td>
                <td> <a href="{{route('managers.show', $emp)}}" class="btn btn-primary"> Show </a></td>
                <td> <a href="{{route('managers.edit', $emp)}}" class="btn btn-warning"> Edit </a></td>

                <td>
                    <form action="{{route("managers.destroy",$emp)}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>

            </tr>

        @endforeach

    </table>
    {{$managers->links()}}
@endsection
