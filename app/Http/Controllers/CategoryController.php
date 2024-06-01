<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Validator, Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Category')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $categories = Category::where('status','!=', 'pending')->get();

        return view('pages.backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!can('Create Category')) {
            abort(403);
        }
        return view('pages.backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!can('Create Category')) {
            abort(403);
        }
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:categories,name'],
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $category = new Category();
        $slug = Str::of($request->name)->slug();
        $category->token = $slug;
        $category->name = $request->name;
        $category->status = $request->status;
        $category->created_by = Auth::id();
        $category->save();
        return redirect()
            ->route('backend.category.index')
            ->with('success', 'Created Successfully!')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (!can('Edit Category')) {
            abort(403);
        }
        $id =  $category->id;
        $row = Category::find($id);
        return view('pages.backend.category.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (!can('Edit Category')) {
            abort(403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
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
            $category->token = $slug;
            $category->name = $request->name;
            $category->status = $request->status;
            $category->created_by = Auth::id();
            $category->save();
            return redirect()
                ->route('backend.category.index')
                ->with('success', 'Updated Successfully!');
            } catch (\Exception $e) {
                $validator->getMessageBag()->add('failed', $e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pendingCategory()
    {
        if (!can('Approve Category')) {
            abort(403);
        }

        $pendingCategories = Category::where('status', 'pending')->get();
        return view('pages.backend.category.pending', compact('pendingCategories'));
    }

    public function approved(Request $request)
    {
        if (!can('Approve Category')) {
            abort(403);
        }

        Category::where('id', $request->id)
          ->update([
              'status' => 'active',
          ]);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
