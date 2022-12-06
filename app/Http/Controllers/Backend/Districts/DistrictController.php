<?php

namespace App\Http\Controllers\Backend\Districts;

use App\Http\Controllers\Controller;
use App\Models\Backend\District;
use App\Models\Backend\Division;
use Illuminate\Http\Request;
use Str;

use function PHPUnit\Framework\isEmpty;

class DistrictController extends Controller
{
    public function index()
    {
        $districts=District::all();
        $divisions=Division::all();
        return view('backend.districts.index', compact('divisions', 'districts'));

    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'district_name_bn' => 'unique:districts,district_name_bn',
            'district_name_en' => 'unique:districts,district_name_en',
        ]);
        $district = new District();
        $district->district_name_bn = $request->district_name_bn;
        $district->district_name_en = $request->district_name_en;
        $district->division_id = $request->division_id;
        // $district->district_slug_bn = Str::slug($request->district_name_bn,'-');
        $district->district_slug_bn = str_replace(" ", "-", $request->district_name_bn);
        $district->district_slug_en = Str::slug($request->district_name_en,'-');
        $district->save();

        $notification = array(
            'success' => 'District Created Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function edit($id)
    {
        $data = District::find($id);
        $division_id = $data->division_id;

        $divisions = Division::all();
        $division = view('backend.districts.ajax_district',compact('divisions','division_id'))->render();
        return response()->json(['data'=>$data,'division'=>$division]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'district_name_bn' => 'unique:districts,district_name_bn',
            'district_name_bn' => 'unique:districts,district_name_en',
        ]);
        $district = District::find($request->id);
        $district->district_name_bn = $request->district_name_bn;
        $district->district_name_en = $request->district_name_en;
        $district->division_id = $request->division_id;
        $district->district_slug_bn = str_replace(" ", "-", $request->district_name_bn);
        $district->district_slug_en = Str::slug($request->district_name_en,'-');
        $district->save();

        $notification = array(
            'success' => 'District updated Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function destroy($id){
        District::findOrFail($id)->delete();

        $notification = array(
            'success' => 'District Deleted Successfully !',
        );
        return redirect()->back()->with($notification);
    }
}
