<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <h1> All Users </h1>
    <div class="container">
    {{ $name }} --> parse variable to a string

{{--    {{$users}}   # this a comment in blade  --}}
{{----}}
    @dump($users)
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
        </tr>



        @foreach($users as $user)
            <tr>
                <td> {{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td> {{$user['email']}}</td>
                <td>{{$user['image']}}</td>
            </tr>

        @endforeach

    </table>
    <h1> for loop example </h1>
    @for($i=0;$i<=$num; $i++)
        @if($i==3)
                <li style="color: red"> {{$i}}</li>
         @else
                <li> {{$i}}</li>
            @endif

    @endfor
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>


