<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\SubCatagory\SubCategory;
use App\Models\Backend\Division;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;

class AjaxController extends Controller
{
    public function get_district_by_division(Request $request)
    {
        $district = District::where('division_id', '=',  $request->id)->get();
        return response()->json($district);
    }
    public function getSubcategoryByCategory(Request $request)
    {
        $subcategory = Subcategory::where('category_id', $request->id)->where('status', '1')->get();
        return response()->json($subcategory);
    }

    public function get_sub_district_by_district(Request $request)
    {
        $districts = SubDistrict::where('district_id', $request->id)->get();
        return response()->json($districts);
    }
}
