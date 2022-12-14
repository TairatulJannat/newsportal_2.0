@php
$imageGallery = DB::table('image_galleries')->where('image_status' , '1')->get();
$live_link = DB::table('on_offs')->first();
@endphp
@extends('frontend.layouts.app')
@section('meta')
    @isset($seos)
    <meta name = "meta_title" content="{{ $seos->meta_title }}">
    <meta name = "meta_author" content="{{ $seos->meta_author }}">
    <meta name = "meta_description" content="{{ $seos->meta_description }}">
    <meta name = "meta_tag" content="{{ $seos->meta_tag }}">
    <meta name = "google_analytics" content="{{ $seos->google_analytics }}">
    <meta name = "alexa_rating" content="{{ $seos->alexa_rating }}">
    <meta name = "google_verification" content="{{ $seos->google_verification }}">
    <meta name = "bing_verification" content="{{ $seos->bing_verification }}">
    <meta property="og:url" content="{{Request::fullUrl()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $seos->meta_title }}" />
    <meta property="og:description" content="description:{{$seos->meta_description}}" />
    @endif
@endsection
@section('title')
    <title>
        @isset($settings->site_title)
            {{$settings->site_title}}
        @endisset
    </title>
@endsection
@section('content')

{{-- image gellary + category  data --}}


