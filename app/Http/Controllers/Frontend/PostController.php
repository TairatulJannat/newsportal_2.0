<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Backend\District;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Backend\Category\Category;
use App\Models\Backend\SubCatagory\SubCategory;
use App\Models\Backend\Division;
use App\Models\Comment;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function getCategoryByPost($slug){
      
        $category = Category::where('category_slug_en', $slug)->first();
        $posts = Post::where('category_id', $category->id)
                        ->where('stage', 'approved')
                        ->whereIn('post_type_id', ['2','3'])
                        ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                        ->orderBy('updated_at','DESC')
                        ->where('status' , '1')->get();
        // dd($posts);
        return view('frontend.post.list' , compact('posts', 'category'));
    }

    public function getSubCategoryByPost($slug){
    //   dd($slug);
        $subcat_id = SubCategory::where('subcategory_slug_en', $slug)->first();
        $posts = Post::where('sub_category_id', $subcat_id->id)
                        ->where('stage', 'approved')
                        ->whereIn('post_type_id', ['2','3'])
                        ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                        ->where('status' , '1')
                        ->where('title_en', '!=', '')->paginate(3);
        return view('frontend.post.list' , compact('posts'));
    }

    public function getCategoryPostById( $slug_en ){
        

        //  dd('hi');
        $posts = Post::where('slug_en', $slug_en )
                            ->whereIn('post_type_id', ['2','3'])
                            ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                            ->first();
            // dd($posts) ; 
        if($posts->view == null)   {
            $posts->view = 1;
            $posts->timestamps = false;
            $posts->update();
        }
        else{
            $posts->view = $posts->view + 1;
            $posts->timestamps = false;
            $posts->update();
        }
        // $popular = $posts->view++         
        $related_posts = Post::where('category_id', $posts->category_id )
                                    ->where('stage', 'approved')
                                    ->where('status' , '1')
                                    ->where('title_en','!=' , '')
                                    ->whereIn('post_type_id', ['2','3'])
                                    ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                                    ->where('id', '!=', $posts->id)
                                    ->orderBy('created_at','DESC')
                                    ->get();
        $comments = Comment::where('post_id',$posts->id)->get();
        $previous = Post::where('id', '<', $posts->id)
                            ->where('stage', 'approved')
                            ->where('status' , '1')
                            ->whereIn('post_type_id', ['2','3'])
                            ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                            ->orderBy('id','desc')->first(); 
      
        $next = Post::where('id', '>', $posts->id)
                    ->where('stage', 'approved')
                    ->where('status' , '1')
                    ->whereIn('post_type_id', ['2','3'])
                    ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                    ->orderBy('id','asc')->first();                              
        // dd($related_posts);                     
        return view('frontend.post.details', compact('posts', 'related_posts', 'comments', 'previous', 'next' ));
    }


    public function getPostByDivision($division_slug){

       
        $division = Division::where('division_slug_en' , $division_slug )->first();

        $districts=District::where( 'division_id' , $division->id )->get(); 

        $posts = Post::where('division_id' , $division->id )->where('stage', 'approved')->where('status' , '1')->paginate(3);
    //    dd($districts);
        return view('frontend.post.list' , compact('posts' , 'districts'));

    }
    public function getSinglePostByDivision(  $slug_en ){

        //  dd('hi');

        $posts = Post::where('slug_en', $slug_en )
                                ->where('stage', 'approved')
                                ->whereIn('post_type_id', ['2','3'])
                                ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                                ->where('status' , '1')
                                ->first();
        
          
        // dd($districts);                
        $related_posts = Post::where('division_id', $posts->division_id )
                                        ->where('stage', 'approved')
                                        ->whereIn('post_type_id', ['2','3'])
                                        ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                                        ->where('status' , '1')
                                        ->orderBy('created_at','DESC')
                                        ->limit(6)
                                        ->paginate(3);
                                        
        
        if($posts->view == null)   {
            $posts->view = 1;
            $posts->timestamps = false;
            $posts->update();
        }
        else{
            $posts->view = $posts->view + 1;
            $posts->timestamps = false;
            $posts->update();
        }
        
        $comments = Comment::where('post_id',$posts->id)
                            ->get();    
        
        return view('frontend.post.details', compact('posts', 'related_posts' , 'comments'));
    }

    public function getPostBydistrict(Request $request){

        $posts = Post::where('district_id' , $request->id)
                        ->where('title_en', '!=' ,'')
                        ->whereIn('post_type_id', ['2','3'])
                        ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                        ->get();
        

        return view('frontend.post.ajax_post_by_division', ['posts' => $posts]);
    }

    public function getPostByLocation(Request $request){

        $posts = Post::where('division_id' , $request-> division)
                    ->where('stage', 'approved')
                    ->whereIn('post_type_id', ['2','3'])
                    ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                    ->where('status' , '1')
                    ->where('title_en' , '!=' , '')
                    ->orwhere('district_id' , $request-> district)
                    ->orwhere('subdistrict_id' , $request-> sub_district)
                    ->paginate(3);
        $districts=District::where( 'division_id' , $request-> division )->get(); 

        // dd($request->division);
        $divisions=Division::find($request->division); 
        
                              
        // dd($request-> sub_district);
        return view('frontend.post.list' , compact('posts' , 'districts', 'divisions') );
    }

    public function getpostbyseo( $tags_en){

        $posts = Post::Where('tags_en' , 'like' , '%'.$tags_en. '%' )
                            ->where('stage', 'approved')
                            ->whereIn('post_type_id', ['2','3'])
                            ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                            ->where('status' , '1')
                            ->orWhere('tags_en' , 'like' , '%'.$tags_en. '%' )
                            ->get();

        //  dd($posts);
        
        return view('frontend.post.list' , compact('posts','tags_en') );
    }


    public function postPdfDownload($id){
        $posts = Post::find($id);
        
        $mpdf = new \Mpdf\Mpdf([
            'defaul_font_size' =>12,
            'default_font' => 'nikosh'
        ]);

        $mpdf->WriteHTML(view('frontend.post.print', compact('posts')));

        $mpdf->Output();
   
    }
   
}
