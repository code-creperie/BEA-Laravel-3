<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name("home.index");
Route::get('/about', [HomeController::class, 'about'])->name("home.about");
Route::get('/books', [BookController::class, 'index'])->name("book.index");
Route::get('/books/add', [BookController::class, 'add'])->name("book.add");
Route::get('/books/{id}', [BookController::class, 'show'])->name("book.show");
Route::post('/books/save', [BookController::class, 'save'])->name("book.save");
Route::post('/books/{id}/comments', [CommentController::class, 'store'])->name('comment.store');