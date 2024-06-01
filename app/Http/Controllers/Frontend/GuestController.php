<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{ UserHasRole, User, Review};
use App\Models\{ ReviewProductFile };

use Validator, Storage;


class GuestController extends Controller
{
    public function guestReviewStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'reviewer_name' => 'required',
          'reviewer_email' => ['required', 'email'],
          'reviewer_phone' => 'required',
          'product_id' => 'required',
          'ratings.*' => ['required', 'integer', 'min:0', 'max:5'],
          'review_description' => ['required']
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

        $user = User::where('email', $request->reviewer_email)->first();

        if (empty($user)) {
            $user = new User();
            $user->name = $request->reviewer_name;
            $user->email = $request->reviewer_email;
            $user->mobile_primary = $request->reviewer_phone;
            $user->active_role_id = 2;
            $user->gender = 'others';
            $user->status = 'guest-reviewed';
            $user->password = bcrypt('123456');
            $user->save();

            UserHasRole::insert([
                [
                    'user_id' => $user->id,
                    'role_id' => 2
                ]
            ]);
        }

        $review = new Review();
        $review->token = uniqid();
        $review->product_id = $request->product_id;
        $review->posted_by = $user->id;
        $review->price_rating = $request->ratings['Price'];
        $review->quality_rating = $request->ratings['Quality'];
        $review->design_rating = $request->ratings['Design'];
        $review->durability_rating = $request->ratings['Durability'];
        $review->service_rating = $request->ratings['Service'];
        $review->description = $request->review_description;
        $review->status = "guest-pending";

        if ($review->save()) {
            $fileValidator = Validator::make($request->all(), [
                'uploaded_document.*' => [ 'mimes:jpeg,png,pdf,jpg,mp4', 'max:200000']
            ]);
            if ($fileValidator->fails()) {
                $message = [];

                foreach ($fileValidator->errors()->all() as $error) {
                    $message[] = $error;
                }
                return response()->json([
                    'status' => 'failed',
                    'message' => join(' | ', $message)
                ]);
            }
            $documents = [];

            foreach (($request->file('uploaded_document') ?? []) as $i => $file) {
                $filePath = Storage::disk(config('app.storage_disk'))->putFile('upload/review/documents', $file);
                $fileType = $file->getClientOriginalExtension();
                $fileSizeInKb = $file->getSize() / 1024;

                $documents[] = [
                    'review_id' => $review->id,
                    'path' => $filePath,
                    'type' => $fileType,
                    'size_kb' => $fileSizeInKb,
                    'is_url' => 'false'
                ];
            }
            if(count($documents)) {
                ReviewProductFile::insert($documents);
            }

            $urlValidator = Validator::make($request->all(), [
                'uploaded_document_url.*' => ['url']
            ]);
            if ($urlValidator->fails()) {
                $message = [];

                foreach ($urlValidator->errors()->all() as $error) {
                    $message[] = $error;
                }
                return response()->json([
                    'status' => 'failed',
                    'message' => join(' | ', $message)
                ]);
            }
            $documents = [];

            foreach (($request->uploaded_document_url ?? []) as $i => $url) {
                $documents[] = [
                    'review_id' => $review->id,
                    'url' => $url,
                    'size_kb' => -1,
                    'is_url' => 'true'
                ];
            }

            if(count($documents)) {
                ReviewProductFile::insert($documents);
            }
        }

        return response()->json([
            'status' => 'success'
        ]);
    }
}
