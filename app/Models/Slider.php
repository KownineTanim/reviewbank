<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public function createdBy()
    {
       return $this->hasOne(User::class, 'id', 'created_by');
    }
}
