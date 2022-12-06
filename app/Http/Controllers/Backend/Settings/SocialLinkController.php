<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Settings\SocialLink;

class SocialLinkController extends Controller
{
    //
    public function index()
    {
        $sociallink = SocialLink::first();
        return view('backend.settings.social_link',['sociallink'=>$sociallink]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
             'facebook' => 'required|string',
             'twitter'  => 'required|string',
             'youtube'  => 'required|string',
            'linkedin'  =>  'required|string',
            'instagram' =>  'required|string',
        ]);
        $sociallink = SocialLink::first();
        if ($sociallink != null) {
            $sociallink->facebook = $request->facebook;
            $sociallink->twitter =  $request->twitter;
            $sociallink->youtube =  $request->youtube;
            $sociallink->linkedin = $request->linkedin;
            $sociallink->instagram =$request->instagram;
            $sociallink->save();
        } else {
            $sociallink = new SocialLink;
            $sociallink->facebook = $request->facebook;
            $sociallink->twitter =  $request->twitter;
            $sociallink->youtube =  $request->youtube;
            $sociallink->linkedin = $request->linkedin;
            $sociallink->instagram =$request->instagram;
            $sociallink->save();
        }
     
        return redirect()->back()->with('message', 'Social Links Updated Successfully');
    }



   
}
