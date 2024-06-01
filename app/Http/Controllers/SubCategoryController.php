<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, SubCategory};

use Validator;
use Auth;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Sub-Category')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $subCategories = SubCategory::where('status','!=', 'pending')->get();
        return view('pages.backend.sub-category.index', compact('subCategories'));
    }

    public function create()
    {
        if (!can('Create Sub-Category')) {
            abort(403);
        }
        $categories = Category::where('status', 'active')->get();
        return view('pages.backend.sub-category.create', compact('categories'));
    }

    public function store( Request $request )
    {
        if (!can('Create Sub-Category')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:sub_categories,name'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        $subCategory = new SubCategory();
        $slug = Str::of($request->name)->slug();
        $subCategory->token = $slug;
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->created_by = Auth::id();
        $subCategory->status = $request->status;
        $subCategory->save();
        return redirect()
        ->route('backend.sub-category.index')
        ->with('success', 'Created Successfully!')
        ->withInput();
    }

    public function edit(SubCategory $subCategory)
    {
        if (!can('Edit Sub-Category')) {
            abort(403);
        }

        $id =  $subCategory->id;
        $row = SubCategory::find($id);
        $categories = Category::get();
        return view('pages.backend.sub-category.edit', compact('row','categories'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        if (!can('Edit Sub-Category')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
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
            $subCategory->token = $slug;
            $subCategory->name = $request->name;
            $subCategory->category_id = $request->category_id;
            $subCategory->created_by = Auth::id();
            $subCategory->status = $request->status;
            $subCategory->save();
            return redirect()
                ->route('backend.sub-category.index')
                ->with('success', 'Updated Successfully!');
            } catch (\Exception $e) {
                $validator->getMessageBag()->add('failed', $e->getMessage());
            }
    }

    public function pendingSubCategory()
    {
        if (!can('Approve Sub-Category')) {
            abort(403);
        }

        $pendingSubCategories = SubCategory::where('status', 'pending')
        ->whereHas('category', function ($query) {
        $query->where('status', 'active');
        })
        ->get();
        return view('pages.backend.sub-category.pending', compact('pendingSubCategories'));
    }

    public function approved(Request $request)
    {
        if (!can('Approve Sub-Category')) {
            abort(403);
        }
        
        SubCategory::where('id', $request->id)
            ->update([
                'status' => 'active'
            ]);
            return response()->json([
                'status' => 'success'
            ]);
    }
}
