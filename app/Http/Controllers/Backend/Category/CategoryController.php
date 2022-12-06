<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category\Category;
use Illuminate\Http\Request;
use Str;

use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{
    public function index()
    {

        $categories=Category::all();
        return view('backend.category.index', compact('categories'));

    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name_bn' => 'unique:categories,category_name_bn',
            'category_name_en' => 'unique:categories,category_name_en',
        ],
        [
            'category_name_en.unique' => 'The Category name already exists',
            'category_name_bn.unique' => 'The Category name already exists'
        ]);
        $category = new Category();
        $category->category_name_bn = $request->category_name_bn;
        $category->category_name_en = $request->category_name_en;
        if($request->show_on_header == null){
            $category->show_on_header = 0;
        }else{
            $category->show_on_header = 1;
        }
        if($request->main_category == null){
            $category->main_category = 0;
        }else{
            $category->main_category = 1;
        }
        
        // $category->show_on_header = $request->show_on_header;
        // $category->category_slug_bn = Str::replace($request->category_name_bn,'-', 'bn');
        $category->category_slug_bn = str_replace(" ", "-", $request->category_name_bn);
        $category->category_slug_en = Str::slug($request->category_name_en,'-');
        if($request->status == null){
            $category->status = 0;
        }else{
            $category->status = 1;
        }
        
        $category->save();

        $notification = array(
            'success' => 'Category Created Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'category_name_bn' => 'required|unique:categories,category_name_bn,'.$request->id,
            'category_name_en' => 'required|unique:categories,category_name_en,'.$request->id,
        ],
        [
            'category_name_en.required' => 'The Category name field can not be empty',
            'category_name_en.unique' => 'The Category name already exists',
            'category_name_bn.required' => 'The Category name field can not be empty',
            'category_name_bn.unique' => 'The Category name already exists'
        ]
    ); 
        $category = Category::find($request->id);
        $category->category_name_bn = $request->category_name_bn;
        $category->category_name_en = $request->category_name_en;
        // $category->category_slug_bn = Str::replace($request->category_name_bn,' ' , '-');
        $category->category_slug_bn = str_replace(" ", "-", $request->category_name_bn);
        $category->category_slug_en = Str::slug($request->category_name_en,'-');
        $category->save();

        $notification = array(
            'success' => 'Category updated Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function destroy($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function header_update(Request $request)
    {
        // $ten = Category::where('show_on_header','1')->get();
        // if(count($ten) <= 10){
        //     $data = Category::find($request->id);
        //     $data->show_on_header = $request->status;
        //     $data->save();
        //     return 'success';
        // }else{
        //     $data = Category::find($request->id);
        //     $data->show_on_header = 0;
        //     $data->save();
        // }
        // return 'Maximum 10 Available';   

        $data= Category::find($request->id);
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
         
         $data= Category::find($request->id);
         // dd($data);
         if ($data->status == 1) {
             $data->status = 0;
         } else {
             $data->status = 1;
         }
         $data->update();
         return 1;
    }
    public function main_category_update($id , Request $request)
    {

         $data= Category::find($request->id);
         // dd($data);
         if ($data->main_category == 1) {
             $data->main_category = 0;
         } else {
             $data->main_category = 1;
         }
         $data->update();
         return 1; 
    }
    
    
    
}
