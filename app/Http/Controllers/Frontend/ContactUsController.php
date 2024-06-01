<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{ContactMessage, ContactUs};

use Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactUs = ContactUs::first();
        return view('pages.frontend.contact_us.index', compact('contactUs'));
    }

    public function storeMsg(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required',
          'message' => 'required|max:255',
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
        $contactMessage = new ContactMessage();
        $contactMessage->name = $request->name;
        $contactMessage->email = $request->email;
        $contactMessage->message = $request->message;
        $contactMessage->save();
        return response()->json([
            'status' => 'success',
            'contactMessage' => $contactMessage->name
        ]);
    }
}
