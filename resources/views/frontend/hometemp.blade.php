@extends('frontend.layouts.app') 
@section('content')

@include('frontend.layouts.partial.top_news')





<div class="main-content">

    <div class="container">
        <div class="row">
            @foreach ($advertisements as $advertisement)
                @if ($advertisement->position == 'Bottom_Top_News' &&$advertisement->page_name == 'Home' )
                    {{-- {{ $advertisement->image }} --}}
                    <div>
                        <a  href="{{ $advertisement->ads_link }} " ><img src="{{ asset ($advertisement->image)}}" width="892" height="90" alt="" class=""></a>
                    </div>
                @endif
            @endforeach
            
            <div class="col-lg-9 col-md-7">
                <div class="row pt-3">
                    @foreach ($posts as $key => $post)
                    @if($key == 0)
                        <div class="col-lg-7 col-md-12">
                            <div class="page-image">
                                <a href="#"><img src="{{ asset($post->image) }}" alt="" style="max-width: 500px; max-height: 300px;" /></a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="page-content">
                                <a href="{{route('frontend.post.categorypostbyId' , ['slug_bn' => $post->slug_bn , 'slug_en' =>  $post->slug_en] ) }}">
                                    <h4><b style="color:red">{{ Str::limit($post->title_bn ) }}</b></h4>
                                </a>
                                <p>{!! Str::limit($post->details_bn , 400) !!}</p>
                                <a href="{{route('frontend.post.categorypostbyId' , ['slug_bn' => $post->slug_bn , 'slug_en' =>  $post->slug_en] ) }}" class="readmore">Read more <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        @break
                        @endif
                    @endforeach
                </div>
                <!-- start main content single post area -->
                <div class="row">
                    @foreach ($posts as $key => $post)
                        @if($key != 0 && $key <= 7)
                            <div class="col-lg-4 col-md-6">
                                <div class="maincontent-post">
                                    <div class="maincontpst-heading">
                                        <a href="{{route('frontend.post.categorypostbyId' , ['slug_bn' => $post->slug_bn , 'slug_en' =>  $post->slug_en] ) }}">
                                            <h3>{{ Str::limit($post->title_bn , 20) }}</h3>
                                        </a>
                                    </div>
                                    <a href="#" class="contentpost-img">
                                        <img src="{{asset('public/uploads/backend/header/icon/1714575939543944.jpeg')}}" data-original="{{ asset($post->image) }}" alt="" style="max-width: 250px; max-height: 150px;"/>
                                    </a>
                                    <div class="maincontpst-info">
                                        <a href="#">
                                            <p>{!! Str::limit($post->details_bn , 100) !!}</p>
                                        </a>
                                        <div class="maincontpst-read">
                                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_bn' => $post->slug_bn , 'slug_en' =>  $post->slug_en] ) }}">Read More <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class ="row">
                    @foreach ($advertisements as $advertisement)
                    @if ($advertisement->position == 'Bottom_Main_Content' &&$advertisement->page_name == 'Home' )
                    {{-- {{ $advertisement->image }} --}}
                        <a href="{{ $advertisement->ads_link }}">
                            <img src="{{ asset ($advertisement->image)}}" style="border:0" width="900" height="250" alt="" >
                        </a>
                    @endif
                @endforeach
                </div>
                <!-- end main content single post area -->
            </div>
            <div class="col-lg-3 col-md-5">
                <!-- start popular news area -->
                <div class="popularnews">
                    <div class="popularnews-heading">
                        <h3>Popular News</h3>
                    </div>
                    <!-- start popular slider -->
                    <ul class="popularnews-slider">
                        <!-- popular slider item -->
                    @foreach ($Popular_newses  as $Popular_news)
 
                        <li class="popularnews-items">
                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_bn' => $Popular_news->slug_bn , 'slug_en' =>  $Popular_news->slug_en] ) }}">
                                <img src="{{ asset($Popular_news->image) }}" alt="" style="max-width: 100px; "/>
                                <div class="popularnews-title">
                          <h4>{{ Str::limit($Popular_news->title_bn , 40) }}</h4>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- end popular slider -->
                </div>
                <!-- end popular news area -->
            </div>
        </div>
    </div>

</div>

