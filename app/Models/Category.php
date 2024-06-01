<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function createdBy()
    {
       return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function sub_categories()
    {
       return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function brands()
    {
       return $this->hasMany(Brand::class, 'category_id', 'id');
    }

    public function active_products()
    {
       return $this->hasMany(Product::class, 'category_id', 'id')->where('status', 'active');
    }



}
