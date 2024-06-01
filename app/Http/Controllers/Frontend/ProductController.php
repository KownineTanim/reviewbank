<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Category, SubCategory, Brand};
use App\Models\{Review, ReviewProductFile, Slider};
use App\Models\{LandingPageItem, Product, ProductImage};

use Illuminate\Support\Facades\DB;
use Validator, Auth, Storage, View;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public static function recentProduct()
    {
        $products = Product::with('active_reviews')
            ->where('status', 'active')
            ->orderBy("name", "asc")
            ->take(12)
            ->get();
        foreach ($products as $index => $product) {
            $product->avg_rating = 0;
            $product->reviews = $product->active_reviews;

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
                $product->avg_rating = round($product->avg_rating / count($product->reviews), 1);
            }

            $products[$index] = $product;
        }

        return $products;
    }

    public function recentProductLoadMore(Request $request)
    {
        $products = Product::with('active_reviews')
            ->where('status', 'active')
            ->whereNotIn('id', $request->has('else') ? explode(',', $request->else) : [])
            ->orderBy("name", "asc")
            ->take(18)
            ->get();

        foreach ($products as $index => $product) {
            $product->avg_rating = 0;
            $product->reviews = $product->active_reviews;

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
                $product->avg_rating = round($product->avg_rating / count($product->reviews), 1);
            }

            $products[$index] = $product;
        }

        $html = View::make('include.frontend.recent_product_items', [
            'products' => $products,
            'id' => $request->item,
        ]);
        return $html;
    }

    public function recentProductFilter(Request $request)
    {
        $categoryId =  $request->category_id;
        $subcategoryId =  $request->subcategory_id;
        $brandId =  $request->brand_id;
        $minRating =  $request->min_rating;
        $products = Product::with('active_reviews','sub_category')
            ->when($categoryId, function($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($subcategoryId, function($query) use ($subcategoryId) {
                $query->where('subcategory_id', $subcategoryId);
            })
            ->when($brandId, function($query) use ($brandId) {
                $query->where('brand_id', $brandId);
            })
            ->where('status', 'active')
            ->orderBy("id", "desc")
            ->get();
        $filteredProducts = [];

        foreach ($products as $index => $product) {
            $product->avg_rating = 0;
            $product->reviews = $product->active_reviews;

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
                $product->avg_rating = round($product->avg_rating / count($product->reviews), 1);
            }

            if ($product->avg_rating >= $minRating) {
                $filteredProducts[] = $product;
            }
        }

        $html = View::make('include.frontend.recent_product_items', [
            'products' => $filteredProducts,
            'id' => $request->item,
        ]);
        return $html;
    }

    public function search(Request $request)
    {
        $categoryId = $request['category_id'];
        $search = $request['search'];

        $products = Product::with('category')
            ->when($categoryId, function($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->where('name', 'like', "%$search%")
            ->where('status', 'active')
            ->take(20)
            ->get();

        return response()->json([
            'status' => 'success',
            'products' => $products
        ]);
    }

    public function view($token)
    {

        $product = Product::with(['active_reviews.postedBy', 'images'])
            ->where('token', $token)
            ->first();

        $product->avg_rating = 0;
        $product->avg_price_rating = 0;
        $product->avg_quality_rating = 0;
        $product->avg_design_rating = 0;
        $product->avg_durability_rating = 0;
        $product->avg_service_rating = 0;
        $product->reviews = $product->active_reviews;

        foreach ($product->reviews as $key => $review) {
            $product->reviews[$key]->avg_rating = (
                    $review->price_rating
                    + $review->quality_rating
                    + $review->design_rating
                    + $review->durability_rating
                    + $review->service_rating
                )/5;
            $product->avg_rating += $product->reviews[$key]->avg_rating;
            $product->avg_price_rating += $review->price_rating;
            $product->avg_quality_rating += $review->quality_rating;
            $product->avg_design_rating += $review->design_rating;
            $product->avg_durability_rating += $review->durability_rating;
            $product->avg_service_rating += $review->service_rating;
        }

        if (count($product->reviews)) {
            $product->avg_rating = round($product->avg_rating / count($product->reviews), 1);
        }
        if (count($product->reviews)) {
            $product->avg_price_rating = round($product->avg_price_rating / count($product->reviews), 1);
        }
        if (count($product->reviews)) {
            $product->avg_quality_rating = round($product->avg_quality_rating / count($product->reviews), 1);
        }
        if (count($product->reviews)) {
            $product->avg_design_rating = round($product->avg_design_rating / count($product->reviews), 1);
        }
        if (count($product->reviews)) {
            $product->avg_durability_rating = round($product->avg_durability_rating / count($product->reviews), 1);
        }
        if (count($product->reviews)) {
            $product->avg_service_rating = round($product->avg_service_rating / count($product->reviews), 1);
        }

        $categories = Category::with('sub_categories.brands.products')->get();
        return view('pages.frontend.product.product-details', compact('product', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'product_name' => ['required', 'unique:products,name'],
          'category_id' => 'required',
          'subcategory_id' => 'required',
          'brand_id' => 'required',
          'product_thumb' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:500'],
          'product_desc' => 'required',
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

        $filePath = Storage::disk(config('app.storage_disk'))->putFile('upload/product/thumbnails', $request->file('product_thumb'));
        $category = Category::where('id', $request->category_id)->first();
        $subCategory = SubCategory::where('id', $request->subcategory_id)->first();
        $brand = Brand::where('id', $request->brand_id)->first();
        $slug = Str::of($category->name.'-'.$subCategory->name.'-'.$brand->name.'-'.$request->product_name)->slug();
        $product = new Product();
        $product->token = $slug;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->product_name;
        $product->thumbnail = $filePath;
        $product->description = $request->product_desc;
        $product->created_by = Auth::id();
        $product->status = "pending";
        $product->save();

        if (!empty($request->file('other_images'))) {
            $otherImages = [];

            foreach ($request->file('other_images') as $i => $file) {
                $imageFilePath = Storage::disk(config('app.storage_disk'))->putFile('upload/product/other_images', $file);
                $otherImages[] = [
                    'product_id' => $product->id,
                    'path' => $imageFilePath,
                    'sort_order' => $i
                ];
            }
            ProductImage::insert($otherImages);
        }

        return response()->json([
            'status' => 'success',
            'product' => $product
        ]);
    }

    public static function topRatedProducts()
    {
        $products = Product::with('active_reviews')
            ->where('status', 'active')
            ->get();
        $productsIndexed = [];

        foreach ($products as $index => $product) {
            $product->avg_rating = 0;
            $product->reviews = $product->active_reviews;

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
                $product->avg_rating = round($product->avg_rating / count($product->reviews), 1);
            }

            $productsIndexed["{$product->avg_rating}_{$index}"] = $product;
        }
        krsort($productsIndexed);
        return array_slice($productsIndexed,0,3);
    }



}
