<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('profile.index');
        }

        return view('profile.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('profile.index');
        }
        return back()
            ->withInput($request->except('password'))
            ->withErrors(['email' => 'Такого email не существует']);
    }

    public function logout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('profile.login.index');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('profile.login.index');
    }
}
