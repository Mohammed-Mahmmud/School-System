<!doctype html>
<html lang="en" data-layout="vertical" data-layout-width="fluid" data-layout-position="scrollable" data-sidebar="dark"  data-preloader="enable" data-theme="default" data-topbar="dark" data-bs-theme="dark">


<head>
    @include('dashboard.layouts.main-head')
</head>

<body>
   
    <!-- Begin page -->
    <div id="layout-wrapper">
        @if(App::getLocale()== "ar")
        <div dir="rtl">
            @else
            <div>
                @endif
            @include('dashboard.layouts.sidebar')
            @include('dashboard.layouts.header')
        </div>
            @yield('content')
        </div> 
        @include('dashboard.layouts.footer')
        @include('dashboard.layouts.theme-settings')
        @include('dashboard.layouts.scripts')
    
</body> 
</html>