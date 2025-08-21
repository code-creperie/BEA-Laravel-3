<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        $viewData = [];
        $viewData["title"] = "About - Book Exchange Application";
        $viewData["subtitle"] = "About This Project";
        $viewData["description"] = "BEA was created to make it easier for people to share books with others in their community. Think of it as a digital book-sharing shelf: one where you can leave a book you love, take one you’re curious about, or just see what others are reading. No fees, no accounts, just stories moving from hand to hand. It’s simple, honest, and a little nerdy. But we like it that way.";
        $viewData["author"] = "Developed by people who still dog-ear pages (sorry, librarians)";

        // Pass the $viewData array to the 'home.about' view
        return view('home.about')->with($viewData);
    }
}
