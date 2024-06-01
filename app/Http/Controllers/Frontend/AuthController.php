<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Hash;
use Validator;
use DB;
use Google_Client;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('auth.signin');
    }

    public function loginAction(Request $req)
    {
        if (Auth::check()) {
            return response()->json([
                'status' => 'failed',
                'message' => '403 | Forbidden'
            ]);
        }
        $validator = Validator::make($req->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $message = [];

            foreach ($validator->errors()->all() as $error) {
                $message[] = $error;
            }
            return response()->json([
                'status' => 'failed',
                'message' => join(' | ', $message)
            ]);
        }
        $remember = $req->remember === 'true' ? true : false;
        $credentails = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if (Auth::attempt($credentails, $remember)) {
            if (Auth::user()->status != 'active') {
                Auth::logout();
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Account Deactivated, Please contact support!'
                ]);
            }
            if (Auth::user()->is_verified != 'true') {
                Auth::logout();
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Please verify your account first!'
                ]);
            }
            cache_permissions();
            return response()->json([
                'status' => 'success',
                'message' => 'Login Successfull!'
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'Invalid credentails!'
        ]);
    }

    public function registrationAction(Request $req)
    {
        if (Auth::check()) {
            return response()->json([
                'status' => 'failed',
                'message' => '403 | Forbidden'
            ]);
        }
        $validator = Validator::make($req->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
            'confirmed' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            $message = [];

            foreach ($validator->errors()->all() as $error) {
                $message[] = $error;
            }
            return response()->json([
                'status' => 'failed',
                'message' => join(' | ', $message)
            ]);
        }

        if ($req->confirmed !== $req->password) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Password not matched'
            ]);
        }

        $wasGuest = User::where('email', $req->email)->first();

        if (!empty($wasGuest)) {
            if ($wasGuest->status == 'guest-reviewed') {
                $wasGuest->update([
                    'status' => 'invalid',
                    'password' => bcrypt($req->password),
                    'verification_token' => md5(uniqid()),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                $user = $wasGuest;
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Email already been taken!'
                ]);
            }
        } else {
            $user = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => bcrypt($req->password),
                'verification_token' => md5(uniqid()),
                'active_role_id' => 2
            ]);
        }

        \Mail::to($req->email)->send(new \App\Mail\VerificationEmail($user));

        return response()->json([
            'status' => 'success',
            'message' => 'Registration Successfull! A Verification Email Sent!',
            'user' => $user
        ]);
    }

    public function accountVerify($token)
    {
        $user = User::where('verification_token', $token)
            ->where('is_verified', 'false')
            ->first();

        if (empty($user) || empty($token)) {
            return "
                <center><h2 style='color:red'>Invalid Token!</h2></center>
                <script>setTimeout(()=>{window.location.href = '/';}, 3000);</script>
            ";
        }

        $user->update([
            'is_verified' => 'true',
            'status' => 'active',
            'verified_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('home')->with('success', 'Verification Successfull!');
    }

    public function logout()
    {
        cache_flush_permissions();
        Auth::logout();
        return redirect()->route('home');
    }
}
