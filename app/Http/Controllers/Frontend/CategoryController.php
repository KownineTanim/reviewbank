<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{ Category, Product };
use Validator, Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('active_products')
            ->where('status','=', 'active')->get();
        return view('pages.frontend.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => ['required', 'unique:categories,name'],
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
        $category = new Category();
        $category->name = $request->category_name;
        $category->status = "pending";
        $category->created_by = Auth::id();
        $category->save();

        return response()->json([
            'status' => 'success',
            'category' => $category
        ]);
    }

    public function productList($token)
    {
        $products = Category::with('active_products.active_reviews')
            ->where('token', $token)
            ->first();
      return view('pages.frontend.category.category_product', compact('products'));
    }
}
