<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\code;
use App\Models\User;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Validated;

class MailController extends Controller
{

    public function index(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $randomNumber = mt_rand(100000, 999999);
                $email = $request->email;

                // Delete existing code for the same email
                $result = DB::table('codes')
                    ->where('email', $email)
                    ->pluck('code')
                    ->first();

                if ($result) {
                    Code::where('code', $result)->delete();
                }

                // Send email
                $data = [
                    'subject' => 'ball',
                    'body' => 'กรุณา เอารหัสนี้ไปกรอก อิอิ  ' . $randomNumber,
                ];

                $codesend = new MailNotify($data);
                Mail::to($email)->send($codesend);

                // Create new code
                Code::create([
                    'code' => $randomNumber,
                    'email' => $email,
                ]);

                return redirect()->route('code')->with('email', $email);
            });

        } catch (\Exception $th) {
            \Log::error('Error sending email: ' . $th->getMessage());

            return response()->json([
                'error' => 'Failed to send email. Check your mailbox.',
                'details' => $th->getMessage(),
            ]);
        }
    }


    public function showReset()
    {
        return view('auth.code');
    }
    public function ResetPageview()
    {
        return view('auth.resetpassword');
    }


    public function reset(Request $request)
    {
        // $result = DB::table('codes')
        //     ->join('users', 'codes.email', '=', 'users.email')
        //     ->select('codes.*', 'users.*') // Adjust the columns as needed
        //     ->pluck('code');

        // dd($result);

        // return response()->json(['data'=>$request->code,'data2'=>$result]);

        // if($request->code === $result[0]){
        //     Code::where('code', $request->code)->delete();
        // return response('เยี่ยมไอ้สัส');
        return redirect()->route('resetpage');



        // else{
        //     return response('กากสัส');

        // }


        // return view('auth.reset');
    }
    public function ResetPage()
    {
        return view('resetpassword');
    }

    public function UpdatePassword(Request $request)
    {

        // dd($request);
        $user = User::where('email', $request->email)->first();
        // // dd($user);
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
        ]);

        $user->update([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login.l');
    }

}
