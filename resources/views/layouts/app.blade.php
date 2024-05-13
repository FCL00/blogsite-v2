<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        
        <title>Laravel | @yield('title')</title>
    </head>
    <body>
        <header class="bg-black text-white p-4">
            <div class="flex justify-between">
                 <a href="{{ route('user.home')}}">Home</a>
                 @auth
                     <div class="flex space-x-2">
                         <a href="{{ route("post.index") }}">{{ auth()->user()->username }}</a>
                         <a href="{{ route("post.create")}}">Create Post</a>
 
                         <form action="{{ route('user.logout') }}" method="POST">
                             @csrf
                             <button type="submit">Logout</button>
                         </form>
                     </div>
                 @else
                     <div class="space-x-2">
                         <a href="{{ route("user.login")}}">Login</a>
                         <a href="{{ route("user.register")}}">Register</a>
                     </div>
                 @endauth
            </div>
         </header>

        @if( session()->has('success'))
            <div class="success bg-emerald-500">{{ session('success') }}</div>
        @endif

        @if( session()->has('error'))
            <div class="error bg-red-500">{{ session('error') }}</div>
        @endif

        <main class="container min-h-screen mx-auto p-4">
            @yield('content')
        </main>
        <footer class="bg-black text-white">
            <p>This is footer</p>
        </footer>
    </body>
</html>
