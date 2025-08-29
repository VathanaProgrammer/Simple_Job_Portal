<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    //

    public function index(){
        return view("home");
    }

    public function sign_up(){
        return view("auth.sign_up");
    }

    public function store(Request $request){
      // validation
      $request->validate([
        "username" => "required|string|max:255",
        "email" => "required|email|max:255|unique:users,email",
        "password" => "required|string|min:3|max:225",
        "company_name" => "nullable|string|max:255",
        "company_logo" => "nullable|image|max:2048"
      ]);

      // handle file upload
      $logo_path = null;
      if($request->hasFile("company_logo")){
        $logo_path = $request->file("company_logo")->store("logos", "public");
      }

      // create new user
      $user = User::create([
        "name" => $request->username,
        "email" => $request->email,
        "password" => $request->password,
        "company_name" => $request->company_name,
        "company_logo" => $logo_path
      ]);

       Auth::login($user); // automatically login after register

      // redirect to some page (e.g., login page)
      return redirect()->route("home")->with("success", "Account created successfully. Please log in.");
    }

     public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redirect to intended page or homepage
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign_in');
    }

    public function show_login_form() {
        return view('auth.sign_in');
    }
}
