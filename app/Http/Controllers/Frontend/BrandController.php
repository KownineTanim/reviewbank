<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Category, SubCategory, Brand};
use Validator, Auth;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::with('active_products')
            ->where('status','=', 'active')->get();
        return view('pages.frontend.brand.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => ['required', 'unique:brands,name'],
          'category_id' => 'required',
          'subcategory_id' => 'required',
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
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->category_id = $request->category_id;
        $brand->subcategory_id = $request->subcategory_id;
        $brand->status = "pending";
        $brand->created_by = Auth::id();
        $brand->save();
        return response()->json([
            'status' => 'success',
            'brand' => $brand
        ]);
    }

    public function productList($token)
    {
      $products = Brand::with('active_products')
          ->where('token', $token)
          ->first();
      return view('pages.frontend.brand.brand_product', compact('products'));
    }
}
