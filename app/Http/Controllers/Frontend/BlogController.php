<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog\BlogCategory;
use App\Models\Backend\Blog\BlogComment;
use App\Models\Backend\Blog\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        
        $blog_categories = BlogCategory::all();
        $blog_posts = BlogPost::orderBy('updated_at','DESC')->paginate(5);
        return view('frontend.blog.index' , compact('blog_categories' ,  'blog_posts'));
    }
    public function getPostBycategoryId($id){
        $blog_posts = BlogPost::where('blog_category_id', $id)->paginate(6);
        $blog_categories = BlogCategory::all();
        return view('frontend.blog.index' , compact('blog_categories' ,  'blog_posts'));
    }
    public function getPostByCategory($id){
         
        $blog_posts = BlogPost::where('blog_category_id', $id)->orderBy('updated_at','DESC')->get();
        $blog_categories = BlogCategory::orderBy('updated_at','DESC');
        return view('frontend.blog.ajax_blog_post_by_category', ['blog_posts' =>  $blog_posts ,'blog_categories' =>  $blog_categories ]);
    }
    public function getPostById( $slug_en){
         
        $blog_post = BlogPost::where('slug_en', $slug_en )
                                ->first();
                                
        $blog_related_posts = BlogPost::where('blog_category_id', $blog_post->blog_category_id )
                                        ->where('id' , '!=' , $blog_post->id)
                                        ->orderBy('updated_at','DESC')
                                        ->limit(6)
                                        ->paginate(3);

        $blog_categories = BlogCategory::all();

        $blog_comments = BlogComment::where('blog_post_id' , $blog_post->id)->orderby('id','desc')->get();

        if($blog_post->view == null)   {
            $blog_post->view = 1;
            $blog_post->timestamps = false;
            $blog_post->update();
        }
        else{
            $blog_post->view = $blog_post->view + 1;
            $blog_post->timestamps = false;
            $blog_post->update();
        }

        $previous = BlogPost::where('id', '<', $blog_post->id)->orderBy('id','desc')->first(); 
      
        $next = BlogPost::where('id', '>', $blog_post->id)->orderBy('id','asc')->first(); 
        return view('frontend.blog.blog_post_by_postid', compact('blog_categories', 'blog_post' ,'blog_related_posts' , 'blog_comments', 'previous', 'next'));
    }
    
    public function blogPostPdfDownload($id){
        $blog_post = BlogPost::find($id);
        
        $mpdf = new \Mpdf\Mpdf([
            'defaul_font_size' =>12,
            'default_font' => 'nikosh'
        ]);

        $mpdf->WriteHTML(view('frontend.blog.print', compact('blog_post')));

        $mpdf->Output();
   
    }
}
