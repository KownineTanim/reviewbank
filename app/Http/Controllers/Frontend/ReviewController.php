<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Category, SubCategory, Brand};
use App\Models\{Product, ProductImage, Review};
use App\Models\{ReviewProductFile};

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator, Auth, Storage, View;

class ReviewController extends Controller
{
    public function myReviews()
    {
        $categories = Category::with('sub_categories.brands.products')->get();
        $reviews = Product::select(
            'products.name','products.thumbnail',
            'reviews.id as review_id','reviews.status',
            DB::raw('sum(price_rating + quality_rating + design_rating + durability_rating + service_rating)/5 as rating')
        )
            ->join('reviews', 'reviews.product_id', '=', 'products.id')
            ->where('posted_by', Auth::id())
            ->groupBy('review_id')
            ->take(20)
            ->get();

        $ratings = [];
        foreach ($reviews as $review) {
            if(!array_key_exists($review->review_id, $ratings)) {
                $ratings[$review->review_id] = $review;
            }
        }

        return view('pages.frontend.my_review.my-reviews', compact('categories', 'ratings'));
    }

    public function reviewLoadMore(Request $request)
    {
        $reviews = Product::select(
            'products.name','products.thumbnail',
            'reviews.id as review_id','reviews.status',
            DB::raw('sum(price_rating + quality_rating + design_rating + durability_rating + service_rating)/5 as rating')
        )
            ->join('reviews', 'reviews.product_id', '=', 'products.id')
            ->where('posted_by', Auth::id())
            ->whereNotIn('reviews.id', $request->has('else') ? explode(',', $request->else) : [])
            ->take(10)
            ->groupBy('review_id')
            ->get();

        $ratings = [];
        foreach ($reviews as $review) {
            if(!array_key_exists($review->review_id, $ratings)) {
                $ratings[$review->review_id] = $review;
            }
        }
        return $ratings;
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'product_id' => 'required',
          'ratings.*' => ['required', 'integer', 'min:0', 'max:5'],
          'review_description' => ['required'],
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
        $rowExist = Review::where('product_id', $request->product_id)
                    ->where('posted_by', Auth::id())
                    ->exists();

            if (!empty($rowExist)) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Review already exist'
                ]);
            }
                $review = new Review();
                $review->token = uniqid();
                $review->product_id = $request->product_id;
                $review->posted_by = Auth::id();
                $review->price_rating = $request->ratings['Price'];
                $review->quality_rating = $request->ratings['Quality'];
                $review->design_rating = $request->ratings['Design'];
                $review->durability_rating = $request->ratings['Durability'];
                $review->service_rating = $request->ratings['Service'];
                $review->description = $request->review_description;
                $review->status = "pending";
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
                        $fileStatus = $request->uploaded_document_mode[$i];
                        $documents[] = [
                            'review_id' => $review->id,
                            'path' => $filePath,
                            'type' => $fileType,
                            'size_kb' => $fileSizeInKb,
                            'is_url' => 'false',
                            'status' => $fileStatus

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
                        $fileStatus = $request->url_document_mode[$i];
                        $documents[] = [
                            'review_id' => $review->id,
                            'url' => $url,
                            'size_kb' => -1,
                            'is_url' => 'true',
                            'status' => $fileStatus
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
