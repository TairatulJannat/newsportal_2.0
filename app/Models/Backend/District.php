<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Division;
// use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = [
      'district_name_bn','district_name_en','district_slug_bn', 'district_slug_en', 'division_id'
    ];
    public function division()
    {
        return $this->belongsTo('App\Models\Backend\Division', 'division_id');
    }

    //   public function subdistricts(){
    //     return $this->hasMany(SubDistrict::class);
    //  }


}
