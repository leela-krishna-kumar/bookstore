<?php

namespace App\Http\Livewire;

use App\Models\Books;
use Livewire\Component;

use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

class Book extends Component
{
    public $search;

    public $title;
    public $author;
    public $isbn;
    public $genre;
    public $published;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $searchTerm = $this->search;

        $title = $this->title;
        $author = $this->author;
        $isbn = $this->isbn;
        $genre = $this->genre;
        $published = $this->published;


        $books_data2 = Cache::remember('books_data2', 600, function () {
            return Books::orderBy('created_at', 'desc')->get();
        });


       //    dd(Cache::get('books_data2'));



        if ($searchTerm != null) {
            $books_data = Books::search($searchTerm)->paginate(12);

            $this->reset('title');

        }

        else{
            $books_data = Books::orderBy('created_at', 'desc')->paginate(12);
        }

        return view('livewire.book', compact('books_data', 'books_data2'));
    }
}
