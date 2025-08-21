<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'comment_text', 'book_id'];

    // Get the book that the comment belongs to and defines the inverse of the one-to-many relationship.
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}