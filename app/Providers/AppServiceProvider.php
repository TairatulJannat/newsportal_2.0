<?php

namespace App\Providers;

use App\Models\Backend\Advertisement;
use App\Models\Backend\Blog\BlogPost;
use App\Models\Backend\Category\Category;

use App\Models\Backend\Gallery\ImageGallery;
use App\Models\Notification;
use App\Models\on_off;
use View;
use App\Models\Post;
use App\Models\Seo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if (Schema::hasTable('posts')) {
        $Popular_newses_for_english= Post::where('view' , '!=' ,  'null')
                                    ->where('stage', 'approved')
                                    ->whereIn('post_type_id',['2','3'])
                                    ->where('published_date' , '<=' , date("Y/m/d"))
                                    ->where('status' , '1')
                                    ->where('title_en', '!=' ,'')
                                    ->orderby('view', 'desc')
                                    ->limit(9)->get();

         $Popular_newses_for_bangla= Post::where('view' , '!=' ,  'null')
                                    ->where('stage', 'approved')
                                    ->whereIn('post_type_id',['1','3'])
                                    ->where('published_date' , '<=' , date("Y/m/d"))
                                    ->where('status' , '1')
                                    ->where('title_bn', '!=' ,'')
                                    ->orderby('view', 'desc')
                                    ->limit(9)->get();

            View::share('Popular_newses_for_english', $Popular_newses_for_english);
            View::share('Popular_newses_for_bangla', $Popular_newses_for_bangla);
        }

        if (Schema::hasTable('blog_posts')) {
            $Popular_blog_posts = BlogPost::where('view' , '!=' ,  'null')->where('stage', 'approved')->orderby('view', 'desc')->limit(7)->get();
            View::share('Popular_blog_posts', $Popular_blog_posts);
        }

        if (Schema::hasTable('posts')) {
            $Recent_newses_for_english = Post::orderBy('published_date','desc')->where('stage', 'approved')->where('title_en' , '!=' , '')->where('status' , '1')->where('published_date' , '<=' , date("Y-m-d H:i:s"))->limit(5)->get();
            $Recent_newses_for_bangla = Post::orderBy('published_date','desc')->where('stage', 'approved')->where('title_bn' , '!=' , '')->where('status' , '1')->where('published_date' , '<=' , date("Y-m-d H:i:s"))->limit(5)->get();
            View::share('Recent_newses_for_english', $Recent_newses_for_english);
            View::share('Recent_newses_for_bangla', $Recent_newses_for_bangla);
        }

        if (Schema::hasTable('posts')) {
            $Sports_english = Post::where('category_id','7')
                                    ->where('stage', 'approved')
                                    ->where('status' , '1')
                                    ->whereIn('post_type_id', ['2','3'])
                                    ->where('published_date' , '<=' , date("Y/m/d"))
                                    ->orderBy('id','DESC')->get();

            $Sports_bangla = Post::where('category_id','7')
                                    ->where('stage', 'approved')
                                    ->where('status' , '1')
                                    ->whereIn('post_type_id', ['1','3'])
                                    ->where('published_date' , '<=' , date("Y/m/d"))
                                    ->orderBy('id','DESC')->get();

            View::share('Sports_english', $Sports_english);
            View::share('Sports_bangla', $Sports_bangla);
        }
        if (Schema::hasTable('seos')) {
            $seos = Seo::all()->last();
            View::share('seos', $seos);
        }
        if (Schema::hasTable('notifications')) {
            $notifications = Notification::all();
            View::share('notifications', $notifications);
        }
        if (Schema::hasTable('categories')) {
            $categories_head_for_english = Category::where('show_on_header' , 1)->where('status' , 1)->where('category_name_en', '!=', '' )->limit(10)->get();
            $categories_head_for_bangla = Category::where('show_on_header' , 1)->where('status' , 1)->where('category_name_bn', '!=', 'null' )->limit(10)->get();
            View::share('categories_head_for_english', $categories_head_for_english);
            View::share('categories_head_for_bangla', $categories_head_for_bangla);
        }
        if (Schema::hasTable('categories')) {
            $categories_for_english = Category::where('status' , 1)->where('show_on_header' , '!=' , 1)->where('category_name_en', '!=', '' )->get();
            $categories_for_bangla = Category::where('status' , 1)->where('show_on_header' , '!=' , 1)->where('category_name_bn', '!=', '' )->get();
            View::share('categories_for_english', $categories_for_english);
            View::share('categories_for_bangla', $categories_for_bangla);
        }
        // if (Schema::hasTable('subcategory')) {
        //     $subcategory = SubCategory::where('show_on_header' , 1)->get();
        //     View::share('subcategory', $subcategory);
        // }
        if (Schema::hasTable('on_offs')) {
            $live_link = on_off::get()->first();
            // dd( $live_link);
            View::share('live_link', $live_link);
        }
        if (Schema::hasTable('advertisements')) {
            $advertisements = Advertisement::orderBy('created_at','DESC')->get();
            View::share('advertisements', $advertisements);
        }
        if (Schema::hasTable('general_settings_frontends')) {

            $settings = DB::table('general_settings_frontends')->orderBy('updated_at', 'desc')->first();;
            View::share('settings', $settings);
        }
        // $data = Http::get('https://coronavirus-19-api.herokuapp.com/countries/')->json();
        // View::share( 'data' , $data);
        // @php
        // $imageGallery = DB::table('image_galleries')->limit(3)->get();
        // $categories_head = DB::table('categories')->get();
        // $live_link = DB::table('on_offs')->first();
        // @endphp

    }
}
