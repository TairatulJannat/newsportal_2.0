
@php
$settings = DB::table('general_settings_frontends')->orderBy('updated_at', 'desc')->first();

$sociallink = DB::table('social_links')->first();
@endphp

<div class="advertise container pt-3" style = "margin-bottom:40px">
   @foreach($advertisements as $advertisement)
      @if($advertisement->image != '' && $advertisement->ads_status == '1' && $advertisement->position == 'above_footer' && $advertisement->page_name == 'home')
    
            <a href="@isset($advertisement->ads_link){{route($advertisement->ads_link)}}@endisset">      
               <img style="width: 100%; max-height: 190px; object-fit: fill;" src="{{asset($advertisement->image)}}" alt="...">
            </a>
     
      @endif
   @endforeach
</div>
<footer id="footer">
     {{-- <div class="container"> --}}
        <div class="footer-area row">
            {{-- <div class="footer-icons d-flex">
                <div class="footer-socilicn">
                     @isset($sociallink)
                         <a href=" {{ $sociallink->facebook }} "><i class="fa fa-facebook" style="color:#455afa;"></i></a>
                         <a href=" {{ $sociallink->twitter }} "><i class="fa fa-twitter" style="color:#33ccff;"></i></a>
                         <a href=" {{ $sociallink->linkedin }}" ><i class="fa fa-linkedin" style="color:#192583;"></i></a>
                         <a href=" {{ $sociallink->instagram }}"><i class="fa fa-instagram" style="color:#fa4545;"></i></a>
                         <a href=" {{ $sociallink->youtube }}"><i class="fa fa-youtube" style="color:#f32e0d"></i></a>
                     @endisset
                </div> 
            </div>         --}}
            <div class="first-column col-lg-4 col-md-6 col-sm-6 col-12">
                
                <div class="single-footer">
                    <div class="footer-socilicn">
                        @isset($sociallink)
                            <a href=" {{ $sociallink->facebook }} "><i class="fa fa-facebook" style="color:#455afa;"></i></a>
                            <a href=" {{ $sociallink->twitter }} "><i class="fa fa-twitter" style="color:#33ccff;"></i></a>
                            <a href=" {{ $sociallink->linkedin }}" ><i class="fa fa-linkedin" style="color:#192583;"></i></a>
                            <a href=" {{ $sociallink->instagram }}"><i class="fa fa-instagram" style="color:#fa4545;"></i></a>
                            <a href=" {{ $sociallink->youtube }}"><i class="fa fa-youtube" style="color:#f32e0d"></i></a>
                        @endisset
                   </div> 

                    <div class="footer-address">
                    @isset($settings)
                       <p>ম্যানেজিং ডিরেক্টর: <strong>{{$settings->director_name_bn}}</strong></p>
                       <p>সম্পাদক: <strong>{{$settings->editor_name_bn}}</strong></p>
                       <p>প্রকাশক: <strong>{{$settings->publisher_name_bn}}</strong></p>
                       <p>ঠিকানা: <strong>{{$settings->address}}</strong></p>
                       <p>ইমেইল: <strong>{{$settings->email}}</strong></p>
                       <p>ফোন: <strong>{{$settings->phone}}</strong></p>
                    @endisset
                    </div>
                 </div>

            </div>
            <div class="footer-column col-lg-2 col-md-3 col-sm-3 col-12">
                
                <div class="single-footer">
                    <h3>আমাদের নীতি</h3>
                    <div class="footer-policies">
                       <ul class="footer-pliclink">
                          <li><a href="{{ route('frontend.page' , "editorial_policy") }}">সম্পাদকীয় নীতি</a></li>
                          <li><a href="{{ route('frontend.page' , "terms_of_services") }}">শর্তাবলী</a></li>
                          <li><a href="{{ route('frontend.page' , "privacy_policy") }}">প্রাইভেসি নীতি</a></li>
                          <li><a href="{{ route('frontend.page' , "sample_policy") }}">নমুনা নীতি</a></li>
                          <li><a href="{{ route('frontend.page' , "help") }}">সহায়তা</a></li>
                       </ul>
                    </div>
                 </div>
            </div>
            <div class="footer-column col-lg-2 col-md-3 col-sm-3 col-12">
                <div class="single-footer">
                    <h3>সম্পর্কিত লিংক</h3>
                    <div class="footer-links">
                       <ul class="footer-quicklink">
                          <li><a href="{{ route( 'frontend.home.bangla')}}">হোম</a></li>
                          <li><a href="{{ route('FrontendBangla.page' , "about") }}">আমাদের সম্পর্কে</a></li>
                          <li><a href="{{ route('FrontendBangla.page' , "contuct") }}">সেবা</a></li>
                          <li><a href="{{ route('FrontendBangla.page' , "service") }}">যোগাযোগ</a></li>
                          <li><a href="{{ route('FrontendBangla.page' , "help") }}">সহায়তা</a></li>
                       </ul>
                    </div>
                 </div>
            </div>
            <div class="footer-column col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="single-footer">
                    <div class="footer-socilicn" style="text-align:left">
                         @isset($settings->footer_logo_bn)
                             <img src="{{ asset($settings->footer_logo_bn) }}" style=" object-fit:contain;" width="" height="40px">
                         @endisset
                     </div>  
                    <h3>আমাদের সংবাদবাহীপত্র</h3>
                    <div class="footer-newslatter">
                       <p style="margin-bottom: 0;">@isset($settings->description_bn) {!! $settings->description_bn !!} @endisset</p>
                    </div>
                 </div>
            </div>
           
           
            {{-- <div class="row footer-row">
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="single-footer">
                    <div class="footer-socilicn">
                        @isset($sociallink)
                            <a href=" {{ $sociallink->facebook }} "><i class="fa fa-facebook" style="color:#455afa;"></i></a>
                            <a href=" {{ $sociallink->twitter }} "><i class="fa fa-twitter" style="color:#33ccff;"></i></a>
                            <a href=" {{ $sociallink->linkedin }}" ><i class="fa fa-linkedin" style="color:#192583;"></i></a>
                            <a href=" {{ $sociallink->instagram }}"><i class="fa fa-instagram" style="color:#fa4545;"></i></a>
                            <a href=" {{ $sociallink->youtube }}"><i class="fa fa-youtube" style="color:#f32e0d"></i></a>
                        @endisset
                   </div> 

                    <div class="footer-address">
                    @isset($settings)
                       <p>Managing Director: <strong>{{$settings->director_name}}</strong></p>
                       <p>Editor: <strong>{{$settings->editor_name}}</strong></p>
                       <p>Publisher: <strong>{{$settings->publisher_name}}</strong></p>
                       <p>Address: <strong>{{$settings->address}}</strong></p>
                       <p>Email: <strong>{{$settings->email}}</strong></p>
                       <p>Phone: <strong>{{$settings->phone}}</strong></p>
                    @endisset
                    </div>
                 </div>
                 
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6" style="text-align: center">
                 <div class="single-footer">
                    <h3>Our Policies</h3>
                    <div class="footer-policies">
                       <ul class="footer-pliclink">
                          <li><a href="{{ route('frontend.page' , "editorial_policy") }}">Editorial Policy</a></li>
                          <li><a href="{{ route('frontend.page' , "terms_of_services") }}">Terms of Service</a></li>
                          <li><a href="{{ route('frontend.page' , "privacy_policy") }}">Privacy Policy</a></li>
                          <li><a href="{{ route('frontend.page' , "sample_policy") }}">Sample Policy</a></li>
                          <li><a href="{{ route('frontend.page' , "help") }}">Help</a></li>
                       </ul>
                    </div>
                 </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6" style="text-align: center">
                 <div class="single-footer">
                    <h3>Related Links</h3>
                    <div class="footer-links">
                       <ul class="footer-quicklink">
                          <li><a href="{{ route( 'frontend.home')}}">Home</a></li>
                          <li><a href="{{ route('frontend.page' , "about") }}">About</a></li>
                          <li><a href="{{ route('frontend.page' , "contuct") }}">Service</a></li>
                          <li><a href="{{ route('frontend.page' , "service") }}">Contact</a></li>
                          <li><a href="{{ route('frontend.page' , "help") }}">Help</a></li>
                       </ul>
                    </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="single-footer">
                    <div class="footer-socilicn" style="text-align:left">
                         @isset($settings->footer_logo)
                             <img src="{{ asset($settings->footer_logo) }}" style=" object-fit:contain;" width="" height="40px">
                         @endisset
                     </div>  
                    <h3>Our Newslatter</h3>
                    <div class="footer-newslatter">
                       <p style="margin-bottom: 0;">@isset($settings->description) {!! $settings->description !!} @endisset</p>
                    </div>
                 </div>
              </div>
           </div> --}}
        </div>
        <div class="footer-bottom">
           <p>&copy; ২০২১: সংবাদপত্র, সমস্ত অধিকার সংরক্ষিত | NewsPaper Theme by: <a href="#">TheVoice24</a> | Powered by: <a href="#">The Voice24</a></p>
        </div>
     {{-- </div> --}}

     {{-- google Adsence --}}
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4724241092350189"crossorigin="anonymous"></script>
  </footer>