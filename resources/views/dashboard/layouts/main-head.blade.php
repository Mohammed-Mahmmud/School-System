<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Minimal Admin & Dashboard Template" name="description">
<meta content="Themesbrand" name="author">
<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('dashboard')}}/assets/images/favicon.ico">

<!-- Fonts css load -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link id="fontsLink" href="../../css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
{{-- toster css links --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- jsvectormap css -->
<link href="{{asset('dashboard')}}/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">

<!--Swiper slider css-->
<link href="{{asset('dashboard')}}/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">

<!-- Layout config Js -->
<script src="{{asset('dashboard')}}/assets/js/layout.js"></script>
<!-- Icons Css -->
<link href="{{asset('dashboard')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
@if(App::getLocale() == "ar")
<!-- App Css-->
<link href="{{asset('dashboard')}}/assets/css/app-rtl.min.css" rel="stylesheet" type="text/css">
<!-- custom Css-->
<link href="{{asset('dashboard')}}/assets/css/custom-rtl.min.css" rel="stylesheet" type="text/css">
<!-- Bootstrap Css -->
<link href="{{asset('dashboard')}}/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
@else
<!-- App Css-->
<link href="{{asset('dashboard')}}/assets/css/app.min.css" rel="stylesheet" type="text/css">
<!-- custom Css-->
<link href="{{asset('dashboard')}}/assets/css/custom.min.css" rel="stylesheet" type="text/css">
<!-- Bootstrap Css -->
<link href="{{asset('dashboard')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
@endif
@yield('css')