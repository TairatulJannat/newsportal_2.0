<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use HasFactory;

    public function post(){
        return $this->hasMany('App\Models\Post', 'post_id');
    }
}
