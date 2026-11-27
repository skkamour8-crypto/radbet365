<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showRegister(): View { return view('auth.register'); }
    public function showLogin(): View { return view('auth.login'); }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required','string','max:100'],
            'email' => ['required','email','max:190','unique:users,email'],
            'password' => ['required','string','min:10','confirmed'],
        ]);
        $user = DB::transaction(function () use ($data) {
            $user = User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>Hash::make($data['password'])]);
            $user->wallet()->create(['points'=>0]);
            return $user;
        });
        auth()->login($user);
        $request->session()->regenerate();
        return redirect()->route('home')->with('status','تم إنشاء الحساب برصيد صفر نقطة.');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate(['email'=>['required','email'],'password'=>['required','string']]);
        if (!auth()->attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email'=>'بيانات الدخول غير صحيحة.'])->onlyInput('email');
        }
        $request->session()->regenerate();
        return redirect()->intended(route('home'));
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
