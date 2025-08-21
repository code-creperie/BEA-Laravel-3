<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    // Define attributes that are mass assignable
    protected $fillable = ['name', 'description'];

    // Get the comments associated with the book and defines a one-to-many relationship.
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}