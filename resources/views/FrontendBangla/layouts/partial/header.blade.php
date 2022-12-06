@php
    $settings = DB::table('general_settings_frontends')->orderBy('updated_at', 'desc')->first();
    $sociallink = DB::table('general_settings_frontends')->first();
    $advertisements = DB::table('advertisements')->get();
    $user = Session::get('user')
@endphp



<style>
    .brk-area .ticker_wrap{display: flex;}
    .brk-area .ticker__breaking{
        white-space: nowrap;
        background: red;
        color: #fff;
        overflow: hidden;
        padding: 10px 6px;
        display: inline-block; 
        font-weight: bold;
        position: absolute;
    }
    .brk-area .ticker__viewport {
        background: #fff;
        color: red;
        overflow: hidden;
        padding: 10px 0;
        display: inline-block;
        flex-grow: 1
    }
    .brk-area .ticker__viewport a {
        cursor: pointer;
        color: rgb(201, 0, 0);
        text-decoration: none;
        font-size: .9rem;
        font-weight: 400;
        font-family: inherit;
        font-weight: bold;
    }
    .brk-area .ticker__viewport a:hover {
        color: black;
    }
    .brk-area .ticker__list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
    }
    .brk-area .ticker__item {
        display: inline-block;
        white-space: nowrap;
        padding-right: 40px;
    }
    .brk-area .ticker__item:before{
        content: "";
        /* font-weight: bold; */
    }
    
</style>
   
