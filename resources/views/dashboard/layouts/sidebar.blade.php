 <!-- ========== App Menu ========== -->
 <div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('mainDashboard.index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('dashboard')}}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('dashboard')}}/assets/images/logo-dark.png" alt="" height="22">
            </span>
        </a>
        <a href="{{ route('mainDashboard.index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('dashboard')}}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('dashboard')}}/assets/images/logo-light.png" alt="" height="22">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav" style="font-weight: bold;"> 

                <li class="menu-title" ><span data-key="t-menu">{{ trans('Dashboard/sidebar.Menu') }}</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ph-graduation-cap"></i> <span data-key="t-dashboards">{{ trans('Dashboard/sidebar.grades') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('grades.index') }}" class="nav-link" data-key="t-analytics"> {{ trans('Dashboard/sidebar.grades-view') }} </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('grades.create') }}" class="nav-link" data-key="t-crm">  {{ trans('Dashboard/sidebar.grades-add') }} </a>
                            </li> --}}
                          
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarLayouts1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts1">
                        <i class="ph-table"></i> <span data-key="ph-table">{{ trans('Dashboard/sidebar.classroom') }}</span> 
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
                            </li>
                          
                        </ul>
                    </div>
                </li>
{{--sidebar--}}
<li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts2">
        <i class="ph-buildings"></i> <span data-key="ph-buildings">{{ trans('Dashboard/sidebar.sections') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts2">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts3">
        <i class="ph-ticket"></i> <span data-key="ph-ticket">{{ trans('Dashboard/sidebar.students') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts3">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts4" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts4">
        <i class="ph-stack-simple"></i> <span data-key="ph-stack-simple">{{ trans('Dashboard/sidebar.teachers') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts4">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts5" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts5">
        <i class="ph-chart-pie-slice"></i> <span data-key="ph-chart-pie-slice">{{ trans('Dashboard/sidebar.parents') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts5">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts6" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts6">
        <i class="ph-file-text"></i> <span data-key="ph-file-text">{{ trans('Dashboard/sidebar.accounts') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts6">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts7" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts7">
        <i class="ph-traffic-cone"></i> <span data-key="t-ph-traffic-cone">{{ trans('Dashboard/sidebar.attendance') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts7">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item"z>
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts8" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts8">
        <i class="ri-file-list-3-line"></i> <span data-key="ri-file-list-3-line">{{ trans('Dashboard/sidebar.exams') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts8">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts9" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts9">
        <i class="ph-layout"></i> <span data-key="ph-layout">{{ trans('Dashboard/sidebar.library') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts9">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts10" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts10">
        <i class="bi bi-share"></i> <span data-key="bi bi-share">{{ trans('Dashboard/sidebar.online_classes') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts10">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts11" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts11">
        <i class="ph-wrench"></i> <span data-key="ph-wrench">{{ trans('Dashboard/sidebar.settings') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts11">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li>
</li><li class="nav-item">
    <a class="nav-link menu-link collapsed" href="#sidebarLayouts12" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts12">
        <i class="ph-gauge"></i> <span data-key="ph-gauge">{{ trans('Dashboard/sidebar.users') }}</span> 
    </a>
    <div class="collapse menu-dropdown" id="sidebarLayouts12">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
            </li>
            <li class="nav-item">
                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
            </li>
          
        </ul>
    </div>
</li>
{{-- end sidebar --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>