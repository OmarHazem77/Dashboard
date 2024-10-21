<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function handleRegister(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required'
        ]);
        $data['password'] = Hash::make($request->password);
        $user =  User::create($data);
        Auth::login($user);
    }
    public function handleLogin(Request $request)
{
    $data = $request->validate([

        'email' => 'email|required',
        'password' => 'required'
    ]);
    $isLogin = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
    if ($isLogin) {
        return redirect()->route('admin.index');
    }
}
}
