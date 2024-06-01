<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function category()
    {
       return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function sub_category()
    {
       return $this->hasOne(SubCategory::class, 'id', 'subcategory_id');
    }

    public function createdBy()
    {
       return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function products()
    {
       return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function active_products()
    {
       return $this->hasMany(Product::class, 'brand_id', 'id')->where('status', 'active');
    }
}
