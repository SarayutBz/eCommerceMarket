<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // return response()->json(['reg' => $request], 201);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message'=>'สำเร็จ']);
        // return redirect()->route('login.l');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('user')->plainTextToken;
            $userId = $user->userID;

            return response()->json(['message'=>'สำเร็จ','this is token'=>$token,'userID'=>$userId]);

            // return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::guard('web')->logout();


        return response()->json(['message'=>'สำเร็จ']);

        // return redirect()->route('home');

    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->update($validatedData);

        return response()->json(['message'=>'สำเร็จ','name-chang'=>$validatedData]);
        // return redirect()->route('profile');
    }

}
