<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jobs;
use App\Models\Job_categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    //

    public function index(){
        $categories = $this->get_categories();
        $jobs = $this->get_jobs();
        return view("home",compact("categories", "jobs"));
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


    public function open_manage_page($username){
        $user = User::where('name', str_replace('-', ' ', $username))->firstOrFail();
        $posts = Jobs::where("user_id", $user->id)->get();
        return view("manage-post", compact("user", "posts"));
    }

    public function open_create_page(){
      $categories = $this->get_categories();
      return view("create_post")->with("categories", $categories);
    }

    public function get_categories(){
      return Job_categories::all();
    }

    public function get_jobs(){
      return Jobs::with(['user', 'category'])
                ->latest()
                ->take(6) // limit to 6
                ->get();
    }

    public function create_post(Request $request){
      // dd($request->all());
      $request->validate([
        "title" => "required|string|max:255",
        "job_category" => "required|exists:job_categories,id|integer",
        "employment_type" => "required|string|max:100",
        "company_location" => "required|string|max:255",
        "job_des" => "required|string|max:5000",
        "experience" => "required|string|max:100",
      ]);

      Jobs::create([
        "user_id" => Auth::id(),
        "job_category_id" => $request->job_category,
        "title" => $request->title,
        "description" => $request->job_des,
        "experience" => $request->experience,
        "location" => $request->company_location,
        "employment_type" => $request->employment_type,
        "salary_range" => $request->salary_from . " - " . $request->salary_to,
        "status" => 1 // active by default
      ]);

      return redirect()->route('manage_page', ['username' => \Str::slug(Auth::user()->name)])
                        ->with('success', 'Job posted successfully!');
    }

    public function toggleStatus($id)
      {
          $job = Jobs::findOrFail($id);
          $job->status = !$job->status; // Toggle between 1 and 0
          $job->save();

          return response()->json([
              'success' => true,
              'status' => $job->status
          ]);
      }

}
