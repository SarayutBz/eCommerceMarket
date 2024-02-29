<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function index()
    {
        $userId = Auth()->user()->getAttributes()['userID'];
        $images = Image::where('userID', $userId)->get();
        // dd($images);
        // return response()->json(['data'=>$images]);

        return view('images.index', compact('images'));
    }

    public function upload(Request $request)
    {
        // dd(Auth::user());
        // dd($request);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        // Assuming Auth::user() returns the authenticated user
        $user = Auth::user();

        // Associate the image with the user by adding 'userID'
        $userId = Auth()->user()->getAttributes()['userID'];
        $images = Image::where('userID', $userId)->get();
        // dd($images);
        if($images->isEmpty()){

            $user->images()->create(['filename' => $imageName]);
        }
        else{
            $user->images()->update(['filename' => $imageName]);

        }

        // return view('auth.profile',compact('images'));
        return redirect()->route('profile')->with('images', $images);
    }
}