<div class="catetwo">
    <div class="container">
        <div class="row">
            <!-- start catetwo left one -->
            <div class="col-lg-9 catetwo-left1">
                @foreach ($categories as $key => $category)
                 @if($key < 5 )
                    <div class="catetwo-header">
                        <h3>{{ $category->category_name_bn }}</h3>
                    </div>
                    <div class="row">
                        @forelse ($category->news as $key=> $news)
                        @if($key == 0)
                            <div class="col-md-6 col-lg-4">
                                <!-- start catetwo single -->
                                <div class="catetwo-single">
                                    <div class="catetwo-img">
                                        <a href="#"><img src="{{ asset($news->image) }}" alt="" style="max-width: 268px; max-height: 178px;"/></a>
                                    </div>
                                    <a href="#">
                                        <h4>{{ $news->title_bn }}</h4>
                                    </a>
                                    <p>{!! Str::limit($news->details_bn , 40) !!}</p>
                                    <div class="catetwo-read">
                                        <a href="{{route('frontend.post.categorypostbyId' , ['slug_bn' => $post->slug_bn , 'slug_en' =>  $post->slug_en] ) }}">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <!-- end catetwo single -->
                            </div>
                        @endif
                        @if($key == 1)
                            <div class="col-md-6 col-lg-4">
                                <!-- start catetwo single -->
                                <div class="catetwo-single">
                                    <div class="catetwo-img">
                                        <a href="#"><img src="{{ asset($news->image) }}" alt="" style="max-width: 268px; max-height: 178px;"/></a>
                                    </div>
                                    <a href="#">
                                        <h4>{{ $news->title_bn }}</h4>
                                    </a>
                                    <p>{!! Str::limit($news->details_bn , 40) !!}</p>
                                    <div class="catetwo-read">
                                        <a href="#">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <!-- end catetwo single -->
                            </div>
                        @endif
                        @if($key != 0 && $key != 1)
                            <div class="col-md-6 col-lg-4">
                                <!-- start catetwo single -->
                                <div class="catetwo-single">
                                    <div class="catetwo-list">
                                        <ul class="catetwo-menu">
                                        
                                                <li><a href="#">{{ $news->title_bn }}</a></li>
                                        
                                        </ul>
                                        <div class="catetwo-mread">
                                            <a href="#">Read More <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end catetwo single -->
                            </div> 
                        @endif
                        @empty
                        <div class="col-md-6 col-lg-4">
                            <!-- start catetwo single -->
                            <div class="catetwo-single">
                                <h1>No Data ound</h1>
                            </div>
                            <!-- end catetwo single -->
                        </div> 
                        @endforelse 
                        <div>
                            <a id="aw0" target="_blank" href="https://googleads.g.doubleclick.net/pcs/click?xai=AKAOjsv4rv5UkyFJ6ImXYYkqc9HHU4NX45CLz7aP_L5arwhutm2R-QBQuWXq1kQEafS1UvuA0MTngWp2NPO1x4EEiqmbEBw1VYejH46GWTA3xsuHClUgintUypaYDapog1bwi6HAX6BQ97-oCCIkWbNTb_PdRIaGHKNC_vgIUbmAFuL5viF4Bhjx2oaq5qw7FkICjF6fMSy2Zw3j7auDrCIwSZ57hNugqxgMl589IL8SnK6HfAvV9yBwii81xUxRC6tpx8n3c-MMU7Z4r6YmWLFFBdTNAIzTptc8yvgC0Kv76GmvcKjR7qvIWPj-pqEtS0kMDwDQfRkF9VNx4QeEIQ&amp;sig=Cg0ArKJSzM6UR8jQjUEK&amp;fbs_aeid=[gw_fbsaeid]&amp;adurl=https://www.facebook.com/FreshMilkPowder.bd&amp;nm=13&amp;nx=530&amp;ny=-50&amp;mb=2" onfocus="ss('aw0')" onmousedown="st('aw0')" onmouseover="ss('aw0')" onclick="ha('aw0')"><img src="https://tpc.googlesyndication.com/simgad/9684546315633519121" border="0" width="907" height="90" alt="" class="img_ad"></a>
                            <br>
                            <br>
                        </div>
                    
                    </div>
                    @endif
                @endforeach
            </div>
            {{-- <div class="col-md-6 col-lg-3">
                <div class="newsissues-area">
                    <div class="newsissues-header">
                        <h3>News Issues</h3>
                    </div>
                    <div class="newsissues-single">
                        <a href="#">alanis</a>
                        <a href="#">architecture</a>
                        <a href="#"><strong>Asia</strong></a>
                        <a href="#">Bird</a>
                        <a href="#"><strong>Business</strong></a>
                        <a href="#">Death</a>
                        <a href="#"><strong>Entertainment</strong></a>
                        <a href="#">Health</a>
                        <a href="#">Nature</a>
                        <a href="#">alanis</a>
                        <a href="#">architecture</a>
                        <a href="#"><strong>Asia</strong></a>
                        <a href="#">Bird</a>
                        <a href="#"><strong>Business</strong></a>
                        <a href="#">Death</a>
                        <a href="#"><strong>Entertainment</strong></a>
                        <a href="#">Health</a>
                        <a href="#">Nature</a>
                        <a href="#">alanis</a>
                        <a href="#">architecture</a>
                        <a href="#"><strong>Asia</strong></a>
                        <a href="#">Bird</a>
                        <a href="#"><strong>Business</strong></a>
                        <a href="#">Death</a>
                        <a href="#"><strong>Entertainment</strong></a>
                        <a href="#">Health</a>
                        <a href="#">Nature</a>
                    </div>
                </div>
            </div> --}}
            <!-- end catetwo left one -->
            <!-- start catetow left two -->
            {{-- <div class="col-lg-9 catetwo-left2">
                <div class="catetwo-header">
                    <h3>International</h3>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <!-- start catetwo single -->
                        <div class="catetwo-single">
                            <div class="catetwo-img">
                                <a href="#"><img src="{{ asset('public/frontend/assets/img/tn2.jpg') }}" alt="" /></a>
                            </div>
                            <a href="#">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis deleniti, aliquam officiis. Laudantium.</p>
                            <div class="catetwo-read">
                                <a href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <!-- end catetwo single -->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <!-- start catetwo single -->
                        <div class="catetwo-single">
                            <div class="catetwo-img">
                                <a href="#"><img src="{{ asset('public/frontend/assets/img/tn2.jpg') }}" alt="" /></a>
                            </div>
                            <a href="#">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis deleniti, aliquam officiis. Laudantium.</p>
                            <div class="catetwo-read">
                                <a href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <!-- end catetwo single -->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <!-- start catetwo single -->
                        <div class="catetwo-single">
                            <div class="catetwo-list">
                                <ul class="catetwo-menu">
                                    <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></li>
                                    <li><a href="#">Lorem ipsum dolor consectetur adipisicing elit. Consectetur alias corrupti.</a></li>
                                    <li><a href="#">Lorem ipsum dolor sit amet elit. impedit, dolorum.</a></li>
                                    <li><a href="#">Lorem ipsum dolor sit amet, consectetur Laudantium </a></li>
                                    <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore veniam officia </a></li>
                                </ul>
                                <div class="catetwo-mread">
                                    <a href="#">Read More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- end catetwo single -->
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6 col-lg-3 catetwo-right2">
                <div class="ads-single">
                     
                <div class="newsissues-area">
                    <div class="newsissues-header">
                        <h3>News Issues</h3>
                    </div>
                    <div class="newsissues-single">
                        <a href="#">alanis</a>
                        <a href="#">architecture</a>
                        <a href="#"><strong>Asia</strong></a>
                        <a href="#">Bird</a>
                        <a href="#"><strong>Business</strong></a>
                        <a href="#">Death</a>
                        <a href="#"><strong>Entertainment</strong></a>
                        <a href="#">Health</a>
                        <a href="#">Nature</a>
                        <a href="#">alanis</a>
                        <a href="#">architecture</a>
                        <a href="#"><strong>Asia</strong></a>
                        <a href="#">Bird</a>
                        <a href="#"><strong>Business</strong></a>
                        <a href="#">Death</a>
                        <a href="#"><strong>Entertainment</strong></a>
                        <a href="#">Health</a>
                        <a href="#">Nature</a>
                        <a href="#">alanis</a>
                        <a href="#">architecture</a>
                        <a href="#"><strong>Asia</strong></a>
                        <a href="#">Bird</a>
                        <a href="#"><strong>Business</strong></a>
                        <a href="#">Death</a>
                        <a href="#"><strong>Entertainment</strong></a>
                        <a href="#">Health</a>
                        <a href="#">Nature</a>
                    </div>
                </div>
            
                </div>
            </div>
            <!-- end catetow left two -->
        </div>
    </div>
</div>
<!-- end category with 2div -->
<!-- start latestnews slide part -->
<div class="latestnews">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-ltnews">
                    <h3>Latest News</h3>
                </div>
            </div>
        </div>
        <div class="latestnews-slide">
            <!-- single ltnews -->
            @foreach ($posts as $post)
                
            
            <div class="single-ltnews">
                <div class="ltnews-img">
                    <a href="#"> <img src="{{ asset($post->image) }}" alt="" style="max-width: 250px; max-height: 150px;"/></a>
                </div>
                <a href="#">
                    <h4>{{ Str::limit($post->title_bn , 40) }}</h4>
                </a>
                <p>{!! Str::limit($post->details_bn , 40) !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end latestnews slide part -->
<!-- start e-commerce part -->
<div class="ecommerce-part">
    <div class="ecommerce-area">
        <div class="container">
            <div class="ecommerce-heading">
                <a href="#">
                    <h3>Newspaper: Our In House Product For Sale</h3>
                </a>
                <a href="#">
                    <h4>newspaper Can Show Your <strong>E-commerce Products</strong> Easily</h4>
                </a>
                <p>We are a small team of industry veterans having decades of Experience in web Development and design</p>
            </div>
            <div class="row" style="margin-bottom: 45px;">
                <div class="col-lg-3 col-md-6">
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
                <div class="col-lg-3 col-md-6">
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
                <div class="col-lg-3 col-md-6">
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
                <div class="col-lg-3 col-md-6">
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
        <!-- featured video part -->
        <div class="container">
            <div class="featuredvd-area">
                <div class="featuredvd-hd">
                    <h4>Featured Videos</h4>
                </div>
                <div class="row">
                    @foreach($vedioGaleries as $vedio)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-featurvd">
                            <a href="{{route('frontend.vediogallery',$vedio->video_title_bn)}}">
                                <iframe width="100%" height="100%" src="{{$vedio->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                {{$vedio->video_title_bn}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                    
                    <div style="margin-left= 10px; border-color:white;">
                        @foreach ($advertisements as $advertisement)
                            @if ($advertisement->position == 'Bottom_Feature_Video' &&$advertisement->page_name == 'Home' )
                                <a  href="{{ $advertisement->ads_link }}"  ><img src="{{ asset ($advertisement->image)}}" border="0" width="1220" height="250" alt=""></a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- featured video part -->
    </div>
</div>
<!-- end e-commerce part -->
<!-- start all news category post -->

<div class="allnewcategory-post">
    <div class="container">
        <div class="row">
            @foreach ($category_box as $item => $category)
            <div class="col-lg-3 col-md-6">
                <div class="allnewscate-header1">
                    <h4>{{ $category->category_name_bn }}</h4>
                </div>
                <!-- single category post -->
                <div class="singlecate-post">
                    @foreach ($category->news as $key => $item)
                    @if($key == 0)
                        <div class="allnewscate-img"><a href="#"><img src="{{ $item->image }}" alt="" style="max-height: 200px;"></a></div>
                        <div class="allnewscate-content">
                            <h3><a href="#">{{ Str::limit($item->title_bn, 20) }}</a></h3>
                            <p>{!! Str::limit($item->details_bn , 100) !!}</p>
                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_bn' => $item->slug_bn , 'slug_en' =>  $item->slug_en] ) }}" class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                            <ul class="allcatenews-menu">
                                
                                @foreach ($category->news as $tems => $value)
                                @if($tems != 0)
                                <li><a href="#">{{ $value->title_bn }}</a></li>
                                @endif
                                @endforeach
                                
                            </ul>
                            <a href="#" class="allnewscate-readall">Read All <i class="fa fa-angle-right"></i></a>
                        </div>
                    @endif
                    @endforeach
                </div>
                <!-- end single category post -->
            </div> 
            @endforeach
             {{-- @foreach ($advertisements as $advertisement)
                 @if ($advertisement->position == 'Bottom_Feature_Video' &&$advertisement->page_name == 'Home' )
                     <a id="aw0" target="_blank" href="{{ $advertisement->ads_link }}" onfocus="ss('aw0')" onmousedown="st('aw0')" onmouseover="ss('aw0')" onclick="ha('aw0')"><img src="{{ asset ($advertisement->image)}}" border="0" width="1220" height="250" alt="" class=""></a>
                @endif
             @endforeach --}}
            <a id="aw0" target="_blank" href="https://googleads.g.doubleclick.net/pcs/click?xai=AKAOjsvskgjaAE4x4bxQW3ujd_x2bNpOdg3k1gmrBoCHDhvPuPmeTEqA-dy0SUP9W0YeVwhoG8_hCTNzPPPejfytmBDKJ7WcKTY_sfxrsF26Hz4i0fXmm_nyH3EB2dFBVtf3VkzDOn4vHZ57er7xJeI3IPXyRintY2eDFdIQxUMOfzwCXfITQC4k3GgJ-tIMvBw7L6_J0bxc86BhbvvvvWlH9hlxD6tERQ0L_jogflJ1eQ1dc_dpWROl7_foZqXLL0OLPeKdIziRIJ8rUGID9DQwI4yvWODDjGIVYsLyf0FHR5-0-ImvcIU-IE0VvYCZ3IpscE-GTyrwt5qbimRtlOeC722v&amp;sig=Cg0ArKJSzMAr_ot3g7bh&amp;fbs_aeid=[gw_fbsaeid]&amp;adurl=https://www.othoba.com/vision-t20-mania-offer%3Futm_source%3DJagonews24%26utm_medium%3Dbanner%26utm_campaign%3DVISION-T-20-Mania-Offer&amp;nm=5&amp;nx=443&amp;ny=-163&amp;mb=2" onfocus="ss('aw0')" onmousedown="st('aw0')" onmouseover="ss('aw0')" onclick="ha('aw0')"><img src="https://tpc.googlesyndication.com/simgad/514864733513475287" border="0" width="1212" height="250" alt="" class="img_ad"></a>



        </div>
    </div>
</div>

@endsection
