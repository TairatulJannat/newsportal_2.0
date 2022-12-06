<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="date_time">
        <p style="font-size: 11px"> 6 December 2021, 01:26 PM</p>
    </div>
    <div class="container print-news">
        <div class="blog-page-container">
            <div class="single-news-wrapper">
                <div class="brand-middle d-flex justify-content-center" >
                    <a href="{{ route( 'frontend.home' )}}" class="brand">
                        <img src="http://thevoice24.com/public/uploads/backend/header/logo/1721547680581264.png" alt="" width="20%" style="margin-left: 18rem">
                    </a>
                </div>
                
                <div class="page-title">
                    <h1 style="font-weight: 400;">{{ $posts->title_en }}</h1>
                </div>
    
                <div class="title-bottom" style="margin-bottom: 1rem; padding-bottom: .5rem; border-bottom: 1px solid #c5bd9999">
                    
                    <div class="post-author">
                        <span class="post-author-name" style="color: rgb(80, 78, 78)"></span>
                        <span class="post-date" style="color: rgb(80, 78, 78)">{{\Carbon\Carbon::parse($posts->published_date)->isoFormat('dddd, MMM Do YYYY')  }}</span>
                    </div>
                    <div class="sharethis-inline-share-buttons ml-5" data-href=""{{url()->current()}}></div>
                    
                </div>
    
                <div class="post-section">
                    <div class="post-img">
                         {{-- <img src="{{ asset($posts->image) }}" alt="" style=" object-fit:fit;" width="550" height ="310" /> --}}
                         <img src="{{ asset($posts->image) }}" alt="" style=" object-fit:fit;" width="100%" height ="" />
                    </div>
                    <div class="post-details">
                        <p>
                            {!! $posts->details_en !!}
                        </p>
                    </div>
                </div>
                {{-- <div class="clear-fix" style="clear: left"></div> --}}

                {{-- <div class="post-metarials">
                    <div class="post-meta">
                        <span class="p-meta post-tag"><i class="fa fa-tag" aria-hidden="true" style="color:red"></i>
                            <a href="{{route('frontend.post.getpostbyseo' ,  ['tags_en' => $posts->tags_en , 'tags_en' =>  $posts->tags_en] )}}">{{ $posts->tags_en }}</a>
                        </span>
        
                        <span class="p-meta posy-comments"><i class="fa fa-comment" aria-hidden="true" style="color:red"></i>{{ $posts->comments->count()}} Comments</span>
                        <span class="p-meta posy-comments"><i class="fa fa-eye" aria-hidden="true" style="color:red"></i><a href="">{{ $posts->view }} Hits</a></span>
                        <span class="p-meta print"><i class="fa fa-print" aria-hidden="true" style="color:red"></i><a href="{{ route('postpdf.download', $posts->id) }}">Print this News</a></span>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>
    <div class="pagination" style="margin-left: 100%">
        <p style="font-size: 11px;">1/1</p>
    </div>
</body>
</html>