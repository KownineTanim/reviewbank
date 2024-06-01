<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{LandingPageItem};

class HomeController extends Controller
{
    public function home()
    {
        $pageItems = LandingPageItem::where('status', 'published')
            ->orderBy('sort_order')
            ->get();
        return view('pages.frontend.home.home', compact('pageItems'));
    }
}
