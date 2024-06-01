<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        return view('pages.frontend.blog.index', compact('blogs'));
    }

    public function view($token)
    {
        $blog = Blog::where('token', $token)
            ->first();
        return view('pages.frontend.blog.view', compact('blog'));
    }
}
