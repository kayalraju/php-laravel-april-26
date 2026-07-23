<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobile extends Model
{
    use HasFactory;
    protected $table = 'mobiles';

    protected $fillable = ['name', 'model_number', 'price', 'brand'];
}
