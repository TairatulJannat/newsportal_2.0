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
        <p style="font-size: 11px">{{convertedDate($posts->published_date) }}</p>
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
                    <h1 style="font-weight: 400;">{{ $posts->title_bn }}</h1>
                </div>
    
                <div class="title-bottom" style="margin-bottom: 1rem; padding-bottom: .5rem; border-bottom: 1px solid #c5bd9999">
                    
                    <div class="post-author">
                        <span class="post-author-name" style="color: rgb(80, 78, 78)"></span>
                        <span class="post-date" style="color: rgb(80, 78, 78)">{{convertedDate($posts->published_date) }}</span>
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
                            {!! $posts->details_bn !!}
                        </p>
                    </div>
                </div>
                {{-- <div class="clear-fix" style="clear: left"></div> --}}

                {{-- <div class="post-metarials">
                    <div class="post-meta">
                        <span class="p-meta post-tag"><i class="fa fa-tag" aria-hidden="true" style="color:red"></i>
                            <a href="{{route('frontend.post.getpostbyseo' ,  ['tags_en' => $posts->tags_bn , 'tags_en' =>  $posts->tags_bn] )}}">{{ $posts->tags_bn }}</a>
                        </span>
        
                        <span class="p-meta posy-comments"><i class="fa fa-comment" aria-hidden="true" style="color:red"></i>{{ $posts->comments->count()}} কমেন্ট</span>
                        <span class="p-meta posy-comments"><i class="fa fa-eye" aria-hidden="true" style="color:red"></i><a href="">পড়া হয়েছে{{ $posts->view }} বার</a></span>
                        <span class="p-meta print"><i class="fa fa-print" aria-hidden="true" style="color:red"></i><a href="{{ route('postpdf.download', $posts->id) }}">প্রিন্ট করুন</a></span>
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