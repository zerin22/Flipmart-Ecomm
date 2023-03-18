<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'brand_name_bn',
        'brand_name_en',
        'brand_slug_bn',
        'brand_slug_en',
        'brand_image',
    ];
}
