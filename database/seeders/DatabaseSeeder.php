<?php

namespace Database\Seeders;

use App\Models\Book;     // Import Book
use App\Models\Comment;  // Import Comment
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 8 books first
        $books = Book::factory(8)->create();

        if ($books->count() >= 8) {
            Comment::factory(2)->create(['book_id' => $books[0]->id]); // Book 1: 2 comments
            Comment::factory(3)->create(['book_id' => $books[1]->id]); // Book 2: 3 comments
            Comment::factory(1)->create(['book_id' => $books[2]->id]); // Book 3: 1 comment
            // Book 4: 0 comments
            Comment::factory(4)->create(['book_id' => $books[4]->id]); // Book 5: 4 comments
            Comment::factory(2)->create(['book_id' => $books[5]->id]); // Book 6: 2 comments
            Comment::factory(1)->create(['book_id' => $books[6]->id]); // Book 7: 1 comment
            Comment::factory(3)->create(['book_id' => $books[7]->id]); // Book 8: 3 comments
        }
    }
}