<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Backend\Category;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\Backend\Category\Category', 'category_id');
    }
    public function post_type(){
        return $this->hasOne('App\Models\PostType', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function notifications(){
        return $this->hasMany(Notification::class, 'notification_id');
    }
}


