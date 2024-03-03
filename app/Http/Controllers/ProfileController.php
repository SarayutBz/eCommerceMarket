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

        // รับค่า userID ใน ระบบ ออกมาใช้ เก็บใน ตัวแปร $ีuserID
        $userId = Auth()->user()->getAttributes()['userID'];
        // ดึงค่า Image ของ user เฉพาะ คน เก็บใน ตัวแปร images
        $images = Image::where('userID', $userId)->get();
        // ไปที่หน้า profile ส่งค่า images ไปที่หน้านี้ด้วย
        return view('auth.profile', compact('images'));
    }

    public function update(Request $request)
    {
        // ตรวจสอบ ข้อมูลที่รับ
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        //ทำการดึงข้อมูลของผู้ใช้ที่ล็อกอินอยู่แล้ว เก็บไว้ในตัวแปร $user
        $user = auth()->user();
        // ทำการอัพเดต ชื่อ ให้
        $user->update($validatedData);

        return redirect()->route('profile');
    }
    public function deleteAccount(Request $request)
    {
        //ทำการ ตรวจสอบ ข้อมูลที่รับเข้ามา เก็บไว้ที่ user
        $user = $request->validate([

            'userID' => 'required',
            'email' => 'required',
            'name' => 'required',

        ]);
        // หา userID ที่ตรง กับ  userID ที่รับเข้ามา และ email ใน database แล้วทำการลบข้อมูล
        User::where('userID', $user['userID'])
            ->where('email', $user['email'])
            ->delete();
        // ไปที่ หน้า homepage.blade.php
        return redirect()->route('home');
    }




}
