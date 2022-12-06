<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Seo;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Auth;

class SeoController extends Controller
{
    public function index(){
        $seos=Seo::all()->last();
        if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin' ){

            $posts = Post::where('stage' , 'approved')->where('status' , '1')->get();

        }else{

            $posts = Post::where('stage' , 'approved')->where('status' , '1')->where('user_id', '=' , Auth::user()->id)->get();

        }
        
        //fetch the most visited pages for today and the past week
        $mostvpage = Analytics::fetchMostVisitedPages(Period::days(7));

        //fetch visitors and page views for the past week
        $mostvisitor =Analytics::fetchVisitorsAndPageViews(Period::days(30));
        $analyticsData = Analytics::performQuery(
                Period::years(1),
                'ga:sessions',
                [
                    'metrics' => 'ga:sessions, ga:pageviews',
                    'dimensions' => 'ga:pagePath'
                ]
            );
        return view('backend.seo.index',compact('seos', 'posts', 'mostvpage','mostvisitor','analyticsData'));
    }

    public function store(Request $request){
        $seo = new Seo();
        $seo->meta_title = $request->meta_title;
        $seo->meta_author = $request->meta_author;
        $seo->meta_tag = $request->meta_tag;
        $seo->google_analytics = $request->google_analytics;
        $seo->meta_description = $request->meta_description;
        $seo->alexa_rating_global = $request->alexa_rating_global;
        $seo->alexa_rating_country = $request->alexa_rating_country;
        $seo->google_verification = $request->google_verification;
        $seo->bing_verification = $request->bing_verification;
        $seo->save();
      
        return redirect(route('admin.seo.index'));
   
    }

    public function update(Request $request,$id)
    {
        // dd($request->meta_title);
        $seo = Seo::find($request->id);
        $seo->meta_title = $request->meta_title;
        $seo->meta_author = $request->meta_author;
        $seo->meta_tag = $request->meta_tag;
        $seo->google_analytics = $request->google_analytics;
        $seo->meta_description = $request->meta_description;
        $seo->alexa_rating_global = $request->alexa_rating_global;
        $seo->alexa_rating_country = $request->alexa_rating_country;
        $seo->google_verification = $request->google_verification;
        $seo->bing_verification = $request->bing_verification;
        $seo->update();
        

        return redirect(route('admin.seo.index'));
   
    }

}
