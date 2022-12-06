<head>
    @php
    $settings = DB::table('general_settings_backends')->orderBy('updated_at', 'desc')->first();;
    @endphp
    <meta charset="utf-8" />
    <meta name="csrf-token">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/admin/assets/img/apple-icon.png') }}">
    @isset($settings->icon)
    <link rel="icon" type="image/png" href="{{ asset($settings->icon) }}">
    @endisset
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
    @isset($settings->site_title)
    {{$settings->site_title}}
    @endisset
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('public/admin/assets/css/material-dashboard.css?v=1.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('public/admin/assets/demo/demo.css') }}" rel="stylesheet" />
    <!-- CSS Just for bonus countdown -->
    <link href="{{ asset('public/admin/assets/css/count_down.css') }}" rel="stylesheet" />
    <!-- fontawesome css cdn file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- highchart --}}
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>


  </head>
