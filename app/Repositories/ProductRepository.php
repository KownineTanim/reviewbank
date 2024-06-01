<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator, Auth, Storage, Cache;

class ProductRepository
{
    public static function all()
    {
        return Cache::remember('all-product', 5 * 60, function () {
            return Product::all();
        });
    }
}
