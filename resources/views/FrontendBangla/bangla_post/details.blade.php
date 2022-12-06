@php
$user = Session::get('user')
@endphp
@extends('FrontendBangla.layouts.app')

@section('title')

    <title>
       
        {{$posts->title_bn}}
        
    </title>
@endsection

@section('meta')
    <meta name = "meta_tag" content="{{ $posts->tags_bn }}">
    <meta name = "meta_title" content="{{ $posts->title_bn }}">
    <meta name = "meta_author" content="{{ $posts->user->name_bn }}">
    <meta name = "meta_description" content="{{  $posts->details_bn  }}">

    @php
    $removetag =['+','-','*','/' , '?','&nbsp' , '!' , '%','=','<em>','</em>','<strong>','<p>','</p>','</strong>'] ;
    $posts_share_bn = str_replace($removetag, "", $posts->details_bn); 
  @endphp
    

  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $posts->title_bn }}" />
  <meta property="og:description" content="{{$posts_share_bn}} | Published: {{ \Carbon\Carbon::parse($posts->published_date)->diffForHumans() }}" />
  <meta property="og:image" content="{{asset($posts->image)}}" />
@endsection

@section('content') 
<div class="main-content">
    <div class="container">
    <div class="topnews middle-section">

        
        <div class="left-side-contents">
            <div class="blog-page-container">

                {{-- ========== Single Page News ========== --}}
        
                <div class="single-news-wrapper">
                    <div class="advertise container pt-3" style = "margin-bottom:40px">
                        @foreach($advertisements as $advertisement)
                            @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'above_single_post' && $advertisement->page_name == 'detail_page')
                        
                                    <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">      
                                    <img style="width: 100%; max-height: 150px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                                    </a>
                            
                            @endif
                        @endforeach
                    </div>
                    <div class="page-title">
                        <h1>{{ $posts->title_bn }}</h1>
                    </div>

                    <div class="title-bottom">
                        
                        <div class="post-author">
                            <span class="post-author-name">{{ $posts->user->name_bn  }}</span>
                            <span class="post-date">{{convertedDate($posts->published_date) }}</span>
                        </div>
                        <div class="social d-flex">
                            <a href="{{ route('bangla_postpdf.download', $posts->id) }}"><i class="fa fa-print" aria-hidden="true"></i></a>
                            <div class="sharethis-inline-share-buttons ml-0" style="z-index: 0" data-href=""{{url()->current()}}></div>
                        </div>
                        
                        

                    </div>

                    <div class="post-section">
                        <div class="post-img">
                            <img src="{{ asset($posts->image) }}" alt="" style=" object-fit:fit;" width= "550" height = " 310" />
                        </div>
                        <div class="post-details">
                            <p>
                                {!! $posts->details_bn !!}
                            </p>
                        </div>
                    </div>
                    <div class="clear-fix" style="clear: left"></div>

                    {{-- ====== Post Materials ====== --}}
                    <div class="post-metarials">
                        <div class="post-meta">
                            @php $split_tags_bn = explode(",", $posts['tags_bn']); @endphp
                            @foreach ($split_tags_bn as $split_tag)
                                <span class="p-meta post-tag"><i class="fa fa-tag" aria-hidden="true" style="color:red"></i>
                                 

                                        <a href="{{route('FrontendBangla.post.getpostbyseo' ,  ['tags_bn' =>  $split_tag] )}}">{{ $split_tag}}</a>
                                </span>
                            @endforeach

                            
            
                            <span class="p-meta posy-comments"><p><i class="fa fa-comment" aria-hidden="true" style="color:red"></i>{{ $posts->comments->where('approved' , '1' )->count()}} কমেন্ট</p></span>
                            <span class="p-meta posy-comments"><p><i class="fa fa-eye" aria-hidden="true" style="color:red"></i>পড়া হয়েছে {{ $posts->view }} বার</p></span>
                            {{-- <span class="p-meta print"><i class="fa fa-print" aria-hidden="true" style="color:red"></i><a href="{{ route('bangla_postpdf.download', $posts->id) }}">প্রিন্ট করুন</a></span> --}}
                            <span class="p-meta post-tag"><p><i class="fas fa-bookmark" style="color:red"></i></p></span>
                        </div>
                    </div>
                    {{-- ========== Next / Previous buttons ======== --}}
                    <div class="page-navigation">
                        <div class="prev-btn btn">
                            <a href="@isset($previous) {{route('FrontendBangla.post.categorypostbyId' , ['slug_bn' =>  $previous->slug_bn] ) }}@endisset">
                                <span><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                                <strong>@isset($previous){{  $previous->title_bn }} @endisset </strong>
                            </a>
                        </div>
                        <div class="next-btn btn">
                            <a href="@isset($next) {{route('FrontendBangla.post.categorypostbyId' , ['slug_bn' =>  $next->slug_bn] ) }}@endisset ">
                                <strong> @isset($next) {{  $next->title_bn }} @endisset </strong>
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>

                </div>

                {{-- ADVERTISE --}}
                <div class="advertise container pt-3" style = "margin-bottom:40px">
                    @foreach($advertisements as $advertisement)
                        @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'above_related_post' && $advertisement->page_name == 'detail_page')
                        
                                <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">      
                                <img height = "150px"style="width: 100%; max-height: 150px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                                </a>
                       
                        @endif
                    @endforeach
                </div>

                {{-- ========== Related News ========== --}}
                <div class="related-news">
                
                    <div class="title">
                        <h2>সম্পর্কিত ব্লগ পোস্ট</h2>
                    </div>
                    @foreach($related_posts as $key => $related_post)

                         {{-- {{ $related_post->id }}  --}}

                        @if($key <= 5)
                            <div class="related-news-box">
                                <a href="{{route('FrontendBangla.post.categorypostbyId' , ['slug_bn' =>  $related_post->slug_bn] ) }}">
                                <img src="{{ asset($related_post->image )}}" alt="">
                                    <p class="news-title">{{ $related_post->title_bn }}</p>
                                </a>
                              
                                {{-- <p class="details">{!! Str::limit($related_post->details_en , 100) !!}  <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $related_post->slug_en] ) }}">Readmore</a></p> --}}
                                <div class="news-details">
                                    <p>{!! Str::limit( $related_post->details_bn )!!}</p>
                                    <a href="{{route('FrontendBangla.post.categorypostbyId' , [ 'slug_bn' =>  $related_post->slug_bn] ) }}" class="read-btn">আরো পড়ুন<span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        @endif
                        
                        {{-- <div class="related-news-list">
                            <ul>
                                @if($key > 1)
                                <li><a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $next->slug_en] ) }}">{{ $related_post->title_en }}</a></li>
                                @endif
                            </ul>
                        </div> --}}
                    @endforeach
                </div>
                

                {{-- ======== COMMENT SECTION ======= --}}
                <div class="comments">
                    @foreach($advertisements as $advertisement)
                        @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'above_comment' && $advertisement->page_name == 'detail_page')
                            <div class="advertise container pt-3" style = "margin-bottom:40px">
                                    <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">      
                                    <img style="width: 100%; max-height: 150px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                                    </a>
                            </div>
                        @endif
                    @endforeach
                    <div class="comment-title">
                        <h1>মন্তব্য করুন</h1>
                    </div>

                    <div class="comment-box">

                        <div class="container">
                            <div class="row bootstrap snippets bootdeys">
                                <div class="col-md-12 col-sm-12"> 
                                    <div class="comment-wrapper">
                                        <div class="panel panel-info">
                                            <div class="panel-body">
                                                
                                                <div class="clearfix"></div>
                                                <hr>
                                            
                                            <div class="clearfix"></div>
                                            <hr>
                                            @php
                                            \Carbon\Carbon::setLocale('bn');
                                            @endphp
                                            <ul class="media-list">

                                                @foreach($comments as $message)
                                                {{-- {{ $message }} --}}
                                                    @if($message->approved == '1')
                                                        <li class="media">
                                                            <a href="#" class="pull-left">
                                                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                                            </a>
                                                            <div class="media-body m-body">
                                                                <span class="text-muted pull-right">
                                                                    <small class="text-muted">On, {{$message->updated_at->diffForHumans()}} </small>
                                                                </span>
                                                                <strong class="text-dark">{{ $message->name }}</strong>
                                                                <p>
                                                                    {{ $message->message }}
                                                                </p>
                                                            </li>
                                                        @endif
                                                        @isset($user)
                                                            @if($message->user_id == $user->id && $message->approved == 0)
                                                                <li class="media">
                                                                    <a href="#" class="pull-left">
                                                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                                                    </a>
                                                                    <div class="media-body m-body">
                                                                        <span class="text-muted pull-right">
                                                                            @php
                                                                                \Carbon\Carbon::setLocale('bn');
                                                                            @endphp
                                                                            <small class="text-muted">On, {{$message->created_at->diffForHumans()}} </small>
                                                                        </span>
                                                                        <strong class="text-dark">{{ $message->name }}</strong>
                                                                        <p>
                                                                            {{ $message->message }}
                                                                        </p>
                                                                        <p style = "color:coral">আপনার মন্তব্য অনুমোদনের জন্য অপেক্ষা করুন</p>
                                                                </li>
                                                            @endif
                                                        @endisset
                                                    @endforeach
                                                </ul>
                                            
                                            </div>
                            
                            
                                        
                                            <form action="{{ route('frontend.comment.store') }}" method="post">
                                                    @csrf
                                                <input type="hidden" value="{{ $posts->id }}" name="post_id" id = "post_id">
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
                                        
                                    </div>
                            
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                
                {{-- ======== login modal ======= --}}
                <!-- The Modal -->
                @if($user != null)
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
                @endif
                
            </div>
        </div>


        <div class="right-column-wrapper">
            {{-- ======= Blog Catagory Box ====== --}}
            {{-- <div class="blog-cata">
                <div class="blog-cata-box tn-right">
                  
                    <a id="aw0" target="_blank" href="https://googleads.g.doubleclick.net/pcs/click?xai=AKAOjsvUm1SCwZFjvxvWS7wKP6YK0KzKf5n63VaKUFKhsy_Wp0KIe7zLPP6PGzvs9aO40Q9w4i-wGeHJM-0FUrfPipXls4YKzAQcCcFLpAF76CWVK_S2SdswWSqufbAzAwyITV2jhkLsMCJ8XIxzQIhn4sO3wgULg_j68sMxTB5o1g7u971IwYWWsJGL5pN4r-_LMjkS61XVuyxFErlfXAgHRQG3Iq9l4o_TZ08ECoEvK3A_mccxyMLy2QzmyAInoWk2XtPhKfdfUuzi7IoUhwG9psm3iq0Val9PS8tL0J1tUBq8PWl2y-dR9njx2Yl17cRCMYQdtABFMA&amp;sig=Cg0ArKJSzNH3bJGHgf7X&amp;fbs_aeid=[gw_fbsaeid]&amp;adurl=https://www.bkash.com/bn/cashout%3Futm_source%3Dlocal%26utm_medium%3Dbdnews%26utm_campaign%3Dcashout%26utm_term%3Dfixed%26utm_content%3Dfixedbanner&amp;nm=5&amp;nx=143&amp;ny=-69&amp;mb=2" onfocus="ss('aw0')" onmousedown="st('aw0')" onmouseover="ss('aw0')" onclick="ha('aw0')"><img src="https://tpc.googlesyndication.com/simgad/12381391091669319111" border="0" width="285" height="250" alt="" class="img_ad"></a>

                </div>
            </div> --}}

            {{-- ==================== RIGHT COLUMN ====================== --}}
            
            @include('FrontendBangla.layouts.partial.bangla_right_section')
           

        </div>
        
    

 
        

        

       
    </div>
    </div>
    </div>

