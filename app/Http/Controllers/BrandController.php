<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Category, SubCategory, Brand};

use Validator;
use Auth;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Brand')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $brands = Brand::where('status','!=', 'pending')->get();
        return view('pages.backend.brand.index', compact('brands'));
    }

    public function create()
    {
        if (!can('Create Brand')) {
            abort(403);
        }

        $categories = Category::with(['sub_categories' => function($query) {
            $query->where('status', 'active');
        }])
        ->where('status', 'active')
        ->get();
        return view('pages.backend.brand.create', compact('categories'));
    }

    public function store( Request $request )
    {
        if (!can('Create Brand')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'name' => ['required', 'unique:brands,name'],
          'category_id' => ['required', 'exists:categories,id'],
          'subcategory_id' => ['required', 'exists:sub_categories,id'],
          'status' => 'required',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }
        $brand = new Brand();
        $slug = Str::of($request->name)->slug();
        $brand->token = $slug;
        $brand->name = $request->name;
        $brand->category_id = $request->category_id;
        $brand->subcategory_id = $request->subcategory_id;
        $brand->created_by = Auth::id();
        $brand->status = $request->status;
        $brand->save();
        return redirect()
            ->route('backend.brand.index')
            ->with('success', 'Created Successfully!')
            ->withInput();
    }

    public function edit(Brand $brand)
    {
        if (!can('Edit Brand')) {
            abort(403);
        }

        $id =  $brand->id;
        $row = Brand::find($id);
        $categories = Category::with('sub_categories')->get();
        return view('pages.backend.brand.edit', compact('row','categories'));
    }

    public function update(Request $request, Brand $brand)
    {
        if (!can('Edit Brand')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'category_id' => 'required',
          'subcategory_id' => 'required',
          'status' => 'required',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }
        try {
            $slug = Str::of($request->name)->slug();
            $brand->token = $slug;
            $brand->name = $request->name;
            $brand->category_id = $request->category_id;
            $brand->subcategory_id = $request->subcategory_id;
            $brand->status = $request->status;
            $brand->save();
            return redirect()
              ->route('backend.brand.index')
              ->with('success', 'Updated Successfully!');
            } catch (\Exception $e) {
                $validator->getMessageBag()->add('failed', $e->getMessage());
            }
    }

    public function pendingBrand()
    {
        if (!can('Approve Brand')) {
            abort(403);
        }

        $pendingBrands = Brand::where('status', 'pending')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->whereHas('sub_category', function ($query) {
                $query->where('status', 'active');
            })
            ->get();;
        return view('pages.backend.brand.pending', compact('pendingBrands'));
    }

    public function approved(Request $request)
    {
        if (!can('Approve Brand')) {
            abort(403);
        }

        Brand::where('id', $request->id)
          ->update([
              'status' => 'active',
          ]);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