<div class="main-content">

    <div class="container">

        {{-- --------- Middle Section  --------- --}}
        <div class="middle-section home">

            <div class="left-side-contents">

                {{-- ---------Main Carousel----------- --}}
                <div class="top-news-carousel d-flex">

                    <div class="advertise">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1234567890123456" crossorigin="anonymous"></script>
                        <!-- Homepage Leaderboard -->
                        <ins class="adsbygoogle"
                        style="display:inline-block;width:728px;height:90px"
                        data-ad-client="ca-pub-1234567890123456"
                        data-ad-slot="1234567890"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        {{-- @foreach($advertisements as $advertisement)
                            @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'left_main_creasol' && $advertisement->page_name == 'home')
                                <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">
                                    <img style="max-width: 100%; max-height: 352px; object-fit: contain;" src="{{asset($advertisement->image)}}" alt="ads">
                                    {{-- <img style="max-width: 365px; max-height: 265px; object-fit: contain;" src="{{asset($advertisement->image)}}" alt="ads">
                                </a>
                            @endif
                         @endforeach --}}
                    </div>

                        @isset($live_link)
                        <iframe width="66%" height="305px" src="{{$live_link->live_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        @else
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($imageGallery as $key => $item)

                                        @if(0)

                                            <iframe width="100%" style="height: 22rem!important;" src="{{$live_link->live_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                            @break

                                        @else
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <div class="img">
                                                    <img src="{{ asset($item->original_filename) }}" style=" object-fit:cover;" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="tn-title">
                                                    <a href="#">
                                                        <h3>{{ $item->image_title_en }}</h3>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        @endisset

                </div>



                {{-- ------- Main News ----- --}}
                <div class="main-news">
                    {{-- <div class="main-news-subtitle">
                        <h4 class="text-muted" style="padding: 0;">Newspress Subtitle</h4>
                    </div> --}}

                        @foreach ($main_posts as $key => $main_post)
                            @if($key == 0)

                            <div class="main-news-title">
                                <h1>{{ Str::limit($main_post->title_en, 60) }}</h1>
                            </div>

                            <div class="post-content">
                                <div class="post-img">
                                    <img src="{{ asset($main_post->image) }}">
                                </div>

                                <div class="post-section">
                                    <div class="post-details">
                                        <p style="letter-spacing: .5px">{!! Str::limit($main_post->details_en , 300) !!}</p>
                                    </div>
                                    <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $main_post->slug_en] ) }}" class="read-btn">Read More <span><i class="fas fa-angle-right"></i></span></a>
                                </div>
                            </div>

                            @endif
                        @endforeach
                </div>

                {{-- -------- Latest News ------- --}}
                <div class="news-cards-wrapper">
                    <ul>
                        @foreach ($main_posts as $key => $main_post)
                            @if($key != 0 && $key <= 6)
                                <li>
                                    <div class="news-card">
                                        <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $main_post->slug_en] ) }}">
                                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $main_post->slug_en] ) }}"><img src="{{ asset($main_post->image) }}" alt="" style="max-width: 500px; max-height: 300px;" /></a>
                                          <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $main_post->slug_en] ) }}"> <p class="news-title">{{ Str::limit($main_post->title_en,50 ) }}</p></a>
                                        </a>
                                        <div class="news-details">
                                            <p class="details">{!! Str::limit($main_post->details_en , 270) !!}</p>
                                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $main_post->slug_en] ) }}" class="read-btn">Read More <span><i class="fas fa-angle-right"></i></span></a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- ======= Clear Fix for float ===== --}}
                <div class="clear-fix" style="clear: left"></div>

                {{-- --------- Video News -------- --}}
                <div class="news-cards-wrapper video-news-wrapper">
                    <ul>
                        @foreach($vedioGaleries->where('video_title_en' , '!=' ,'')->take(3) as $vedio)
                            <li>
                                <div class="news-card video-news">
                                    <a href="{{route('frontend.vediogallery',$vedio->video_title_en)}}">
                                        <div class="vid">
                                            <iframe width="100%" height="100%" src="{{$vedio->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                        <p class="news-title">{{ Str::limit($vedio->video_title_en , 50)}}</p>
                                    </a>
                                 </div>
                            </li>
                        @endforeach
                    </ul>
                </div>


                {{-- ======= Clear Fix for float ===== --}}
                <div class="clear-fix" style="clear: left"></div>

                <!-- advertisement -->
                <div class="advertise">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1234567890123456" crossorigin="anonymous"></script>
                        <!-- Homepage Leaderboard -->
                        <ins class="adsbygoogle"
                        style="display:inline-block;width:728px;height:90px"
                        data-ad-client="ca-pub-1234567890123456"
                        data-ad-slot="1234567890"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    {{-- @foreach($advertisements as $advertisement)
                        @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bottom_main_news' && $advertisement->page_name == 'home')
                            <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">
                                <img style="width: 100%; max-height: 265px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                            </a>

                        @endif
                    @endforeach --}}
                </div>

                {{---- start category news section ----}}
                {{-- {{ $focusedCategoryPosts }} --}}
                <div class="catetwo-left1" style="margin-top: 2rem;">

                    @php
                     $count = 0 ;
                     $countforbulets = 0 ;
                    @endphp
                    @foreach ($categories as $key => $category)
                        {{-- @if($key < 5 ) --}}
                            @if($category->news->whereIn('post_type_id', ['2' , '3'])
                                                // ->where('post_type_id', '3')
                                                ->where('published_date' , '<=' , date("Y/m/d"))
                                                ->where('stage' , 'approved')->count() > 0)
                                <div class="catetwo-header">
                                    <h3>{{ $category->category_name_en }}</h3>
                                </div>
                            @endif


                            <div class="row">
                                @foreach ($category->news->where('stage' , 'approved')
                                                         ->where('title_en', '!=', '')
                                                         ->whereIn('post_type_id' , ['2' , '3'])
                                                        //  ->where('post_type_id' , '3')
                                                         ->where('published_date' , '<=' , date("Y/m/d"))
                                                          as $keys=> $news)

                                    @if($count <= 1)
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <!-- start catetwo single -->
                                            <div class="catetwo-single">
                                                <div class="catetwo-img">
                                                    <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $news->slug_en] ) }}"><img src="{{ asset($news->image) }}" alt="" /></a>
                                                </div>
                                                <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $news->slug_en] ) }}">
                                                    <h4>{{ Str::limit($news->title_en, 50) }}</h4>
                                                </a>

                                                <div class="catetwo-read">
                                                    <p>{!! Str::limit($news->details_en , 100) !!}</p>
                                                    <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $news->slug_en] ) }}">Read More <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- end catetwo single -->
                                        </div>
                                        @php
                                            $count ++;
                                        @endphp
                                    @endif
                                @endforeach

                                    <div class="col-sm-6 col-md-6 col-lg-4">

                                        <!-- start catetwo single -->
                                        <div class="catetwo-single">
                                            <div class="catetwo-list">
                                                <ul class="catetwo-menu">
                                                    @foreach($category->news->where('stage' , 'approved')
                                                                            ->where('title_en', '!=', '')
                                                                            ->whereIn('post_type_id',  ['2' , '3'])
                                                                            // ->where('post_type_id', '3')
                                                                            ->where('status' , '1')
                                                                            ->where('published_date' , '<=' , date("Y/m/d"))
                                                                             as $keys=> $news)
                                                        @if($countforbulets > 1)
                                                            <li> <a href = "{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $news->slug_en] ) }}"> {{ $news->title_en }}</a></li>

                                                        @endif
                                                            @php
                                                                $countforbulets ++;
                                                            @endphp
                                                    @endforeach

                                                </ul>

                                                    @if($category->news->whereIn('post_type_id',  ['2' , '3'])
                                                                        // ->where('post_type_id', '3')
                                                                        ->where('published_date' , '<=' , date("Y/m/d"))
                                                                        ->where('stage' , 'approved')->count()>2)
                                                        <div class="catetwo-mread">

                                                            <a href="{{ route('frontend.post.categorytBypost', $category->category_slug_en ) }}">Read More <i class="fa fa-angle-right"></i></a>

                                                        </div>

                                                    @endif


                                            </div>
                                        </div>
                                        <!-- end catetwo single -->
                                    </div>


                            </div>

                             <!-- advertisement -->
                             <div class="advertise  pt-3" style = "margin-bottom:40px">
                                @if($category->news->count() > 0)
                                    @foreach($advertisements as $advertisement)
                                        @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bottom_category' && $advertisement->page_name == 'home')

                                            <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">
                                                <img style="width: 100%; max-height: 100px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                                            </a>

                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        {{-- @endif --}}
                        @php
                            $count = 0;
                            $countforbulets = 0;
                        @endphp
                    @endforeach
                </div>



            </div>

            {{-- ==================== RIGHT COLUMN ====================== --}}
            <div class="right-column-wrapper d-flex" style="flex-direction: column">

                @include('frontend.layouts.partial.right_section')
                {{-- {{ $specific_news }} --}}

                {{-- ======== Specific News ======== --}}
                @isset($specific_news)
                    <div class="specific_news">

                        <img src = "{{ asset($specific_news->image) }}"  alt="">
                            <div class="title">
                                <h1>{{ $specific_news->title_en }}</h1>
                            </div>
                        <p>{!! Str::limit( $specific_news->details_en , 200)!!}</p>
                        <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $specific_news
                        ->slug_en] ) }}" class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                    @endisset
                {{-- ======== --end-- Specific News ======== --}}


                <!-- start specific news_list area  -->
                <div class="popularnews mt-5" style="border: none">
                    <div class="popularnews-heading">
                        <h3>International News</h3>
                    </div>
                    <!-- start popular slider -->
                    <ul class="specificnews_list">
                        <!-- popular slider item -->
                        @foreach ($inter_categories->take(7)  as $key=> $inter_category)
                            <li class="popularnews-items">
                                <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $inter_category->slug_en] ) }}" style="grid-template-columns: auto auto auto; border-bottom: 1px solid #d3cbcb;">
                                    <h1>{{ $key+1 }}</h1>
                                    <div class="popularnews-title">
                                        <div class="tagndate">
                                            {{-- <p class="text-dark mb-1" style="color: #c71818!important; font-family: 'Roboto',sans-serif; font-weight: 500;">{{ $inter_category->tags_en }}</p> --}}
                                            <p class="time text-muted mb-1">{{ \Carbon\Carbon::parse($inter_category->published_date)->isoFormat('MMM Do Y')  }}</p>
                                        </div>
                                        <h4 style="padding: 0;">{{ Str::limit($inter_category->title_en , 40) }}</h4>
                                    </div>
                                    <img src="{{ asset($inter_category->image) }}" alt="" style="max-width: 100px; "/>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- end popular slider -->
                </div>
                <!-- end specific news_list area -->


            </div>

        </div>
        {{-- --------- Middle Section  --------- --}}



        <!-- start e-commerce part -->
        {{-- <div class="ecommerce-part">
            <div class="ecommerce-area">
                <div class="ecommerce-heading">
                    <a href="#">
                        <h1>Newspaper: Our In House Product For Sale</h1>
                    </a>
                    <a href="#">
                        <h4>Newspaper Can Show Your <strong>E-commerce Products</strong> Easily</h4>
                    </a>
                    <p>We are a small team of industry veterans having decades of Experience in web Development and design</p>
                </div>
                <div class="row" style="margin-bottom: 45px;">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <!-- start single ecommerce card -->
                        <div class="ecommerce-card">
                            <div class="ecard-img">
                                <a href="#"><img src="{{ asset('public/frontend/assets/img/tn2.jpg') }}" alt="" /></a>
                                <div class="corner-sale"><b>Sale!</b></div>
                            </div>
                            <div class="ecard-info">
                                <h4>Our Newslatter</h4>
                                <span class="eprice-l"><del>$120</del></span><span class="eprice-r">$95</span><br />
                                <a href="#">Add To Card</a>
                            </div>
                        </div>
                        <!-- end single ecommerce card -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <!-- start single ecommerce card -->
                        <div class="ecommerce-card">
                            <div class="ecard-img">
                                <a href="#"><img src="{{ asset('public/frontend/assets/img/tn2.jpg') }}" alt="" /></a>
                                <div class="corner-sale"><b>Sale!</b></div>
                            </div>
                            <div class="ecard-info">
                                <h4>Our Newslatter</h4>
                                <span class="eprice-l"><del>$120</del></span><span class="eprice-r">$95</span><br />
                                <a href="#">Add To Card</a>
                            </div>
                        </div>
                        <!-- end single ecommerce card -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <!-- start single ecommerce card -->
                        <div class="ecommerce-card">
                            <div class="ecard-img">
                                <a href="#"><img src="{{ asset('public/frontend/assets/img/tn2.jpg') }}" alt="" /></a>
                                <div class="corner-sale"><b>Sale!</b></div>
                            </div>
                            <div class="ecard-info">
                                <h4>Our Newslatter</h4>
                                <span class="eprice-l"><del>$120</del></span><span class="eprice-r">$95</span><br />
                                <a href="#">Add To Card</a>
                            </div>
                        </div>
                        <!-- end single ecommerce card -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <!-- start single ecommerce card -->
                        <div class="ecommerce-card">
                            <div class="ecard-img">
                                <a href="#"><img src="{{ asset('public/frontend/assets/img/tn2.jpg') }}" alt="" /></a>
                                <div class="corner-sale"><b>Sale!</b></div>
                            </div>
                            <div class="ecard-info">
                                <h4>Our Newslatter</h4>
                                <span class="eprice-l"><del>$120</del></span><span class="eprice-r">$95</span><br />
                                <a href="#">Add To Card</a>
                            </div>
                        </div>
                        <!-- end single ecommerce card -->
                    </div>
                </div>



            </div>
        </div> --}}
        <!-- end e-commerce part -->

        <!--  =========== Featured video ==========  -->
        <div class="featuredvd-area">
            <div class="featuredvd-hd">
                <h4>Featured Videos</h4>
            </div>


            <div class="carousel-wrapper">
                @if(count($vedioGaleries) > 0)
                    <div class="feature-owl-carousel owl-carousel owl-theme">
                        @foreach($vedioGaleries->reverse() as $vedio)
                            <div class="item">
                                <a href="{{route('frontend.vediogallery',$vedio->video_title_en)}}">
                                    <iframe width="100%" height="100%" src="{{$vedio->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    {{Str::limit($vedio->video_title_en , 30)}}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
                 <!-- Advertisemnet -->

                <div class="advertise" style = "margin: 40px 0; background: #9999991f;">
                    @foreach($advertisements as $advertisement)
                        @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bottom_feature_vedio' && $advertisement->page_name == 'home')


                            <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">
                                <img style="width: 100%; max-height: 200px;object-fit: contain; margin: 1rem 0;" src="{{asset($advertisement->image)}}" alt="...">
                            </a>

                        @endif
                    @endforeach
                </div>
            </div>

        </div>
        <!-- end featured video part -->

        {{-- =========== PHOTO GALLERY =========== --}}
        <div class="gallery-wrapper">
            <div class="gallery">
                <div class="header">
                    <h1>Gallery <span class="rarrow"><i class="fa fa-caret-right" aria-hidden="true"></i></span></h1>
                </div>


                <div class="image-catagory row">
                    <div class="large-image-carousel col-lg-7">
                        @foreach ($imageGallery as $item)
                            <div class="content">
                                <div class="image">
                                    <img src="{{ asset($item->original_filename) }}"   alt="">
                                    <span class="img-icon"><i class="fas fa-images"></i></span>
                                </div>
                                <div class="title" >
                                    <h1>{{ $item->image_title_en }}</h1>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="other-images-wrapper col-lg-5">
                        @foreach ($imagegallery_post_english as $key=>$item)
                            <a href="">
                                @if($key == 0 )
                                <div class="other-image-large">
                                    <div class="image">
                                        <img src="{{ asset($item->image) }}" style=" object-fit:cover;" class="d-block w-100" alt="...">
                                        <span class="img-icon"><i class="fas fa-images"></i></span>
                                    </div>
                                    <div class="title">
                                        <h1>{{ $item->title_en }}</h1>
                                    </div>
                                </div>
                                @endif
                            </a>
                        @endforeach

                        <div class="other-image-small row">
                            @foreach ($imagegallery_post_english as $key=>$item)

                                @if($key == 1 )
                                    <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $item->slug_en] ) }}" class="img-sm col">
                                        <span class="img-icon"><i class="fas fa-images"></i></span>
                                        <img src="{{ asset($item->image) }}" style=" object-fit:cover;" class="d-block w-100" alt="...">
                                        <div class="title">
                                            <h1>{{ $item->title_en }}</h1>
                                        </div>
                                    </a>
                                @endif
                                @if($key == 2 )
                                    <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $item->slug_en] ) }}" class="img-sm col">
                                        <span class="img-icon"><i class="fas fa-images"></i></span>
                                        <img src="{{ asset($item->image) }}" style=" object-fit:cover;" class="d-block w-100" alt="...">
                                        <div class="title">
                                            <h1>{{ $item->title_en }}</h1>
                                        </div>
                                    </a>
                                @endif

                            @endforeach
                        </div>

                    </div>
                    {{-- <div class="gallery-catagory">
                        <div class="header">
                            <h4>More Galleries</h4>
                        </div>
                        <div class="catagories">
                            <ul class="gallery-list">
                                @foreach ($imageGallery as $item)
                                <li><a href="#">{{ $item->image_title_bn }}</a></li>
                                 @endforeach
                                <li><a href="#" class="btn">All Catagories <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>

                <div class="clear-fix" style="clear: left"></div>
                <div class="small-images">
                    <div class="header">
                        <h1>More Galleries <span class="rarrow"><i class="fa fa-caret-right" aria-hidden="true"></i></span></h1>
                    </div>
                        <div class="small-carousel">
                            @foreach ($imagegallery_post_english->skip(3)->take(5) as $item)
                            <div class="img-grad"><a href=""><img src="{{ asset($item->image) }}"></a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
              <!-- advertisement -->
                <div class="advertise  pt-3" style = "margin-bottom:40px">
                    @foreach($advertisements as $advertisement)
                        @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bottom_image_gellary' && $advertisement->page_name == 'home')

                            <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">
                                <img style="width: 100%; max-height: 190px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                            </a>

                        @endif
                    @endforeach
                </div>
        </div>

    </div>
</div>
<!-- end main content div -->

<!-- start all news category post -->
<div class="allnewcategory-post">
    <div class="container">
        <div class="row">
            @php
                $countbellownews = 0 ;
                $countbellownewsforbulets = 0 ;
                $count_category = 0;
            @endphp
            @foreach ($category_box as $item => $category)
                @if($category->news->where('stage' , 'approved')
                                    ->whereIn('post_type_id' , ['2' , '3'])
                                    ->where('published_date' , '<=' , date("Y/m/d"))
                                    ->count() > 0 && $count_category < 4 )
                    <div class="col-lg-3 col-md-6">


                        @if($category->news->where('stage' , 'approved')
                                            ->whereIn('post_type_id' ,  ['2' , '3'])
                                            ->where('published_date' , '<=' , date("Y/m/d"))
                                            ->count() > 0)
                            <div class="allnewscate-header1">
                                <h4>{{ $category->category_name_en }}</h4>
                            </div>
                        @endif

                                <!-- single category post -->
                        <div class="singlecate-post">
                            @foreach ($category->news->where('stage','approved')->where('stage', 'approved')
                                                    ->where('status' , '1')
                                                    ->where('title_en', '!=', '')
                                                    ->whereIn('post_type_id' ,  ['2' , '3'])
                                                    ->where('published_date' , '<=' , date("Y/m/d"))                                                     as $key => $item)
                                @if($countbellownews == 0)
                                    <div class="allnewscate-img">
                                        <a href="#"><img src="{{ $item->image }}" alt="" /></a>
                                    </div>
                                    <div class="allnewscate-content">
                                        <h3><a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $item->slug_en] ) }}">{{ Str::limit($item->title_en, 55) }}</a></h3>
                                        <div class="details">
                                            <p>{!! Str::limit($item->details_en , 100) !!}</p>
                                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $item->slug_en] ) }}" class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                                        </div>
                                        <ul class="allcatenews-menu">
                                            @foreach ($category->news->where('stage','approved')
                                                                    ->where('stage', 'approved')
                                                                    ->whereIn('post_type_id' , ['2' , '3'])
                                                                    ->where('published_date' , '<=' , date("Y/m/d"))
                                                                    ->where('status' , '1')
                                                                    ->where('title_en', '!=', '') as $items => $value)
                                                @if($countbellownewsforbulets != 0 && $countbellownewsforbulets < 3)
                                                    <li><a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $value->slug_en] ) }}">{{ $value->title_en }}</a></li>

                                                @endif
                                                @php
                                                    $countbellownewsforbulets ++;
                                                @endphp
                                            @endforeach
                                        </ul>
                                        <a href="{{ route('frontend.post.categorytBypost', $category->category_slug_en ) }}" class="allnewscate-readall">Read All <i class="fa fa-angle-right"></i></a>
                                    </div>
                                    @php
                                        $countbellownews ++;
                                    @endphp
                                @endif

                            @endforeach
                        </div>
                    </div>
                    @php
                        $count_category ++;
                    @endphp
                @endif
                    @php
                        $countbellownews = 0 ;
                        $countbellownewsforbulets = 0 ;
                    @endphp
               {{-- @endif --}}
            @endforeach
        </div>
    </div>
     <!-- advertisement -->

</div>
@endsection



@push('js')

<script>
    $(document).ready(function(){



        // Featured Section
        // $('.feature-owl-carousel').owlCarousel({
        //     // margin: 15,
        //     nav: true,
        //     dots: false,
        //     navText: ["<div class='nav-button owl-prev'>???</div>", "<div class='nav-button owl-next'>???</div>"],
        //     items : 4,
        //     itemsDesktop : [1000,3],
        //     itemsDesktopSmall : [900,3],
        //     itemsTablet: [600,2]
        // });
    });

</script>

@endpush
