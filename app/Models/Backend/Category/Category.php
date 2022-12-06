<?php

namespace App\Models\Backend\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'category_name_bn','category_name_en','category_slug_bn', 'category_slug_en','show_on_header', 'status'
    ];

    public function subcategory()
    {
        return $this->hasMany('App\Models\Backend\SubCatagory\SubCategory', 'category_id');
    }

    public function news(){
        return $this->hasMany(Post::class, 'category_id')->where('stage', 'approved')->orderBy('id', 'desc');
    }
}
