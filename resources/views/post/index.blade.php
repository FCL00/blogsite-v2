@extends('layouts.app')

@section('title', 'post')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Welcome {{ auth()->user()->username }}</h1>
    <p class="">Latest Post</p>

    @forelse ($posts as $post)
        <a class="text-violet-500 underline" href="{{ route('post.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
        <br>
    @empty
       <p>No data is found</p>
    @endforelse
    <div class="bg-white text-black">
        {{ $posts->links() }}
    </div>
@endsection