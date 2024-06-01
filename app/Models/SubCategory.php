<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function category()
    {
       return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function brands()
    {
       return $this->hasMany(Brand::class, 'subcategory_id', 'id');
    }

    public function active_products()
    {
       return $this->hasMany(Product::class, 'subcategory_id', 'id')->where('status', 'active');
    }

    public function createdBy()
    {
       return $this->hasOne(User::class, 'id', 'created_by');
    }
}
