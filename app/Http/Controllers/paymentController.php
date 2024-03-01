<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\personalUser;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class paymentController extends Controller
{
    public function showForm()
    {
        $user = auth()->user();
        // หา personal ตาม userID มาแสดงหน่อย
        $personal = personalUser::where('userID', $user->id)->get();

        return view('auth.payment',compact("personal"));
    }
    public function paymentapi(Request $request)
    {
        try {
            $user = $request->validateWithBag('json', [
                'fname' => 'required',
                'lname' => 'required',
                'adress' => 'required',
                'phonenumber' => 'required',
                'filename' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // return response('success validate');
            // dd($user);
            $personalUserData = $request->except('filename');
            $personalUser = personalUser::create($personalUserData);
            $imageName = time().'.'.$request->filename->extension();
            $request->filename->move(public_path('payments'), $imageName);

            payment::create(['filename' => $imageName]);

            return redirect()->route('home');
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }


        // return redirect()->route('home');
        // return redirect('/home');
    }

}
