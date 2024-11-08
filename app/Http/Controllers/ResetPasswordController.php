<?php



namespace App\Http\Controllers;
// บรรทัดแรกของไฟล์
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{


    protected $redirectTo = '/'; // หรือไปยังที่ที่คุณต้องการ

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function guard()
    {
        return Auth::guard('web'); // แก้ไขตามต้องการ
    }

    protected function broker()
    {
        return Password::broker('users'); // แก้ไขตามต้องการ
    }
    protected function reset(Request $request)
    {
        $token = $request->input('token');
        $email = $request->input('email');
        $password = $request->input('password');

        // หา User ที่มีอีเมลตามที่ได้รับ
        $user = User::where('email', $email)->first();
            $newPassword = bcrypt($password);
            $user->update(['password' => $newPassword]);
            dd($user);

    }

}
