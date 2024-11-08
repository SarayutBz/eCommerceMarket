<?php

namespace App\Http\Controllers;

use App\Models\code;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Validated;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $randomNumber = mt_rand(100000, 999999);
        // dd($request->email);
        $data = [
            'subject' => 'ball',
            'body' => 'กรุณา เอารหัสนี้ไปกรอก อิอิ' . $randomNumber,
        ];
        $codesend = new MailNotify($data);
        try {
            Mail::to($request->email)->send($codesend);

            // return view('auth.reset', compact('randomNumber'));
            Code::create([
                'email' => $request->email,
                'code' => $randomNumber, // Pass only the random number, not the entire $codesend object
            ]);

            return redirect()->route('showReset');

            // return response()->json(['message' => 'Email sent successfully']);
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
        return view('auth.reset');
    }


    public function reset(Request $request)
    {
        $result = DB::table('codes')
            ->join('users', 'codes.email', '=', 'users.email')
            ->select('codes.*', 'users.*') // Adjust the columns as needed
            ->pluck('code');

            // dd($result);

            // return response()->json(['data'=>$request->code,'data2'=>$result]);

        if($request->code === $result[0]){
            return response('เยี่ยมไอ้สัส');
        }
        else{
            return response('กากสัส');

        }


        // return view('auth.reset');
    }
}
