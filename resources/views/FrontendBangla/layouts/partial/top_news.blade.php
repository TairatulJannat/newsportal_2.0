 <!-- top news strat -->
 @php
 $imageGallery = DB::table('image_galleries')->limit(3)->get();
 $categories = DB::table('categories')->get();
 $live_link = DB::table('on_offs')->first();
@endphp

    <!-- top news strat -->
    <div class="topnews">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 tn-left">
                   
                  
                </div>
                <div class=" col-lg-6 col-md-6 tn-middle" >
                    <div class="row tn-slider">
                        @foreach ($imageGallery as $item)
                        <div class="col-md-6">
                            <div class="tn-single" style=" max-width: 1000px; max-height: 700px;">
                                @isset($live_link)
                                    <iframe width="100%" height="100%" src="{{$live_link->live_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @else
                                    <img src="{{ asset($item->original_filename) }}"   alt="">
                                    <div class="tn-title">
                                        <a href="#">
                                            <h3>{{ $item->image_title_bn }}</h3>
                                        </a>
                                    </div>
                                @endisset
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 tn-right">
                    <!-- start news category -->
                    {{-- <div class="news-category">
                        <div class="newscategory-header">
                            <h4>News Categories</h4>
                        </div>
                        @php
                        $count=floor(count($categories)/2 )
                        @endphp
                        <div class="newscatgories-area">
                            <ul class="newscategory-menu">
                                @foreach ($categories as $key=> $category)
                                    @if($key<=$count)
                                        
                                            <li><a href="{{ route('frontend.post.categorytBypost', $category->category_slug_bn ) }}">{{ $category->category_name_bn }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul class="newscategory-menu">
                                @foreach ($categories as $key=> $category)
                                    @if($key>$count)
                                        
                                            <li><a href = "{{ route('frontend.post.categorytBypost', $category->category_slug_bn ) }}">{{ $category->category_name_bn }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            
                        </div>
                        
                    </div> --}}
                    <!-- end news category -->
                </div>
            </div>
        </div>
    </div>
   
    