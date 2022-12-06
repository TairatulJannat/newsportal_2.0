<div class="right-side-column">

    <!-- start news category -->
    <div class="news-category">
        <div class="newscategory-header">
            <h4>News Categories</h4>
        </div>
        {{-- @php
        $count=floor(count($categories_head) )
        @endphp --}}
        <div class="newscatgories-area">
            <ul class="newscategory-menu">
                @foreach ($categories_for_english as $key=> $category)
                    {{-- @if($key<=$count) --}}
                        
                            <li><a href="{{ route('frontend.post.categorytBypost', $category->category_slug_en ) }}">{{ $category->category_name_en }}</a></li>
                    {{-- @endif --}}
                @endforeach
            </ul>
            {{-- <ul class="newscategory-menu">
                @foreach ($categories_head as $key=> $category)
                    @if($key>$count)
                        
                            <li><a href = "{{ route('frontend.post.categorytBypost', $category->category_slug_bn ) }}">{{ $category->category_name_bn }}</a></li>
                    @endif
                @endforeach
            </ul> --}}
            
        </div>
        
    </div>
    <!-- end news category -->

    {{-- advertisement box --}}
    <div class="advertise-box"></div>

    {{-- ============ Recent News ========== --}}
    <div class="hlr-recentnews">
        <div class="recentnews-header">
            <h4>Recent News</h4>
        </div>
        <div class="recentnews-area">
            <ul class="recentnews-menu">
                @foreach ($Recent_newses_for_english as $Recent_news_for_english)
                    <li>
                        <a class="content" href=" {{route('frontend.post.categorypostbyId' , ['slug_en' =>  $Recent_news_for_english->slug_en] ) }}">
                            <div class="style-dot"></div>
                        <p><span class="text-muted"><i class="fas fa-clock"></i> {{$Recent_news_for_english->created_at->diffForHumans()}}:</span> {{Str::limit( $Recent_news_for_english->title_en , 68 )}}</p>
                        {{-- <p class="time pull-left text-muted"><i class="fas fa-clock"></i><span> </span>{{$Recent_news->created_at->diffForHumans()}}</p> --}}
                        </a>
                        
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    
    {{-- ============ Recent News ========== --}}
    {{-- <div class="hlr-recentnews">
        <div class="recentnews-header">
            <h4>Recent News</h4>
        </div>
        <div class="recentnews-area">
            <ul class="recentnews-menu">
                @foreach ($Recent_newses as $Recent_news)
                    <li>
                        <a class="content" href=" {{route('frontend.post.categorypostbyId' , ['slug_en' =>  $Recent_news->slug_en] ) }}">
                            <div class="style-dot"></div>
                        <p>{{Str::limit( $Recent_news->title_en , 68 )}} </p>
                        <p class="time pull-right text-muted"><i class="fas fa-clock"></i><span> </span>{{$Recent_news->created_at->diffForHumans()}}</p>
                        </a>
                        
                    </li>
                @endforeach
            </ul>
        </div>
    </div> --}}

    <!-- Advertisemnet -->
    @if(Route::currentRouteName() == 'frontend.home' )
        <div class="advertise  pt-3" style = "margin-bottom:40px">
            @foreach($advertisements as $advertisement)
                @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bellow_recent_news' && $advertisement->page_name == 'Right_column')
            
                
                    <a href="@isset($advertisement->ads_link){{$advertisement->ads_link}}@endisset">  
                        <img  src="{{asset($advertisement->image)}}" style="object-fit: contain" class="advertisment" width="100%" height="280" alt="test">
                    </a>
                
                @endif
            @endforeach
        </div>
    @endif
    {{-- ============= Bangladesh Map =========== --}}
    @include('frontend.layouts.partial.map')

    {{-- =============== Popular News ============== --}}

    <!-- start popular news area -->
    <div class="popularnews">
        <div class="popularnews-heading">
            <h3>Popular News</h3>
        </div>
        <!-- start popular slider -->
        <ul class="popularnews-slider">
            <!-- popular slider item -->
        @foreach ($Popular_newses_for_english  as $Popular_news)

            <li class="popularnews-items">
                <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $Popular_news->slug_en] ) }}">
                    <img src="{{ asset($Popular_news->image) }}" alt="" style="max-width: 100px; "/>
                    <div class="popularnews-title">
                        <h4>{{ Str::limit($Popular_news->title_en , 40) }}</h4>
                        <p class="time pull-left text-muted mt-1 mb-0" style="font-size: .8rem; margin-left: 0.3rem;"><i class="far fa-calendar-alt"></i> <span> </span>{{ \Carbon\Carbon::parse($Popular_news->published_date)->isoFormat(' MMM Do YY')  }}</p>
                    </div>
                </a>
            </li>
        @endforeach
        </ul>
        <!-- end popular slider -->
    </div>
    <!-- end popular news area -->
    

    {{-- ========= Calander ======== --}}

    <!-- start Calendar -->
    <div id="calendar" class="mt-5">
        <h1 class="title mb-3">ARCHIVE</h1>
    </div>
    <!-- end calendar -->



    
    <!-- Advertisemnet -->
    @if(Route::currentRouteName() == 'frontend.home' )
        <div class="advertise  pt-3" style = "margin-bottom:40px">
            @foreach($advertisements as $advertisement)
                @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bellow_calender' && $advertisement->page_name == 'Right_column')
            
                
                    <a href="@isset($advertisement->ads_link){{$advertisement->ads_link}}@endisset">      
                        <img src="{{asset($advertisement->image)}}" border="0" width="100%" height="250" style="object-fit: contain" alt="" class="img_ad">
                    </a>
                
                @endif
            @endforeach
        </div>
    @endif
    {{-- ============ News issues =========== --}}
    {{-- <div class="newsissues-area">
        <div class="newsissues-header">
            <h3>News Issues</h3>
        </div>
        <div class="newsissues-single">
            <a href="#">alanis</a>
            <a href="#">architecture</a>
            <a href="#"><strong>Asia</strong></a>
            <a href="#">Bird</a>
            <a href="#"><strong>Business</strong></a>
            <a href="#">Death</a>
            <a href="#"><strong>Entertainment</strong></a>
            <a href="#">Health</a>
            <a href="#">Nature</a>
            <a href="#">alanis</a>
            <a href="#">architecture</a>
            <a href="#"><strong>Asia</strong></a>
            <a href="#">Bird</a>
            <a href="#"><strong>Business</strong></a>
            <a href="#">Death</a>
            <a href="#"><strong>Entertainment</strong></a>
            <a href="#">Health</a>
            <a href="#">Nature</a>
            <a href="#">alanis</a>
            <a href="#">architecture</a>
            <a href="#"><strong>Asia</strong></a>
            <a href="#">Bird</a>
            <a href="#"><strong>Business</strong></a>
            <a href="#">Death</a>
            <a href="#"><strong>Entertainment</strong></a>
            <a href="#">Health</a>
            <a href="#">Nature</a>
        </div>
    </div> --}}
    

    {{-- ========== 3-tab news section ========= --}}
    <div class="tab-sec">

        <div class="tab-title">
            <ul class="nav nav-tabs tablist" >
                <li class="tablinks active" data-tab-target="#tab1">Latest</li>
                <li class="tablinks" data-tab-target="#tab2">Sports</li>
                <li class="tablinks" data-tab-target="#tab3"> Popular</li>
            </ul>
        </div>

        <div class="tab-contents">
            {{-- ----- Tab 1 ---- --}}
            <div class="sec-tab1 tab-content active" id="tab1" data-tab-content>
                <ul>
                    @foreach ($Recent_newses_for_english as $Recent_news)
                        <li>
                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $Recent_news->slug_en] ) }}">
                                <div class="content-left">
                                    <img src="{{ asset ($Recent_news->image)}}" style="border:0" width="85" height="47" alt="" >
                                </div>
                                <div class="content-right">
                                    <p>{{ $Recent_news->title_en }}</p>
                                </div>
                            </a>
                        </li>                               
                    @endforeach  
                </ul>
            </div>


            {{-- ------ Tab 2 ---- --}}
            <div class="sec-tab2 tab-content" id="tab2" data-tab-content>
                <ul>
                    @foreach ($Sports_english->where('title_en', '!=' ,'')->take(4) as $Sport)
                        <li>
                            <a href="{{route('frontend.post.categorypostbyId' , [ 'slug_en' =>  $Sport->slug_en] ) }}">
                                <div class="content-left">
                                    <img src="{{ asset ($Sport->image)}}" style="border:0" width="85" height="47" alt="" >
                                </div>
                                <div class="content-right">
                                    <p>{{ $Sport->title_en }}</p>
                                </div>
                            </a>
                        </li>
                            
                    @endforeach
                </ul>
            </div>


            {{-- ----- Tab 3  -------}}
            <div class="sec-tab3 tab-content" id="tab3" data-tab-content>
                <ul>
                    @foreach ($Popular_newses_for_english->where('title_en', '!=' ,'')->take(4) as $Popular_news)

                        <li>
                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $Popular_news->slug_en] ) }}">
                                <div class="content-left">
                                    <img src="{{ asset($Popular_news->image) }}" alt="" style="border:0" width="85" height="47"/>
                                </div>
                                <div class="content-right">
                                    <p>{{($Popular_news->title_en) }}</p>
                                </div>
                            </a>
                        </li>
                        
                    @endforeach
                </ul>
            </div>
        </div>
        

    </div>
    
      <div>
            <form action="{{ route('frontend.archive.date') }}" method = "post" id = "datepicker_form">
                @csrf
                <input type="hidden" name ="date" id = 'date' value = "">
            </form>
      </div>

    
   

    <!-- Advertisemnet -->
    @if(Route::currentRouteName() == 'frontend.home' )
        <div class="advertise  pt-3" style = "margin-bottom:40px">
            @foreach($advertisements as $advertisement)
                @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'bellow_tab_content' && $advertisement->page_name == 'Right_column')
            
                
                    <a href="@isset($advertisement->ads_link){{$advertisement->ads_link}}@endisset">      
                        <img src="{{asset($advertisement->image)}}" border="0" width="350" height="280" alt="" class="img_ad">
                    </a>
                
                @endif
            @endforeach
        </div>
    @endif
</div>
    <script>
        $('#calendar').datepicker({
            dateFormat: 'yy/mm/dd',
            inline: true,
            firstDay: 1,
            showOtherMonths: true,
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        });
        
        let date = $("#calendar").datepicker({
        onSelect: function(dateText, inst) { 
            var dateAsString = dateText; //the first parameter of this function
            var dateAsObject = $(this).datepicker( 'getDate' ); //the getDate method
        }
        });
        $("#calendar").change(function() {
            console.log(date[0].value);
            $('#date').val(date[0].value);
            $('#datepicker_form').submit();
            // $.ajax({
            //     url: "",
            //     method: 'GET',
            //     data: {
            //         'date': date[0].value,
            //     },
            //     success: function(data) {
                    
            //         location.replace("")
                    
            //     }
            // });
        });
        
        // var date = $("#date").dtpicker({ dateFormat: 'dd,MM,yyyy' }).val()
    </script>
