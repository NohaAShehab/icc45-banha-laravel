<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# here you can add your routes to the apis >>>

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


#### the same as previous 


// use App\Http\Controllers\StudentController;

// Route::get('/students',[StudentController::class, 'index']);

use App\Http\Controllers\Api\StudentController;

Route::apiresource("/students", StudentController::class);
