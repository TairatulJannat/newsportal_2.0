<?php

namespace App\Http\Controllers\Backend\SubDistricts;

use App\Http\Controllers\Controller;
use App\Models\Backend\Division;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;

use Illuminate\Http\Request;
use Str;

class SubDistrictController extends Controller
{
    public function index()
    {

        $divisions = Division::get();
        $districts= District::get();
        $subdistricts = SubDistrict::get();
        return view('backend.subdistricts.index', compact('divisions', 'districts', 'subdistricts'));

    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'subdistrict_name_bn' => 'unique:sub_districts,subdistrict_name_bn',
            'subdistrict_name_en' => 'unique:sub_districts,subdistrict_name_en',
        ]);
        $subdistrict = new SubDistrict();
        $subdistrict->subdistrict_name_bn = $request->subdistrict_name_bn;
        $subdistrict->subdistrict_name_en = $request->subdistrict_name_en;
        // $subdistrict->subdistrict_slug_bn = Str::slug($request->subdistrict_name_bn,'-');
        $subdistrict->subdistrict_slug_bn  = str_replace(" ", "-", $request->subdistrict_name_bn);
        $subdistrict->subdistrict_slug_en = Str::slug($request->subdistrict_name_en,'-');
        $subdistrict->division_id = $request->division_id;
        $subdistrict->district_id = $request->district_id;
        $subdistrict->save();

        $notification = array(
            'success' => 'Sub District Created Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function edit($id)
    {
        $data = SubDistrict::find($id);
        $division_id = $data->division_id;
        $district_id = $data->district_id;

        $divisions = Division::all();
        $districts = District::all();

        $division = view('backend.subdistricts.ajax_division',compact('divisions','division_id'))->render();
        $district = view('backend.subdistricts.ajax_district',compact('districts','district_id'))->render();
        return response()->json(['data'=>$data,'division'=>$division, 'district'=>$district]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'subdistrict_name_bn' => 'unique:sub_districts,subdistrict_name_bn,'.$request->id,
            'subdistrict_name_en' => 'unique:sub_districts,subdistrict_name_en,'.$request->id,
        ]);
        $subdistrict = SubDistrict::find($request->id);
        $subdistrict->subdistrict_name_bn = $request->subdistrict_name_bn;
        $subdistrict->subdistrict_name_en = $request->subdistrict_name_en;
        $subdistrict->subdistrict_slug_bn  = str_replace(" ", "-", $request->subdistrict_name_bn);
        $subdistrict->subdistrict_slug_en = Str::slug($request->subdistrict_name_en,'-');
        $subdistrict->save();

        $notification = array(
            'success' => 'Sub District Updated Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function destroy($id){
        SubDistrict::findOrFail($id)->delete();

        $notification = array(
            'success' => 'Sub District Deleted Successfully !',
        );
        return redirect()->back()->with($notification);
    }

    public function districtFilter($id)
    {
        $districts = District::where('division_id',$id)->get();
        $district_id = '';
        $data = view('backend.subdistricts.filter_subdistrict',compact('districts','district_id'))->render();
        return response()->json(['data'=>$data]);
    }

   
}
