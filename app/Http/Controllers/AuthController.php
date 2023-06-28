<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->user_type == 1) {
                return redirect('admin/dashboard');
            } else if ($user->user_type == 2) {
                return redirect('student/dashboard');
            }
        }

        return redirect()->back()->with('error', 'Data tidak cocok di sistem.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function forgetPassword()
    {
        return view('auth.forgot');
    }

    public function postForgetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Tolong cek kotak masuk di Email anda');
        } else {
            return redirect()->back()->with('error', 'Email tidak terdaftar di sistem.');
        }
    }

    public function resetPassword($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
    }

    public function PostReset($token, Request $request)
    {
        if ($request->password == $request->cpassword) {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url('/login'))->back()->with('success', 'Password berhasil di ubah');
        } else {
            return redirect()->back()->with('error', 'Password dan Confirm Password tidak cocok');
        }
    }
}