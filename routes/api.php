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
# execlude create, edit routes
# php artisan make:controller StudentController --api  -m Student


# generate token for login

# username, password  --> make sure 00> user exists - --> generate token --> used with other request

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
# we generate bearer token ==> that can be used later while sending request
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();
//    return $user;

    if (! $user || ! Hash::check($request->password, $user->password)) {
//        throw ValidationException::withMessages([
//            'email' => ['The provided credentials are incorrect.'],
//        ]);
        return response()->json(['error' => 'Your credentials are incorrect'], 401);
    }
    # generate new token ? associated with user ??? --> saved in table personal_access_tokens
    return $user->createToken($request->device_name)->plainTextToken;
});
