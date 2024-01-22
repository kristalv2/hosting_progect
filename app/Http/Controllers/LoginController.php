<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index(): View{
        return view('login');
    }

    public function login(Request $request): RedirectResponse {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        }
        return back()->withErrors(['email' => 'Неправильный пароль или почта.']);
    }

    public function logout(): RedirectResponse {
        Auth::logout();
        return redirect('/');
    }
}
