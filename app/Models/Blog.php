<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relationWithblogComment()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function relationWithUser()
    {
        return $this->belongsTo(User::class, 'auth_id', 'id');
    }
}
