<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function logout(){
        // to logout user 
        auth()->logout();
        return redirect()->route('user.loginPage')->with("success", "You have successfully logout");
    }
    public function home(){
        return view("user.homePage");
    }

    public function dashboard(){
        // to access the dashboard we need to check if the user is authenticated
        if(auth()->check()){
            return redirect()->route("post.index");
        }
        else{
            return redirect()->route("user.loginPage")->with("error", "you need login to access this page");
        }
    }

    public function login(Request $request){
        $incomingData = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        // attempting to login
        if( auth()->attempt(["username" => $incomingData["username"], "password" => $incomingData["password"]])){
            // if the user have correct credentials give them a session value
            // and tell the broswer to store a cookie so when the user comeback.
            $request->session()->regenerate();
            return redirect()->route("user.dashboard");
        }
        else{
            return back()->with("error", "Incorrect Username or Password");
        }
    }
    public function showlogin(){
        return view("user.login");
    }

    public function register(){
        return view("user.register");
    }
    public function registration(Request $request){
        
        $incomingData = $request->validate([
            "username" => ["required", "min:3", "max:30", Rule::unique("users", "username")],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => ["required", "confirmed", Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        // $incomingData["username"] = strip_tags($incomingData["username"]);
        // $incomingData["password"] = bcrypt($incomingData["password"]);
        User::create($incomingData);
        return redirect()->route("user.login")->with("success", "you have successfully registered");

    }
 
}
