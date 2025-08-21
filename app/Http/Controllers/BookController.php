<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Book;
use App\Services\Contracts\BookService;
use Illuminate\Validation\ValidationException; // To catch validation exceptions from service
use Illuminate\Database\Eloquent\ModelNotFoundException; // To catch not found from service

class BookController extends Controller
{

    //We inject the BookService to handle business logic
    public function __construct(protected BookService $bookService)
    { } 

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Books - Spaghetti Ode";
        $viewData["subtitle"] = "List of Books";
        $viewData["books"] = Book::orderBy('id')->get(); // Fetch from DB
        return view('book.index')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        try {
            $book = $this->bookService->findBookById($id);
            if (!$book) {
                // Or use findOrFail in service and catch ModelNotFoundException
                abort(404, 'Book not found.');
            }

            $viewData = [];
            $viewData["title"] = $book->name . " - Book Exchange Application";
            $viewData["subtitle"] = $book->name . " - Book Information";
            $viewData["book"] = $book;
            return view('book.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Book not found.');
        }
    }

    public function add(): View
    {
        $viewData = [];
        $viewData["title"] = "Add - Spaghetti Ode";
        $viewData["subtitle"] = "Add a book";
        return view('book.add')->with("viewData", $viewData);
    }

    public function save(Request $request) // Handle book creation
    {
        try {
            // Data for service, could also pass $request->all() if service handles filtering
            $bookData = $request->only(['name', 'description']);
            $this->bookService->saveBook($bookData);

            return redirect()->route('book.index')
                             ->with('success', 'Book added successfully!');
        } catch (ValidationException $e) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }
}
