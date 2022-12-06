<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category\Category;
use App\Models\Backend\Division;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index (){
        $divisions = Division::all();
        $districts = District::all();
        $sub_districts = SubDistrict::all();
        $Categorys = Category::all();
        $posts = Post::where('stage' , 'approved')
                        ->whereIn('post_type_id', ['2','3'])
                        ->where('title_en' ,'!=' , '')
                        ->where('published_date' , '<=' , date("Y/m/d"))->get();
        return view('frontend.Archive.index' , compact('divisions' , 'districts' , 'sub_districts' , 'Categorys' , 'posts'));
    }

    public function filterNews(Request $request){
       
        $divisions = Division::all();
        $districts = District::all();
        $sub_districts = SubDistrict::all();
        $Categorys = Category::all();
        // dd($request->dateFrom);
        // if(isset($request->cat) && isset($request->division) && isset($request->district) && isset($request->subDistrict) && isset($request->keyword)){
            $posts = Post::where('category_id' , $request->cat)
                        ->orWhere('division_id' , $request->division)
                        ->orWhere('district_id' , $request->district)
                        ->orWhere('subdistrict_id' , $request->subDistrict)
                        ->orWhere('title_en' ,  $request->keyword )
                        ->whereIn('post_type_id', ['2','3'])  
                        // // ->orWhere('title_bn' , 'like' , '%'.$request->keyword. '%' )
                        ->orwhereBetween('published_date' ,  [$request->dateFrom, $request->dateTo])
                        ->get();
        // }
        // dd($posts);
       
        
        // dd($posts);
        return view('frontend.Archive.index' , compact('divisions' , 'districts' , 'sub_districts' , 'Categorys' , 'posts'));

    }
    
    public function getPostByDate(Request $request){
       
        $divisions = Division::all();
        $districts = District::all();
        $sub_districts = SubDistrict::all();
        $Categorys = Category::all();
        $posts = Post::where('published_date' , $request->date)
                        ->where('stage', 'approved')
                        ->where('status' , '1')
                        ->where('title_bn' ,'!=' , '')
                        ->whereIn('post_type_id', ['2','3'])
                        ->where('published_date' , '<=' , date("Y/m/d"))
                        ->get();
        return  view('frontend.Archive.index' , compact('divisions' , 'districts' , 'sub_districts' , 'Categorys' , 'posts'));

    }
}
