<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

use Validator, Auth, Storage;

use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Blog')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $blogs = Blog::get();
        return view('pages.backend.blog.index', compact('blogs'));
    }

    public function view($id)
    {
        $blog = Blog::where('id', $id)
            ->first();
        return view('pages.backend.blog.single_blog', compact('blog'));
    }

    public function create()
    {
        if (!can('Create Blog')) {
            abort(403);
        }
        return view('pages.backend.blog.create');
    }

    public function store( Request $request )
    {
        if (!can('Create Blog')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'blog_title' => ['required', 'unique:blogs,title'],
          'blog_thumb' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:500'],
          'content' => 'required',
          'status' => 'required',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }

        $filePath = Storage::disk(config('app.storage_disk'))->putFile('upload/blog/thumbnails', $request->file('blog_thumb'));
        $blog = new Blog();
        $slug = Str::of($request->blog_title)->slug();
        $blog->token = $slug;
        $blog->title = $request->blog_title;
        $blog->blog_thumb = $filePath;
        $blog->content = $request->content;
        $blog->posted_by = Auth::id();
        $blog->status = $request->status;
        $blog->save();
        return redirect()
          ->route('backend.blog.index')
          ->with('success', 'Created Successfully!')
          ->withInput();
    }

    public function edit(Blog $blog)
    {
        if (!can('Edit Blog')) {
            abort(403);
        }

        $id =  $blog->id;
        $row = Blog::find($id);
        return view('pages.backend.blog.edit', compact('row'));
    }

    public function update(Request $request, Blog $blog)
    {
        if (!can('Edit Blog')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
          'blog_title' => 'required',
          'content' => 'required',
          'status' => 'required',
        ]);
        if ($validator->fails()) {
          return redirect()
              ->back()
              ->withErrors($validator->errors())
              ->withInput();
        }

        try {

            if ($request->file('blog_thumb')) {
                $imageValidation = Validator::make($request->only('blog_thumb'), [
                    'blog_thumb' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:500']
                ]);

                if ($imageValidation->fails()) {
                  return redirect()
                      ->back()
                      ->withErrors($imageValidation->errors())
                      ->withInput();
                }
                if (Storage::disk(config('app.storage_disk'))->exists($blog->blog_thumb)) {
                    Storage::disk(config('app.storage_disk'))->delete($blog->blog_thumb);
                }
                $blog->blog_thumb = Storage::disk(config('app.storage_disk'))->putFile('upload/blog/thumbnails', $request->file('blog_thumb'));
            }

            $blog->title = $request->blog_title;
            $slug = Str::of($request->blog_title)->slug();
            $blog->token = $slug;
            $blog->content = $request->content;
            $blog->posted_by = Auth::id();
            $blog->status = $request->status;
            $blog->save();

            return redirect()
              ->route('backend.blog.index')
              ->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
          $validator->getMessageBag()->add('failed', $e->getMessage());
        }

    }
}
