<?php

use App\Http\Controllers\BookController;
use App\Models\Books;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Laravel\Scout\Scout;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::resource('book', BookController::class);

Route::post('post-add-book', [BookController::class, 'post_add_book']);
Route::post('post-update-book/{id}', [BookController::class, 'post_update_book']);

Route::get('delete-book/{id}', [BookController::class, 'book_delete']);



Route::get('dial-pad', function () {
    return view('dial_pad');
})->name('dial-pad');

Route::get('book-details/{id}', [BookController::class, 'book_details']);


Route::get('/dashboard', function () {



  //  $images = ['9780385547345.jpg', '9781668026274.jpg', '9781668016138.jpg', '9780804172707.jpg', '9780590353427.jpg', '9781668007877.jpg', '9781338885132.jpg'  ,'9781649374042.jpg', '9780385548953.jpg'];

    $books_data = Cache::remember('books_data1', 600, function () {
        return Books::orderBy('created_at', 'desc')->get();
    });

    // $books = Books::all();

    //  foreach( $books as  $book){

    //   //  $book->image = '/images/' . $images[rand(0,8)];

    //      $book->delete();
    // }

  //  dd(Cache::get('books_data1'));

  //  $books_title =   $books_data->unique('title');

  //  dd($books_title, $books_title[0]['title'] );

    // foreach( $books as  $book){

    //     $book->image = '/images/' . $images[rand(0,8)];

    //      $book->update();
    // }

    // $json = file_get_contents('https://fakerapi.it/api/v1/books?_quantity=100');


    // $objs = (array) json_decode($json);

    // foreach($objs['data'] as $obj){

    //    $books = new Books();

    //    $books->title = $obj->title;
    //     $books->author = $obj->author;
    //     $books->genre = $obj->genre;
    //     $books->description = $obj->description;
    //     $books->image = '/images/' . $images[rand(0, 8)];
    //     $books->published = $obj->published;
    //     $books->publisher = $obj->publisher;

    //     $books->save();
    // }

//    dd($objs['data'][0]);




    return view('dashboard', compact('books_data'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('alpine', function () {
    return view('alpine');
});


Route::get('/', function () {
    return redirect('login');
});

require __DIR__.'/auth.php';
