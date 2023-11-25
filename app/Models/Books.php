<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable; //import the trait

class Books extends Model
{
    use HasFactory;
    use Searchable; //add this trait

    protected $fillable = [
        'title', 'author', 'genre', 'description', 'isbn', 'image', 'published', 'publisher'
    ];


}
