<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="{{ url('home') }}">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo.png') }}" />
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
    @guest

    @else
        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

            <!-- begin:: Brand -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="{{ url('home') }}">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo.png') }}" />
                    </a>
                </div>
            </div>

            <!-- end:: Brand -->
          

           
            <!-- begin:: Aside Menu -->
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
                    <ul class="kt-menu__nav ">

                    <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link"><span class="">Help</span></span></li>
                    <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link"><span class="">KB</span></span></li>
                    <!-- <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link"><span class="">Leads</span></span></li>
                    <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link"><span class="">Reminder</span></span></li>
                    <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link"><span class="">Notes</span></span></li> -->



                        <!-- <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight" aria-haspopup="true" data-ktmenu-submenu-toggle="click" data-ktmenu-dropdown-toggle-class="kt-aside-menu-overlay--on"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-protection"></i><span class="kt-menu__link-text">Contact Management</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <div class="kt-menu__wrapper">
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Contact Management</span></span></li>
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="click" data-ktmenu-submenu-mode="accordion"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Contact</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                <ul class="kt-menu__subnav">
                                                
                                                @can('list')
                                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('/contact') }}" class="kt-menu__link "><span class="kt-menu__link-text"> List</span></a></li>
                                                    @endcan
                                                    
                                                    @can('contact-list')
                                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('/contactlist') }}" class="kt-menu__link "><span class="kt-menu__link-text"> Contact List</span></a></li>
                                                    @endcan
                                                    </ul>
                                            </div>
                                        </li>
                                        </ul>
                                </div>
                            </div>
                        </li> -->




                        <!--<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-calendar-5"></i><span class="kt-menu__link-text">Add</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Add</span></span></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon la la-commenting"></i><span class="kt-menu__link-text">Post</span></a></li>
                                    </ul>
                            </div>
                        </li>-->
                        <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom" aria-haspopup="true" data-ktmenu-submenu-toggle="click" data-ktmenu-link-redirect="1"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text">Customers</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--bottom" aria-haspopup="true" data-ktmenu-link-redirect="1"><span class="kt-menu__link"><span class="kt-menu__link-text">Customers</span></span></li>
                                    @can('role-list')
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('roles.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Roles</span></a></li>
                                    @endcan
                                    @can('user-list')
                                    <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a href="{{ route('users.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Users</span></a></li>
                                    @endcan
                                    <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a href="{{ url('tickets') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tickets</span></a></li>
                                  
                                        </ul>
                            </div>
                        </li>
                        <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom-2" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Settings</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu kt-menu__submenu--up"><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--bottom-2" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Settings</span></span></li>
                                    
            @can('category-list')
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('category.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Category</span></a></li>
                                    @endcan
            @can('stage-list')
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('stage.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Stages</span></a></li>
                                    @endcan
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('bigdatastage.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Bigdata Stage</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('reply_type.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Bigdata Replytype</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('campaignstatus.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Campaign Status</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('note_type.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Note Type</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('ticket') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Ticket</span></a></li>
                                  <li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('template') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Template</span></a></li>
                                  
                                    </ul>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </div>
            
            <!-- end:: Aside Menu -->
        </div>
        <div class="kt-aside-menu-overlay"></div>
    @endguest
        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        @guest

        @else
        <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">

                <!-- begin: Header Menu -->
                <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
                    <ul class="kt-menu__nav ">
                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('/home') }}" class="kt-menu__link "><span class="kt-menu__link-text">Dashboard</span></a></li>
                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('/sales') }}" class="kt-menu__link"><span class="kt-menu__link-text">SALES</span></a>
                                
                            </li>
                            <li class="kt-menu__item  " aria-haspopup="true"><a href="{{ url('/contact') }}" class="kt-menu__link"><span class="kt-menu__link-text">BIGDATA</span></a>
                                
                            </li>
                            <li class="kt-menu__item  " aria-haspopup="true"><a href="{{ url('/help') }}" class="kt-menu__link"><span class="kt-menu__link-text">HELPDESK</span></a>
                                
                            </li>
                            <li class="kt-menu__item  " aria-haspopup="true"><a href="{{ url('/kb') }}" class="kt-menu__link"><span class="kt-menu__link-text">KB</span></a>
                                
                            </li>
                            <li class="kt-menu__item  " aria-haspopup="true"><a href="{{ url('/clientlist') }}" class="kt-menu__link"><span class="kt-menu__link-text">Client</span></a>
                                
                                </li>
                        </ul>
                    </div>
                </div>

                <!-- end: Header Menu -->

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">

                    

                    <!--begin: Notifications -->
                    <div class="kt-header__topbar-item dropdown">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                            <span class="kt-header__topbar-icon kt-header__topbar-icon--success"><i class="flaticon2-bell-alarm-symbol"></i></span>
                            <span class="kt-hidden kt-badge kt-badge--danger"></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                            <form>

                                <!--begin: Head -->
                                <div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
                                    <h3 class="kt-head__title">
                                        User Notifications
                                        &nbsp;
                                        <span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 new</span>
                                    </h3>
                                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
                                        </li>
                                    </ul>
                                </div>

                                <!--end: Head -->
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                            <a href="#" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-line-chart kt-font-success"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        New order has been received
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        2 hrs ago
                                                    </div>
                                                </div>
                                            </a>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                            <a href="#" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-psd kt-font-success"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title">
                                                        New report has been received
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        23 hrs ago
                                                    </div>
                                                </div>
                                            </a>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                        <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                                            <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                                                <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                                                    All caught up!
                                                    <br>No new notifications.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--end: Notifications -->

                    

                    

                    

                    <!--begin: User bar -->
                    <div class="kt-header__topbar-item kt-header__topbar-item--user">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                            <span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
                            <span class="kt-hidden kt-header__topbar-username">{{ Auth::user()->name }} </span>
                            <img class="kt-hidden" alt="Pic" src="{{ asset('assets/media/logos/placeholder.png') }}" />
                            <span class="kt-header__topbar-icon"><i class="flaticon2-user-outline-symbol"></i></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

                            <!--begin: Head -->
                            <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
                                <div class="kt-user-card__avatar">
                                    <img class="kt-hidden-" alt="Pic" src="{{ asset('assets/media/logos/placeholder.png') }}" />

                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">{{ Auth::user()->name }} </span>
                                </div>
                                <div class="kt-user-card__name">
                                {{ Auth::user()->name }} 
                                </div>
                                
                            </div>

                            <!--end: Head -->

                            <!--begin: Navigation -->
                            <div class="kt-notification">
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-calendar-3 kt-font-success"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title kt-font-bold">
                                            My Profile
                                        </div>
                                        <div class="kt-notification__item-time">
                                            Account settings and more
                                        </div>
                                    </div>
                                </a>
                                
                            
                                
                                <div class="kt-notification__custom kt-space-between">
                                    <a href="{{ route('logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>  
                                </div>
                            </div>

                            <!--end: Navigation -->
                        </div>
                    </div>

                    <!--end: User bar -->

                    
                </div>

                <!-- end:: Header Topbar -->
            </div>
            @endguest
            <!-- end:: Header -->