@endsection
@section('meta')
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $posts->title_bn }}" />
  <meta property="og:description" content="Published: {{ \Carbon\Carbon::parse($posts->start_date)->diffForHumans() }}" />
  <meta property="og:image" content="{{asset($posts->image)}}" />
@endsection

@push('js')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="bPWhxoii"></script>

<script>
    $( document ).ready(function() {
        
        $('#login_modal').hide();
        // document.getElementById("bn").style.visibility = "hidden";

    });
    $(function(){
        $(".limit_text").each(function(i){
            len=$(this).text().length;
            if(len>10)
            {
                $(this).text($(this).text().substr(0,20)+'...');
            }
        });
    });
    
    </script>

<script>
    

    $(document).ready(function(){

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

    function blog_post_by_cat(id){
        // alert(id);
        $.ajax({
            'url': 'district/edit/'+id,
            'type': 'GET',
            'data': {},
            success:function(data){
            // empty data
            $('.district_name_bn').empty();
            $('.district_name_en').empty();
            $('.id').empty();
            // append data
            $('.district_name_bn').val(data.data.district_name_bn);
            $('.district_name_en').val(data.data.district_name_en);
            $('.id').val(data.data.id);
            $("select[name='division_id'").html('');
                $("select[name='division_id'").html(data.division);
            },
        });
    };

</script>

<script>

$( "#post" ).click(function() {
    event.preventDefault();
    
    let user_id = document.getElementById('user_id').value
    let name = document.getElementById('name').value
    // alert(document.getElementById('name').value);
    if(user_id != ' ' && name != ' '){
        $.ajax({
            'url': "{{ route('frontend.comment.store') }}",
            'data': {
                'user_id': user_id,
                'name': name,
                'email': document.getElementById('email').value,
                'post_id': document.getElementById('post_id').value,
                'message': document.getElementById('message').value,
                ' _token': '{{csrf_token()}}'
                },
            'type': 'Post',
            
            success:function(){
                // $('#blog-post-by-categoryid').html(blog_posts);
                
                location.reload();
                toastr.success('Comment Update Succefully');
               
                window.setTimeout(function() { toastr
                .abort() }, 100000);
            }
        });
        
    }
    else{
        // alert('please Login First')
        $('#login_modal').show();
 
    }
   

});

 
</script>

@endpush