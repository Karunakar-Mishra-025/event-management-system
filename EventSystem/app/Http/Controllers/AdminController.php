<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
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
    public function dashboard()
    {

        return view("admin/dashboard")->with([
            "events" => Event::count(),
            "users" => User::where('role', 'user')->count()
        ]);
    }
    public function users(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('role','user')->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->paginate(6)->withQueryString();

        return view('admin.users', compact('users'));
    }
    public function add_user(){
        return view("admin/add-user");
    }
    public function edit_user($id)
    {
        $user = User::find($id);
        return view("admin/edit-user")->with(["user" => $user]);
    }
    public function events(Request $request)
    {
        $search = $request->input('search');

        $events = Event::when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('venue', 'like', "%{$search}%");
        })->paginate(6)->withQueryString();

        return view('admin.events', compact('events'));
    }
    public function add_event()
    {
        return view("admin/add-event");
    }
    public function storeEvent(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required | min:3',
            'description' => 'required | min:20',
            'venue' => 'required',
            'event_date' => 'required',
            'member_amount' => 'required',
            'nonmember_amount' => 'required | min:1'
        ]);
        Event::create($formFields);
        return redirect('/admin/events')->with(["message" => "Event Created Successfully!"]);
    }
    public function edit_event($id)
    {
        $event = Event::find($id);
        return view("admin/edit-event")->with(["event" => $event]);
    }
    public function update_event(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required | min:3',
            'description' => 'required | min:20',
            'venue' => 'required',
            'event_date' => 'required',
            'member_amount' => 'required',
            'nonmember_amount' => 'required | min:1'
        ]);
        $event = Event::find($request->id);
        $event->update($formFields);

        return back()->with(["message" => "Event Updated Successfully!"]);
    }
    public function delete_event($id)
    {
        Event::destroy($id);
        return back()->with(["message" => "Event Deleted SuccessFully!"]);
    }
}
