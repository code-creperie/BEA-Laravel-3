@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
  @foreach ($viewData["books"] as $book)
  <div class="p-4 border rounded-lg shadow-lg">
    <div class="flex justify-center text-8xl mb-2">📔</div>
    <div class="text-center">
      <a href="{{ route('book.show', ['id'=> $book['id']]) }}" 
         class="block px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">
        {{ $book["name"] }}
      </a>
    </div>
  </div>
  @endforeach
</div>
@endsection
