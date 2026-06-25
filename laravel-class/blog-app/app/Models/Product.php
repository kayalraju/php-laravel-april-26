<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'sizes',
        'colors',
        'category',
        'brand',
        'image',
        'status'
    ];

    //When Laravel retrieves data from the database, everything is returned as a string by default.
    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
    ];
}
