<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Division;
use App\Models\Backend\District;

class SubDistrict extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function division(){

        return $this->belongsTo(Division::class);
    }

    public function district(){

     return $this->belongsTo(District::class);

    }
}
