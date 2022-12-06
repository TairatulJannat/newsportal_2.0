<!DOCTYPE html>
<html lang="en">

@include('FrontendBangla.layouts.partial.head')

<style>

    .preloader 
    {
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgb(255, 255, 255) url("{{asset('public/uploads/backend/header/preloader/loader-55.gif')}}") no-repeat center;
        opacity: 1;
    }

</style>

<body>


    {{-- preloader --}}
    <div id="preloaders" class="preloader" style="z-index: 9999999"></div>

    <!-- start scrolltop btn -->
    <a href="#" class="scrollToTop"><i class="fa fa-chevron-up"></i></a>
    <!-- end scrolltop btn -->

    <div class="container" style="max-width: 93%; box-shadow: 0 0 3px 0 #cccccc; padding: 0;">

        @include('FrontendBangla.layouts.partial.header')
    
    
        @yield('content')
        
        @include('FrontendBangla.layouts.partial.footer')
    
        
        @include('FrontendBangla.layouts.partial.script')
    
        <div id="fb-root"></div>
    
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="fbjRp6Ym"></script>

    </div>

    {{-- floating add --}}
    <div class="floating-add">
        <button type="button" class="btn-close btn-close-add" aria-label="Close"></button>
        <img src="https://tpc.googlesyndication.com/simgad/9142438885430174650" alt="" srcset="">
    </div>


</body>

</html>
