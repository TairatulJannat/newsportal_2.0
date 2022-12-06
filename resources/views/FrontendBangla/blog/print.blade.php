<div class="single-news-wrapper">
    {{-- <div class="subtitle">Climate crisis</div> --}}
    <div class="page-title">
        <h1>{{ $blog_post->blog_title_bn }}</h1>
    </div>

    <div class="title-bottom">

        <div class="post-author">

            <span class="post-author-name">BSS, Glasgow</span>
            <span
                class="post-date">{{ \Carbon\Carbon::parse($blog_post->created_at)->isoFormat('dddd, MMM Do YYYY') }}
            </span>

        </div>

        <div class="share-options">
            <ul>

                <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                
            </ul>
        </div>

    </div>
    <div class="post-section">

        <div class="post-img">
            <img style=" object-fit:fit;" width="550" height="310" src="{{ asset($blog_post->image) }}" alt="">
        </div>
        
        <div class="post-details">

            <p><strong> {!! Str::limit($blog_post->description_bn, 50) !!} </strong></p>

            <p>{!! $blog_post->description_bn !!} </p>

        </div>
        
    </div>


</div>
