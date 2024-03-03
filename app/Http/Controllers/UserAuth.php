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

    public function sorry()
    {
        // ไปหน้า sorrypage ตอน กด pay ใน หน้า cart/cart.blade.php
        return view('sorrypage');
    }
    public function showRegister()
    {
        // ไปหน้า register ตอน กด icon user ใน หน้า homepage.blade.php
        return view('auth.register');
    }
    public function showLogin()
    {
        // ไปหน้า login ตอน กด reister เสร็จ ใน หน้า auth/register.blade.php
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // ทำการตรวจสอบ ข้อมูลที่ส่งเข้ามา เช็ก name , email , password
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        // ทำการกำหนด ตัวแปร user ที่ มีคำสั่ง สร้าง ข้อมูลใน table users มี name,email,password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // ไป หน้า login
        return redirect()->route('login.l');
    }

    public function login(Request $request)
    {
        // ทำการตรวจสอบ ข้อมูลที่ส่งเข้ามา เช็ก  email , password ว
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        //ทำการลอกอินผู้ใช้ด้วยข้อมูลที่ถูกส่งมาจากฟอร์ม
        if (Auth::attempt($request->only('email', 'password'))) {
            //ถ้าข้อมูลถูกต้อง คำสั่งนี้จะส่งผลให้ผู้ใช้ล็อกอิน.
            $user = Auth::user();
            // ตรวจสอบว่าผู้ใช้ที่ล็อกอินเข้ามาเป็น Admin หรือไม่. ถ้าเป็น Admin, ระบบจะสร้าง Token สำหรับ Admin แล้ว redirect ไปยัง route 'Orders'
            if ($user->isAdmin()) {
                $token = $user->createToken('admin')->plainTextToken;
                return redirect()->route('Orders');
                //  ถ้าไม่ใช่ Admin, ระบบจะสร้าง Token สำหรับ User แล้ว redirect ไปยัง route 'home'.
            } else {
                $token = $user->createToken('user')->plainTextToken;
                return redirect()->route('home')->withErrors(['email' => 'The provided credentials are incorrect.']);
                ;
            }

        }
        // โยนข้อผิดพลาดแบบ ValidationException พร้อมกับข้อความข้อผิดพลาดที่กำหนดไว้
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    public function forgotpassword()
    {
        // ไปหน้า forgotpassword ตอน กด forgotpassword ใน หน้า auth/login.blade.php
        return view('auth.forgotpassword');
    }

    public function logout(Request $request)
    {
        // ส่วนนี้ทำการลบ Token ทั้งหมดของผู้ใช้ที่ล็อกอินอยู่
        $request->user()->tokens()->delete();
        // ใช้สำหรับล็อกเอาท์ผู้ใช้
        Auth::guard('web')->logout();
        // นำทางกลับไป ที่ หน้า homepage.blade.php โดยใช้ route ที่ชื่อ home
        return redirect()->route('home');

    }



}
