<?php

namespace App\Http\Controllers\Backend\Divisions;

use App\Http\Controllers\Controller;
use App\Models\Backend\Division;
use Illuminate\Http\Request;
use Str;

use function PHPUnit\Framework\isEmpty;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions=Division::all();
        return view('backend.divisions.index', compact('divisions'));

    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'division_name_bn' => 'unique:divisions,division_name_bn',
            'division_name_en' => 'unique:divisions,division_name_en',
        ]);
        $divison = new Division();
        $divison->division_name_bn = $request->division_name_bn;
        $divison->division_name_en = $request->division_name_en;
        // $divison->division_slug_bn = Str::slug($request->division_name_bn,'-');
        $divison->division_slug_bn  = str_replace(" ", "-", $request->division_name_bn);
        $divison->division_slug_en = Str::slug($request->division_name_en,'-');
        $divison->save();

        $notification = array(
            'success' => 'Division Created Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function edit($id)
    {
        $data = Division::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'division_name_bn' => 'unique:divisions,division_name_bn',
            'division_name_bn' => 'unique:divisions,division_name_en',
        ]);
        $divison = Division::find($request->id);
        $divison->division_name_bn = $request->division_name_bn;
        $divison->division_name_en = $request->division_name_en;
        $divison->division_slug_bn  = str_replace(" ", "-", $request->division_name_bn);
        $divison->division_slug_en = Str::slug($request->division_name_en,'-');
        $divison->save();

        $notification = array(
            'success' => 'Division updated Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function destroy($id){
        Division::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
