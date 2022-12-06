<?php

namespace App\Http\Controllers\Backend\settings\fontendSettings;

use App\Http\Controllers\Controller;
use App\Models\Backend\Settings\GeneralSettingsFrontend;
use Illuminate\Http\Request;
use Image;

class FooterController extends Controller
{
    public function index(){
        
        $general_settings_fontend=GeneralSettingsFrontend::all()->last();;
        // dd($general_settings_fontend);
        return view('backend.settings.fontend.footer',compact('general_settings_fontend'));
    }
    public function store(Request $request){
        // dd('footer store');
        $general_settings_fontend= new GeneralSettingsFrontend();
        if($request->hasFile('footer_logo')) {
              $footer_logo= $request->file('footer_logo');
              $footer_logo_Name= hexdec(uniqid()).'.'.$footer_logo->getClientOriginalExtension();
              Image::make($footer_logo)->resize(200,50)->save('public/uploads/backend/footer/logo/'.$footer_logo_Name);
              $general_settings_fontend->footer_logo='public/uploads/backend/footer/logo/'.$footer_logo_Name;
          }
          if($request->hasFile('footer_logo_bn')) {
            $footer_logo_bn= $request->file('footer_logo_bn');
            $footer_logo_bn_Name= hexdec(uniqid()).'.'.$footer_logo_bn->getClientOriginalExtension();
            Image::make($footer_logo_bn)->resize(200,50)->save('public/uploads/backend/footer/logo/'.$footer_logo_bn_Name);
            $general_settings_fontend->footer_logo_bn='public/uploads/backend/footer/logo/'.$footer_logo_bn_Name;
        }
        $general_settings_fontend->director_name = $request->director_name;
        $general_settings_fontend->director_name_bn = $request->director_name_bn;
        $general_settings_fontend->editor_name = $request->editor_name;
        $general_settings_fontend->editor_name_bn = $request->editor_name_bn;
        $general_settings_fontend->publisher_name = $request->publisher_name;
        $general_settings_fontend->publisher_name_bn = $request->publisher_name_bn;
        $general_settings_fontend->phone = $request->phone;
        $general_settings_fontend->email = $request->email;
        $general_settings_fontend->address = $request->address;
        $general_settings_fontend->description = $request->description;
        $general_settings_fontend->description_bn = $request->description_bn;
        $general_settings_fontend->save();
        return redirect (route('admin.settings.fontend.footer'));
    }
    public function update(Request $request){
          // dd('footer store');
          $general_settings_fontend= GeneralSettingsFrontend::find($request->id);
          if($request->hasFile('footer_logo')) {
            $footer_logo= $request->file('footer_logo');
            $footer_logo_Name= hexdec(uniqid()).'.'.$footer_logo->getClientOriginalExtension();
            Image::make($footer_logo)->resize(200,50)->save('public/uploads/backend/footer/logo/'.$footer_logo_Name);
            $general_settings_fontend->footer_logo='public/uploads/backend/footer/logo/'.$footer_logo_Name;
            }

          if($request->hasFile('footer_logo_bn')) {
                $footer_logo_bn= $request->file('footer_logo_bn');
                $footer_logo_bn_Name= hexdec(uniqid()).'.'.$footer_logo_bn->getClientOriginalExtension();
                Image::make($footer_logo_bn)->resize(200,50)->save('public/uploads/backend/footer/logo/'.$footer_logo_bn_Name);
                $general_settings_fontend->footer_logo_bn='public/uploads/backend/footer/logo/'.$footer_logo_bn_Name;
            }
            
          $general_settings_fontend->director_name = $request->director_name;
          $general_settings_fontend->director_name_bn = $request->director_name_bn;
          $general_settings_fontend->editor_name = $request->editor_name;
          $general_settings_fontend->editor_name_bn = $request->editor_name_bn;
          $general_settings_fontend->publisher_name = $request->publisher_name;
          $general_settings_fontend->publisher_name_bn = $request->publisher_name_bn;
          $general_settings_fontend->phone = $request->phone;
          $general_settings_fontend->email = $request->email;
          $general_settings_fontend->address = $request->address;
          $general_settings_fontend->description = $request->description;
          $general_settings_fontend->description_bn = $request->description_bn;
          $general_settings_fontend->update();
          return redirect(route('admin.settings.fontend.footer'));
    }
}
