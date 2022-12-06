<?php

namespace App\Models\Backend\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BlogPost extends Model
{
    use HasFactory;
    
    protected $table = 'blog_posts';
    protected $fillable = [
        'blog_title_en','blog_title_bn','description_en','description_bn', 'image','tag_bn', 'tag_en'
    ];

    public function blogcategory()
    {
        return $this->belongsTo('App\Models\Backend\Blog\BlogCategory', 'blog_category_id');
    }
    public function blogcomments()
    {
        return $this->hasMany('App\Models\Backend\Blog\BlogComment', 'blog_post_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
