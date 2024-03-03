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
            // ทำให้กระบวนการทั้งหมดถูกจัดเก็บไว้ใน Transaction, ถ้ามีข้อผิดพลาดเกิดขึ้นขณะทำงาน, Laravel จะทำการ Rollback ข้อมูลทั้งหมดที่ถูกบันทึก
            return DB::transaction(function () use ($request) {
                // สร้างตัวเลขสุ่มระหว่าง 100,000 ถึง 999,999 เพื่อนำมาใช้เป็นรหัสยืนยัน.
                $randomNumber = mt_rand(100000, 999999);
                // ดึงค่าอีเมลจาก request.
                $email = $request->email;

                // $user = User::where('email', $request->email)->first();
                // $token = $user->createToken('user')->plainTextToken;

                // ตรวจสอบว่ามีรหัสยืนยันที่มีอยู่แล้วสำหรับอีเมลนี้หรือไม่ ถ้ามี, ก็ทำการลบรหัสยืนยันที่มีอยู่.
                $result = DB::table('codes')
                    ->where('email', $email)
                    ->pluck('code')
                    ->first();

                if ($result) {
                    Code::where('code', $result)->delete();
                }

                // Send email
                // สร้างข้อมูลที่ใช้ในการสร้างอีเมล (subject และ body).
                $data = [
                    'subject' => 'ball',
                    'body' => '  ' . $randomNumber,
                ];
                // สร้าง instance ของ MailNotify ซึ่งคือ Mailable class ที่มีหน้าที่จัดรูปแบบของอีเมล.
                $codesend = new MailNotify($data);
                // ส่งอีเมลไปยังอีเมลที่ได้รับการระบุใน $email.
                Mail::to($email)->send($codesend);

                // Create new code
                Code::create([
                    'code' => $randomNumber,
                    'email' => $email,
                ]);

                // ไปยังหน้าที่มีชื่อเส้นทาง 'code' และส่งข้อมูลอีเมลไปด้วย.
                return redirect()->route('code')->with('email', $email);
            });
            // ในกรณีที่มีข้อผิดพลาดเกิดขึ้นขณะการทำ Transaction, จะถูก catch และทำการ log ข้อผิดพลาดที่เกิดขึ้น. ส่งข้อความข้อผิดพลาดกลับให้ผู้ใช้ผ่าน response JSON.
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
        // ไปยังหน้า auth/code.blade.php
        return view('auth.code');
    }
    public function ResetPageview()
    {
        // ไปยังหน้า auth/resetpassword.blade.php
        return view('auth.resetpassword');
    }


    public function reset(Request $request)
    {
        // dd($request);
        // หา ข้อมูลใน database table code ที่มี email ตรงกับ ที่รับมา ให้ นำค่า code ออกมาเก็บใน $code
        $code = code::where('email', $request->email)->first()->code;
        //ถ้า หาก $code มีค่า ตรง กับ ค่าที่รับมา
        if($code == $request->code){
        // return response()->json('good');
        // ให้ ไปหน้า auth/resetpassword.blade.php
        return redirect()->route('resetpage');

        }
        else{
        // ให้ ไปหน้า auth/forgotpassword.blade.php
            return redirect()->route('forgotpassword');
        }
        // dd($code);

        // return response()->json(['code'=>$code]);
        // $code = code::where('userID',$userID);

    }
    public function ResetPage()
    {
        // ทำการแสดงหน้า auth/resetpassword.blade.php
        return view('resetpassword');
    }

    public function UpdatePassword(Request $request)
    {

        // dd($request);
        // หาข้อมูล email ใน database table users
        $user = User::where('email', $request->email)->first();
        // // dd($user);
        // ตรวจสอบความถูกต้อง
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
        ]);
        //ทำการ อัพเดต รหัส ผ่าน
        $user->update([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        // กลับไปหน้า login
        return redirect()->route('login.l');
    }

}
