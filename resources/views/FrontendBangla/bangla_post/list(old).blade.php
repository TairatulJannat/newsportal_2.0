@extends('frontend.layouts.app')
@section('content') 
{{-- @include('frontend.layouts.partial.top_news') --}}

{{-- image gellary + category  data --}}
@php
    $imageGallery = DB::table('image_galleries')->limit(3)->get();
    $categories_head = DB::table('categories')->get();
    $live_link = DB::table('on_offs')->first();
@endphp


<div class="main-content">
    <div class="container">

            <div class="middle-section">
                <div class="left-side-contents">

                {{-- ============== List Page ============== --}}
                
                <div class="list-page">

                    <div class="page-title">
                        <h1>Sports <span class="rarrow"><i class="fa fa-caret-right" aria-hidden="true"></i></span></h1>
                    </div>

                    
                    {{-- ----- Highlighted News ----- --}}
                    <div class="news-highlighted d-flex" >
                        <img class="" src="https://cdn.jagonews24.com/media/imgAllNew/BG/2019November/kane-williamson-eoin-morgan-20211110082204.jpg" alt="">
                        <div class="details">
                            <h3><a href="">A knee-jerk reaction to popular demand?</a></h3>
                            <p>Bangladesh Cricket Board's attempt to restructure and reshape the T20 outfit following the World Cup debacle may appear a logical thing on surface, but a deeper look into the six changes made to the squad can only raise question marks over the whole process.</p>
                            <a href="#" class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    
                    {{-- ----- list of Other Newses ----- --}}
                    <div class="news-list">
                        <ul>
                            <li>
                                <img class="" src="https://cdn.jagonews24.com/media/imgAllNew/BG/2019November/kane-williamson-eoin-morgan-20211110082204.jpg" alt="">

                                <div class = "row">
                                    @isset($districts)
                                        @foreach($districts as $district)
                                            <div class="col-lg-1 col-md-1">        
                                                <a data-id="{{ $district->id }}" class= "post-by-district btn btn-outline-secondary" style = "" >{{ $district->district_name_en }}</a>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                                <div class="page-title">
                                    @isset($category->category_name_en)
                                        <h1>{{ $category->category_name_en }} &nbsp;<span class="rarrow"><i class="fa fa-caret-right" aria-hidden="true"></i></span></h1> 
                                    @endisset
                                </div>
                                <div id = "post-by-division">
                                    @foreach($posts as $key=> $post)   
                                        @if($key == 0)
                                            <div class="news-highlighted d-flex">
                                                <img style=" object-fit:fit;" src="{{ asset($post->image) }}">
                                                <div class="details">
                                                    <h3><a href="" style ="color:red">{{ Str::limit($post->title_en, 50) }}</a></h3>
                                                    <p>{!! Str::limit($post->details_en , 400) !!}</p>
                                                    <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }}" class="allnewscate-read">Read More <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                    @foreach($posts as $key=> $post)
                        @if($key != 0 && $key <= 7)
                            <div class="news-list" >
                                <ul>
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
                                                        @endif

                                                    </p>
                                                </a>
                                                <p>{!! Str::limit( $post->details_en )!!} &nbsp;<a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $post->slug_en] ) }}" class="read-btn">Read More...</a></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                        @endif   
                    @endforeach
                    {{-- ======= Clear Fix for float ===== --}}
                    <div class="clear-fix" style="clear: left"></div>
                            
                       
                        
                        
                </div>
                

            </div>



            {{-- ==================== RIGHT COLUMN ====================== --}}
            

                <div class="right-column-wrapper">
                    @include('frontend.layouts.partial.right_section')
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
            'url': '/newsportal_2.0/frontend/post/district/'+id,
            'dataType': 'html',
            'type': 'GET',
            
            success:function(posts){
                $('#post-by-division').html(posts);
                
            }
        });

    });
</script>
@endpush