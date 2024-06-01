<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Category, SubCategory};
use Validator, Auth;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with('active_products')
            ->where('status','=', 'active')->get();
        return view('pages.frontend.subcategory.index', compact('subCategories'));
    }

    public function store( Request $request )
    {
      $validator = Validator::make($request->all(), [
          'name' => ['required', 'unique:sub_categories,name'],
          'category_id' => 'required',
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
      $subCategory = new SubCategory();
      $subCategory->name = $request->name;
      $subCategory->category_id = $request->category_id;
      $subCategory->status = "pending";
      $subCategory->created_by = Auth::id();
      $subCategory->save();
      return response()->json([
          'status' => 'success',
          'sub_category' => $subCategory
      ]);
    }

    public function productList($token)
    {
      $products = SubCategory::with('active_products')
          ->where('token', $token)
          ->first();
      return view('pages.frontend.subcategory.subcategory_product', compact('products'));
    }
}
