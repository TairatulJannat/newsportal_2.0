<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Division;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserRoleController extends Controller
{
    public function admin(){

        $users = User::where('type' , 'admin')->get();
        $type = 'admin';
        // dd($users);
        return view('backend.user_role.index' , compact('users' , 'type'));

    }
    public function editor(){
        $users = User::where('type' , 'editor')->get();
        $type = 'editor';
        return view('backend.user_role.index' , compact('users' , 'type'));
    }
    public function subEditor(){
        $users = User::where('type' , 'sub_editor')->get();
        $type = 'sub-editor';
        return view('backend.user_role.index' , compact('users' , 'type'));
    }
    public function reporter(){
        $users = User::where('type' , 'reporter')->get();
        $type = 'reporter';
        return view('backend.user_role.index' , compact('users' , 'type'));
    }
    public function roleEdit(Request $request){
        // return $request;

        // dd($request->col_name);
        $user = User::find($request->id);
        $colname = $request->col_name;
        $user->$colname = $request->status;
        $user->update();
        // dd($user);
        $notification = array(
             'success' => 'Category updated Successfully !'
        );
        return $user;
    }
    public function insertUser(){
        // dd(122);
        $divisions = Division::all();
        return view ('backend.user_role.insert_user' , compact('divisions'));
    }

    public function userInformation(){
        // dd(122);

        $user_informations = User::all();
        // $user = User :: find($id);
        // dd($user_informations);
        return view ('backend.user_information.information_list' , compact('user_informations'));
    }

    public function userInformationUpdate($id)
    {
        $data = User::find($id);
        // dd($data);
        return response()->json($data);
    }


    public function userInformationUpdated(Request $request){
        // dd($request);
        $id = $request->id;
        $user = User ::find($id);
        if($request->new_pass != '' && $request->confirm_new_pass != ''){

            if($request->new_pass == $request->confirm_new_pass){
                $user->password = Hash::make($request['new_pass']);
                $user->update();
                // $notification = array(
                //     'success' => 'Password updated Successfully !',
                // );
                return redirect()->route('admin.user.information');
                // return view ('backend.user_information.information_list' , compact('user'));
            }
            // else{
            //     $notification = array(
            //         'success' => 'Password cant update due to invalid format Successfully !',
            //     );
            //     return redirect()->route('admin.home')->with($notification);
            // }
        }
        else {
            $notification = array(
                'success' => 'Password cant update due to invalid format Successfully !',
            );
            return redirect()->route('admin.home')->with($notification);
        }

        return view ('backend.user_information.information_list' , compact('user'));
    }
    // public function userInformationUpdate(){
        
    //     return view ('backend.profile.change_pass' , compact('user'));
    // }


    public function store(Request $request){
        $this->validate($request, [
            'name_en' => 'required:users,name_en',
            'name_bn' => 'required:users,name_bn',
            'email' => 'email|unique:users,email',
            'phone' => 'required:users,phone|numeric|min:11',
            'division' => 'required|not_in:0',
            'district' => 'required:users,district',
            'sub_district' => 'required:users,city',
            'zip_code' => 'required:users,zip_code',
            'type' => 'required:users,type',
            'present_adderss' => 'required:users,address_present',
            'permanent_adderss' => 'required:users,address_permanent',
        ]);
        $user = new User();
        $user->name_en = $request->name_en;
        $user->name_bn = $request->name_bn;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->phone = $request->phone;
        $user->division = $request->division;
        $user->district = $request->district;
        $user->city = $request->sub_district;
        $user->zip_code = $request->zip_code;
        $user->type = $request->type;
        $user->address_present = $request->present_adderss;
        $user->address_permanent = $request->permanent_adderss;
        // dd($request->category_role);

        if($request->category_role == 'on'){
            $user->category_role = 1;
        }
        if($request->country_role == 'on'){
            $user->country_role = 1;
        }
        if($request->ads_role == 'on'){
            $user->ads_role = 1;
        }
        if($request->comments_role == 'on'){
            $user->comments_role = 1;
        }
        if($request->page_role == 'on'){
            $user->page_role = 1;
        }
        if($request->gallery_role == 'on'){
            $user->gallery_role = 1;
        }
        if($request->seo_role == 'on'){
            $user->seo_role = 1;
        }
        if($request->settings_role == 'on'){
            $user->settings_role = 1;
        }

        if($request->post_role == 'on'){
            $user->post_role = 1;
        }
        if($request->blog_role == 'on'){
            $user->blog_role = 1;
        }
        if($request->user_role == 'on'){
            $user->user_role = 1;
        }

        $user->save();

        $user_new = User::where('email' ,  $request->email)->first();
        $wallet = new Wallet();

        $wallet->user_id =$user_new->id;
        $wallet->bangla_post_count = 0;
        $wallet->english_post_count = 0;
        $wallet->both_post_count = 0;
        $wallet->Total_balance_without_bonus = 0;
        $wallet->bonus = 0;
        $wallet->Total_balance_bonus = 0;
        $wallet->Total_withdaw = 0;
        $wallet->save();

        $wallet_new = Wallet::where('user_id' , $user_new->id)->first();

        $user_new->wallet_id = $wallet_new->id;
        $user_new->update();



        $notification = array(
            'success' => 'User Added Successfully !'
        );
       return redirect()->route('admin.user.insert')->with($notification);
        // dd($user);

    }
}
