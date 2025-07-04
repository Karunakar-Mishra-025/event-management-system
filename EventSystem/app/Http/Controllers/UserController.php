<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view("users/register");
    }
    public function store(Request $request)
    {

        $formFeilds = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        $formFeilds["password"] = bcrypt($formFeilds["password"]);

        $user = User::create($formFeilds);

        return redirect('/')->with('message', 'User Registered Successfully!');
    }

    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('/');
        }
        return view("users/login");
    }
    public function authenticate(Request $request)
    {
        $users = User::get();
        foreach ($users as $user) {
            if ($user->email == $request->email) {
                if ($user->role == "admin") {
                    return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
                }
            }
        }
        $formFeilds = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($formFeilds)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in !');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

    }
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You Have Been Logged Out !');
    }
}
