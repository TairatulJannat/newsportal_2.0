<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Gallery\ImageGallery;
use Image;

class ImageGalleryController extends Controller
{
    //
  



    public function index()
    {
        $imagies = ImageGallery::orderBy('id', 'desc')->get();
        return view('backend.gallery.image_index',['imagies'=> $imagies]);
    }

    public function store(Request $request)
    {
        // dd($request);
        // return $request;
        // $this->validate($request, [
        //     'image_title_bn' => 'required',
        //     'image_title_en' => 'required',
        //     'original_filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500|dimensions:max-width=1000,max-height=600:image_galleries,image',
        //     'image_description_bn' => 'required',
        //     'image_description_en' => 'required',
        // ],
        // [
        //     'image_title_bn.required' => 'Image Title Bangla is required',
        //     'image_title_en.required' => 'Image Title English is required',
        //     'image_description_bn.required' => 'Details Image Bangla is required',
        //     'image_description_en.required' => 'Details Image English is required',
        //     'original_filename.max' => 'Failed to upload an image. The image maximum size is 500kb' ,   
        // ]
    
    
        //  );

       
            $image = new ImageGallery();    
            if($request->hasFile('original_filename')) {
                $watermark_text = '©'.date("Y").' thevoice24.com - All Rights Reserved';
                $clients_image = $request->file('original_filename');
                $clients_imageName= hexdec(uniqid()).'.'.$clients_image->getClientOriginalExtension();
                $watermark_image=Image::make($clients_image)->resize(1000,600)->text($watermark_text, 250, 290,function($font) { 
                    $font->size(50);  
                    $font->color('#ffffff');  
                    $font->align('bottom');  
                    $font->valign('bottom'); 
                    $font->angle(90); })->save('public/uploads/backend/ads/'.$clients_imageName);
                    $image->original_filename='public/uploads/backend/ads/'.$clients_imageName;
                }
           
            $image->image_title_bn = $request->image_title_bn;
            $image->image_title_en = $request->image_title_en;
            $image->image_description_bn = $request->image_description_bn;
            $image->image_description_en = $request->image_description_en;

            $image->save();

            $notification = array(
                'message' => 'Image Created Successfully !',
                'alert-type' => 'success'
            );
     
            return redirect()->back()->with($notification);
   
    }


    public function edit($id)
    {
        $data = ImageGallery::find($id);
        // $data->original_filename = env('APP_URL') . '/newsportal_2.0/'. $data->original_filename;
        return response()->json($data);
    }

    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'image_title_bn' => 'required',
        //     'image_title_en' => 'required',
        //     'original_filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500|dimensions:max-width=1000,max-height=600:image_galleries,image',
        //     'image_description_bn' => 'required',
        //     'image_description_en' => 'required',
        // ],
        // [
        //     'image_title_bn.required' => 'Image Title Bangla is required',
        //     'image_title_en.required' => 'Image Title English is required',
        //     'image_description_bn.required' => 'Details Image Bangla is required',
        //     'image_description_en.required' => 'Details Image English is required',
        //     'original_filename.max' => 'Failed to upload an image. The image maximum size is 500kb' ,   
        // ]
    
    
        //  );
 

           $image = ImageGallery::find($request->id);
            if($request->hasFile('original_filename')) {
                $watermark_text = '©'.date("Y").' thevoice24.com - All Rights Reserved';
                $clients_image = $request->file('original_filename');
                $clients_imageName= hexdec(uniqid()).'.'.$clients_image->getClientOriginalExtension();
                Image::make($clients_image)->resize(1000,600)->text($watermark_text, 250, 290, function($font) { 
                    $font->size(50);  
                    $font->color('#ffffff');  
                    $font->align('bottom');  
                    $font->valign('bottom'); 
                    $font->angle(90); })->save('public/uploads/backend/ads/'.$clients_imageName);
                $image->original_filename='public/uploads/backend/ads/'.$clients_imageName;
               }
            $image->image_title_bn = $request->image_title_bn;
            $image->image_title_en = $request->image_title_en;
            $image->image_description_bn = $request->image_description_bn;
            $image->image_description_en = $request->image_description_en;
            $image->update();

        $notification = array(
            'success' => 'Image updated Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }
    public function image_status(Request $request)
    {
        //  $data = ImageGallery::find($request->id);
        //  $data->image_status = $request->image_status;
        //  $data->save();        
        //  return response()->json(['success'=>'Status changed successfully.']); 
         $data= ImageGallery::find($request->id);
        // dd($data);
        if ($data->image_status == 1) {
            $data->image_status = 0;
        } else {
            $data->image_status = 1;
        }
        $data->update();
        return 1;  
    }

     public function destroy($id){
        ImageGallery::findOrFail($id)->delete();

        $notification = array(
            'success' => 'Image Deleted Successfully !',
            // 'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
     }
 }
   
