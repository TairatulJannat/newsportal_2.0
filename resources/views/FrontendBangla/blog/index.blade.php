@extends('FrontendBangla.layouts.app')
@section('content') 
<div class="main-content">
    <div class="container">
        <div class="topnews mt-5">
            <div class="blog-page-wrapper">
                <div id = "blog_post_by_categoryid">

           

                    <div class="blog-content-main">
                    
                            {{------- main blog news ----- --}}
                        
                        <div class="left-content">
                            @foreach($blog_posts as $key => $blog_post)
                                @if($key == 0)
                                    <img src="{{ asset($blog_post->image) }}" alt="">
                                    <div class="details">
                                        <div class="title">
                                            <a href="{{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $blog_post->slug_en] ) }}"><h1>{{$blog_post->blog_title_bn}}</h1></a>
                                        </div>
                                        <div class="news-details">
                                            <p>{!! Str::limit( $blog_post->description_bn , 200 )!!} </p>
                                        </div>
                                        <a href="{{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $blog_post->slug_en] ) }}" class="allnewscate-read">আরও পড়ুন <i class="fa fa-angle-right"></i></a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        

                        
                        <div class="right-column">
                            <!-- start blog category -->
                            <div class="news-category">
                                <div class="newscategory-header">
                                    <h4>ব্লগ ক্যাটাগরি</h4>
                                </div>
                                <div class="newscatgories-area">
                                    <ul class="newscategory-menu">
                                        @foreach($blog_categories as $blog_category)
                                            @if($blog_category->status==1)
                                                <li><a href="{{ route('FrontendBangla.blog.postByCategory' , $blog_category->id) }}" data-slug_bn="{{ $blog_category->blog_category_slug_bn }}" data-id="{{ $blog_category->id }}" class="blog-post-by-category">{{$blog_category->blog_category_name_bn}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- end blog category -->
                        </div>

                    </div>

                    
                    <div class="blog-list-wrapper">
                        <ul>
                        @foreach($blog_posts as $key=> $blog_post)
                            @if($key > 0)
                                <li>
                                    <div class="blog-list-item">
                                        <img src="{{ asset($blog_post->image) }}" alt="">
                                        <div class="details">
                                            <div class="title">
                                                <a href="{{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $blog_post->slug_en] ) }}"><h1>{{$blog_post->blog_title_bn}}</h1></a>
                                            </div>
                                            <div class="news-details">
                                                <p>{!! Str::limit( $blog_post->description_bn , 300 )!!}<a href="{{route('FrontendBangla.blog.postById' , [ 'slug_en' =>  $blog_post->slug_en] ) }}" class="allnewscate-read">আরও পড়ুন <i class="fa fa-angle-right"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                        
                        </ul>
                    </div>

                </div>

                <span>
                    {{$blog_posts->links()}}
                </span>


                
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script  type="text/javascript">

    // $('.blog-post-by-category').on('click', function() {
    //     event.preventDefault();
    //     var slug_bn=$(this).data('slug_n')
    //     var id=$(this).data('id')
    //     // alert(slub_bn);
    //     // alert(id);
        
    //     $.ajax({
    //         'url': 'post/'+id,
    //         'dataType': 'html',
    //         'type': 'GET',
            
    //         success:function(blog_posts , blog_categories){
    //             // console.log(blog_posts,blog_categories);
    //             $('#blog_post_by_categoryid').html(blog_posts);
                
    //         }
    //     });

    // });



</script>

@endpush