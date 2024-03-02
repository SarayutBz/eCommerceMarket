<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $products = Product::all();

        $userId = Auth()->user()->getAttributes()['userID'];
        $images = Image::where('userID', $userId)->get();

        return view('auth.profile', compact('products', 'images'));
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->update($validatedData);

        return redirect()->route('profile');
    }
    public function deleteAccount(Request $request)
    {
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




}
