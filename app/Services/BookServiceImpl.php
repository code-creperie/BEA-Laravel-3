<?php

namespace App\Services;

use App\Models\Book;
use App\Services\Contracts\BookService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator; // For validation
use Illuminate\Validation\ValidationException; // To throw validation exceptions
use Illuminate\Database\Eloquent\ModelNotFoundException; // Required for findOrFail

class BookServiceImpl implements BookService
{
    public function getAllBooks(): Collection
    {
        return Book::orderBy('id')->get();
    }

    public function findBookById(int $id): ?Book
    {
        try {
            return Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }

    public function saveBook(array $data): Book
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Book::create($validator->validated()); // Use validated data
    }
}
