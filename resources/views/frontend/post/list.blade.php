@extends('frontend.layouts.app')
@section('title')
   
    @if(isset($category))
    <title>
       
        {{$category->category_name_en}}
        
    </title>
    @section('meta')

        <meta name = "meta_title" content="{{ $category->category_name_en}}">

        <meta property="og:url" content="{{Request::fullUrl()}}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $category->category_name_en }}" />
    @endsection

    @elseif(isset($tags_en))
    <title>
       
        {{$tags_en}}
        
    </title>
    @section('meta')

        <meta name = "meta_title" content="{{$tags_en}}">

        <meta property="og:url" content="{{Request::fullUrl()}}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $tags_en }}" />
    @endsection
    
    @elseif(isset($divisions))
    <title>
       
        {{$divisions->division_name_en}}
        
    </title>
    @section('meta')

        <meta name = "meta_title" content="{{$divisions->division_name_en}}">

        <meta property="og:url" content="{{Request::fullUrl()}}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $divisions->division_name_en }}" />
    @endsection

        
    @endif
    
@endsection

@section('content') 
{{-- @include('frontend.layouts.partial.top_news') --}}

{{-- image gellary + category  data --}}
@php
    $imageGallery = DB::table('image_galleries')->limit(3)->get();
    // $categories_head = DB::table('categories')->get();
    $live_link = DB::table('on_offs')->first();
@endphp


<div class="main-content">
    <div class="container">

            <div class="middle-section">
                <div class="left-side-contents">

                {{-- ============== List Page ============== --}}
                
                <div class="list-page">

                    <div class="page-title">
                        
                        @if(Route::currentRouteName() == 'frontend.post.getpostbyseo')
                        @foreach ($posts as $post)
                        @php
                            $categories = DB::table('categories')->where('category_name_en', $post->category_name_en)->get();
                        @endphp
                        {{-- <h1>{{ $post->category->category_name_en }} &nbsp;<span class="rarrow"><i class="fa fa-caret-right" aria-hidden="true"></i></span></h1>  --}}
                        @endforeach
                        @elseif(Route::currentRouteName() == 'frontend.post.categorytBypost')
                            <h1>{{ $category->category_name_en }} &nbsp;<span class="rarrow"><i class="fa fa-caret-right" aria-hidden="true"></i></span></h1> 
                        @endif
                    </div>

                    
                    {{-- ----- Highlighted News ----- --}}
                        <div class = "row">
                            @isset($districts)
                                @foreach($districts as $district)
                                    <div class="col-lg-1 col-md-1">        
                                        <a data-id="{{ $district->id }}" class= "post-by-district btn btn-outline-secondary" style = "" >{{ $district->district_name_en }}</a>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    <div id = "post-by-division">
                        <div >
                            @foreach($posts->where('title_en', '!=', '')  as $key=> $post)   
                                @if($key == 0)
                                    <div class="news-highlighted d-flex">
                                        <img style=" object-fit:fit;" src="{{ asset($post->image) }}">
                                        <div class="details">
                                            <h3><a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }}" style ="">{{ Str::limit($post->title_en, 30) }}</a></h3>
                                            <p>{!! Str::limit($post->details_en , 200) !!}</p>

                                            @if(Route::currentRouteName() == 'frontend.post.postByDivision' )
                                                <a href=" {{ route('frontend.post.SinglePostByDivision' , [ 'slug_en' =>  $post->slug_en] ) }} " class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>

                                            @elseif(Route::currentRouteName() == 'frontend.post.categorytBypost') 
                                                <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }} " class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                                            @elseif(Route::currentRouteName() == 'frontend.post.subcategorytBypost') 
                                                <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }} " class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                                            @elseif(Route::currentRouteName() == 'frontend.post.getpostbyseo') 
                                                <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }} " class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- ADVERTISE --}}
                        <div class="advertise container pt-3" style = "margin-bottom:40px">
                            @foreach($advertisements as $advertisement)
                                @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bellow_list_news' && $advertisement->page_name == 'list_page')
                                
                                        <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">      
                                        <img height = "120px"style="width: 100%; max-height: 120px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
                                        </a>
                            
                                @endif
                            @endforeach
                        </div>

                    
                        {{-- ----- list of Other Newses ----- --}}
                                <div class="news-list" >
                                    <ul>
                                        @foreach($posts->where('title_en', '!=', '') as $key=> $post)
                                        @if($key != 0 && $key <= 10)
                                            <li>
                                                <div class="news-card">
                                                    <a href="#"><img style=" object-fit:fit;" width="250" height = "150" src="{{ asset($post->image) }}" alt="" /></a>
                                                    <div class="details">
                                                        <a href="">
                                                            <p class="news-title">
                                                                @if(Route::currentRouteName() == 'frontend.post.postByDivision' )
                                                                    <a href=" {{ route('frontend.post.SinglePostByDivision' , [ 'slug_en' =>  $post->slug_en] ) }} ">{{Str::limit($post->title_en , 30)}}</a>
                                                                @elseif(Route::currentRouteName() == 'frontend.post.categorytBypost') 
                                                                    <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }} ">{{Str::limit($post->title_en , 30)}}</a>
                                                                @elseif(Route::currentRouteName() == 'frontend.post.subcategorytBypost') 
                                                                    <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }} " class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                                                                
                                                                @endif

                                                            </p>
                                                        </a>
                                                        <div class="news-details">
                                                            <p>{!! Str::limit( $post->details_en, 200 )!!} &nbsp;</p>
                                                        </div>
                                                        <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }}" class="read-btn">Read More <span><i class="fas fa-angle-right"></i></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif   
                                        @endforeach
                                    </ul>
                                </div>
                                
                    </div>
                   
                    {{-- ======= Clear Fix for float ===== --}}
                    <div class="clear-fix" style="clear: left"></div>
                     
                    
                       
                        
                        
                </div>
                

            </div>



            {{-- ==================== RIGHT COLUMN ====================== --}}
            
             
                <div class="right-column-wrapper">
                    @include('frontend.layouts.partial.right_section')
                </div>  
    </div>
</div>


   

@endsection


@push('js')
<script  type="text/javascript">

    $('.post-by-district').on('click', function() {
        event.preventDefault();
        var id=$(this).data('id')
        // alert(id);
        $.ajax({
            'url': "{{route('frontend.blog.postBydistrict')}}",
            'dataType': 'html',
            'data':{id:id},
            'type': 'GET',
            
            success:function(posts){
                $('#post-by-division').html(posts);
                
            }
        });

    });
</script>
@endpush