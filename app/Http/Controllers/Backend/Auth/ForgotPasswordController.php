<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
        return view('Admin.Auth.ForgotPassword');
    }

    public function postEmail(Request $request)
      {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
  
        Mail::send('Admin.Auth.verify', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Đặt lại thông báo mật khẩu');
        });
  
        return back()->with('message', 'Chúng tôi đã gửi qua e-mail liên kết đặt lại mật khẩu của bạn!');
      }
}
