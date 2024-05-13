@extends("layouts.app")

@section("title", "login page")

@section("content")

    <form action="/login" method="POST">
        @csrf
        <div class="mb-3 flex flex-col">
            <label for="username">Username</label>
            <input class="border border-black p-2 rounded-m" type="text" name="username" id="username" placeholder="Enter your Username">
            @error("username")
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 flex flex-col">
            <label for="password">Password</label>
            <input class="border border-black p-2 rounded-m" type="password" name="password" id="password" placeholder="Enter your Password">
            @error("password")
                <p class="text-red-500">{{ $message }}</p>
            @enderror    
        </div>
        <button class="text-white bg-[#181818] p-2" type="submit">Login</button>
    </form>

@endsection