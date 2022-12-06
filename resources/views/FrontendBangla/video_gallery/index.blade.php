@extends('FrontendBangla.layouts.app')
@section('content')
<div class="main-content">
    <div class="container video-page">
        <div class="middle-section">

            <div class="left-side-contents">
                <div class="main-video">
                    <div class="title-bottom">
                        <div class="post-author">
                            <span class="post-author-name">{{ $video->user->name_bn }}</span>
                            <span class="post-date">{{convertedDate($video->created_at)  }}</span>
                        </div>
                        <div class="share-options sharethis-inline-share-buttons ml-5" style="z-index: 0" data-href=""{{url()->current()}}></div>
                    </div>
                    @isset($video)
                        
                    
                        <div class="video-section">
                            <iframe width="560" height="315" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-title">
                            <h1>{{ $video->video_title_bn }}</h1>
                        </div>
                       
                    @endisset
                </div>

                
                 <!-- Advertisemnet -->

                    <div class="advertise  pt-3" style = "margin-bottom:40px">
                        @foreach($advertisements as $advertisement)
                            @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bottom_single_vedio' && $advertisement->page_name == 'video_gallery')                         
                                <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">      
                                    <img style="width: 100%; max-height: 150px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                                </a>       
                            @endif
                        @endforeach
                    </div>
                
                {{-- =========== More Videos ========== --}}
                <div class="more-videos">
                    <div class="head-title">
                        <h1>আরো ভিডিও</h1>
                    </div>

                    <ul>
                        @foreach ($videos as $video)
                            <li>
                                <div class="news-cards-wrapper d-flex justify-content-between">
                                    <div class="news-card video-news">
                                        <a href="{{route('frontend.vediogallery',$video->video_title_bn)}}">
                                            <div class="vid">
                                                <iframe width="100%" height="100%" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <p class="news-title">{{ $video->video_title_bn }}</p>   
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                 <!-- Advertisemnet -->
                 <div class="advertise  pt-3" style = "margin-bottom:40px">
                    @foreach($advertisements as $advertisement)
                        @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bottom_more_vedio' && $advertisement->page_name == 'video_gallery')                         
                            <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">      
                                <img style="width: 100%; max-height: 150px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                            </a>       
                        @endif
                    @endforeach
                </div>
                
                {{-- ======= Clear Fix for float ===== --}}
                <div class="clear-fix" style="clear: left"></div>

            
                <!-- ======== COMMENT SECTION ======= -->
                <div class="comments">
                    <div class="comment-title">
                        <h1>মন্তব্য করুন</h1>
                    </div>

                    <div class="comment-box">

                        <div class="container">
                            <div class="row bootstrap snippets bootdeys">

                                <div class="col-md-8 col-sm-12 ps-0">

                                    <div class="comment-wrapper">

                                        <div class="panel panel-info">

                                            <div class="panel-body">
                                                
                                                <div class="clearfix"></div>

                                                <hr>

                                                <ul class="media-list">

                                                    {{-- @foreach($blog_comments->take(3) as $blog_comments) --}}

                                                        <li class="media">
                                                            <a href="#" class="pull-left">
                                                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                                            </a>

                                                            <div class="media-body m-body">

                                                                <span class="text-muted pull-right">

                                                                    {{-- @isset($blog_comments->created_at) --}}
                                                                        <small class="text-muted">On, </small>
                                                                    {{-- @endisset --}}

                                                                </span>

                                                                <strong class="text-dark"></strong>

                                                                <p></p>

                                                                <!-- <button class="text-danger reply">Reply</button> -->

                                                            </div>

                                                        </li>

                                                    {{-- @endforeach --}}

                                                </ul>

                                            </div>

                                            
                                            <form action="" method="post">

                                                @csrf

                                                <input type="hidden" value="" name="blog_post_id" id = "blog_post_id">

                                                <input type="hidden" value = "" name = "user_id" id = "user_id">

                                                <input type="hidden" value = "" name = "name" id = "name">

                                                <input type="hidden" value = "" name = "email" id = "email">
                                                
                                                <textarea type="text" id = "message" class="form-control" name="message"  placeholder="write a comment..."  rows="3" ></textarea>

                                                <br>
                                                
                                                <button type="button" id ="post" name="submit" class="btn btn-success pull-left" data-bs-toggle="modal" data-bs-target="#login_modal">Post</button>

                                            </form>

                                        </div>

                                        <br><br>

                                        {{-- <div id="appear" class="pt-5" style="">

                                            <hr>

                                            <form action="" method = "post">

                                                @csrf

                                                <div class="formsingle">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email">
                                                </div>

                                                <div class="formsingle">
                                                    <label for="">Password</label>
                                                    <input type="password" name="password">
                                                </div>

                                                <div class="formsingle"></div>

                                                <div class="formsingle">
                                                    <input type="submit" class="btn btn-primary sm-btn" value="Log In">
                                                </div>
                                                
                                                <hr>

                                                <a href="#">Create Account</a>

                                            </form>

                                        </div> --}}
                                    </div>
                                </div>
                            </div>
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
                            @include('frontend.login_signup')
                        
                        </div>
                
                    </div>
                    </div>
                </div>
                    

            </div>

            {{-- ==================== RIGHT COLUMN ====================== --}}
            <div class="right-column-wrapper">
                @include('FrontendBangla.layouts.partial.bangla_right_section')
            </div>

        </div>
        
        {{-- <div class="container">
            <h2 class="page-title">{{$vedioTitle}}</h2>
            <div id= "divheight ">
                <div class="row mainvedio" >
                    @foreach($vedios as $vedio)
                        @if($vedio->video_title_bn == $vedioTitle)
                            <div class="col-lg-8 col-md-8 ">
                                <div class="single-featurvd">
                                <iframe  width="100%" height="100%" src="{{$vedio->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                {{$vedio->video_title_bn}}
                                </a>
                                </div>
                            </div>
                        
                        @endif
                    @endforeach
                </div>
                <div class="row mainvedio" >
                    @foreach($vedios as $vedio)
                        @if($vedio->video_title_bn != $vedioTitle)
                            <div class="col-lg-9 col-md-9 ">
                                <div class="single-featurvd">
                                <iframe  width="100%" height="100%" src="{{$vedio->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                {{$vedio->video_title_bn}}
                                </a>
                                </div>
                            </div>
                        
                        @endif
                    @endforeach
                </div>
            </div>
                
         </div> --}}
    </div>
</div>

<Style>

</Style>
@endsection