<?php

namespace App\Http\Controllers\Webhook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Hash;
use Validator;
use DB;
use Google_Client;
use Illuminate\Support\Str;
use App\Models\User;

class GoogleController extends Controller
{
    public function signin(Request $req)
    {
        $CLIENT_ID = $req->client_id;
        $id_token = $req->credential;
        $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
        $payload = $client->verifyIdToken($id_token);
        if ($payload) {
          $user = User::where('email', $payload['email'])->first();
          if (!empty($user)) {
              if ($user->status == 'guest-reviewed') {
                  $user->update([
                      'is_verified' => 'true',
                      'status' => 'active',
                      'updated_at' => date('Y-m-d H:i:s'),
                      'verified_at' => date('Y-m-d H:i:s')
                  ]);
              }
          } else {
              $user = User::create([
                  'first_name' => $payload['given_name'],
                  'last_name' => $payload['family_name'],
                  'email' => $payload['email'],
                  'user_name' => uniqid(),
                  'profile_photo' => $payload['picture'],
                  'password' => bcrypt(Str::random(8)),
                  'active_role_id' => 2,
                  'is_verified' => 'true',
                  'status' => 'active',
                  'verified_at' => date('Y-m-d H:i:s')
              ]);
          }

          Auth::login($user);
          cache_permissions();
        } else {
            return redirect()->route('home');
        }

        if (Auth::check()) {
            return redirect()->route('home');
        }
        return redirect()->route('index')->with('error', 'Failed!');
    }
}
