<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\TryCatch;

class Author extends Model
{
    use HasFactory;


    public static function saveAuthor($request)
    {
        $author = new Author;
        $author->name = ucfirst($request->author_name) . ' ' . ucfirst((strtolower($request->author_last_name)));
        $author->bio = $request->author_bio;
        $author->slug = strtolower($request->author_name) . '-' . strtolower($request->author_last_name) . '-author';
        $author->save();

        return $author;
    }
}
