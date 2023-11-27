<?php

namespace App\Http\Controllers;

use App\Models\Books;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cache;
use Hashids\Hashids;
use ValueError;

class BookController extends Controller
{
    public function book_details($id)
    {
        $hashids = new Hashids();

        $book_id =  $hashids->decode($id);

        //   dd($book_id);

        if (count($book_id) == 0) {
            Alert::toast('Record does not exists!', 'error');

            return redirect()->back();
        }

        $book = Books::find($book_id[0]);

        //   dd($book);
        return view('book_info', compact('book'));
    }



    public function book_delete($id)
    {
        $hashids = new Hashids();

        $book_id =  $hashids->decode($id);

        if (count($book_id) == 0) {
            Alert::toast('Record does not exists!', 'error');

            return redirect()->back();
        }

        //   dd($book_id[0]);

        $book = Books::find($book_id[0]);

        $book->delete();

        Alert::toast('Book is succcesfully deleted! 🎉', 'success');

        return redirect()->back();
    }



    public function post_update_book(Request $request, $book_id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'publisher' => 'required|max:255',
            'published' => 'required|date',
            'description' => 'required',
        ]);

        $book = Books::find($book_id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;


        if ($request->hasFile('book_image')) {

            $extension = $request->file('book_image')->getClientOriginalExtension();
            $fileName = time() . '_' . rand() . '.' . $extension;
            $request->file('book_image')->move(public_path('images/'), $fileName);
            $url = 'images/' . $fileName;
        } else {
            $url = $request->book_image;
        }

        $book->image = $url;

        $book->description = $request->description;

        $book->publisher = $request->publisher;
        $book->published = $request->published;

        $book->update();

        Cache::forget('books_data1');
        Cache::forget('books_data2');

        Alert::toast('Book is succcesfully updated! 🎉', 'success');

        return redirect()->back();
    }


    public function post_add_book(Request $request)
    {

        if ($request->books_csv_file != null) {

            //  file validation
            $request->validate([
                "books_csv_file" => "required",
            ]);

            $file = $request->file("books_csv_file");
            $csvData = file_get_contents($file);

         //   dd($csvData);

            $this->import_books_using_csv($csvData);
        } else {

           $request->validate([
                'title' => 'required|max:255',
                'author' => 'required|max:255',
                'genre' => 'required|max:255',
                'publisher' => 'required|max:255',
                'published' => 'required|date',
                'description' => 'required',
            ]);

            //  dd($request->all());

            $this->add_book_using_form($request->all());
        }

        Cache::forget('books_data1');
        Cache::forget('books_data2');

        Alert::toast('Your book is succcesfully added! 🎉', 'success');

        //  return redirect()->back();

        return response()->json(['success' => 'Success msg'], 200);
    }

    public function add_book_using_form($request)
    {
        $book = new Books();

        $book->title = $request['title'];
        $book->author = $request['author'];
        $book->genre = $request['genre'];

        // $extension = $request->file('book_image')->getClientOriginalExtension();
        // $fileName = time() . '_' . rand() . '.' . $extension;
        // $request->file('book_image')->move(public_path('images/'), $fileName);
        // $url = 'images/' . $fileName;

        $images = ['9780385547345.jpg', '9781668026274.jpg', '9781668016138.jpg', '9780804172707.jpg', '9780590353427.jpg', '9781668007877.jpg', '9781338885132.jpg', '9781649374042.jpg', '9780385548953.jpg'];

        $book->image =  '/images/' . $images[rand(0, 8)];

        $book->description = $request['description'];

        $book->publisher = $request['publisher'];
        $book->published = $request['published'];


        //  $book->status = 'approved';

        $book->save();
    }

    public function import_books_using_csv($csvData)
    {

        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);

        foreach ($rows as $row) {
            if (isset($row[0]) && $row[0] != "") {

                try {
                    $row = array_combine($header, $row);
                } catch (ValueError $exception) {

                    //  Alert::toast('CSV structure error. Remove new lines within cells.', 'error');

                    Alert::toast('Remove new lines within cells. Upload failed.', 'error');

                    return redirect()->back();
                }


                try {
                    $book = new Books();

                    $book->title = $row['title'];
                    $book->author = $row['author'];
                    $book->genre = $row['genre'];

                    $images = ['9780385547345.jpg', '9781668026274.jpg', '9781668016138.jpg', '9780804172707.jpg', '9780590353427.jpg', '9781668007877.jpg', '9781338885132.jpg', '9781649374042.jpg', '9780385548953.jpg'];

                    $book->image =  '/images/' . $images[rand(0, 8)];

                    $book->description = $row['description'];

                    $book->publisher = $row['publisher'];
                    $book->published = '2021-12-03';


                    //  $book->status = 'approved';

                    $book->save();
                } catch (ErrorException $exception) {

                    //  Alert::toast('CSV structure error. Remove new lines within cells.', 'error');

                    Alert::toast('Column names must be same as sample sheet. Upload failed.', 'error');

                    return redirect()->back();
                }

               // $row["email"]
            }
        }

    }
}
