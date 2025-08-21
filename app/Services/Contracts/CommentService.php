<?php

namespace App\Services\Contracts;

use App\Models\Comment;

interface CommentService
{
    public function addCommentToBook(int $bookId, array $data): Comment;
}