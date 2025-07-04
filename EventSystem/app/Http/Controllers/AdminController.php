<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view("admin/login");
    }
    public function authenticate(Request $request)
    {
        $users = User::get();
        foreach ($users as $user) {
            if ($user->email == $request->email) {
                if ($user->role == "user") {
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
            return redirect('/admin/dashboard')->with('message', 'Welcom back Admin!');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

    }
    public function dashboard(){
        if (auth()->user()!=null) {
            if (auth()->user()->role=="user") {
            return redirect('/');
            }
        }
    }
}
