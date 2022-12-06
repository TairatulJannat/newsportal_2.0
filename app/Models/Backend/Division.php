<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';
    protected $fillable = [
        'division_name_bn','division_name_en','division_slug_bn', 'division_slug_en'
    ];
    public function district()
    {
        return $this->hasMany('App\Models\Backend\District', 'division_id');
    }

    // public function user(){
    //     return $this->hasMany(User::class, 'id');
    // }
}
