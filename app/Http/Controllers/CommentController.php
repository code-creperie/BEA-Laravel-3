<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contracts\CommentService;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function __construct(protected CommentService $commentService)
    { }

    public function store(Request $request, $bookId)
    {
        try {
            $commentData = $request->only(['author', 'comment_text']);
            $this->commentService->addCommentToBook($bookId, $commentData);
            return redirect()->route('book.show', ['id' => $bookId]); 

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }
}
