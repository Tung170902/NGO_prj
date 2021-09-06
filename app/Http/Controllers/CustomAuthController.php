<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {

        // admin login

        if (Auth::user() && Auth::user()->role == "admin") {
            return redirect('/dashboard')
                ->withSuccess('Signed in');
        }

        return view('auth.login');
    }

    public function userLogin()
    {

        // user login
        if (Auth::user() && Auth::user()->role == "user") {
            return redirect('/')
                ->withSuccess('Signed in');
        }

        return view('pages.login');
    }


    public function makeAdmin()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('123456')
        ]);


        echo "make admin success";
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('dashboard')
                    ->withSuccess('Signed in');
            } else {
                return redirect("/")
                    ->withSuccess('Signed in');
            }

            return redirect("login")->with('error', 'You have no permission for this page!');
        }

        return redirect("login")->with('error', 'username or password incorrect');
    }

    public function registration()
    {
        return view('pages.register');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $data['role'] = 'user';
        $data['avatar'] = "/admin/assets/img/user.png";
        $check = $this->create($data);

        return redirect("/user/login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function userLogout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
