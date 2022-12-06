<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Backend\Settings\GeneralSettingsBackend;
use Illuminate\Http\Request;
use Image;

class BackendController extends Controller
{
    public function index(){
        $general_settings_backend= GeneralSettingsBackend::all()->last();
        return view('backend.settings.backend',compact('general_settings_backend'));
    }
    public function store(Request $request){

        $general_settings_backend= new GeneralSettingsBackend();

        if($request->hasFile('admin_logo')) {

              $admin_logo= $request->file('admin_logo');
              $admin_logo_Name= hexdec(uniqid()).'.'.$admin_logo->getClientOriginalExtension();
              Image::make($admin_logo)->resize(200,50)->save('public/uploads/backend/admin/logo/'.$admin_logo_Name);
            //   $watermark_image = Image::make($admin_logo)->resize(550,310)->text('© 2017-2021 tutsmake.com - All Rights Reserved', 120, 100, function($font) { 
            //     $font->size(50);  
            //     $font->color('#ffffff');  
            //     $font->align('bottom');  
            //     $font->valign('bottom'); 
            //     $font->angle(90); })->save('public/uploads/backend/ads/'.$admin_logo_Name);
              $general_settings_backend->admin_logo='public/uploads/backend/admin/logo/'.$admin_logo_Name;

          }
        if($request->hasFile('icon')) {

            $icon= $request->file('icon');
            $icon_Name= hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(200,50)->save('public/uploads/backend/admin/icon/'.$icon_Name);
            $general_settings_backend->icon='public/uploads/backend/admin/icon/'.$icon_Name;
          }
        $general_settings_backend->site_title = $request->site_title;
        $general_settings_backend->site_name = $request->site_name;
        $general_settings_backend->save();
        return redirect(route('admin.settings.backend'));
    }
    public function update(Request $request,$id){

        $GeneralSettingsBackend= GeneralSettingsBackend::find($request->id);
        if($request->hasFile('admin_logo')) {
                $admin_logo= $request->file('admin_logo');
                $admin_logo_Name= hexdec(uniqid()).'.'.$admin_logo->getClientOriginalExtension();
                Image::make($admin_logo)->resize(76,76)->save('public/uploads/backend/admin/logo/'.$admin_logo_Name);
                $GeneralSettingsBackend->admin_logo='public/uploads/backend/admin/logo/'.$admin_logo_Name;
        }
        if($request->hasFile('icon')) {
            $icon= $request->file('icon');
            $icon_Name= hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(200,50)->save('public/uploads/backend/admin/icon/'.$icon_Name);
            $GeneralSettingsBackend->icon='public/uploads/backend/admin/icon/'.$icon_Name;
        }
        $GeneralSettingsBackend->site_title = $request->site_title;
        $GeneralSettingsBackend->site_name = $request->site_name;
        $GeneralSettingsBackend->update();
        return redirect(route('admin.settings.backend'));
    }
    
}
