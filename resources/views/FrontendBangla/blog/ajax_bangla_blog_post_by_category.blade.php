<div class="blog-content-main">
                    
                    {{-- ----- main blog news ----- --}}
            
    <div class="left-content">

        @foreach($blog_posts as $key=> $blog_post)
            
            @if($key == 0)

                <img src="{{ asset($blog_post->image) }}" alt="">
                <div class="details">
                    <div class="title">
                        <a href="{{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $blog_post->slug_en] ) }}"><h1>{{$blog_post->blog_title_bn}}</h1></a>
                    </div>
                    <div class="news-details">
                        <p>{!! Str::limit( $blog_post->description_en , 300 )!!} </p>
                    </div>
                    <a href="{{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $blog_post->slug_en] ) }}" class="allnewscate-read">আরও পড়ুন<i class="fa fa-angle-right"></i></a>
                </div>
                
            @endif

        @endforeach
        
    </div>
    


</div>

        
