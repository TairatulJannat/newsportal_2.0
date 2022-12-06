@extends('FrontendBangla.layouts.app')
@section('content')

@php
    $user = Session::get('user')
@endphp

<div class="main-content">

    <div class="container">

        <div class="middle-section">

            <div class="left-side-contents">

                <div class="blog-page-container" id ="blog-post-by-categoryid" >

                    <!-- ========== Single Page News ========== -->
                    <div class="single-news-wrapper">
                        {{-- <div class="subtitle">Climate crisis</div> --}}
                        <div class="page-title">
                            <h1>{{$blog_post->blog_title_bn}}</h1>
                        </div>
    
                        <div class="title-bottom">

                            <div class="post-author">
                                <span class="post-author-name">{{ $blog_post->user->name_bn  }}</span>
                                
                                <span class="post-date">{{convertedDate($blog_post->updated_at) }}</span>
                            </div>
                            <div class="share-options sharethis-inline-share-buttons ml-5" style="z-index: 0" data-href=""{{url()->current()}}></div>
                        </div>

                        <div class="post-section">
                            <div class="post-img" >
                                <img  style=" object-fit:fit;" width="550" height = "310" src="{{ asset($blog_post->image) }}" alt="">
                            </div>
                            <div class="post-details">
                                <p><strong> {!! Str::limit( $blog_post->description_bn ,50)!!}  </strong></p>
    
                                <p>{!!  $blog_post->description_bn  !!} </p>
    
                            </div>
                        </div>

                        
                        {{-- ======= Clear Fix for float ===== --}}
                        <div class="clear-fix" style="clear: left"></div>
        
                        <!-- ====== Post Materials ====== -->
                        <div class="post-metarials">
                            <div class="post-meta">
                                <span class="p-meta post-tag"><i class="fa fa-tag" aria-hidden="true" style="color:red" ></i>
                                    <a href="">{{ $blog_post->tag_bn }}</a>
                                </span>
                                <span class="p-meta posy-comments"><i class="fa fa-comment" aria-hidden="true" style="color:red"></i>{{ $blog_post->blogcomments->where('approved' , '1')->count()}} কমেন্ট</span>
                                <span class="p-meta posy-comments"><i class="fa fa-eye" aria-hidden="true" style="color:red"></i><a href="">পড়া হয়েছে {{ $blog_post->view }} বার</a></span>
                                <span class="p-meta print"><i class="fa fa-print" aria-hidden="true"></i><a href="{{ route('FrontendBangla.blog_postpdf.download', $blog_post->id) }}">প্রিন্ট</a></span>
                            </div>
                        </div>
    
                        <!-- ========== Next / Previous buttons ======== -->
                        <div class="page-navigation">
                            <div class="prev-btn btn">
                                <a href="@isset($previous){{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $previous->slug_en] ) }} @endisset">
                                    <span><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                                    <strong>@isset($previous){{ Str::limit( $previous->blog_title_bn , 100)}} @endisset </strong>
                                </a>
                            </div>
                            <div class="next-btn btn">
                                <a href="@isset($next){{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $next->slug_en] ) }} @endisset">
                                    <strong>@isset($next){{Str::limit( $next->blog_title_bn , 100) }} @endisset</strong>
                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                </a>
                            </div>
                        </div>
    
                    </div>
                    
                   
                    <!-- ADVERTISE -->
                    <div class="advertise"></div>  
    
                    <!-- ========== Related News ========== -->
                    <div class="related-news">
                
                        <div class="title">
                            <h2>সম্পর্কিত ব্লগ পোস্ট</h2>
                        </div>
                        @foreach($blog_related_posts as $key => $blog_related_post)
                            @if($key <= 1)
                                <div class="related-news-box">
                                    <a href="{{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $blog_related_post->slug_en] ) }}">
                                        <img src="{{asset($blog_related_post->image)}}" alt="">
                                        <p class="news-title">{{$blog_related_post->blog_title_bn}}</p>
                                    </a>
                                    <p class="details">{!! Str::limit($blog_related_post->description_bn , 100) !!}</a></p>
                                </div>
                            @endif
                            <div class="related-news-list">
                                <ul>
                                    @if($key > 1)
                                        <li><a href="{{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $blog_related_post->slug_en] ) }}">{{$blog_related_post->blog_title_bn}}</a></li>
                                    @endif
                                </ul>
                            </div>
                        @endforeach
                        
                    </div>
    
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

                                                        @foreach($blog_comments as $blog_comments)
                                                            @if($blog_comments->approved == '1')
                                                                <li class="media">
                                                                    <a href="#" class="pull-left">
                                                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                                                    </a>

                                                                    <div class="media-body m-body">

                                                                        <span class="text-muted pull-right">

                                                                            @isset($blog_comments->created_at)
                                                                                <small class="text-muted">On, {{$blog_comments->created_at->diffForHumans()}}</small>
                                                                            @endisset

                                                                        </span>

                                                                        <strong class="text-dark">{{ $blog_comments->name }}</strong>

                                                                        <p>{{ $blog_comments->message }}</p>

                                                                        <!-- <button class="text-danger reply">Reply</button> -->

                                                                    </div>

                                                                </li>
                                                            @elseif($blog_comments->user_id == $user->id && $blog_comments->approved == 0)
                                                                <li class="media">
                                                                    <a href="#" class="pull-left">
                                                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                                                    </a>

                                                                    <div class="media-body m-body">

                                                                        <span class="text-muted pull-right">

                                                                            @isset($blog_comments->created_at)
                                                                                <small class="text-muted">On, {{$blog_comments->created_at->diffForHumans()}}</small>
                                                                            @endisset

                                                                        </span>

                                                                        <strong class="text-dark">{{ $blog_comments->name }}</strong>

                                                                        <p>{{ $blog_comments->message }}</p>

                                                                        <p style = "color:coral">আপনার মন্তব্য অনুমোদনের জন্য অপেক্ষা করছে</p>

                                                                    </div>

                                                                </li>
                                                            @endif

                                                        @endforeach

                                                    </ul>

                                                </div>
    
                                                
                                                <form action="{{ route ('blog.comment.store') }}" method="post">

                                                    @csrf

                                                    <input type="hidden" value="{{ $blog_post->id }}" name="blog_post_id" id = "blog_post_id">

                                                    <input type="hidden" value = "@isset($user){{ $user->id }} @endisset " name = "user_id" id = "user_id">

                                                    <input type="hidden" value = "@isset($user){{ $user->name_en }} @endisset " name = "name" id = "name">

                                                    <input type="hidden" value = "@isset($user){{ $user->email }} @endisset " name = "email" id = "email">
                                                    
                                                    <textarea type="text" id = "message" class="form-control" name="message"  placeholder="এখানে মন্তব্য লিখুন"  rows="3" ></textarea>

                                                    <br>
                                                    
                                                    @if($user == null)
                                                        <button type="button" id ="post" name="submit" class="btn btn-success pull-left" data-bs-toggle="modal" data-bs-target="#login_modal">পোস্ট করুন</button>
                                                    @else
                                                        <button type="button" id ="post" name="submit" class="btn btn-success pull-left" >পোস্ট করুন</button>
                                                    @endif

                                                </form>

                                            </div>

                                            <br><br>

                                            {{-- <div id="appear" class="pt-5" style="">

                                                <hr>

                                                <form action="{{ route('authenticate.general.user') }}" method = "post">

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
                    <div class="modal fade login_modal" id="login_modal" style="z-index: 99999">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body p-0">

                                <!--Logn/Signup Modal body.. -->
                                @include('frontend.login_signup')
                            
                            </div>
                    
                        </div>
                        </div>
                    </div>
                    
                </div>

            </div>
            
                
            <div class="right-column-wrapper">
                <!-- -- ======= Blog Catagory Box ====== -- -->
                <div class="blog-cata">
                    <div class="blog-cata-box tn-right">
                        <!-- start news category -->
                        <div class="news-category">

                            <div class="newscategory-header">
                                <h4>ব্লগ ক্যাটাগরি</h4>
                            </div>
                            
                            <div class="newscatgories-area">

                                <ul class="newscategory-menu">

                                    @foreach($blog_categories as $blog_category)

                                        @if($blog_category->status==1)
                                            <li><a href="{{ route('FrontendBangla.blog.postBycategoryId' , $blog_category->id) }}" data-slug_bn="{{ $blog_category->blog_category_slug_bn }}" data-id="{{ $blog_category->id }}" class="blog-post-by-category" >{{$blog_category->blog_category_name_bn}}</a></li>
                                        @endif

                                    @endforeach

                                </ul>
                            
                            </div>
                        </div>
                        <!-- end news category -->
                    </div>
                </div>
                

                <!-- -- ==================== RIGHT COLUMN BLADE ====================== -- -->
                @include('FrontendBangla.layouts.partial.bangla_right_section')
                
            </div>
            {{-- <div class="right-column-wrapper">
                @include('frontend.layouts.partial.right_section')
            </div> --}}


        </div>

    </div>

</div>

@endsection


@push('js')

<script>
    

    $(document).ready(function(){
        $('#appear').hide();
        const tablist = document.querySelector(".tablist").querySelectorAll("li");
        const tabs = document.querySelectorAll('[data-tab-target]');
        const tabcontents = document.querySelectorAll('[data-tab-content]');

        tablist.forEach(element => {
            element.addEventListener("click", function(){
                tablist.forEach(e => e.classList.remove("active"));
                this.classList.add("active");
            });
        });

        tabs.forEach(tab => {
            tab.addEventListener("click", function(){
                const target = document.querySelector(tab.dataset.tabTarget);

                tabcontents.forEach(tabcontent => tabcontent.classList.remove("active"))
                target.classList.add("active");
            });
        });


        
    });

    
    // $('.blog-post-by-category').on('click', function() {
    //     event.preventDefault();
    //     var slug_bn=$(this).data('slug_bn')
    //     var id=$(this).data('id')
    //     $('.related-news').hide();
    //     $('.comments').hide();
        
    //     // alert(slub_bn);
    //     // alert(id);
        
    //     $.ajax({
    //         'url': '/newsportal_2.0/frontend/blog/post/'+id,
    //         'dataType': 'html',
    //         'type': 'GET',
            
    //         success:function(blog_posts){
    //             $('#blog-post-by-categoryid').html(blog_posts);
                
    //         }
    //     });
    // });


 
    $( "#post" ).click(function() {
    event.preventDefault();
    
    let user_id = document.getElementById('user_id').value
    let name = document.getElementById('name').value
    // alert(document.getElementById('name').value);
    // alert(123);
    console.log(user_id);
    if(user_id != ' ' && name != ' '){
        // alert(user_id);
        $.ajax({
            'url': "{{ route('blog.comment.store') }}",
            'data': {
                'user_id': user_id,
                'name': name,
                'email': document.getElementById('email').value,
                'blog_post_id': document.getElementById('blog_post_id').value,
                'message': document.getElementById('message').value,
                ' _token': '{{csrf_token()}}'
                },
            'type': 'Post',
            
            success:function(){
                // $('#blog-post-by-categoryid').html(blog_posts);
                alert('comment posted successfully it will show after admin aproved');
                location.reload();
                
            }
        });
        
    }
    else{
        // alert('please Login First')
        $('#appear').show();
 
    }
   

});

</script>

@endpush