<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function formLogin(){

        return view('login');
    }

    public function login(Request $request){

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();
            $key  = Str::uuid();

            return redirect()->route('dashboard.index', ['user' => $user, 'key' => $key]);
        }

        return back()->with('danger','Username atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success','Anda berhasil logout!');
    }
}
