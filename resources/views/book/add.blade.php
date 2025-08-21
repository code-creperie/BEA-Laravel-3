@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
  <div class="p-4 border rounded-lg shadow-lg">
    @include('util.message')
    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
      <h2 class="text-center text-xl font-semibold">Add book</h2>
    </div>
      @if($errors->any())
      <ul id="errors" class="bg-red-100 text-red-700 border border-red-400 rounded-md p-4 list-none">
        @foreach($errors->all() as $error)
        <li class="mb-2">{{ $error }}</li>
        @endforeach
      </ul>
      @endif
      <form method="POST" action="{{ route('book.save') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input 
            type="text" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200" 
            placeholder="Enter name" 
            name="name" 
            value="{{ old('name') }}" />
        </div>
        <div class="mb-4">
          <textarea 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200" 
            placeholder="Enter description" 
            name="description" >{{ old('description') }}</textarea>
        </div>
          <button 
            type="submit" 
            class="w-full bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-200">
            Send
          </button>
      </form>
  </div>
@endsection