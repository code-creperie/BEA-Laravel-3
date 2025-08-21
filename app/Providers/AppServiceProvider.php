<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\BookService;
use App\Services\BookServiceImpl;
use App\Services\Contracts\CommentService;
use App\Services\CommentServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BookService::class, BookServiceImpl::class);
        $this->app->bind(CommentService::class, CommentServiceImpl::class);
    }

    public function boot(): void
    {
        //
    }
}