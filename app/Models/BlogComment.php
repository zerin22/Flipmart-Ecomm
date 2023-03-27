<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relationWithBlog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    public function relationWithUser()
    {
        return $this->belongsTo(User::class, 'auth_id', 'id');
    }

    public function relationWithBlogReply()
    {
        return $this->hasMany(BlogcommentReply::class, 'blogcomment_id', 'id');
    }
}
