<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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

    public function brand()
    {
       return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function createdBy()
    {
       return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function reviews()
    {
       return $this->hasMany(Review::class, 'product_id', 'id');
    }

    public function active_reviews()
    {
       return $this->hasMany(Review::class, 'product_id', 'id')->where('status', 'active');
    }

    public function images()
    {
       return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
