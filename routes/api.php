<?php

use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('contact', function (Request $request) {

    $dialed_number = $request->dialed_number;

    //   return response()->json(['error' => 'Error msg'], 404);

    return response()->json(['success' => 'Success msg'], 200);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('books-data', function () {

    $books = Books::all();

    return response()->json(['books' => $books]);
});

Route::middleware('auth:sanctum')->get('/book/{book}', function (Books $book) {

    return $book;
});

Route::middleware('auth:sanctum')->get('logout', function (Request $request) {

    auth()->user()->currentAccessToken()->delete();

    return response()->json([
        'success' => 200
    ]);
});

Route::get('/dashboard', function (Request $request) {
    // return response()->json([
    //     'books' => Books::all()
    // ]);

    // Add the "Accept" header to API request and set the value to "application/json"

    return [
        'books' => Books::paginate(12)
    ];
})->middleware('auth:sanctum');


Route::post('login', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if (Hash::check($request->password, $user->getAuthPassword())) {

        return [
            'token' => $user->createToken(time())->plainTextToken
        ];
    }


    return $request->user();
});

// Route::middleware('auth:sanctum')->group(function () {
//     Route::resource('blogs', BlogController::class);

//     //store, show, update, destroy
// });
