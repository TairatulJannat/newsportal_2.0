@php
    $settings = DB::table('general_settings_frontends')->orderBy('updated_at', 'desc')->first();;
@endphp
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    @yield('meta')

    
    @isset($settings->icon) 
        <link rel="icon" type="image/png" href="{{ asset($settings->icon) }}">
    @endisset
    @yield('title')

    <!-- fontawesome css cdn file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap css cdn file -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/bootstrap/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    {{-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/slick/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/slick/slick-theme.css')}}">
    <!-- main css file -->
    {{-- <link rel="stylesheet" href="{{ asset('public/frontend/assets/allcss/style.css')}}"> --}}

    <link rel="stylesheet" href="{{ asset('public/frontend/assets/allcss/home_style.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/allcss/calender.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('public/frontend/assets/allcss/profile.css')}}"> --}}

    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
     {{-- Calender --}}
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-67215886-1"></script>

{{-- googleanalytics --}}
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-67215886-1');
</script>

</head>