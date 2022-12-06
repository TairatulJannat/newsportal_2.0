<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Gallery\VideoGallery;
use Illuminate\Support\Facades\Auth;

class VideoGalleryController extends Controller
{
    //
    public function index()
    {
        $videos = VideoGallery::all();
        return view('backend.gallery.video_index',['videos'=>$videos]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'video_title_bn' => 'unique:video_galleries,video_title_bn',
            'video_title_en' => 'unique:video_galleries,video_title_en',
        ]);
        $video = new VideoGallery();
        $video->video_title_bn = $request->video_title_bn;
        $video->video_title_en = $request->video_title_en;
        $video->user_id = Auth::user()->id;
        $link = str_replace("watch?v=", "embed/", $request->link);
        $video->link = $link;
        $video->save();

        $notification = array(
            'success' => 'Video Created Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function edit($id)
    {
        $data = VideoGallery::find($id);
        return response()->json($data);
    }

    


    public function update(Request $request)
        {
            $this->validate($request, [
                'video_title_bn' => 'unique:video_galleries,video_title_bn,'.$request->id,
                'video_title_en' => 'unique:video_galleries,video_title_en,'.$request->id,
            ]);
 

           $video = VideoGallery::find($request->id);
           
           $video->video_title_bn = $request->video_title_bn;
           $video->video_title_en = $request->video_title_en;
           $video->user_id = Auth::user()->id;
           $link = str_replace("watch?v=", "embed/", $request->link);
           $video->link = $link;
          
           $video->update();

            $notification = array(
                'success' => 'video updated Successfully !',
            );
           return redirect()->back()->with($notification);
   
    }


    public function destroy($id){
        VideoGallery::findOrFail($id)->delete();

        $notification = array(
            'success' => 'Video Deleted Successfully !',
            // 'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
     }

}
