<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category\Category;
use App\Models\Backend\SubCatagory\SubCategory;
use App\Models\Backend\Division;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;
use App\Models\Backend\Gallery\ImageGallery;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use App\Models\Transition;
use App\Models\Wallet;
use Image;
use Carbon\Carbon;
use Auth;
use Analytics;
use Spatie\Analytics\Period;
use Str;


class NewsController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::get();
    //     $subcategories = SubCategory::get();
    //     $divisions = Division::get();
    //     $districts = District::get();
    //     return view('backend.news.index', compact('categories', 'subcategories', 'divisions','districts'));
    // }

    public function create($type)
    {
        $categories = Category::where('status','1')->get();
        $subcategories = SubCategory::where('status','1')->get();
        $divisions = Division::get();
        $districts = District::get();
        $subdistricts = SubDistrict::get();
        // $type = $type;
        // dd($type);

        return view('backend.news.create', compact('categories', 'subcategories', 'divisions', 'districts','subdistricts' ,'type'));
    }

    public function show()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('backend.news.view_news', ['posts' => $posts]);
    }

    public function selectnews(Request $request)
    {
        // dd($request->type);
        //print_r($request->type);
        $type = $request->type;
        if($request->news == 'published'){

            if($request->type =='bangla_news'){
                //dd('tamima apu');
                $posts = Post::orderBy('updated_at', 'desc')->where('status' , '1')->where('stage' , 'approved')->where('post_type_id' , '1')->get();
    
            }elseif($request->type =='english_news'){
    
                $posts = Post::orderBy('updated_at', 'desc')->where('status' , '1')->where('stage' , 'approved')->where('post_type_id' , '2')->get();
    
            }elseif($request->type =='both_news'){
    
                $posts = Post::orderBy('updated_at', 'desc')->where('status' , '1')->where('stage' , 'approved')->where('post_type_id' , '3')->get();
    
            }
            // dd($posts);
            return view('backend.news.newsType.ajax_published_newses_by_type', compact('posts', 'type'));

        }elseif($request->news == 'pendingnews'){

            if($request->type =='bangla_news'){
                //dd('tamima apu');
                $posts = Post::orderBy('updated_at', 'desc')->where('status' , '1')->where('stage' , 'pending')->where('post_type_id' , '1')->get();
    
            }elseif($request->type =='english_news'){
    
                $posts = Post::orderBy('updated_at', 'desc')->where('status' , '1')->where('stage' , 'pending')->where('post_type_id' , '2')->get();
    
            }elseif($request->type =='both_news'){
    
                $posts = Post::orderBy('updated_at', 'desc')->where('status' , '1')->where('stage' , 'pending')->where('post_type_id' , '3')->get();
    
            }
            // dd($posts);
            return view('backend.news.newsType.ajax_pending_newses_by_type', compact('posts', 'type'));

        }
        
    }


    public function store(Request $request)
    {
        if ($request->option_news == 'bangla') {
            $this->validate(
                $request,
                [
                    'title_bn' => 'required|unique:posts,title_bn',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                    'details_bn' => 'required|unique:posts,details_bn',
                    'category_id' => 'required|not_in:0',
                ],
                [
                    'title_bn.required' => 'Title is required',
                    'title_bn.unique' => 'Title already exists',
                    'image.required' => 'Image field is required',
                    'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                    'image.mimes' => 'The image format must be jpeg/png/jpg/gif/svg',
                    'details_bn.required' => 'Details is required',
                    'details_bn.unique' => 'Details already exists',
                    'category_id.required' => 'Category must be selected'
                ]
            );
        } elseif ($request->option_news == 'english') {
            $this->validate(
                $request,
                [
                    'title_en' => 'required|unique:posts,title_en',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                    'details_en' => 'required|unique:posts,details_en',
                    'category_id' => 'required|not_in:0',
                ],
                [
                    'title_en.required' => 'Title is required',
                    'title_en.unique' => 'Title already exists',
                    'image.required' => 'Image field is required',
                    'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                    'image.mimes' => 'The image format must be jpeg/png/jpg/gif/svg',
                    'details_en.required' => 'Details is required',
                    'details_en.unique' => 'Details already exists',
                    'category_id.required' => 'Category must be selected'
                ]
            );
        } else {
            $this->validate(
                $request,
                [
                    'title_en' => 'required|unique:posts,title_en',
                    'title_bn' => 'required|unique:posts,title_bn',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                    'details_en' => 'required|unique:posts,details_en',
                    'details_bn' => 'required|unique:posts,details_bn',
                    'category_id' => 'required|not_in:0',
                ],
                [
                    'title_en.required' => 'Title is required',
                    'title_en.unique' => 'Title already exists',
                    'title_bn.required' => 'Title is required',
                    'title_bn.unique' => 'Title already exists',
                    'image.required' => 'Image field is required',
                    'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                    'image.mimes' => 'The image format must be jpeg/png/jpg/gif/svg',
                    'details_en.required' => 'Details is required',
                    'details_en.unique' => 'Details already exists',
                    'details_bn.required' => 'Details is required',
                    'details_bn.unique' => 'Details already exists',
                    'category_id.required' => 'Category must be selected'
                ]
            );
        }

        $post = new Post();
        if ($request->hasFile('image')) {
            // dd(Carbon::parse($request->published_date));
            $watermark_text = '©'.date("Y").' thevoice24.com - All Rights Reserved';
            $clients_image = $request->file('image');
            $clients_imageName = hexdec(uniqid()) . '.' . $clients_image->getClientOriginalExtension();
            $watermark_image = Image::make($clients_image)->resize(550, 310)->text($watermark_text, 250, 290, function ($font) {
                $font->size(90);
                $font->color('#ffffff');
                $font->align('bottom');
                $font->valign('bottom');
                $font->angle(90);
            })->save('public/uploads/backend/post/' . $clients_imageName);

            // dd($clients_imageName);
            $post->image = 'public/uploads/backend/post/' . $clients_imageName;
            if ($request->add_image_gallery != null) {
                $post->add_image_gallery = 1;
                $imagegallery = new ImageGallery();
                // dd($imagegallery);
                $imagegallery->original_filename = 'public/uploads/backend/post/' . $clients_imageName;
                $imagegallery->image_title_bn = $request->title_bn;;
                $imagegallery->image_title_en = $request->title_en;
                $imagegallery->image_description_bn = $request->details_bn;
                $imagegallery->image_description_en = $request->details_en;
                // dd($imagegallery);
                $imagegallery->save();
            }
        }
        $post->category_id = $request->category_id;
        $post->sub_category_id = $request->sub_category_id;
        $post->division_id = $request->division_id;
        $post->district_id = $request->district_id;
        $post->subdistrict_id = $request->subdistrict_id;
        $post->title_en = $request->title_en;
        $post->title_bn = $request->title_bn;
        if ($request->option_news == 'english') {
            $special_char = ['+','-','*','/' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
            $char_replace = str_replace($special_char, " ", $request->title_en);
            $post->slug_en = Str::slug($char_replace);

        } elseif($request->option_news == 'bangla') {

            $post->slug_bn = Str::slug($request->title_bn);

        }else{
            $special_char = ['+','-','*','/' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
            $char_replace = str_replace($special_char, " ", $request->title_en);
            $post->slug_en = Str::slug($char_replace);
            $post->slug_bn = Str::slug($request->title_bn);

        }
        $special_char = [' ' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
        $post->slug_bn  = str_replace($special_char, "-", $request->title_bn);
        $post->tags_en = $request->tags_en;
        $post->tags_bn = $request->tags_bn;
        $search = array('<br>','<em>','</em>', '<strong>','&nbsp', '</strong>');
        $post->details_en = str_replace($search, "", $request->details_en);
        $post->details_bn = str_replace($search, "", $request->details_bn);
        // $post->details_en = $request->details_en;
        // $post->details_bn = $request->details_bn;
        
        // dd(Carbon::parse($request->published_date));
        $post->published_date = Carbon::parse($request->published_date);
        $post->user_id = Auth::user()->id;
        if($request->option_news == 'english'){
            $post->post_type_id = 2;
        }
        elseif($request->option_news == 'bangla'){
            $post->post_type_id = 1;
        }
        else{
            $post->post_type_id = 3;
        }
        $post->status = 1;

        $post->stage = 'pending';


        if ($request->breaking_news == 'on') {
            $post->breaking_news = 1;
        }
        if ($request->feature_news == 'on') {
            $post->feature_news = 1;
        }
        if ($request->main_news == 'on') {
            $post->main_news = 1;
        }

// dd($post);
        $post->save();

        $notification = array(
            'success' => 'Post Created Successfully !',
        );
        return redirect()->route('admin.news.pending')->with($notification);
    }

    public function update(Request $request)
    {
        if ($request->option_news == 'bangla') {
            if ($request->hasFile('image')) {
                $this->validate(
                    $request,
                    [
                        'title_bn' => 'required',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                        'details_bn' => 'required',
                        'category_id' => 'required|not_in:0',
                    ],
                    [
                        'title_bn.required' => 'Title is required',
                        'title_bn.unique' => 'Title already exists',
                        'image.required' => 'Image field is required',
                        'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                        'image.mimes' => 'The image format must be jpeg/png/jpg/gif/svg',
                        'details_bn.required' => 'Details is required',
                        'details_bn.unique' => 'Details already exists',
                        'category_id.required' => 'Category must be selected'
                    ]
                );

            }
            else{
                $this->validate(
                    $request,
                    [
                        'title_bn' => 'required',
                        'details_bn' => 'required',
                        'category_id' => 'required|not_in:0',
                    ],
                    [
                        'title_bn.required' => 'Title is required',
                        'title_bn.unique' => 'Title already exists',
                        'details_bn.required' => 'Details is required',
                        'details_bn.unique' => 'Details already exists',
                        'category_id.required' => 'Category must be selected'
                    ]
                );

            }

        } elseif ($request->option_news == 'english') {
            if ($request->hasFile('image')) {
                $this->validate(
                    $request,
                    [
                        'title_en' => 'required',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                        'details_en' => 'required',
                        'category_id' => 'required|not_in:0',
                    ],
                    [
                        'title_en.required' => 'Title is required',
                        'title_en.unique' => 'Title already exists',
                        'image.required' => 'Image field is required',
                        'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                        'image.mimes' => 'The image format must be jpeg/png/jpg/gif/svg',
                        'details_en.required' => 'Details is required',
                        'details_en.unique' => 'Details already exists',
                        'category_id.required' => 'Category must be selected'
                    ]
                );
            }
            else{
                $this->validate(
                    $request,
                    [
                        'title_en' => 'required',
                        'details_en' => 'required',
                        'category_id' => 'required|not_in:0',
                    ],
                    [
                        'title_en.required' => 'Title is required',
                        // 'title_en.unique' => 'Title already exists',
                        'details_en.required' => 'Details is required',
                        'details_en.unique' => 'Details already exists',
                        'category_id.required' => 'Category must be selected'
                    ]
                );

            }

        } else {
            if ($request->hasFile('image')){
                $this->validate(
                    $request,
                    [
                        'title_en' => 'required',
                        'title_bn' => 'required',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                        'details_en' => 'required',
                        'details_bn' => 'required',
                        'category_id' => 'required|not_in:0',
                    ],
                    [
                        'title_en.required' => 'Title is required',
                        'title_bn.required' => 'Title is required',
                        'image.required' => 'Image field is required',
                        'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                        'image.mimes' => 'The image format must be jpeg/png/jpg/gif/svg',
                        'details_en.required' => 'Details is required',
                        'details_bn.required' => 'Details is required',
                        'category_id.required' => 'Category must be selected'
                    ]
                );

            }else{
                $this->validate(
                    $request,
                    [
                        'title_en' => 'required',
                        'title_bn' => 'required',
                        'details_en' => 'required',
                        'details_bn' => 'required',
                        'category_id' => 'required|not_in:0',
                    ],
                    [
                        'title_en.required' => 'Title is required',
                        'title_bn.required' => 'Title is required',
                        'details_en.required' => 'Details is required',
                        'details_bn.required' => 'Details is required',
                        'category_id.required' => 'Category must be selected'
                    ]
                );

            }

        }


        $post = Post::find($request->id);
        if ($request->hasFile('image')) {
            $watermark_text = '©'.date("Y").' thevoice24.com - All Rights Reserved';
            // dd(Carbon::parse($request->published_date));
            $clients_image = $request->file('image');
            $clients_imageName = hexdec(uniqid()) . '.' . $clients_image->getClientOriginalExtension();
            $watermark_image = Image::make($clients_image)->resize(550, 310)->text($watermark_text, 250, 290, function ($font) {
                $font->size(50);
                $font->color('#ffffff');
                $font->align('bottom');
                $font->valign('bottom');
                $font->angle(90);
            })->save('public/uploads/backend/post/' . $clients_imageName);

            // dd($clients_imageName);
            $post->image = 'public/uploads/backend/post/' . $clients_imageName;
            if ($request->add_image_gallery != null) {
                $post->add_image_gallery = 1;
                $imagegallery = new ImageGallery();
                // dd($imagegallery);
                $imagegallery->original_filename = 'public/uploads/backend/post/' . $clients_imageName;
                $imagegallery->image_title_bn = $request->title_bn;;
                $imagegallery->image_title_en = $request->title_en;
                $imagegallery->image_description_bn = $request->details_bn;
                $imagegallery->image_description_en = $request->details_en;
                // dd($imagegallery);
                $imagegallery->save();
            }
        }
        if($post->stage == 'pending'){
            $post->stage = 'pending';
        }elseif($post->stage == 'correction'){
            $post->stage = 'correction_return';
        }
        elseif($post->stage == 'draft'){
            $post->stage = 'pending';
        }

        $post->category_id = $request->category_id;

        $post->sub_category_id = $request->sub_category_id;
        $post->division_id = $request->division_id;
        $post->district_id = $request->district_id;
        $post->subdistrict_id = $request->subdistrict_id;
        $post->title_en = $request->title_en;
        $post->title_bn = $request->title_bn;
        if ($request->option_news == 'english') {

            $special_char = ['+','-','*','/' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
            $char_replace = str_replace($special_char, " ", $request->title_en);
            $post->slug_en = Str::slug($char_replace);

        } elseif($request->option_news == 'bangla') {

            $post->slug_bn = Str::slug($request->title_bn);

        }else{
            $special_char = ['+','-','*','/' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
            $char_replace = str_replace($special_char, " ", $request->title_en);
            $post->slug_en = Str::slug($char_replace);
            $post->slug_bn = Str::slug($request->title_bn);

        }
        $special_char = [' ' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
        $post->slug_bn  = str_replace($special_char, "-", $request->title_bn);
        $post->tags_en = $request->tags_en;
        $post->tags_bn = $request->tags_bn;
        $search = array('<br>', '<em>','</em>', '<strong>','&nbsp', '</strong>');
        $post->details_en = str_replace($search, "", $request->details_en);
        $post->details_bn = str_replace($search, "", $request->details_bn);
        // $post->details_en = $request->details_en;
        // $post->details_bn = $request->details_bn;
        $post->published_date = Carbon::parse($request->published_date);
        $post->user_id = Auth::user()->id;
        $post->status = 1;

        // $post->stage = 'pending';




        if ($request->breaking_news == 'on') {
            $post->breaking_news = 1;
        } else {
            $post->breaking_news = 0;
        }
        if ($request->feature_news == 'on') {
            $post->feature_news = 1;
        } else {
            $post->feature_news = 0;
        }
        if ($request->main_news == 'on') {
            $post->main_news = 1;
        } else {
            $post->main_news = 0;
        }

        // dd($post);
        $post->update();

        $notification = array(
            'success' => 'Post Updated Successfully !',
        );
        if($post->stage == 'pending'){
            return redirect()->route('admin.news.pending')->with($notification);
        }elseif($post->stage == 'correction'){
            return redirect()->route('admin.news.correction')->with($notification);
        }
        elseif($post->stage == 'correction_return'){
            return redirect()->route('admin.news.correction')->with($notification);
        }
        else{
            return redirect()->route('admin.news.pending')->with($notification);
        }

    }

    public function draft(Request $request)
    {
        if ($request->option_news == 'bangla') {
            $this->validate(
                $request,
                [
                    'title_bn' => 'required|unique:posts,title_bn',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                    'details_bn' => 'required|unique:posts,details_bn',
                    'category_id' => 'required|not_in:0',
                ],
                [
                    'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                ]
            );
        } elseif ($request->option_news == 'english') {
            $this->validate(
                $request,
                [
                    'title_en' => 'required|unique:posts,title_en',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                    'details_en' => 'required|unique:posts,details_en',
                    'category_id' => 'required|not_in:0',
                ],
                [
                    'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                ]
            );
        } else {
            $this->validate(
                $request,
                [
                    'title_en' => 'required|unique:posts,title_en',
                    'title_bn' => 'required|unique:posts,title_bn',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                    'details_en' => 'required|unique:posts,details_en',
                    'details_bn' => 'required|unique:posts,details_bn',
                    'category_id' => 'required|not_in:0',
                ],
                [
                    'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
                ]
            );
        }
        // dd(123);

        $post = new Post();
        if ($request->hasFile('image')) {
            $watermark_text = '©'.date("Y").' thevoice24.com - All Rights Reserved';
            // dd(Carbon::parse($request->published_date));
            $clients_image = $request->file('image');
            $clients_imageName = hexdec(uniqid()) . '.' . $clients_image->getClientOriginalExtension();
            $watermark_image = Image::make($clients_image)->resize(550, 310)->text($watermark_text, 250, 290,  function ($font) {
                $font->size(50);
                $font->color('#ffffff');
                $font->align('bottom');
                $font->valign('bottom');
                $font->angle(90);
            })->save('public/uploads/backend/post/' . $clients_imageName);

            // dd($clients_imageName);
            $post->image = 'public/uploads/backend/post/' . $clients_imageName;
            if ($request->add_image_gallery != null) {
                $post->add_image_gallery = 1;
                $imagegallery = new ImageGallery();
                // dd($imagegallery);
                $imagegallery->original_filename = 'public/uploads/backend/post/' . $clients_imageName;
                $imagegallery->image_title_bn = $request->title_bn;;
                $imagegallery->image_title_en = $request->title_en;
                $imagegallery->image_description_bn = $request->details_bn;
                $imagegallery->image_description_en = $request->details_en;
                // dd($imagegallery);
                $imagegallery->save();
            }
        }
        $post->category_id = $request->category_id;
        $post->sub_category_id = $request->sub_category_id;
        $post->division_id = $request->division_id;
        $post->district_id = $request->district_id;
        $post->subdistrict_id = $request->subdistrict_id;
        $post->title_en = $request->title_en;
        $post->title_bn = $request->title_bn;
        if ($request->option_news == 'english') {

            $special_char = ['+','-','*','/' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
            $char_replace = str_replace($special_char, " ", $request->title_en);
            $post->slug_en = Str::slug($char_replace);

        } elseif($request->option_news == 'bangla') {

            $post->slug_bn = Str::slug($request->title_bn);

        }else{
            $special_char = ['+','-','*','/' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
            $char_replace = str_replace($special_char, " ", $request->title_en);
            $post->slug_en = Str::slug($char_replace);
            $post->slug_bn = Str::slug($request->title_bn);

        }
        $special_char = [' ' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
        $post->slug_bn  = str_replace($special_char, "-", $request->title_bn);
        $post->tags_en = $request->tags_en;
        $post->tags_bn = $request->tags_bn;
        $search = array('<br>','<em>','</em>', '<strong>','&nbsp', '</strong>');
        $post->details_en = str_replace($search, "", $request->details_en);
        $post->details_bn = str_replace($search, "", $request->details_bn);
        // $post->details_en = $request->details_en;
        // $post->details_bn = $request->details_bn;
        $post->published_date = Carbon::parse($request->published_date);
        $post->user_id = Auth::user()->id;
        $post->status = 1;
        if($request->option_news == 'english'){
            $post->post_type_id = 2;
        }
        elseif($request->option_news == 'bangla'){
            $post->post_type_id = 1;
        }
        else{
            $post->post_type_id = 3;
        }
        $post->stage = 'draft';


        if ($request->breaking_news == 'on') {
            $post->breaking_news = 1;
        }
        if ($request->feature_news == 'on') {
            $post->feature_news = 1;
        }
        if ($request->main_news == 'on') {
            $post->main_news = 1;
        }


        $post->save();

        $notification = array(
            'success' => 'Post Created Successfully !',
        );
        return redirect()->route('admin.news.draft')->with($notification);
    }

    public function header_update(Request $request)
    {
        $ten = Post::where('breaking_news', '1')->get();
        if (count($ten) <= 10) {
            $data = Post::find($request->id);
            $data->breaking_news = $request->breaking_news;
            $data->save();
            return 'success';
        } else {
            $data = Post::find($request->id);
            $data->breaking_news = 0;
            $data->save();
        }
        return 'Maximum 10 Available';
    }
    public function FeatureNewsUpdate(Request $request)
    {
        $data = Post::find($request->id);
        // dd($data);
        if ($data->feature_news == 1) {
            $data->feature_news = 0;
        } else {
            $data->feature_news = 1;
        }
        $data->update();
        return 1;
    }

    public function MainNewsUpdate($id, Request $request)
    {
        $data = Post::find($id);
        // dd($data);
        if ($data->main_news == 1) {
            $data->main_news = 0;
        } else {
            $data->main_news = 1;
        }
        $data->update();
        return 1;
    }
    public function alexapostrating(Request $request)
    {

        // $globalRank = '';
        // $countryRank = '';
        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => 'ga:pagePath'
            ]
        );
        $alexaData = simplexml_load_file("http://data.alexa.com/data?cli=10&url=" . $request->url);
        $alexa['globalRank'] =  isset($alexaData->SD->POPULARITY) ? $alexaData->SD->POPULARITY->attributes()->TEXT : 0;
        $alexa['CountryRank'] =  isset($alexaData->SD->COUNTRY) ? $alexaData->SD->COUNTRY->attributes()->RANK : 0;
        $alexa['google_analytics'] = $analyticsData;
        return json_decode(json_encode($alexa), TRUE);
    }
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $divisions = Division::get();
        $districts = District::get();
        $subdistricts = SubDistrict::get();
        $type = '';
        if($post->post_type_id==3){
            $type = 'both';
        }
        elseif($post->post_type_id == 2){
            $type = 'english';
        }
        else{
            $type = 'bangla';
        }
        return view('backend.news.edit_news', ['post' => $post, 'categories' => $categories, 'subcategories' => $subcategories, 'divisions' => $divisions, 'districts' => $districts, 'subdistricts' => $subdistricts , 'type' => $type]);
    }
    public function pendingnews()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        // dd($posts);
        return view('backend.news.pending_news_list', ['posts' => $posts]);
    }
    public function correctionnews()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        // dd($posts);
        return view('backend.news.correction_news_list', ['posts' => $posts]);
    }
    public function breakingnews()
    {
        $posts = Post::where('breaking_news', '1')->orderBy('updated_at', 'desc')->get();
        // dd($posts);
        return view('backend.news.breaking_news', ['posts' => $posts]);
    }
    public function featurenews()
    {
        $posts = Post::where('feature_news', '1')->orderBy('updated_at', 'desc')->get();
        // dd($posts);
        return view('backend.news.feature_news', ['posts' => $posts]);
    }
    public function mainNews()
    {
        $posts = Post::where('main_news', '1')->orderBy('updated_at', 'desc')->get();
        // dd($posts);
        return view('backend.news.main_news', ['posts' => $posts]);
    }
    public function draftnews()
    {
        $posts = Post::where('stage', 'draft')->orderBy('updated_at', 'desc')->get();
        // dd($posts);
        return view('backend.news.draftnews', ['posts' => $posts]);
    }

    public function updateStage(Request $request)
    {
        $post = Post::find($request->id);
        $search = array('<p>', '<br>', '</p>', '<strong>','&nbsp', '</strong>');
        $post->details_en = str_replace($search, "", $post->details_en);
        $post->details_bn = str_replace($search, "", $post->details_bn);
        $category = Category::where('id', $post->category_id)->first();
        $subcategory = SubCategory::where('id', $post->sub_category_id)->where('category_id', $post->category_id)->first();
        $division = Division::where('id', $post->division_id)->first();
        $district = District::where('id', $post->district_id)->where('division_id', $post->division_id)->first();
        $subdistrict = SubDistrict::where('id', $post->subdistrict_id)->where('division_id', $post->division_id)->where('district_id', $post->district_id)->first();
        $reporter = User::where('id', $post->user_id)->first();
        $data = [
            $post, $category, $subcategory, $division, $district,  $subdistrict, $reporter,
        ];
        // dd($posts);
        return  $data;
    }
    public function updatedStage(Request $request)
    {
        $post = Post::find($request->postid);
        // dd($post);
        if ($request->stage == "correction") {
            $post->stage = $request->stage;
            if ($request->hasFile('correction_image')) {
                $currection_image = $request->file('correction_image');
                $currection_imageName = hexdec(uniqid()) . '.' . $currection_image->getClientOriginalExtension();
                Image::make($currection_image)->resize(273, 366)->save('public/uploads/backend/admin/post_currection_image' . $currection_imageName);
                $post->currection_image = 'public/uploads/backend/admin/post_currection_image' . $currection_imageName;
            }
            $post->message = $request->message;

            $notification = new Notification();
            $notification->message = "Your post will moved to Correction list due to some problem please check";
            $notification->sent_by = Auth::user()->id;
            $notification->sent_for = $post->user_id;
            $notification->post_id = $post->id;
            $notification->status = "unread";
            $notification->save();
            $post->update();
        } elseif ($request->stage == "approved") {
            // dd($request);
            $post->stage = $request->stage;
            $post->published_date = Carbon::parse($request->published_date);
            if ($request->breaking_news == 'on') {
                $post->breaking_news = 1;
            } else {
                $post->breaking_news = 0;
            }
            if ($request->feature_news == 'on') {
                $post->feature_news = 1;
            } else {
                $post->feature_news = 0;
            }
            if ($request->main_news == 'on') {
                $post->main_news = 1;
            } else {
                $post->main_news = 0;
            }
            if ($request->add_image_gallery == 'on') {
                $post->add_image_gallery = 1;
            } else {
                $post->add_image_gallery = 0;
            }

            $tranjection = new Transition();
            $tranjection->user_id =  $post->user_id;

            $tranjection->status = 'Credited';
            if( $post->post_type_id == 1){
                $tranjection->amount = 25;
            }elseif($post->post_type_id == 2){
                $tranjection->amount = 35;
            }else{
                $tranjection->amount = 40;
            }
            $tranjection->date = date("Y-m-d H:i:s");
            // dd($tranjection);
            $tranjection->save();
            $wallet =  Wallet::where('user_id' , $post->user_id)->first();
            if( $post->post_type_id == 1){
                $wallet->bangla_post_count =$wallet->bangla_post_count +1;
            }elseif($post->post_type_id == 2){
                $wallet->english_post_count =$wallet->english_post_count +1;
            }else{
                // dd($wallet);
                $wallet->both_post_count = $wallet->both_post_count +1;

            }
            $wallet->Total_balance_without_bonus = ((25* $wallet->bangla_post_count)+(35*$wallet->english_post_count)+(40*$wallet->both_post_count));
            $wallet->Total_balance_bonus = $wallet->Total_balance_without_bonus +$wallet->bonus;
            // dd($wallet);
            $wallet->save();
            $post->update();
        }
        // dd($posts);
        $notification = array(
            'success' => 'Post Updated Successfully !',
        );
        return  redirect()->route('admin.news.pending')->with($notification);
    }

    public function updatedraft(Request $request)
    {
        $this->validate(
            $request,
            [
                'title_en' => 'required:posts,title_en',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max-width=2000,max-height=1500:posts,image',
                'details_en' => 'required:posts,details_en',
                'category_id' => 'required|not_in:0',
            ],
            [
                'image.max' => 'Failed to upload an image. The image maximum size is 1Mb',
            ]
        );

        $post = Post::find($request->id);

        if ($request->hasFile('image')) {
            $watermark_text = '©'.date("Y").' thevoice24.com - All Rights Reserved';
            $clients_image = $request->file('image');
            $clients_imageName = hexdec(uniqid()) . '.' . $clients_image->getClientOriginalExtension();
            $watermark_image = Image::make($clients_image)->resize(550, 310)->text($watermark_text, 250, 290,  function ($font) {
                $font->size(50);
                $font->color('#ffffff');
                $font->align('bottom');
                $font->valign('bottom');
                $font->angle(90);
            })->save('public/uploads/backend/post/' . $clients_imageName);
            $post->image = 'public/uploads/backend/post/' . $clients_imageName;
        }

        $post->stage = "draft";
        $post->category_id = $request->category_id;
        $post->sub_category_id = $request->sub_category_id;
        $post->division_id = $request->division_id;
        $post->district_id = $request->district_id;
        $post->subdistrict_id = $request->subdistrict_id;
        $post->title_en = $request->title_en;
        $post->title_bn = $request->title_bn;
       if ($request->option_news == 'english') {

            $special_char = ['+','-','*','/' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
            $char_replace = str_replace($special_char, " ", $request->title_en);
            $post->slug_en = Str::slug($char_replace);

        } elseif($request->option_news == 'bangla') {

            $post->slug_bn = Str::slug($request->title_bn);

        }else{
            $special_char = ['+','-','*','/' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
            $char_replace = str_replace($special_char, " ", $request->title_en);
            $post->slug_en = Str::slug($char_replace);
            $post->slug_bn = Str::slug($request->title_bn);

        }
        $special_char = [' ' , '?' , '!' , '%','=','<em>','</em>','<strong>','&nbsp','</strong>'];
        $post->slug_bn  = str_replace($special_char, "-", $request->title_bn);
        $post->tags_en = $request->tags_en;
        $post->tags_bn = $request->tags_bn;
        $search = array('<br>','<em>','</em>', '<strong>','&nbsp', '</strong>');
        $post->details_en = str_replace($search, "", $request->details_en);
        $post->details_bn = str_replace($search, "", $request->details_bn);
        // $post->details_en = $request->details_en;
        // $post->details_bn = $request->details_bn;
        $post->published_date = Carbon::parse($request->published_date);
        if ($request->breaking_news == 'on') {
            $post->breaking_news = 1;
        }
        if ($request->feature_news == 'on') {
            $post->feature_news = 1;
        }
        if ($request->main_news == 'on') {
            $post->main_news = 1;
        }
        // $post->approved = 1;
        // dd($post);
        $post->update();

        $notification = array(
            'success' => 'Post Table updated Successfully !',
        );
        if($post->stage == 'draft'){
            return redirect()->route('admin.news.draft')->with($notification);
        }

        //   return($post);

    }



    public function destroy($id)
    {

        $post = Post::find($id);
        $post->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function breakingNewsUpdate(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post->breaking_news == 1) {
            $post->breaking_news = 0;
        } else {
            $post->breaking_news = 1;
        }

        $post->update();
        return 1;
    }


    public function approve(Request $request, $id)
    {
        //     $post = Post::find($id);
        //     if($post->approve == 1){
        //         $post->approve = 0;
        //     }
        //     else{
        //         $post->approve = 1;
        //     }

        //     $post->update();
        //    return 1;
    }
    public function statusUpdate(Request $request)
    {

        $post = Post::find($request->id);

        if ($post->status == 1) {
            $post->status = 0;
        } else {
            $post->status = 1;
        }

        $post->save();

        return 1;
    }
    public function commentsByPost($id)
    {
        $comments = Comment::where('post_id', $id)->get();
        return view('backend.comment.comment_list', compact('comments'));
    }

    public function imgupload(Request $request)
    {

        if($request->hasFile('upload')) {
            $origin_Name = $request->file('upload')->getClientOriginalName();
            $File_Name = pathinfo($origin_Name, PATHINFO_FILENAME);

            $extension_Name = $request->file('upload')->getClientOriginalExtension();
            $File_Name = $File_Name.'_'.time().'.'.$extension_Name;

            $request->file('upload')->move(public_path('images'), $File_Name);
            //    dd(time());
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $url = asset('public/images/'.$File_Name);


            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

}