<!-- start topbar -->
<div class="topbar">
    <div class="container">
        <span class="sidebar-icon" onclick="openNav()">☰</span>
        <div class="topbar-nav d-flex h-50 justify-content-between">
            <div class="h-50 tobar-left-sec">
                <div class="tobar-left">
                    <ul class="topbar-menu">
                        <li><a class="topbar-menu-item" href="{{ route( 'frontend.home.bangla' )}}">হোম</a></li>
                        {{-- <li><a class="topbar-menu-item" href="#">যোগাযোগ</a></li>
                        <li><a class="topbar-menu-item" href="#">শর্তাবলী</a></li> --}}
                        {{-- @if ($user !== null)
                        <li><a class="topbar-menu-item" href="{{ route('FrontendBangla.profile') }}">প্রোফাইল</a></li>
                        @endif  --}}

                        {{-- <li><a class="topbar-menu-item" href="#" style="background:red;margin-left:6px;"><i class="fa fa-shopping-cart" style="color:#fff;"></i> 0</a></li> --}}
                        <li>
                            {{-- <div class="usericon"> --}}
                                
                                @if ($user == null)
                                    <a href="" data-bs-toggle="modal" data-bs-target="#login_modal"><span class="login-icon"><i class="fa fa-user fauser" aria-hidden="true"></i> প্রবেশ করুন</span></a>
                                @else
                                    <div class="">
                                        {{-- <a href="{{ route('logout.general.user') }}">logout</a> --}}
                                        <a href="{{ route('logout.general.user') }}" ><span class="login-icon"><i class="fas fa-sign-out-alt"></i> প্রস্থান করুন</span></a>
                                    </div>
                                @endif
                            {{-- </div> --}}
                        </li>
                    </ul>
                    


                </div>
            </div>

            
            <div class="">
                <div class="topbar-right d-flex">

                    <div class="user">
                        @isset($user)
                            <a href="{{ route('FrontendBangla.profile') }}" class="user-name"><span><i class="fa fa-user fauser" aria-hidden="true"></i> @isset($user->name_en) {{ $user->name_en }} @endisset</span></a>
                        @endisset
                    </div>
                    
                    <div class="login-btn" style="display: none">
                        @if ($user == null)
                            <a href="" data-bs-toggle="modal" data-bs-target="#login_modal" class="parent-btn"><span class="login-icon-2"><i class="fa fa-user fauser" aria-hidden="true"></i> প্রবেশ করুন</span></a>
                        @endif
                    </div>
                    <div class="search-box">
                        <form action="">
                            <input type="text" placeholder="Search" class="search-txt">
                            <p class="search-btn"><i class="fa fa-search"></i></p>
                        </form>
                    </div>
                    
                </div>
            </div>
            
            {{-- ======== login modal ======= --}}
            <!-- The Modal -->
            <div class="modal fade login_modal" id="login_modal" style="z-index: 9999; padding-right: 0;">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close pull-right" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">

                        <!--Logn/Signup Modal body.. -->
                        @include('FrontendBangla.login_signup')
                    
                    </div>
            
                </div>
                </div>
            </div>
            {{-- ======== --end-- login modal ======= --}}

            



             {{-- ======== profile modal ======= --}}
            {{-- <div>
                @include('frontend.profile.index')
            </div> --}}


            {{-- <div class="col-lg-5 col-md-6 h-50">
                <div class="topbar-middle">
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- end top bar -->

<!-- start topbar brand -->

<div class="topbar-brand">
    <div class="brand-middle">
        <a href="{{ route( 'frontend.home' )}}" class="brand"><img src="@isset($settings->fontend_header_logo_bn){{ asset($settings->fontend_header_logo_bn)}}@endisset" alt=""></a>
        <div>
            {{-- <a href="#"><img src="" alt=""></a> --}}
            {{-- <h4 class="brand-date">{{date('D,d-M-Y');}}</h4> --}}
            <small class="date">

                {{  \Carbon\Carbon::parse('UTC')->locale('bn')->isoFormat('LLLL') }}
                
            {{-- <span class="block-dis">২৩ কার্তিক ১৪২৮ বঙ্গাব্দ</span> --}}
            </small>
        </div>
    </div>
</div>
<!-- end topbar brand -->



<!-- start navbar -->
@php
    $categories= App\Models\Backend\Category\Category::where('status','1')->get();
@endphp

{{-- ======= header area ====== --}}
<div class="header-area">
    <div class="container">
        <nav class="headernav">
            <ul class="main-menu">
                @foreach ($categories_head_for_bangla as $category)
                    <li class="sub-menu-parent">
                        <a href="{{ route('FrontendBangla.post.categorytBypost', $category->category_slug_bn ) }}" class="mainmenu-link">{{ $category->category_name_bn }} @if($category->subcategory->count() <= 0) @else <i class="fa fa-angle-down"></i> @endif</a>
                        <ul class="sub-menu">
                            @foreach ($category->subcategory->where('show_on_header' , '1') as $subcategory )
                            <li ><a  href="{{ route('FrontendBangla.post.subcategorytBypost', $subcategory->subcategory_slug_bn ) }}">{{ $subcategory->subcategory_name_bn  }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li > <a href="{{ route('bangla.covid.form') }}" class="mainmenu-link" >কোভিড</a></li>
                <li> <a href="{{ route('FrontendBangla.blog.index') }}" class="mainmenu-link" >ব্লগ </a></li>
                <li> <a href="{{ route('FrontendBangla.archive.index') }}" class="mainmenu-link" >আর্কাইভ</a></li>
            </ul> 
            <div class="language">
                <ul class="main-menu">
                    <li class="sub-menu-parent">
                        <a href="{{ route('frontend.home') }}" class="mainmenu-link">English</a>
                        {{-- <ul class="sub-menu">
                            <a href="{{ route('frontend.home') }}" class="mainmenu-link text-right">English</a>
                            <a href="{{ route('frontend.home.bangla') }}" class="mainmenu-link text-right">Bangla</a>
                        </ul> --}}
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    
    

</div>
<!-- end navbar -->

@php
    $feature_posts = DB::table('posts')->where('feature_news' , '1')->where('stage' , 'approved')->where('title_bn', '!=', '')->where('status' , '1')->orderBy('created_at', 'desc')->limit(7)->get(); 
@endphp
  
<!-- stasrt top category slider -->
<div class="topcategory">
    <div class="container-fluid topcategory-container">
        <div class="topcategory-area">
            <ul class="topcategory-slider">
                <!-- start single category -->
                @foreach ($feature_posts as $post)
                <li class="topsingle-category">
                    <a href="{{route('FrontendBangla.post.categorypostbyId' , [ 'slug_bn' =>  $post->slug_bn] ) }}">
                        <img src="{{ asset($post->image) }}" alt="" style="max-width: 80px; max-height: 70px;" />
                        <div class="topsingle-title">
                            <p>{{ Str::limit($post->title_bn , 30) }}</p>
                        </div>
                    </a>
                </li>   
                @endforeach
                <!-- end single category -->
            </ul>
        </div>
    </div>
</div>
<!-- end top category slider -->


@include('FrontendBangla.layouts.partial.mobile_nav')

<!-- start breaking news -->

@php
    $breaking_news= App\Models\Post::where('breaking_news','1')->where('title_bn' , '!=' , '')->get();
@endphp

<div class="brk-area">
    <div class="ticker_wrap">
        <div class="ticker__breaking"> ব্রেকিং নিউজ</div>
        <div class="ticker__viewport">
            <ul class="ticker__list" data-ticker="list">
                @foreach ($breaking_news as $post)
                    <li class="ticker__item" data-ticker="item"><a href="{{route('FrontendBangla.post.categorypostbyId' , ['slug_bn' =>  $post->slug_bn] ) }}">{{ ($post->title_bn) }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- <div class="brk-title"><strong>Breaking News:</strong></div>
    <div class="">
        @foreach ($posts as $post)
        <div class="brk-item">
            <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $post->slug_en] ) }}"><p>{{ ($post->title_en) }}</p></a>
        </div>
        @endforeach
    </div> --}}
</div>

@push('js')
    <script>
        $(document).ready(function(){
            $('.search-btn').click(function(){
                $('.search-txt').toggleClass("active");
            });
        });
    </script>
@endpush
<!-- end breaking news -->