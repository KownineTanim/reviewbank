<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Validator, Auth, Storage;
use DateTime, Hash;


class UserConroller extends Controller
{
    public function myProfile()
    {
        $user = User::with(['reviews','active_reviews'])
            ->find(Auth::id());

        $dob = $user->dob;
        $today = new DateTime('now');
        $birthdate = new DateTime($dob);
        $age = $birthdate->diff($today)->y;

        return view('pages.frontend.profile.index', compact('user', 'age'));

    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'first_name' => 'required',
          'last_name' => 'required',
          'postal_code' => 'integer',
          'bio' => 'string|max:255',
          'gender' => 'required',
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

        $id = $request->id;
        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $userName = uniqid();
        $address = $request->address;
        $city = $request->city;
        $country = $request->country;
        $postalCode = $request->postal_code;
        $bio = $request->bio;
        $dob = $request->dob;
        $gender = $request->gender;
        $mobilePrimary = $request->mobile_primary;

        $result = Auth::user()
            ->update([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'user_name' => $userName,
                'address' => $address,
                'city' => $city,
                'country' => $country,
                'postal_code' => $postalCode,
                'bio' => $bio,
                'dob' => $dob,
                'gender' => $gender,
                'mobile_primary' => $mobilePrimary,
            ]);

        $today = new DateTime('now');
        $birthdate = new DateTime($dob);
        $age = $birthdate->diff($today)->y;

        return response()->json([
            'status' => 'success',
            'user' => Auth::user()->only([
                'first_name', 'last_name', 'user_name', 'address', 'city', 'country', 'postal_code', 'bio'
            ]),
            'age' => $age,
        ]);
    }

    public function updateProfilePicture(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'profile_photo' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:500'],
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
        $user = Auth::user();

        if (Storage::disk(config('app.storage_disk'))->exists($user->profile_photo)) {
            Storage::disk(config('app.storage_disk'))->delete($user->profile_photo);
        }
        $user->profile_photo = Storage::disk(config('app.storage_disk'))->putFile('upload/user/profile', $request->file('profile_photo'));
        $user->save();

        return response()->json([
            'status' => 'success',
            'image' => img($user->profile_photo)
        ]);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'previous_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
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

        if ($request->new_password !== $request->confirm_password) {
            return response()->json([
                'status' => 'failed',
                'message' => "New password & Confirm password doesn't match"
            ]);
        }

        $user = Auth::user();

        if (Hash::check($request->previous_password, $user->password))
        {
            $result = Auth::user()
                ->update([
                    'password' => bcrypt($request->new_password),
                ]);
                return response()->json([
                    'status' => 'success'
                ]);
        } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => "Current password is wrong"
                ]);
        }
    }


}
