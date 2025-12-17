<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\Contracts\BookService;
use Illuminate\Validation\ValidationException; // To catch validation exceptions from service
use Illuminate\Database\Eloquent\ModelNotFoundException; // To catch not found from service

class BookController extends Controller
{

    /**
     * Laravel's service container automatically resolves BookService interface
     * to BookServiceImpl based on our AppServiceProvider bindings
     */
    public function __construct(protected BookService $bookService)
    { } 

    public function index(): View
    {
        $viewData = [
            "title" => "Books - Book Exchange Application",
            "subtitle" => "Browse Available Books",
            "books" => $this->bookService->getAllBooks()  // Service handles data retrieval
        ];
        return view('book.index')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        try {
            $book = $this->bookService->findBookById($id);

            $viewData = [
                "title" => $book->name . " - Book Exchange Application",
                "subtitle" => $book->name . " - Book Information",
                "book" => $book
            ];
            return view('book.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Book not found.');
        }
    }

    public function add(): View
    {
        $viewData = [
            "title" => "Add Book - Book Exchange Application",
            "subtitle" => "Add a New Book to the Collection"
        ];
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
