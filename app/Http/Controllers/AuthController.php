<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        if (session('logged_in')) {
            return view('index'); // change the welcome
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['logged_in' => true, 'user_id' => $user->id, 'user_name' => $user->name]);
            return redirect()->route('blog.index')->with('success', 'Welcome,' . $user->name);
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('index');
    }
}
