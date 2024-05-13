@extends('layouts.app')

@section('title', 'post')

@section('content')
   <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
   <p class="text-blue-500">{{ date('M d, Y', strtotime($post->created_at)) }}</p>
   <p>{{ $post->description}}</p>

  <div class="flex space-x-2 mt-4">
   <a class="bg-yellow-500 p-3 rounded-sm" href="{{ route('post.edit', ['post' => $post->id ])}}">Edit</a>
   <form action="{{ route('post.delete', ['post' => $post->id ]) }}" method="POST">
      @method('DELETE')
      @csrf
      <button class="bg-red-500 p-3 rounded-sm" type="submit">Delete</button>
   </form>
  </div>
@endsection