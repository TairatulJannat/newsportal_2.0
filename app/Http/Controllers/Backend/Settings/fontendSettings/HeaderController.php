<?php

namespace App\Http\Controllers\Backend\Settings\fontendSettings;

use App\Http\Controllers\Controller;
use App\Models\Backend\Settings\GeneralSettingsFrontend;
use App\Models\on_off;
use Illuminate\Http\Request;
use Image;

class HeaderController extends Controller
{
    public function index(){
        $general_settings_fontend=GeneralSettingsFrontend::all()->last();
        $live_link = on_off::first();
        return view('backend.settings.fontend.header',compact('general_settings_fontend' , 'live_link'));
    }
    public function store(Request $request){

        $general_settings_fontend= new GeneralSettingsFrontend();

        if($request->hasFile('header_logo')) {

              $header_logo= $request->file('header_logo');
              $header_logo_Name= hexdec(uniqid()).'.'.$header_logo->getClientOriginalExtension();
              Image::make($header_logo)->save('public/uploads/backend/header/logo/'.$header_logo_Name);
              $general_settings_fontend->fontend_header_logo='public/uploads/backend/header/logo/'.$header_logo_Name;

          }

          if($request->hasFile('fontend_header_logo_bn')) {

            $header_logo_bn= $request->file('fontend_header_logo_bn');
            $header_logo_bn_Name= hexdec(uniqid()).'.'.$header_logo_bn->getClientOriginalExtension();
            Image::make($header_logo_bn)->save('public/uploads/backend/header/logo/'.$header_logo_bn_Name);
            $general_settings_fontend->fontend_header_logo_bn='public/uploads/backend/header/logo/'.$header_logo_bn_Name;

            }
        if($request->hasFile('icon')) {

            $icon= $request->file('icon');
            $icon_Name= hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(50,50)->save('public/uploads/backend/header/icon/'.$icon_Name);
            $general_settings_fontend->icon='public/uploads/backend/header/icon/'.$icon_Name;
          }

        if($request->hasFile('icon_bn')) {
            // dd(123);
            $icon_bn= $request->file('icon_bn');
            $icon_bn_Name= hexdec(uniqid()).'.'.$icon_bn->getClientOriginalExtension();
            Image::make($icon_bn)->resize(50,50)->save('public/uploads/backend/header/icon/'.$icon_bn_Name);
            $general_settings_fontend->icon_bn='public/uploads/backend/header/icon/'.$icon_bn_Name;
          }  
        $general_settings_fontend->site_title = $request->site_title;
        $general_settings_fontend->site_title_bn = $request->site_title_bn;
        $general_settings_fontend->site_name = $request->site_name;
        $general_settings_fontend->site_name_bn = $request->site_name_bn;
        $general_settings_fontend->save();
        return redirect (route('admin.settings.fontend.header'));
    }

    public function update(Request $request){

        $general_settings_fontend= GeneralSettingsFrontend::find($request->id);
        if($request->hasFile('header_logo')) {

            $header_logo= $request->file('header_logo');
            $header_logo_Name= hexdec(uniqid()).'.'.$header_logo->getClientOriginalExtension();
            Image::make($header_logo)->save('public/uploads/backend/header/logo/'.$header_logo_Name);
            $general_settings_fontend->fontend_header_logo='public/uploads/backend/header/logo/'.$header_logo_Name;

        }

        if($request->hasFile('fontend_header_logo_bn')) {

            $header_logo_bn= $request->file('fontend_header_logo_bn');
            $header_logo_bn_Name= hexdec(uniqid()).'.'.$header_logo_bn->getClientOriginalExtension();
            Image::make($header_logo_bn)->save('public/uploads/backend/header/logo/'.$header_logo_bn_Name);
            $general_settings_fontend->fontend_header_logo_bn='public/uploads/backend/header/logo/'.$header_logo_bn_Name;

        }

        if($request->hasFile('icon')) {
            $icon= $request->file('icon');
            $icon_Name= hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(50,50)->save('public/uploads/backend/header/icon/'.$icon_Name);
            $general_settings_fontend->icon='public/uploads/backend/header/icon/'.$icon_Name;
        }

        if($request->hasFile('icon_bn')) {
           
            $icon_bn= $request->file('icon_bn');
            $icon_bn_Name= hexdec(uniqid()).'.'.$icon_bn->getClientOriginalExtension();
            // dd($icon_bn_Name);
            Image::make($icon_bn)->resize(50,50)->save('public/uploads/backend/header/icon/'.$icon_bn_Name);
            // dd(123);
            $general_settings_fontend->icon_bn ='public/uploads/backend/header/icon/'.$icon_bn_Name;
          }  
        $general_settings_fontend->site_title = $request->site_title;
        $general_settings_fontend->site_title_bn = $request->site_title_bn;
        $general_settings_fontend->site_name = $request->site_name;
        $general_settings_fontend->site_name_bn = $request->site_name_bn;
        $general_settings_fontend->update();
        return redirect (route('admin.settings.fontend.header'));
    }
    public function storelivelink(Request $request){

        $live_link = on_off::first();
        if($live_link){
            $live_link->live_link = str_replace("watch?v=", "embed/", $request->live_link);;
            $live_link->update();
        }
        else{
            $live_link = new on_off();
            
            $live_link->live_link = str_replace("watch?v=", "embed/", $request->live_link);;
            $live_link->save();
        }
        
        
        
        
        return redirect (route('admin.settings.fontend.header'));
    }
    public function clearlivelink($id){
        // dd($id);
        $live_link = on_off::find($id)->delete();
        return redirect (route('admin.settings.fontend.header'));
    }

}
