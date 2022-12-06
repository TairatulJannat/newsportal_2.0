<?php

namespace App\Http\Controllers;

use App\Models\Backend\Blog\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function store(Request $request){

        $blog_comment = new BlogComment();
        
        $blog_comment->user_id = $request->user_id;
        $blog_comment->name = $request->name;
        $blog_comment->email = $request->email;
        $blog_comment->message = $request->message;
        $blog_comment->blog_post_id = $request->blog_post_id;
        $blog_comment->approved = 0;
        $blog_comment->save();

        $notification = array(
            'success' => 'Comment Created Successfully !',
        );
        return redirect()->back()->with($notification);
    }
    public function list(Request $request){

        $blog_comments = BlogComment::all();
        return view('backend.comment.blog_comment' ,  compact('blog_comments'));
    }
    public function delete($id){

        BlogComment::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Comment Deleted Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return view('backend.comment.blog_comment' ,  compact('blog_comments'));
    }
    public function update(Request $request){

        // BlogComment::findOrFail($id)->delete();
        
     
            $data = BlogComment::find($request->id);
            if($data->approved != 1){
                $data->approved= 1;
            }
            else{
                $data->approved = 0;
            }
            $data->update();

            $notification = array(
                'message' => 'Comment updated Successfully !',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        // return view('backend.comment.blog_comment' ,  compact('blog_comments'));
    }

}
