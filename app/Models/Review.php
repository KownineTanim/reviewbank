<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
       return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function postedBy()
    {
       return $this->hasOne(User::class, 'id', 'posted_by');
    }

    public function reviewFiles()
    {
       return $this->hasMany(ReviewProductFile::class, 'review_id', 'id');
    }
}
