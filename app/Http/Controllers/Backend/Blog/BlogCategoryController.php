<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog\BlogCategory;
use Illuminate\Http\Request;
use Str;

class BlogCategoryController extends Controller
{
    public function index(){ 

        $categories = BlogCategory::all();
        return view('backend.blog.category' , compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_category_name_bn' => 'unique:blog_categories,blog_category_name_bn',
            'blog_category_name_en' => 'unique:blog_categories,blog_category_name_en',
        ]);
        $category = new BlogCategory();
        $category->blog_category_name_bn = $request->blog_category_name_bn;
        $category->blog_category_name_en = $request->blog_category_name_en;
        // $category->blog_category_slug_bn = Str::slug($request->blog_category_name_bn,'-');
        $category->blog_category_slug_bn  = str_replace(" ", "-", $request->blog_category_name_bn);
        $category->blog_category_slug_en = Str::slug($request->blog_category_name_en,'-');
        $category->status = $request->status;
        $category->save();

        $notification = array(
            'success' => 'Blog Category Created Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }
    public function edit($id)
    {
        $data = BlogCategory::find($id);
        // dd($data);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'blog_category_name_bn' => 'unique:blog_categories,blog_category_name_bn,'.$request->id,
            'blog_category_name_en' => 'unique:blog_categories,blog_category_name_en,'.$request->id,
        ]);
        $category = BlogCategory::find($request->id);
        $category->blog_category_name_bn = $request->blog_category_name_bn;
        $category->blog_category_name_en = $request->blog_category_name_en;
        $category->blog_category_slug_bn  = str_replace(" ", "-", $request->blog_category_name_bn);
        $category->blog_category_slug_en = Str::slug($request->blog_category_name_en,'-');
        $category->update();

        $notification = array(
            'success' => 'Blog Category updated Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }
    public function destroy($id){
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'success' => 'Blog Category Deleted Successfully !',
        );
        return redirect()->back()->with($notification);
    }

    public function status_update(Request $request)
    {
         $data = BlogCategory::find($request->id);
         $data->status = $request->status;
         $data->update();        
         return response()->json(['success'=>'Status change successfully.']);
            
    }
}
