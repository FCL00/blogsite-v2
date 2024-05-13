@extends("layouts.app")

@section("title", "login page")

@section("content")

    <form action="{{ route("user.create")}}" method="POST">
        @csrf
        <div class="mb-3 flex flex-col">
            <label for="username">Username</label>
            <input value="{{ old('username') }}" class="border border-black p-2 rounded-m" type="text" name="username" id="username" placeholder="Enter your Username">
            @error("username")
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 flex flex-col">
            <label for="email">Email</label>
            <input value="{{ old('email') }}" class="border border-black p-2 rounded-m" type="email" name="email" id="email" placeholder="Enter your Email">
            @error("email")
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 flex flex-col">
            <label for="password">Password</label>
            <input value="{{ old('password') }}" class="border border-black p-2 rounded-m" type="password" name="password" id="password" placeholder="Enter your Password">
            @error("password")
                <p class="text-red-500">{{ $message }}</p>
            @enderror    
        </div>
        <div class="mb-3 flex flex-col">
            <label for="password_confirmation">Retype Password</label>
            <input class="border border-black p-2 rounded-m" type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter your confirm password">
            @error("password_confirmation")
                <p class="text-red-500">{{ $message }}</p>
            @enderror    
        </div>
        <button class="text-white bg-[#181818] p-2" type="submit">Sign Up</button>
    </form>

@endsection