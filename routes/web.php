<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
    # this is my controller function
    function () {  # 127.0.0.1 ///
    return view('welcome');  # welcome
}

);

# define new route

Route::get("/iti", function () {
    return "Hello World!";
});


# play with url --> part of the url --> variable

Route::get("/user/{name}", function ($name) {
//    return "Hi User!";
    return "Hi {$name}";
});

# optional

Route::get("/std/{name?}", function ($name = "student") {
   return "Hello {$name}";
});

//https://laravel.com/docs/11.x/routing#parameters-regular-expression-constraints
Route::get('/track/{id}', function (string $id) {
    return "Track id is {$id}";
})->where('id', '[0-9]+');


/**
 * Route return with view
 *
**/

Route::get("/land", function () {
    return view('landing');
});


# the route will return with view only without any extra data

Route::view("/notfound", "notfound");


### check this

Route::get("/persons", function () {

    $persons=  [
        ["id"=>1,"name" => "John Doe", "email" => "john@doe.com", "image"=>'pic1.png'],
        ["id"=>2,"name" => "abc Doe", "email" => "abc@doe.com","image"=>'pic2.png'],
        ["id"=>3,"name" => "Jim Doe", "email" => "jim@doe.com",'image'=>'pic3.png'],
        ["id"=>4,"name" => "Jm Doe", "email" => "jm@doe.com",'image'=>'pic4.png'],
    ];

    # you can return with students

//    return $persons;
    # you can send this array to the template
    return view('persons', ["persons"=>$persons]);

});

Route::get("/users", function () {

    $users=  [
        ["id"=>1,"name" => "John Doe", "email" => "john@doe.com", "image"=>'pic1.png'],
        ["id"=>2,"name" => "abc Doe", "email" => "abc@doe.com","image"=>'pic2.png'],
        ["id"=>3,"name" => "Jim Doe", "email" => "jim@doe.com",'image'=>'pic3.png'],
        ["id"=>4,"name" => "Jm Doe", "email" => "jm@doe.com",'image'=>'pic4.png'],
    ];

    # you can return with students

//    return $persons;
    # you can send this array to the template
    $name = 'noha';
    return view('users', ["users"=>$users, "name"=>$name, "num"=>5]);

});



Route::get('/home', function (){

    return view('home');
});


# use controller function
use App\Http\Controllers\StudentController;
                            # scope binding


Route::resource("/students", StudentController::class)->where(['student'=> '[0-9]+']);







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
