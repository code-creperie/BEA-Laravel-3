@extends('layouts.app')

@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
    <div class="flex flex-col md:flex-row bg-white shadow-md rounded-lg overflow-hidden mb-6">
        <div class="md:w-1/3 flex justify-center items-center p-4">
            <div class="text-8xl">📔</div>
        </div>
        <div class="md:w-2/3 p-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $viewData['book']->name }}</h2>
            <p class="text-gray-600">{{ $viewData['book']->description }}</p>
        </div>
    </div>

    {{-- Add Comment Form Section --}}
    <div class="mt-5 mb-6">
        <div class="bg-gray-100 p-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Add Your Comment</h3>
            <form action="{{ route('comment.store', ['id' => $viewData['book']->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                        id="author" name="author" placeholder="Your name" required value="{{ old('author') }}">
                </div>
                <div class="mb-3">
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                        id="comment_text" name="comment_text" rows="3" placeholder="Write a comment..." required>{{ old('comment_text') }}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="w-full bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-200">
                        Post
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Comments Display Section --}}
    <div class="mb-5">
        <div class="bg-white overflow-hidden p-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Comments</h3>
            @forelse ($viewData["book"]->comments as $comment)
                <div class="mb-4 pb-4 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                    <div class="flex flex-col">
                        <strong class="text-gray-900 mb-1">{{ $comment->author }}</strong>
                        <span class="text-gray-600">{{ $comment->comment_text }}</span>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 italic">No comments yet for this book.</p>
            @endforelse
        </div>
    </div>
@endsection
