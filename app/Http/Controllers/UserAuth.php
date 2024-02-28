<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserAuth extends Controller
{
    public function index(){
        return view('Orders');
    }


    public function profile(){
        $products = Product::all();

        return view('auth.profile',compact('products'));
    }
    public function showRegister(){
        return view('auth.register');
    }
    public function showLogin(){
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

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        if(Auth::user()){

            $user = Auth::user();

            $token = $user->createToken('auth_token')->plainTextToken;
            return redirect()->route('home');
        }

        // $token = Auth::user()->createToken('auth_token')->plainTextToken;
        // return response()->json(['token' => $token], 200);


        // return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::logout();
        // request()->session()->invalidate();

        // return response()->json(['message' => 'Logged out'], 200);
        return redirect()->route('home');

    }
}
