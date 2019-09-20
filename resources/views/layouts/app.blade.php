<html lang="{{ app()->getLocale() }}">

<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="../../">
		<meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
		<meta name="description" content="Page with empty content">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
         
        
		<link href="{{ asset('assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/quill/dist/quill.snow.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/dual-listbox/dist/dual-listbox.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/plugins/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/plugins/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/plugins/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />

		<!--end:: Vendor Plugins -->
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--begin:: Vendor Plugins for custom pages -->
		<link href="{{ asset('assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/@fullcalendar/core/main.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/@fullcalendar/daygrid/main.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/@fullcalendar/list/main.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/@fullcalendar/timegrid/main.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/jstree/dist/themes/default/style.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/jqvmap/dist/jqvmap.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/uppy/dist/uppy.min.css') }}" rel="stylesheet" type="text/css" />
   
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/fevicon.ico') }}" />
    </head>
    
    <!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="{{ url('/') }}">
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
                    <a href="{{ url('/') }}">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo.png') }}" />
                    </a>
                </div>
            </div>

            <!-- end:: Brand -->
          

           
            <!-- begin:: Aside Menu -->
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
                    <ul class="kt-menu__nav ">
                        <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight" aria-haspopup="true" data-ktmenu-submenu-toggle="click" data-ktmenu-dropdown-toggle-class="kt-aside-menu-overlay--on"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-protection"></i><span class="kt-menu__link-text">Contact Management</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
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
                                                    <!--<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Stage</span></a></li>-->
                                                    </ul>
                                            </div>
                                        </li>
                                        </ul>
                                </div>
                            </div>
                        </li>
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
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('roles.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Roles</span></a></li>
                                   
                                    <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a href="{{ route('users.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Users</span></a></li>
                                   
                                        </ul>
                            </div>
                        </li>
                        <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom-2" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Settings</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu kt-menu__submenu--up"><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--bottom-2" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Settings</span></span></li>
                                    
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('category.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Category</span></a></li>
                                   
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('stage.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Stages</span></a></li>
                                    </ul>
                            </div>
                        </li>
                        <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom-1" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-hourglass-1"></i><span class="kt-menu__link-text">Help</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand kt-badge--rounded">2</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu kt-menu__submenu--up"><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--bottom-1" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Help</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand kt-badge--rounded">2</span></span></span></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Support</span></a></li>
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
                            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">SALES</span></a>
                                
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">BIGDATA</span></a>
                                
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">HELPDESK</span></a>
                                
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">KB</span></a>
                                
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
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Subheader -->
               <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-subheader__main">
                           
                        </div>
                        
                    </div>
                </div>

                <!-- end:: Subheader -->

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                @yield('content')</div>

                <!-- end:: Content -->
            </div>

            <!-- begin:: Footer -->
            <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                <div class="kt-container  kt-container--fluid ">
                    <div class="kt-footer__copyright">
                        2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Keenthemes</a>
                    </div>
                    <div class="kt-footer__menu">
                        <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">About</a>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
                    </div>
                </div>
            </div>

            <!-- end:: Footer -->
        </div>
       
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->





<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#22b9ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->

<!--begin:: Vendor Plugins -->
<script src="{{ asset('assets/plugins/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/wnumb/wNumb.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js/global/integration/plugins/dropzone.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/quill/dist/quill.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/@yaireo/tagify/dist/tagify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/dual-listbox/dist/dual-listbox.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/raphael/raphael.js') }}" type="text/javascript') }}"></script>
<script src="{{ asset('assets/plugins/general/morris.js/morris.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>

<!--end:: Vendor Plugins -->
<script src="{{ asset('assets/js/scripts.bundle.js') }}" type="text/javascript"></script>

<!--begin:: Vendor Plugins for custom pages -->
<script src="{{ asset('assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/@fullcalendar/core/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/@fullcalendar/daygrid/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/@fullcalendar/google-calendar/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/@fullcalendar/interaction/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/@fullcalendar/list/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/@fullcalendar/timegrid/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/flot/dist/es5/jquery.flot.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/flot/source/jquery.flot.resize.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/flot/source/jquery.flot.categories.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/flot/source/jquery.flot.pie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/flot/source/jquery.flot.stack.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/flot/source/jquery.flot.crosshair.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/flot/source/jquery.flot.axislabels.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net/js/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/js/global/integration/plugins/datatables.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/jszip/dist/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/pdfmake/build/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/pdfmake/build/vfs_fonts.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-buttons/js/buttons.print.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/jstree/dist/jstree.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/uppy/dist/uppy.min.js') }}" type="text/javascript"></script>



<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>