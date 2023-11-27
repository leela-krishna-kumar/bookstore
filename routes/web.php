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

Route::get('/dashboard', [BookController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('book', BookController::class);

Route::post('post-add-book', [BookController::class, 'post_add_book']);
Route::post('post-update-book/{id}', [BookController::class, 'post_update_book']);

Route::get('delete-book/{id}', [BookController::class, 'book_delete']);

Route::get('book-details/{id}', [BookController::class, 'book_details']);

Route::get('dial-pad', function () {
    return view('dial_pad');
})->name('dial-pad');


Route::get('alpine', function () {
    return view('alpine');
});

Route::get('/', function () {
    return redirect('login');
});

require __DIR__.'/auth.php';
