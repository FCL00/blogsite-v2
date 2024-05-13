@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <form action="{{ route('post.update', ['post' => $post->id ]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-4 flex flex-col">
            <label for="title">Title</label>
            <input class="border border-black p-2 rounded-md" type="text" name="title" id="title" placeholder="Enter your title" value="{{ $post->title ?? old('title') }}">
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4 flex flex-col">
            <label for="description">Description</label>
            <textarea class="border border-black p-2 rounded-md" name="description" id="" cols="30" rows="10"  placeholder="Enter your description">{{ $post->description ?? old('description')}}</textarea>
            @error('description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <button class="bg-black text-white p-2 rounded-md" type="submit">Create Post</button>
    </form>
@endsection