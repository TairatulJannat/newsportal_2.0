<?php

namespace App\Models\Backend\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    public function blogpost()
    {
        return $this->belongsTo('App\Models\Backend\Blog\BlogPost', 'blog_post_id');
    }
}
