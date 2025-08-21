<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Comment;
use App\Services\Contracts\CommentService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentServiceImpl implements CommentService
{
    public function addCommentToBook(int $bookId, array $data): Comment
    {
        $book = Book::findOrFail($bookId);

        $validator = Validator::make($data, [
            'author' => 'required|string|max:255',
            'comment_text' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $validatedData = $validator->validated();

        return $book->comments()->create([
            'author' => $validatedData['author'],
            'comment_text' => $validatedData['comment_text'],
            // book_id is automatically handled by Eloquent relationship
        ]);
    }
}
