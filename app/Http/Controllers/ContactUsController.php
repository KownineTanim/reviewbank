<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{ContactMessage, ContactUs};

use Validator;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Contact-Us')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function create()
    {
        $contactUs = ContactUs::first();
        return view('pages.backend.contact-us.create', compact('contactUs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'address' => 'required',
          'city' => 'required',
          'country' => 'required',
          'phone' => 'required',
          'phone_optional' => 'required',
          'email' => 'required|email',
          'email_optional' => 'required|email',
          'latitude' => 'required|numeric|between:-90,90',
          'longitude' => 'required|numeric|between:-180,180',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }

        $contactRow = ContactUs::first();

        if (empty($contactRow)) {
            $contactRow = new ContactUs();
        }

        $contactRow->address = $request->address;
        $contactRow->city = $request->city;
        $contactRow->country = $request->country;
        $contactRow->phone = $request->phone;
        $contactRow->phone_optional = $request->phone_optional;
        $contactRow->email = $request->email;
        $contactRow->email_optional = $request->email_optional;
        $contactRow->latitude = $request->latitude;
        $contactRow->longitude = $request->longitude;
        $contactRow->save();

        return redirect()
          ->route('backend.contact-us.create')
          ->with('success', 'Contact Page Info Created Successfully!')
          ->withInput();
    }

    public function messageList()
    {
        $contactMessages = ContactMessage::get();
        return view('pages.backend.contact-us.message_list', compact('contactMessages'));
    }

    public function contactMessageDestroy(Request $request, ContactMessage $contactMessage)
    {
        if (!can('Delete Contact-Message')) {
            abort(403);
        }

        ContactMessage::where('id', $contactMessage->id)->delete();
        return response()->json(['success' => true]);
    }
}
