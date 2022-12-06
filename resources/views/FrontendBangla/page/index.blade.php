@extends('FrontendBangla.layouts.app') 
@section('content')
<div class="main-content">
    <div class="container middle-section">
        <div class="about-page">
            <div class="content">
                <img src="https://www.home.husaynimadrasah.net/wp-content/uploads/2020/04/about-us-1024x683-1.jpg" alt="">
                <div class="details">
                    <div class="title">
                        <h1><span>{{ $page_detail->page_title_bn }}</span></h1>
                    </div>
                    <div class="desc">
                        {{-- <center>
                            <h1>{{ $page_detail->page_title_bn }}</h1>
                        </center> --}}
                        
                            <p>@isset($page_detail->description_title_bn){!! $page_detail->description_title_bn !!}@endisset</p> 
                    </div>
                </div>
            </div>
        </div>
        
        {{-- @isset($page_detail)
        <center>
            <h1>{{ $page_detail->page_title_bn }}</h1>
            <hr>
        
        </center>
        <div  class="row">
            <div class="col-md-12">
                {!! $page_detail->description_title_bn !!}
            </div>
           
        </div>
        @else 
        <center>
            <h1> No Data Found</h1>
        </center>
        
        @endisset --}}
    </div>
</div>
@endsection