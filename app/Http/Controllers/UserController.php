<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register',$data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('login')->with('success','Registration Success. Please Login!');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login',$data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email,'password'=> $request->password])) {
            $request->session()->regenerate();
            // return redirect()->intended('/');
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['password'=>'Wrong Email or Password!']);
    }

    // public function password()
    // {
    //     $data['title'] = 'Change Password';
    //     return view('user/password',$data);
    // }

    // public function password_action(Request $request)
    // {
    //     $request->validate([
    //         'old_password' => 'required|current_password',
    //         'new_password' => 'required|confirmed',
    //     ]);
    //     $user = User::find(Auth::id());
    //     $user->password = Hash::make($request->new_password);
    //     $user->save();
    //     $request->session()->regenerate();
    //     return back()->with('success','Password Changed!');
    // }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect ('/');
    // }
}
