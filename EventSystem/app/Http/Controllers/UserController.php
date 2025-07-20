<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        return back()->with('message', 'User Registered Successfully!');
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
    public function delete($id)
    {
        User::find($id)->delete();

        return back()->with(["message" => "User Deleted Successfully!"]);

    }
    public function update(Request $request)
    {
        $user=User::find($request->id);
        // Validate name and email always
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        // If any password fields are filled, validate all password fields
        if ($request->filled('old_password') || $request->filled('new_password') || $request->filled('new_password_confirmation')) {

            // Check if old password matches the current user's password
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Old password is incorrect.']);
            }

            // Validate new password fields
            $request->validate([
                'new_password' => 'required|confirmed|min:6',
            ]);

            // Hash and update new password
            $formFields['password'] = bcrypt($request->new_password);
        }

        // Update user
        $user->update($formFields);

        return back()->with('message', 'User updated successfully!');
    }
}
