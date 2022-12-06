<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function index()
    {

        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('backend.comment.comment_list', compact('comments'));

    }



    public function store(Request $request)
    {
    //    dd(123);
        $comment = new Comment();

        $comment->user_id = $request->user_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->post_id = $request->post_id;
        // $comment->approved = $request->approved;
        $comment->save();

        $notification = array(
            'message' => 'Comment Updated Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
   
    }

    public function approved_comment (Request $request)
    {
        // $comment = Comment::where('approved','1')->get();
    //  dd(123);
            $data = Comment::find($request->id);
            if($data->approve != 1){
                $data->approved = 1;
            }
            else{
                $data->approved = 0;
            }
            
            $data->update();

            
        $notification = array(
            'message' => 'Comment Updated Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
          
          
    }

    public function destroy($id){
        Comment::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Comment Deleted Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
