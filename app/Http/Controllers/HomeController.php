<?php

namespace App\Http\Controllers;

use App\Models\Backend\Advertisement;
use App\Models\Backend\Blog\BlogPost;
use App\Models\Post;
use App\Models\User;
use App\Models\Backend\District;
use App\Models\Backend\Division;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ZipArchive;
use Analytics;
use App\Models\Backend\Category\Category;
use App\Models\Backend\SubDistrict;
use App\Models\PostType;
use App\Models\Wallet;
// use Auth;
use Spatie\Analytics\Period;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $date = Carbon::now();

        $start_date = $date->year .'-'. $date->month . '-'. 01 . ' 00:00:00';
        $end_date = $date->year .'-'. $date->month . '-'. $date->day . ' 23:59:59';

        if($request->date == 'day'){

            $start_date = $date->year .'-'. $date->month . '-'. $date->day . ' 00:00:00';
            $end_date = $date->year .'-'. $date->month . '-'. $date->day . ' 23:59:59';

        }
        if($request->date == 'week'){

            // $start_date = $date->year .'-'. 01 . '-' . 01 . ' 00:00:00';
            // $end_date = $date->year .'-'. $date->month . '-' . $date->day . ' 23:59:59';

            $end_date = date("Y-m-d H:i:s");
            $start_date = date("Y-m-d H:i:s", strtotime('saturday previous week'));

        }
        if($request->date == 'year'){

            $start_date = $date->year .'-'. 01 . '-' . 01 . ' 00:00:00';
            $end_date = $date->year .'-'. $date->month . '-' . $date->day . ' 23:59:59';
            // dd($start_date , $end_date);

        }
        // if($request->date == 'month'){



        //     $start_date = $date->year .'-'. $date->month . '-'. ($date->month) . ' 00:00:00' ;
        //     $end_date = $date->year .'-'. $date->month . '-'. $date->day  . ' 23:59:59';

        //     // dd($start_date , $end_date);

        // }

        $total_user = User::where('type', '!=', 'general_user')
                                ->Where('status' , '1')->count();

        $total_super_admin = User::where('type', '=', 'super_admin')
                            ->where('status','=', '1')
                            ->count();

        $total_admin = User::where('type', '=', 'admin')
                                ->where('status','=', '1')
                                ->count();

        $total_editor = User::where('type', '=', 'editor')
                                ->where('status','=', '1')
                                ->count();

        $total_sub_editor = User::where('type', '=', 'sub_editor')
                                ->where('status','=', '1')
                                ->count();

        $total_reporter = User::where('type', '=', 'reporter')
                                ->where('status','=', '1')
                                ->count();
        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'  ){
            $total_post = Post::WhereBetween('updated_at', [$start_date, $end_date])
                            ->where('stage', '!=', 'draft')
                            // ->where('id', '=' , Auth::user())
                            ->count();


        }else{
            $total_post = Post::WhereBetween('updated_at', [$start_date, $end_date])
                        ->where('stage', '!=', 'draft')
                        ->where('user_id', '=' , Auth::user()->id)
                        ->count();
            //

        }

        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'  ){

            $total_post_published = Post::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('stage', '=', 'approved')
                                    // ->where('user_id', '=' , Auth::user()->id)
                                    ->count();
        }else{

            $total_post_published = Post::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('stage', '=', 'approved')
                                    ->where('user_id', '=' , Auth::user()->id)
                                    ->count();

        }

        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'  ){

            $total_post_pending = Post::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('stage', '=', 'pending')
                                    // ->where('user_id', '=' , Auth::user()->id)
                                    ->count();
        }else{

            $total_post_pending = Post::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('stage', '=', 'pending')
                                    ->where('user_id', '=' , Auth::user()->id)
                                    ->count();

        }
        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'  ){

            $total_post_correction = Post::WhereBetween('updated_at', [$start_date, $end_date])
                                        ->where('stage', '=', 'correction')
                                        // ->where('user_id', '=' , Auth::user()->id)
                                        ->count();

        }else{

            $total_post_correction = Post::WhereBetween('updated_at', [$start_date, $end_date])
                                        ->where('stage', '=', 'correction')
                                        ->where('user_id', '=' , Auth::user()->id)
                                        ->count();

        }

        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'){

            $total_BlogPost = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                    // ->where('user_id', '=' , Auth::user()->id)
                                    ->count();

        }else{

            $total_BlogPost = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('user_id', '=' , Auth::user()->id)
                                    ->count();
        }

        
        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'){

            $total_blog_published = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('stage', '=', 'approved')
                                    ->count();

        }else{

            $total_blog_published = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                        ->where('stage', '=', 'approved')
                                        ->where('user_id', '=' , Auth::user()->id)
                                        ->count();
        }

        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'){

            $total_blog_pending = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('stage', '=', 'pending')
                                    ->count();

        }else{

            $total_blog_pending = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('stage', '=', 'pending')
                                    ->where('user_id', '=' , Auth::user()->id)
                                    ->count();
        }

        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'){

            
        $total_blog_correction = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                ->where('stage', '=', 'correction')
                                ->count();

        }else{

           
        $total_blog_correction = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                ->where('stage', '=', 'correction')
                                ->where('user_id', '=' , Auth::user()->id)
                                ->count();
        }
        // $total_blog_published = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
        //                             ->where('stage', '=', 'approved')
        //                             ->count();

        // $total_blog_pending = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
        //                             ->where('stage', '=', 'pending')
        //                             ->count();

        $total_blog_correction = BlogPost::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->where('stage', '=', 'correction')
                                    ->count();

        $total_ad = Advertisement::WhereBetween('updated_at', [$start_date, $end_date])
                                    ->count();

        $dynamic_data = (object)[

            'total_user' => $total_user,
            'total_super_admin' => $total_super_admin,
            'total_admin' => $total_admin,
            'total_sub_editor' => $total_sub_editor,
            'total_editor' => $total_editor,
            'total_reporter' => $total_reporter,
            'total_post' => $total_post,
            'total_BlogPost' => $total_BlogPost,
            'total_ad' => $total_ad,
            'total_post_published' => $total_post_published,
            'total_post_pending' => $total_post_pending,
            'total_post_correction' => $total_post_correction,
            'total_blog_published' => $total_blog_published,
            'total_blog_pending' => $total_blog_pending,
            'total_blog_correction' => $total_blog_correction,

        ];

        if($request->ajax()){

            return json_encode($dynamic_data);

        }

        $posts = Post::where('stage' , 'approved')->where('status' , '1')->get();
        $blogs = BlogPost::all();
        // $user = User::find(Auth::user()->id);

        return view('backend.home', compact('posts', 'blogs'));

    }



    public function profile(){

        $user = User :: find (Auth()->user()->id);
        $division = Division::find($user->division);
        $district = District::find($user->district);
        $city = SubDistrict::find($user->city);

        return view('backend.profile.index' , compact('user' , 'city' , 'district' , 'division'));

    }

    public function changePassword(){
        $user = User :: find (Auth()->user()->id);
        return view ('backend.profile.change_pass' , compact('user'));
    }

    public function changedPassword(Request $request){
        $user = User :: where ('email' , $request->email)->first();
        if($request->new_pass != '' && $request->confirm_new_pass != ''){

            if($request->new_pass == $request->confirm_new_pass){
                $user->password = Hash::make($request['new_pass']);
                $user->update();
                $notification = array(
                    'success' => 'Password updated Successfully !',
                );
                return redirect()->route('admin.home')->with($notification);
            }
            else{
                $notification = array(
                    'success' => 'Password cant update due to invalid format Successfully !',
                );
                return redirect()->route('admin.home')->with($notification);
            }
        }
        else {
            $notification = array(
                'success' => 'Password cant update due to invalid format Successfully !',
            );
            return redirect()->route('admin.home')->with($notification);
        }

        // return view ('backend.profile.change_pass' , compact('user'));
    }

    public function editprofile(){

        $user = User :: find (Auth()->user()->id);

        $district = District::where('division_id', '=', $user->division)->get();

        $division = Division::all();

        return view ('backend.profile.edit_profile', compact('user', 'district', 'division'));

    }
    public function editedprofile(Request $request){

        //return $request->file('image');

        $user = User :: find ($request->id);

        if($request->file('image')){

            $user_image = date('YmdHis') . "_" . mt_rand(1, 999999) . "." . $request->file('image')->getClientOriginalExtension();
            $user_image_path = $request->file('image')->storeAs('public/user_image', $user_image);
            $user->image = $user_image_path;

        }


        $user->division = $request->division;
        $user->district = $request->district;

        $user->name_en = $request->en_name ;
        $user->name_bn = $request->bn_name ;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->address_permanent = $request->address_permanent;
        $user->address_present = $request->address_present;

        $user->update();

        $notification = array(
            'success' => 'information updated Successfully !',
        );
        return redirect()->back()->with($notification);

    }

    public function postGraph(){

        $total_post_by_month = Post::all();

        $january=$february=$march=$april=$may=$june=$july=$august=$september=$october=$november=$december=0;

        $n = sizeof($total_post_by_month);

        while($n--){
            if($total_post_by_month[$n]->created_at->format('F') == "January"){
                $january++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "February"){
                $february++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "March"){
                $march++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "April"){
                $april++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "May"){
                $may++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "June"){
                $june++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "July"){
                $july++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "August"){
                $august++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "September"){
                $september++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "October"){
                $october++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "November"){
                $november++;
            }
            if($total_post_by_month[$n]->created_at->format('F') == "December"){
                $december++;
            }

        }

        ////////////////////////////


        $mostvisitor =Analytics::fetchVisitorsAndPageViews(Period::days(30));

        $Saturday = $Sunday = $Monday = $Tuesday = $Wednesday = $Thursday = $Friday = 0;

        $n = sizeof($mostvisitor);

        // return $n;

        while($n--){

            if($mostvisitor[$n]['pageTitle'] == 'The Voice24'){

                if($mostvisitor[$n]['date']->format('l') == "Saturday"){
                    $Saturday+=$mostvisitor[$n]['visitors'];
                }
                if($mostvisitor[$n]['date']->format('l') == "Sunday"){
                    $Sunday+=$mostvisitor[$n]['visitors'];
                }
                if($mostvisitor[$n]['date']->format('l') == "Monday"){
                    $Monday+=$mostvisitor[$n]['visitors'];
                }
                if($mostvisitor[$n]['date']->format('l') == "Tuesday"){
                    $Tuesday+=$mostvisitor[$n]['visitors'];
                }
                if($mostvisitor[$n]['date']->format('l') == "Wednesday"){
                    $Wednesday+=$mostvisitor[$n]['visitors'];
                }
                if($mostvisitor[$n]['date']->format('l') == "Thursday"){
                    $Thursday+=$mostvisitor[$n]['visitors'];
                }
                if($mostvisitor[$n]['date']->format('l') == "Friday"){
                    $Friday+=$mostvisitor[$n]['visitors'];
                }

            }

        }


        ///////////////

        $x = (object) [
            'january' => $january,
            'february' => $february,
            'march' => $march,
            'april' => $april,
            'may' => $may,
            'june' => $june,
            'july' => $july,
            'august' => $august,
            'september' => $september,
            'october' => $october,
            'november' => $november,
            'december' => $december,
            'highest' => max($january, $february, $march, $april, $may, $june, $july, $september, $october, $november, $december),
            'Saturday' => $Saturday,
            'Sunday' => $Sunday,
            'Monday' => $Monday,
            'Tuesday' => $Tuesday,
            'Wednesday' => $Wednesday,
            'Thursday' => $Thursday,
            'Friday' => $Friday,
            'highest2' => max($Saturday, $Sunday, $Monday, $Tuesday, $Wednesday, $Thursday, $Friday)
        ];

        return json_encode($x);

    }

    public function downloadZip()
    {

    }

    public function pie_chart(Request $request)
    {
        $categories = Category::all();
        $post_count_category = [];
        $arr = [];
        foreach($categories as $category){
            if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'  ){

                $total_post_published = Post::where('stage', '=', 'approved')
            ->where('category_id' , $category->id )
            // ->where('user_id', '=' , Auth::user()->id)
            ->count();
            $post_count_category[$category->category_name_en] = $total_post_published;

            }else{

                $total_post_published = Post::where('stage', '=', 'approved')
                ->where('category_id' , $category->id )
                ->where('user_id', '=' , Auth::user()->id)
                ->count();
                $post_count_category[$category->category_name_en] = $total_post_published;
            }


        }
        // dd($post_count_category);
        return $post_count_category;
    }

    public function weekly_pie_chart(Request $request)
    {
        
        $data['Sat'] = 0;
        $data['Sun'] = 0;
        $data['Mon'] = 0;
        $data['Tue'] = 0;
        $data['Wed'] = 0 ;
        $data['Thu'] = 0;
        $data['Fri'] = 0;
        $date = Carbon::now();

        $start_date = $date->year .'-'. $date->month . '-'. 01;
        $end_date = $date->year .'-'. $date->month . '-'. $date->day ;

        if($request->key == 'all'){

            $start_date = '2022-01-01';
            $end_date = $date->year .'-'. $date->month . '-'. $date->day ;

        }
        if($request->key == 'week'){

            $start_date = date("Y-m-d", strtotime('saturday previous week'));
            $end_date = date("Y-m-d");
           

        }
        if($request->key == 'month'){

            $start_date = date("Y-m-01");
            $end_date = date("Y-m-d");
            

        }
        if($request->key == 'year'){

            $start_date = $date->year .'-'. 01 . '-' . 01;
            $end_date = $date->year .'-'. $date->month . '-' . $date->day ;
            // dd($start_date , $end_date);

        }
        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin'  ){

            $posts = Post::WhereBetween('published_date' , [$start_date, $end_date] )->where('stage' , 'approved')->get();

        }else{

            $posts = Post::WhereBetween('published_date' , [$start_date, $end_date])->where('stage' , 'approved')->where('user_id', '=' , Auth::user()->id)->get();

        }
        // echo count($posts);
        foreach($posts as $post){

            $postdate = Carbon::parse($post->published_date);
            if($postdate->dayOfWeekIso == 0){

                $data['Sun'] = $data['Sun'] + 1;

            }elseif($postdate->dayOfWeekIso == 1){

                $data['Mon'] = $data['Mon'] + 1;

            }elseif($postdate->dayOfWeekIso == 2){

                $data['Tue'] = $data['Tue'] + 1;

            }elseif($postdate->dayOfWeekIso == 3){

                $data['Wed'] = $data['Wed'] + 1;

            }elseif($postdate->dayOfWeekIso == 4){

                $data['Thu'] = $data['Thu'] + 1;

            }elseif($postdate->dayOfWeekIso == 5){

                $data['Fri'] = $data['Fri'] + 1;

            }elseif($postdate->dayOfWeekIso == 6){

                $data['Sat'] = $data['Sat'] + 1;

            }
            
        }
        return $data;
        
    }
   
    public function acc(){
        $users = User::where('type' ,'!=' , 'general_user')->get();

        // $PostType = PostType::all();
        // dd($PostType);
        foreach($users as $user){
            $bn_posts = Post::where('user_id' , $user->id)->where('stage' , 'approved')->where('post_type_id' , '1')->count();
            $en_posts = Post::where('user_id' , $user->id)->where('stage' , 'approved')->where('post_type_id' , '2')->count();
            $both_posts = Post::where('user_id' , $user->id)->where('stage' , 'approved')->where('post_type_id' , '3')->count();
            // print_r( $bn_posts );
            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            if($bn_posts == 0){
                $wallet->bangla_post_count = 0;
            }else{
                $wallet->bangla_post_count = $bn_posts;
            }
            if($en_posts == 0){
                $wallet->english_post_count = 0;
            }else{
                $wallet->english_post_count = $en_posts;
            }
            if($both_posts == 0){
                $wallet->both_post_count = 0;
            }else{
                $wallet->both_post_count = $both_posts;
            }
            $wallet->Total_balance_without_bonus = (25*$bn_posts)+(35*$en_posts)+(40*$both_posts);
            $wallet->bonus = 0;
            $wallet->Total_balance_bonus = (25*$bn_posts)+(35*$en_posts)+(40*$both_posts);
            $wallet->Total_withdaw = 0;
            $wallet->save();
            // return redirect()->back();
        }
    }

    public function user_wallet(){
        // dd(123);
        $wallets = Wallet::all();
        foreach($wallets as $wallet){

            $users = User::find( $wallet->user_id);
            $users->wallet_id = $wallet->id;
            $users->save();
            // dd($users);
            // break;

        }


    }

}
