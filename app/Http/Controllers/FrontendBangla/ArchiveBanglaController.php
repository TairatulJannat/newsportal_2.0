<?php

namespace App\Http\Controllers\FrontendBangla;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category\Category;
use App\Models\Backend\Division;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class ArchiveBanglaController extends Controller
{
    //
    public function index (){
        $divisions = Division::all();
        $districts = District::all();
        $sub_districts = SubDistrict::all();
        $Categorys = Category::all();
        $posts = Post::where('stage' , 'approved')
                        ->where('title_bn' ,'!=' , '')
                        ->whereIn('post_type_id', ['1','3'])
                        ->where('published_date' , '<=' , date("Y/m/d"))->get();
        return view('FrontendBangla.Archive.index' , compact('divisions' , 'districts' , 'sub_districts' , 'Categorys' , 'posts'));
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
                        ->orWhere('title_bn' ,  $request->keyword )
                        ->whereIn('post_type_id', ['1','3'])
                        // // ->orWhere('title_bn' , 'like' , '%'.$request->keyword. '%' )
                        ->orwhereBetween('published_date' ,  [$request->dateFrom, $request->dateTo])
                        ->get();
        // }
        // dd($posts);
       
        
        // dd($posts);
        return view('FrontendBangla.Archive.index' , compact('divisions' , 'districts' , 'sub_districts' , 'Categorys' , 'posts'));

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
                        ->whereIn('post_type_id', ['1','3'])
                        ->where('published_date' , '<=' , date("Y/m/d"))
                        ->get();
        return  view('FrontendBangla.Archive.index' , compact('divisions' , 'districts' , 'sub_districts' , 'Categorys' , 'posts'));

    }
}
