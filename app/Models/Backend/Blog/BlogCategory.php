<?php

namespace App\Models\Backend\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $fillable = [
        'blog_category_name_bn','blog_category_name_en','blog_category_slug_bn', 'blog_category_slug_bn', 'status'
    ];

    public function blogpost()
    {
        return $this->hasMany('App\Models\Backend\Blog\BlogPost', 'blog_post_id');
    }
}
