<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Product, Review, ReviewProductFile};

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator, Auth, Storage;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Review')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $products = Product::orderBy("name", "asc")
            ->get();

            foreach ($products as $index => $product) {
                $product->avg_rating = 0;


                foreach ($product->reviews as $key => $review) {
                    $product->reviews[$key]->avg_rating = (
                            $review->price_rating
                            + $review->quality_rating
                            + $review->design_rating
                            + $review->durability_rating
                            + $review->service_rating
                        )/5;
                    $product->avg_rating += $product->reviews[$key]->avg_rating;
                }

                if (count($product->reviews)) {
                    $product->avg_rating = $product->avg_rating / count($product->reviews);
                }

                $products[$index] = $product;
            }

        return view('pages.backend.review.index', compact('products'));
    }

    public function create()
    {
        if (!can('Create Review')) {
            abort(403);
        }

        $products = Product::orderBy('name')->get();
        return view('pages.backend.review.create', compact('products'));
    }

    public function store(Request $request)
    {
        if (!can('Create Review')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'product_id' => ['required', 'exists:products,id'],
          'design_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'quality_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'durability_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'price_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'service_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'status' => ['required'],
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
            if (!empty($rowExist )) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Review already exist'
                ]);
            }

            $review = new Review();
            $review->token = uniqid();
            $review->product_id = $request->product_id;
            $review->posted_by = Auth::id();
            $review->price_rating = $request->design_rating;
            $review->quality_rating = $request->quality_rating;
            $review->design_rating = $request->durability_rating;
            $review->durability_rating = $request->price_rating;
            $review->service_rating = $request->service_rating;
            $review->description = $request->review_description;
            $review->status = $request->status;


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

    public function productWiseReview($id)
    {
        $product = Product::with('reviews.postedBy')
            ->where('id', $id)
            ->first();

        return view('pages.backend.review.product_wise_reviews', compact('product'));
    }

    public function singleReview($id)
    {
        $review = Review::with('product.brand')
            ->where('id', $id)
            ->first();
        return view('pages.backend.review.single_review', compact('review'));
    }

    public function edit(Review $review)
    {
        if (!can('Edit Review')) {
            abort(403);
        }

        $id =  $review->id;
        $row = Review::with('reviewFiles')
            ->find($id);
        $products = Product::orderBy('name')->get();
        return view('pages.backend.review.edit', compact('row', 'products'));
    }

    public function update(Request $request, Review $review)
    {
        if (!can('Edit Review')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'product_id' => 'required',
          'design_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'quality_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'durability_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'price_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'service_rating' => ['required', 'integer', 'min:0', 'max:5'],
          'status' => 'required',
          'review_description' => ['required', 'min:25']
        ]);

        if ($validator->fails()) {
            return redirect()
              ->back()
              ->withErrors($validator->errors());
        }
        try {
            $review->product_id = $request->product_id;
            $review->posted_by = Auth::id();
            $review->price_rating = $request->design_rating;
            $review->quality_rating = $request->quality_rating;
            $review->design_rating = $request->durability_rating;
            $review->durability_rating = $request->price_rating;
            $review->service_rating = $request->service_rating;
            $review->description = $request->review_description;
            $review->status = $request->status;
            $review->save();
            return redirect()
              ->route('backend.review.productWiseReview', [$review->product_id])
              ->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
          $validator->getMessageBag()->add('failed', $e->getMessage());
        }


    }

    public function pendingReview()
    {
        if (!can('Approve Review')) {
            abort(403);
        }

        $pendingReviews = Review::whereIn('status', ['pending', 'guest-pending'])
            ->get();
        return view('pages.backend.review.pending', compact('pendingReviews'));
    }

    public function approved(Request $request)
    {
        if (!can('Approve Review')) {
            abort(403);
        }

        Review::where('id', $request->id)
          ->update([
              'status' => 'active',
              'approved_by' => Auth::id(),

          ]);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
