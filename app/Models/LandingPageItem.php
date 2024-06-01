<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageItem extends Model
{
    use HasFactory;

    public static $types = [
        'main_slider',
        'advertise',
        'recent_product',
        'top_rated_product',
        'top_blogs'
    ];

    public function createdBy()
    {
       return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function ad()
    {
       return $this->hasOne(Ads::class, 'id', 'ad_id');
    }
}
