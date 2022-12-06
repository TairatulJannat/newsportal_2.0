<div class = "row">
    @isset($districts)
        @foreach($districts as $district)
            <div class="col-lg-1 col-md-1">        
                <a data-id="{{ $district->id }}" class= "post-by-district btn btn-outline-secondary" style = "" >{{ $district->district_name_bn }}</a>
            </div>
        @endforeach
    @endisset
</div>
<div >
    @foreach($posts as $key=> $post)   
        @if($key == 0)
            <div class="news-highlighted d-flex">
                <img style=" object-fit:fit;" src="{{ asset($post->image) }}">
                <div class="details">
                    <h3><a href="{{route('FrontendBangla.post.categorypostbyId' , [ 'slug_bn' =>  $post->slug_bn] ) }}" style ="">{{ Str::limit($post->title_bn, 30) }}</a></h3>
                    <p>{!! Str::limit($post->details_bn , 200) !!}</p><a href="{{route('FrontendBangla.post.categorypostbyId' , [ 'slug_bn' =>  $post->slug_bn] ) }}" class="read-btn">আরো পড়ুন <span><i class="fas fa-angle-right"></i></span></a>
                    @if(Route::currentRouteName() == 'FrontendBangla.post.postByDivision' )
                        <a href=" {{ route('FrontendBangla.post.SinglePostByDivision' , [ 'slug_bn' =>  $post->slug_bn] ) }} ">{{Str::limit($post->title_bn , 30)}}</a>
                    @elseif(Route::currentRouteName() == 'FrontendBangla.post.categorytBypost') 
                        <a href="{{route('FrontendBangla.post.categorypostbyId' , [ 'slug_bn' =>  $post->slug_bn] ) }} ">{{Str::limit($post->title_bn , 30)}}</a>
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
                                    @if(Route::currentRouteName() == 'FrontendBangla.post.postByDivision' )
                                        <a href=" {{ route('FrontendBangla.post.SinglePostByDivision' , [ 'slug_bn' =>  $post->slug_bn] ) }} ">{{Str::limit($post->title_bn , 30)}}</a>
                                    @elseif(Route::currentRouteName() == 'FrontendBangla.post.categorytBypost') 
                                        <a href="{{route('FrontendBangla.post.categorypostbyId' , [ 'slug_bn' =>  $post->slug_bn] ) }} ">{{Str::limit($post->title_bn , 30)}}</a>
                                    @endif

                                </p>
                            </a>
                            <div class="news-details">
                                <p>{!! Str::limit( $post->details_bn, 200 )!!} &nbsp;</p>
                            </div>
                            <a href="{{route('FrontendBangla.post.categorypostbyId' , [ 'slug_bn' =>  $post->slug_bn] ) }}" class="read-btn">আরো পড়ুন  <span><i class="fas fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        
    @endif   
@endforeach