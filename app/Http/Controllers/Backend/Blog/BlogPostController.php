<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog\BlogCategory;
use App\Models\Backend\Blog\BlogComment;
use App\Models\Backend\Blog\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Image;
use Str;

class BlogPostController extends Controller
{
    public function index(){
        $blog_posts = BlogPost::where('stage' , 'approved')->get();
        return view('backend.blog.post.index' , compact( 'blog_posts' ));
    }
    public function pendingPost(){
        $blog_posts = BlogPost::where('stage' , 'pending')->get();
        return view('backend.blog.post.index' , compact( 'blog_posts' ));
    }
    public function correctionPost(){
        $blog_posts = BlogPost::where('stage' , 'correction')
                                ->orwhere('stage' , 'correction_return')
                                ->get();
        // dd($blog_posts);
        return view('backend.blog.post.index' , compact( 'blog_posts' ));
    }
public function updateStage(Request $request ){
    $BlogPost = BlogPost::find($request->id);
    $category = BlogCategory::where('id' , $BlogPost->blog_category_id)->first();
    $reporter = User::where('id' , $BlogPost->user_id)->first();
    $data = [
         $BlogPost,$category ,$reporter,
    ];
    // dd($posts);
   return  $data ;
}

    public function updatedStage(Request $request){
        $blog_post = BlogPost::find($request->blog_postid);
        // dd($request->blog_postid);
        if($request->stage == "correction"){
            $blog_post->stage = $request->stage;
            if($request->hasFile('correction_image')) {
                $currection_image = $request->file('correction_image');
                $currection_imageName= hexdec(uniqid()).'.'.$currection_image->getClientOriginalExtension();
                Image::make($currection_image)->resize(273,366)->save('public/uploads/backend/admin/blog_post_currection_image'.$currection_imageName);
                $blog_post->currection_image='public/uploads/backend/admin/blog_post_currection_image'.$currection_imageName;
            }
            $blog_post->message = $request->message;
            
            
            $blog_post->save();

        }
        elseif($request->stage == "approved"){
            // dd($request);
            $blog_post->stage = $request->stage;
            $blog_post->save();
        }
        // dd($posts);
       return  redirect()-> back();
    }
    public function insert(){
        $categories = BlogCategory::all();
        return view('backend.blog.post.insert' , compact('categories') );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_title_en' => 'required|unique:blog_posts,blog_title_en',
            'description_en' => 'required|unique:blog_posts,description_en',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500|dimensions:max-width=1000,max-height=600:blog_posts,image',
            'blog_category_id' => 'required|unique:blog_posts,tag_en',
            ],
            
            [
                'image.max' => 'Failed to upload an image. The image maximum size is 500kb',
            ]
        );
        $post = new BlogPost();
        if($request->hasFile('image')) {
            $watermark_text = '©'.date("Y").' thevoice24.com - All Rights Reserved';
            $image= $request->file('image');
            $image_Name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // Image::make($image)->resize(200,200)->save('public/uploads/blog/image/'.$image_Name);
            $watermark_image = Image::make($image)->resize(1000,800)->text($watermark_text, 250, 290, function($font) { 
                $font->size(50);  
                $font->color('#ffffff');  
                $font->align('bottom');  
                $font->valign('bottom'); 
                $font->angle(90); })->save('public/uploads/blog/image/'.$image_Name);
            $post->image='public/uploads/blog/image/'.$image_Name;
        }
     
        // dd($posts->image);
        $post->blog_title_en = $request->blog_title_en;
        $post->blog_title_bn = $request->blog_title_bn;
        $post->blog_category_id = $request->blog_category_id;
        $post->slug_en = Str::slug($request->blog_title_en,'-');
        // $post->slug_bn = Str::slug($request->blog_title_bn,'-');
        $post->slug_bn = str_replace(" ", "-", $request->blog_title_bn);
        $post->description_en = $request->description_en;
        $post->description_bn = $request->description_en;
        $post->tag_en = $request->tag_en;
        $post->tag_bn = $request->tag_bn;
        $post->user_id = Auth::user()->id;
        
        $post->stage = 'pending';
        $post->save();

        $notification = array(
            'success' => 'Blog Post Created Successfully !',
        );
        return redirect()->route('admin.blog.post.pending')->with($notification);
   
    }

    
    public function destroy($id){
        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'success' => 'Blog Deleted Successfully !',
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id){

        $post = BlogPost::find($id);
        $blog_categories = BlogCategory::all();
        return view('backend.blog.post.insert' , compact('blog_categories' , 'post' ) );
    }

    public function update(Request $request)
    {

        $post = BlogPost::find($request->id);
        // dd($request->id);
        if($request->hasFile('image')) {
            $watermark_text = '©'.date("Y").' thevoice24.com - All Rights Reserved';
            $image= $request->file('image');
            $image_Name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // Image::make($image)->resize(200,200)->save('public/uploads/blog/image/'.$image_Name);
            $watermark_image = Image::make($image)->resize(1000,800)->text($watermark_text, 250, 290, function($font) { 
                $font->size(50);  
                $font->color('#ffffff');  
                $font->align('bottom');  
                $font->valign('bottom'); 
                $font->angle(90); })->save('public/uploads/blog/image/'.$image_Name);
            $post->image='public/uploads/blog/image/'.$image_Name;
        }
        // dd($posts->image);
        $post->blog_title_en = $request->blog_title_en;
        $post->blog_title_bn = $request->blog_title_bn;
        $post->blog_category_id = $request->blog_category_id;
        $post->slug_en = Str::slug($request->blog_title_en,'-');
        $post->slug_bn = str_replace(" ", "-", $request->blog_title_bn);
        $post->description_en = $request->description_en;
        $post->description_bn = $request->description_en;
        $post->tag_en = $request->tag_en;
        $post->tag_bn = $request->tag_bn;
        $post->user_id = Auth::user()->id;
        if($post->stage == "correction"){
            
            $post->stage = "correction_return";
            // dd($post->stage);
        }
        else if($post->stage == "correction_return"){
            $post->stage = "correction_return";
        }
        else if($post->stage == "pending"){
            $post->stage = "pending";
        }
        $post->update();

        $notification = array(
            'success' => 'Blog Post Updated Successfully !',
        );
        return redirect()->route('admin.blog.post')->with($notification);
   
    }
    public function commentsByBlogPost($id){
        $blog_comments = BlogComment::where('blog_post_id' , $id)->get();
        return view('backend.comment.blog_comment', compact('blog_comments'));
    }


}
