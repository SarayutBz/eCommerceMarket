<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserAuth extends Controller
{

    public function sorry()
    {
        return view('sorrypage');
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // return response()->json(['reg' => $request], 201);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return redirect()->route('login.l');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->isAdmin()) {
                $token = $user->createToken('admin')->plainTextToken;
                return redirect()->route('Orders');

            } else {
                $token = $user->createToken('user')->plainTextToken;
                return redirect()->route('home');
            }

            // $userId = $user->id;

        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    public function forgotpassword()
    {
        return view('auth.forgotpassword');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::guard('web')->logout();


        return redirect()->route('home');

    }



}
