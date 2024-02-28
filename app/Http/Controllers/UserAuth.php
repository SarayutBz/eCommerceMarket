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
    public function forgotpassword(){
        return view('auth.forgotpassword');
    }

    public function deleteAccount(Request $request){
        $user = $request->validate([

            'userID' => 'required',
            'email' => 'required',
            'name' => 'required',

        ]);

        User::where('userID', $user['userID'])
        ->where('email', $user['email'])
        ->delete();

        return redirect()->route('home');
    }


    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Update the user's name
        $user->update($validatedData);

        // Add a success flash message
        session()->flash('success', 'Your name has been updated successfully.');

        // Redirect to a specific route or view
        return redirect()->route('profile'); // Adjust the route name accordingly
    }

    public function profile(){
        $products = Product::all();
        // $userImages = Image::all();
        // $userID = Auth::user();
        $userId = Auth()->user()->getAttributes()['userID'];
        $images = Image::where('userID', $userId)->get();
        // dd($images);
        return view('auth.profile',compact('products','images'));
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

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        // Correct way to get user ID
        $userId = $user->id;

        return redirect()->route('home');
    }

    // If authentication fails
    throw ValidationException::withMessages([
        'email' => ['The provided credentials are incorrect.'],
    ]);
}



        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        // ]);

        // if (!Auth::attempt($request->only('email', 'password'))) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }
        // if(Auth::user()){

        //     $user = Auth::user();

        //     $token = $user->createToken('auth_token')->plainTextToken;
        //     return redirect()->route('home');
        // }

        // $token = Auth::user()->createToken('auth_token')->plainTextToken;
        // return response()->json(['token' => $token], 200);


        // return response()->json(['token' => $token], 200);


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::logout();
        // request()->session()->invalidate();

        // return response()->json(['message' => 'Logged out'], 200);
        return redirect()->route('home');

    }



}
