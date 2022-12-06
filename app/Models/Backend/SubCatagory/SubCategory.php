<?php

namespace App\Models\Backend\SubCatagory;

// use App\Models\Backend\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = [
        'subcategory_name_bn','subcategory_name_en','subcategory_slug_bn', 'subcategory_slug_en','show_on_header', 'status', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Backend\Category\Category', 'category_id');
    }
}
