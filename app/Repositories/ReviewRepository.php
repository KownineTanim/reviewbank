<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\Review;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator, Auth, Storage, Cache;

class ReviewRepository
{
    public static function all()
    {
        return Cache::remember('all-reviews', 5 * 60, function () {
            return Review::all();
        });
    }
}
