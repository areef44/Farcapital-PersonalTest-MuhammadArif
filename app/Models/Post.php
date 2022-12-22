<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $casts = [
        'is_featured' => 'boolean',
        'is_place' => 'boolean',
    ];
}
