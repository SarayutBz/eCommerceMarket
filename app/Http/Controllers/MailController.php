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

    public function send(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $randomNumber = mt_rand(100000, 999999);
                $email = $request->email;
                
                $user = User::where('email', $request->email)->first();
                $token = $user->createToken('user')->plainTextToken;

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
                    'body' => '  ' . $randomNumber,
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
        // dd($request);
        $code = code::where('email', $request->email)->first()->code;
        if($code == $request->code){
        // return response()->json('good');
        return redirect()->route('resetpage');

        }
        else{

            return redirect()->route('forgotpassword');
        }
        // dd($code);

        // return response()->json(['code'=>$code]);
        // $code = code::where('userID',$userID);



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
