<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);


        Auth::login($user);

        return redirect()->route('create.form', ['id' => $user->id]);
    }

    public function showCreateForm($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login.form')->with('error', 'You must be logged in.');
        }

        $user = User::findOrFail($id);
        return view('auth.create', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|string',
            'rfid' => 'required|unique:users',
            'schoolyear' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'status' => $validated['status'],
            'rfid' => $validated['rfid'],
            'schoolyear' => $validated['schoolyear'],
        ]);

        return redirect()->route('socmed.form', ['id' => $user->id]);
    }

    public function showSocmedForm($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login.form')->with('error', 'You must be logged in.');
        }

        $user = Auth::user();

        if ($user->id != $id) {
            return redirect()->route('socmed.form', ['id' => $user->id])
                             ->with('error', 'Unauthorized access.');
        }

        return view('socmed', compact('user'));
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('socmed.form', ['id' => $user->id])->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }
    public function showInbox()
    {
        $user = Auth::user();

        $contacts = User::where('id', '!=', $user->id)->get();

        return view('inbox', compact('user', 'contacts'));
    }


}
