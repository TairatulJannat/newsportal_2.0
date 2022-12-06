<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement as ModelsAdvertisement;
use Illuminate\Http\Request;
use App\Models\Backend\Advertisement;
use App\Models\Backend\Category\Category;
use Image;

class AdvertisementController extends Controller
{

    public function adsSetting()
    {
        // $data = null;
        // if ($id != null) {
        //     $data = Advertisement::find($id);
        // }
        $advertisements = ModelsAdvertisement::all();
        $categories = Category::orderBy('created_at', 'asc')->limit(5)->get();
        return view('backend.ads.ads_setting' , compact('advertisements' , 'categories'));
    }

    public function adsStore(Request $request)
    {     
        // $this->validate($request, [
        //     'ads_link' => 'required|string',
        // ]);
        $position = $request->position;
        $page_name = $request->page_name;
        $advertisement = Advertisement::where ('position',$position)
                                    ->where('page_name' ,$page_name)
                                    ->first();

                                    // dd(123);
        if(isset($advertisement)){
            $advertisement->ads_link= $request->redirect_url;
            if($request->hasFile('image')) {
                $image= $request->file('image');
                $image_Name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $request->image->move('public/uploads/advertisement/image/', $image_Name);
                // Image::make($image)->save('public/uploads/advertisement/image/'.$image_Name);
                $advertisement->image='public/uploads/advertisement/image/'.$image_Name;
            }
            $advertisement->ads_status = 1;
            $advertisement->update();
            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.ads.setting')->with($notification);
            // dd(123);
        }
        else{
            $advertisement = new Advertisement();
            $advertisement->position = $request->position;
            $advertisement->page_name = $request->page_name;
            $advertisement->ads_link= $request->redirect_url;
            if($request->hasFile('image')) {
                $image= $request->file('image');
                $image_Name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $request->image->move('public/uploads/advertisement/image/', $image_Name);
                // Image::make($image)->save('public/uploads/advertisement/image/'.$image_Name);
                $advertisement->image='public/uploads/advertisement/image/'.$image_Name;
            }
            $advertisement->save();
            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.ads.setting')->with($notification);
            // dd(456);
        }

    }
       
    
    public function ads_status (Request $request)
    {
        // $comment = Comment::where('approved','1')->get();
    //  dd($request);
            $data = Advertisement::find($request->id);
            // dd($data);
            if($data->ads_status != 1){
                $data->ads_status = 1;
            }
            else{
                $data->ads_status = 0;
            }
            
            $data->update();

            
        $notification = array(
            'message' => 'Comment Updated Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
          
          
    }
    
}
