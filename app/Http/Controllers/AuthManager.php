<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login() {
        return view('login');
    }
     function terms() {
        return view('terms');
    }
     function privacy() {
        return view('privacy');
    }
   

    function registration() {
        return view('registration');
    }

    function adminView() {
        return view('Admin.dashboard');
    }

    function registrationPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed");
        }
        return redirect(route('login'))->with("success", "Registration successful");
    }

    function loginPost(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    // Hardcoded admin credentials
    $adminCredentials = [
        'email' => 'admin@gmail.com',
        'password' => 'admin123'
    ];

    // Check hardcoded admin first
    if ($request->email === $adminCredentials['email'] && $request->password === $adminCredentials['password']) {
        // Set a fake admin user session manually
        Session::put('is_admin', true);
        // Optional: store name for display
        Session::put('admin_name', 'Admin');

        return redirect('/admin/dashboard'); // make sure this route exists
    }

    // Check normal user login
    if (Auth::attempt($credentials)) {
        if (Auth::user()->role == 'admin') {
            Session::put('is_admin', true);
            return redirect('/admin/dashboard');
        } else {
            return redirect('/dashboard');
        }
    }

    return redirect(route('login'))->with("error", "Login failed");
}

  
    function logout() {
    Auth::logout();           // Logout normal users
    return redirect(route('login'))->with("success", "Logged out successfully");
}

}