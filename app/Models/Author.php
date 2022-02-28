<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\TryCatch;

class Author extends Model
{
    use HasFactory;

    /**
     * Get all authors from DB
     */
    public static function getAllAuthors(null|int $limit): object
    {
        $authors = Author::limit($limit ?? 15)
            ->orderByDesc('updated_at')
            ->get();

        return $authors;
    }

    public static function saveNewAuthor($request)
    {
        $author = new Author;
        $author->name = ucfirst($request->author_name) . ' ' . ucfirst((strtolower($request->author_last_name)));
        $author->bio = $request->author_bio;
        $author->slug = strtolower($request->author_name) . '-' . strtolower($request->author_last_name) . '-author';
        $author->save();

        return $author;
    }
}
