<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{


    public function upload(Request $request)
    {
        // dd(Auth::user());
        // dd($request);
        //ทำการ validate ข้อมูลที่รับเข้ามาใน request ว่าเป็นรูปภาพที่ถูกต้องหรือไม่.
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //สร้างชื่อไฟล์รูปภาพใหม่โดยใช้ timestamp ปัจจุบันและนามสกุลไฟล์เดิม.
        $imageName = time() . '.' . $request->image->extension();
        //บันทึกรูปภาพใน storage โดยใช้ชื่อไฟล์ที่ได้จากข้อ 2.
        $request->image->storeAs('public/images', $imageName);

        //เพื่อดึงข้อมูลของผู้ใช้ที่ล็อกอินอยู่.
        $user = Auth::user();

        //เก็บค่า userID ไว้ที่ userId
        $userId = Auth()->user()->getAttributes()['userID'];
        // หารูปที่ เก็บใน database ของ userID คนนี้
        $images = Image::where('userID', $userId)->get();
        // dd($images);
        // ถ้าไม่มี, ให้สร้างรูปภาพใหม่ด้วย create.
        if($images->isEmpty()){

            $user->images()->create(['filename' => $imageName]);
        }
        //ถ้ามีแล้ว, ให้ทำการอัปเดตรูปภาพที่เชื่อมโยงด้วย update.
        else{
            $user->images()->update(['filename' => $imageName]);

        }

        // return view('auth.profile',compact('images'));
        //ไปยังหน้าที่มีชื่อเส้นทาง 'profile' และส่งข้อมูลรูปภาพไปด้วย
        return redirect()->route('profile')->with('images', $images);
    }
}
