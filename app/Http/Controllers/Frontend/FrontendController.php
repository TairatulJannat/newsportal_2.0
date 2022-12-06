<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Advertisement;
use App\Models\Backend\Gallery\VideoGallery;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\frontend\CovidTacker;
use App\Models\Backend\Category\Category;
use App\Models\Backend\PageTable;
use App\Models\Backend\Settings\SocialLink;
use App\Models\Backend\Gallery\ImageGallery;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\District;
use App\Models\Backend\Division;
use App\Models\Backend\SubDistrict;
use App\Models\Backend\SubCatagory\SubCategory;
use Illuminate\Support\Facades\Hash;
use Session;
use Image;
use Illuminate\Support\Facades\Session as FacadesSession;

class FrontendController extends Controller
{
    public function index(){
        $rowcount = VideoGallery::count();
        if($rowcount <= 4)
        {
            $vedioGaleries= VideoGallery::all();
        }
        else{
            $vedioGaleries = VideoGallery::orderBy('created_at', 'desc')->take(6 )->get();
        }
        
        $categories = Category::where('id' ,'!=' , '14')->where('main_category'  , '1')->orderBy('id', 'desc')->get();
        // dd($categories);
        $category_box = Category::where('status', '1')->where('id' ,'!=' , '14')->where('main_category' ,'!=' , '1')->orderBy('id', 'desc')->get();
        // dd($category_box);
        $main_posts = Post::where('stage','approved')
                            ->where('stage', 'approved')
                            ->where('status' , '1')
                            ->whereIn('post_type_id', ['2','3'])
                            ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                            ->where('title_en', '!=', '')
                            ->where('main_news', '1')
                            ->where('category_id' ,'!=' , '14')
                            ->orderBy('created_at', 'desc')->get(); 

        $posts = Post::where('stage','approved')
                    ->where('status' , '1')
                    ->whereIn('post_type_id', ['2','3'])
                    ->where('published_date' , '<=' , date("Y-m-d H:i:s"))
                    ->where('title_en', '!=', '')
                    ->orderBy('created_at', 'desc')
                    ->where('category_id' ,'!=' , '14')
                    ->limit(7)->get(); 

        $imagegallery_post_english = Post::where('add_image_gallery' , '1')->where('title_en', '!=', '')->get(); 

        $inter_categories = Post::where('category_id' ,'6')
                                ->where('stage', 'approved')
                                ->where('status' , '1')
                                ->where('title_en', '!=', '')
                                ->whereIn('post_type_id', ['2','3'])

                                ->where('published_date' , '<=' , date("Y/m/d"))->get();

        $specific_news = Post::where('category_id','8')
                              ->where('stage', 'approved')
                              ->where('status' , '1')
                              ->where('title_en', '!=', '')
                              ->whereIn('post_type_id', ['2','3'])

                              ->where('published_date' , '<=' , date("Y/m/d"))
                              ->orderBy('view', 'desc')->first();
        // $focusedCategoryPosts =[
        //     'Bangladesh' =>  Post::where('category_id' ,'4')->where('stage', 'approved')->where('status' , '1')->where('title_en', '!=', '')->limit(7)->get(),
        //     'CountryWide' => Post::where('category_id' ,'5')->where('stage', 'approved')->where('status' , '1')->where('title_en', '!=', '')->limit(7)->get(),
        //     'Business' => Post::where('category_id' ,'10')->where('stage', 'approved')->where('status' , '1')->where('title_en', '!=', '')->limit(7)->get(),
        //     'Sports' => Post::where('category_id' ,'7')->where('stage', 'approved')->where('status' , '1')->where('title_en', '!=', '')->limit(7)->get(),
        //     'Entertainment' => Post::where('category_id' ,'8')->where('stage', 'approved')->where('status' , '1')->where('title_en', '!=', '')->limit(7)->get(),
        // ];
        // dd($imagegallery_post);
        // $advertisements = Advertisement::all();
        
        return view('frontend.home', compact( 'vedioGaleries' ,'posts' ,'categories','category_box', 'imagegallery_post_english','inter_categories','specific_news','main_posts'));
    }
     public function videoGallery($videoTitle)
     {
        $video = VideoGallery::where('video_title_en', $videoTitle)->first();
        $videos = VideoGallery::all();
        return view('frontend.video_gallery.index' , compact('video' , 'videos'));
     }
     public function editorialPolicy($type)
     {
         $page_detail = PageTable::where('page_type' , $type )->first();
         return view('frontend.page.index' , compact('page_detail'));
     }

     public function profile()
     {
        $user =Session::get('user');
        // dd($user);
  
        
        $district = District::where('division_id', '=', $user->division)->get();
        $user_division_name = '';
        $user_distrit_name = '';
        $user_sub_distrit_name = '';
        if($user->division != ''){
            $user_division_name = Division::find($user->division);
        }
        if($user->district != ''){
            $user_distrit_name = District::find($user->district);
        }
        if($user->city != ''){
            $user_sub_distrit_name = SubDistrict::find($user->city);
        }
        $division = Division::all();
        $subdistrict = SubDistrict::all();
        return view ('frontend.profile.index',compact('user', 'district' , 'division' , 'subdistrict' , 'user_division_name' , 'user_distrit_name' , 'user_sub_distrit_name'));
     }

     public function covid_form(){
        $covid_posts = Post::where('category_id','14')
                            ->whereIn('post_type_id', ['2','3'])
                            ->where('published_date' , '<=' , date("Y/m/d"))->get();
        $data = null; 
        $country = CovidTacker::all('name');  
        // dd($country);
        $data = Http::get('https://coronavirus-19-api.herokuapp.com/countries/')->json();
        return view('covid_tracker', ['country'=>$country , 'data'=>$data, 'covid_posts'=>$covid_posts]);
    }

    public function covid_tracker(Request $request){
    
        $country = $request->id;
        
        $data = Http::get('https://coronavirus-19-api.herokuapp.com/countries/'.$country)->json();
        
       
        return view('ajax_covid' , compact('data'));
    }

  

    public function user_profile(Request $request)
    {
        // dd($request);
        $user = User::find($request->id);
        if($request->hasFile('image')) {
            $image= $request->file('image');
            $image_Name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // $request->image->make('public/uploads/profile/image', $image_Name);
            Image::make($image)->save('public/uploads/profile/image/'.$image_Name);
            $user->image='public/uploads/profile/image/'.$image_Name;
        }
       
        $user->division = $request->division;
        $user->district = $request->district;
        $user->name_en = $request->name_en ;
        $user->about = $request->about;
        $user->email = $request->email;
        $user->city = $request->subdistrict;
        $user->phone = $request->phone;
        $user->address_permanent = $request->address_permanent;
        $user->address_present = $request->address_present;

        $user->update();
        $request->session()->put('user', $user);
        $notification = array(
            'success' => 'information updated Successfully !',
        );
        return redirect()->back()->with($notification);

    }

    public function changepassword(Request $request){
        
        $user =Session::get('user');
        // dd($user);
        if($request->new_pass != '' && $request->confirm_new_pass != ''){
            
            if($request->new_pass == $request->confirm_new_pass){
                $user->password = Hash::make($request['new_pass']);
                $user->update();
                $notification = array(
                    'success' => 'Password updated Successfully !',
                );
                return redirect()->back();
            }
        }
       
    }

  

}
