<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPageItem;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.backend.dashboard.dashboard');
    }
}
