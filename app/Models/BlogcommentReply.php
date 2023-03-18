<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogcommentReply extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relationWithBlogComment()
    {
        return $this->belongsTo(BlogComment::class, 'blogcomment_id', 'id');
    }

    public function relationWithUser()
    {
        return $this->belongsTo(User::class, 'auth_id', 'id');
    }
}
