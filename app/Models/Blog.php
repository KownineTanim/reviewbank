<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function postedBy()
    {
       return $this->hasOne(User::class, 'id', 'posted_by');
    }
}
