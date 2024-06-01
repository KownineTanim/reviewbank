<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Category, SubCategory, Brand};
use App\Models\{Product, ProductImage};

use Validator, Auth, Storage;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Product')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $products = Product::where('status','!=', 'pending')->get();
        return view('pages.backend.product.index', compact('products'));
    }

    public function create()
    {
        if (!can('Create Product')) {
            abort(403);
        }

        $categories = Category::with('sub_categories.brands')->get();
        return view('pages.backend.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!can('Create Product')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'name' => ['required', 'unique:products,name'],
          'category_id' => ['required', 'exists:categories,id'],
          'subcategory_id' => ['required', 'exists:sub_categories,id'],
          'brand_id' => ['required', 'exists:brands,id'],
          'name' => 'required',
          'thumbnail' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:500'],
          'description' => 'required',
          'status' => 'required',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }
        $filePath = Storage::disk(config('app.storage_disk'))->putFile('upload/product/thumbnails', $request->file('thumbnail'));
        $category = Category::where('id', $request->category_id)->first();
        $subCategory = SubCategory::where('id', $request->subcategory_id)->first();
        $brand = Brand::where('id', $request->brand_id)->first();
        $slug = Str::of($category->name.'-'.$subCategory->name.'-'.$brand->name.'-'.$request->name)->slug();
        $product = new Product();
        $product->token = $slug;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->thumbnail = $filePath;
        $product->description = $request->description;
        $product->created_by = Auth::id();
        $product->status = $request->status;
        $product->save();

        if (count($request->file('other_images'))) {
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

        return redirect()
          ->route('backend.product.index')
          ->with('success', 'Created Successfully!')
          ->withInput();
    }

    public function otherImageStore($productId, Request $request)
    {
        $validator = Validator::make($request->all(), [
           'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:500'],
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

        $productImage = new ProductImage();
        $filePath = Storage::disk(config('app.storage_disk'))->putFile('upload/product/other_images', $request->file('image'));
        $productImage->product_id = $productId;
        $productImage->sort_order = 0;
        $productImage->path = $filePath;
        $productImage->save();

        return response()->json([
            'status' => 'success',
            'image' => $productImage
        ]);

    }

    public function edit(Product $product)
    {
        if (!can('Edit Product')) {
            abort(403);
        }

        $id =  $product->id;
        $row = Product::with('images')->find($id);
        $categories = Category::with('sub_categories.brands')->get();
        return view('pages.backend.product.edit', compact('row','categories'));
    }

    public function update(Request $request, Product $product)
    {
        if (!can('Edit Product')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'category_id' => ['required', 'exists:categories,id'],
            'subcategory_id' => ['required', 'exists:sub_categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }

        try {
            $category = Category::where('id', $request->category_id)->first();
            $subCategory = SubCategory::where('id', $request->subcategory_id)->first();
            $brand = Brand::where('id', $request->brand_id)->first();
            $slug = Str::of($category->name.'-'.$subCategory->name.'-'.$brand->name.'-'.$request->name)->slug();

            if ($request->file('thumbnail')) {
                $thumbnailValidation = Validator::make($request->only('thumbnail'), [
                    'thumbnail' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:500']
                ]);

                if ($thumbnailValidation->fails()) {
                  return redirect()
                      ->back()
                      ->withErrors($thumbnailValidation->errors())
                      ->withInput();
                }
                if (Storage::disk(config('app.storage_disk'))->exists($product->thumbnail)) {
                    Storage::disk(config('app.storage_disk'))->delete($product->thumbnail);
                }
                $product->thumbnail = Storage::disk(config('app.storage_disk'))->putFile('upload/product/thumbnails', $request->file('thumbnail'));
            }

            $product->token = $slug;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->created_by = Auth::id();
            $product->status = $request->status;
            $product->save();

            return redirect()
              ->route('backend.product.index')
              ->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
          $validator->getMessageBag()->add('failed', $e->getMessage());
        }

    }

    public function otherImageDestroy(Request $request, ProductImage $otherImage)
    {
        ProductImage::where('id', $otherImage->id)->delete();

        if (Storage::disk(config('app.storage_disk'))->exists($otherImage->path)) {
            Storage::disk(config('app.storage_disk'))->delete($otherImage->path);
        }
        return response()->json(['success' => true]);
    }

    public function pendingProduct()
    {
        if (!can('Approve Product')) {
            abort(403);
        }

        $pendingProducts = Product::where('status', 'pending')
        ->whereHas('category', function ($query) {
            $query->where('status', 'active');
        })
        ->whereHas('sub_category', function ($query) {
            $query->where('status', 'active');
        })
        ->whereHas('brand', function ($query) {
            $query->where('status', 'active');
        })
        ->get();
        return view('pages.backend.product.pending', compact('pendingProducts'));
    }

    public function approved(Request $request)
    {
        if (!can('Approve Product')) {
            abort(403);
        }

        Product::where('id', $request->id)
          ->update([
              'status' => 'active',
          ]);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
