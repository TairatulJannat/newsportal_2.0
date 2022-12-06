<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category\Category;
use App\Models\Backend\SubCatagory\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    public function index()
    {

        $subcategories = SubCategory::get();
        $categories=Category::all();
        return view('backend.subCategory.index', compact('subcategories', 'categories'));

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'subcategory_name_bn' => 'unique:sub_categories,subcategory_name_bn',
            'subcategory_name_en' => 'unique:sub_categories,subcategory_name_en',
        ],
        [
           'subcategory_name_bn.unique' => 'Sub Category name already exists',
           'subcategory_name_en.unique' => 'Sub Category name already exists',
        ]);
        $subcategory = new SubCategory();
        $subcategory->subcategory_name_bn = $request->subcategory_name_bn;
        $subcategory->subcategory_name_en = $request->subcategory_name_en;
        $subcategory->show_on_header = $request->show_on_header;
        // $subcategory->subcategory_slug_bn = Str::slug($request->subcategory_name_bn,'-');
        $subcategory->subcategory_slug_bn = str_replace(" ", "-", $request->subcategory_name_bn);
        $subcategory->subcategory_slug_en = Str::slug($request->subcategory_name_en,'-');
        $subcategory->category_id = $request->category_id;
        $subcategory->status = $request->status;
        $subcategory->save();

        $notification = array(
            'success' => 'Sub Category Created Successfully !',
        );
        return redirect()->back()->with($notification);

    }

    public function edit($id)
    {
        $data = SubCategory::find($id);
        $category_id = $data->category_id;

        $categories = Category::all();
        $category = view('backend.subCategory.ajax_category',compact('categories','category_id'))->render();
        return response()->json(['data'=>$data,'category'=>$category]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'subcategory_name_bn' => 'required|unique:sub_categories,subcategory_name_bn,'.$request->id,
            'subcategory_name_en' => 'required|unique:sub_categories,subcategory_name_en,'.$request->id,
        ],
        [
            'subcategory_name_bn.required' => 'Sub Category name can not be empty',
            'subcategory_name_en.required' => 'Sub Category name can not be empty',
            'subcategory_name_bn.unique' => 'Sub Category already exists',
            'subcategory_name_en.unique' => 'Sub Category already exists'
        ]);
        $subcategory = SubCategory::find($request->id);
        $subcategory->subcategory_name_bn = $request->subcategory_name_bn;
        $subcategory->subcategory_name_en = $request->subcategory_name_en;
        $subcategory->subcategory_slug_bn = str_replace(" ", "-", $request->subcategory_name_bn);
        $subcategory->subcategory_slug_en = Str::slug($request->subcategory_name_en,'-');
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        $notification = array(
            'success' => 'Sub Category Updated Successfully !',
        );
        return redirect()->back()->with($notification);

    }

    public function destroy($id){
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'success' => 'Sub Category Deleted Successfully !',
        );
        return redirect()->back()->with($notification);
    }

    public function header_update(Request $request)
    {
        // $ten = SubCategory::where('show_on_header','1')->get();
        // if(count($ten) <= 10){
        //     $data = SubCategory::find($request->id);
        //     $data->show_on_header = $request->status;
        //     $data->save();
        //     return 'success';
        // }else{
        //     $data = SubCategory::find($request->id);
        //     $data->show_on_header = 0;
        //     $data->save();
        // }
        // return 'Maximum 10 Available';

        $data= SubCategory::find($request->id);
        // dd($data);
        if ($data->show_on_header == 1) {
            $data->show_on_header = 0;
        } else {
            $data->show_on_header = 1;
        }
        $data->update();
        return 1;
    }
    public function status_update(Request $request)
    {
        //  $data = SubCategory::find($request->id);
        //  $data->status = $request->status;
        //  $data->save();
        //  return response()->json(['success'=>'Status changed successfully.']);
    }

}
