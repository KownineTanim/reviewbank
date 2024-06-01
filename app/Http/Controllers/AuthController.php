<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Validator;
use DB;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('backend.home');
        }
        return view('auth.signin');
    }

    public function loginAction(Request $req)
    {
        if (Auth::check()) {
            return redirect()->route('backend.home');
        }
        $validator = Validator::make($req->all(), [
            'email' => ['required'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        $user = User::where('email', $req->email)
            ->first();

        if (empty($user)) {
            $validator->getMessageBag()->add('invalid-cred', 'User doesn\'t exists!!');

            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $remember = $req->input('remember') === 'on' ? true : false;
        $credentails = [
            'email'=> $req->email,
            'password' => $req->password
        ];

        if (Auth::attempt($credentails, $remember)) {
            if (Auth::user()->status != 'active') {
                $validator->getMessageBag()->add('invalid-cred', 'Access denied!');
                Auth::logout();
                return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
            }
            if (Auth::user()->is_verified != 'true') {
                Auth::logout();
                $validator->getMessageBag()->add('invalid-cred', 'Please verify your account first!');
                return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
            }
            cache_permissions();
            return redirect()->route('backend.home');

        }

        $validator->getMessageBag()->add('invalid-cred', 'Invalid credentails!');
        return redirect()
            ->back()
            ->withErrors($validator->errors())
            ->withInput();
    }

    public function logout()
    {
        cache_flush_permissions();
        Auth::logout();
        return redirect()->route('backend.login');
    }
}
