<?php

namespace App\Services\Contracts;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookService
{
    public function getAllBooks(): Collection;

    public function findBookById(int $id): ?Book; // can also throw ModelNotFoundException, hence the ? symbol before Book.

    public function saveBook(array $data): Book;
}