<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_id',
        'subcategory_name_bn',
        'subcategory_name_en',
        'subcategory_slug_bn',
        'subcategory_slug_en',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subsubcategory(){
        return $this->hasMany(SubSubCategory::class, 'subcategory_id');
    }

}
