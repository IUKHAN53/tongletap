<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--  Title -->
    <title>@yield('page-title', 'Employee Dashboard')</title>
    <!--  Required Meta Tag -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="MobileOptimized" content="width">
    @stack('css-page')
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/emp/images/logos/dark-logo.svg')}}">

    {{--    plugins--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/choices.js/1.1.6/styles/css/choices.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/emp/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/emp/css/custom.css')}}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css"/>
    <style>
        .sidebar-item:hover .sidebar-link span svg path {
            stroke: #fff !important;
        }
    </style>
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <img src="{{asset('assets/emp/images/logos/favicon.ico')}}" alt="loader" class="lds-ripple img-fluid">
</div>
<!-- Preloader -->
<div class="preloader">
    <img src="{{asset('assets/emp/images/logos/favicon.ico')}}" alt="loader" class="lds-ripple img-fluid">
</div>
<div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar shadow">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{url('/')}}" class="text-nowrap logo-img mt-2">
                    <img src="{{asset('assets/emp/images/logos/new_logo.png')}}" class="dark-logo" width="100"
                         alt="">
                </a>
                <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8 text-muted"></i>
                </div>
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                   href="javascript:void(0)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none">
                        <path d="M3 4.5H21M11.53 9.5H21M3 14.5H21M11.53 19.5H21" stroke="#4D5558"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar mt-4" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('employee.health')}}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path d="M8.96997 22H14.97C19.97 22 21.97 20 21.97 15V9C21.97 4 19.97 2 14.97 2H8.96997C3.96997 2 1.96997 4 1.96997 9V15C1.96997 20 3.96997 22 8.96997 22Z"
                                          stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M1.96997 12.7L7.96997 12.68C8.71997 12.68 9.55997 13.25 9.83997 13.95L10.98 16.83C11.24 17.48 11.65 17.48 11.91 16.83L14.2 11.02C14.42 10.46 14.83 10.44 15.11 10.97L16.15 12.94C16.46 13.53 17.26 14.01 17.92 14.01H21.98"
                                          stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="hide-menu">Health Journey</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('employee.ticket.index')}}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z"
                                          stroke="#6A7073" stroke-width="1.5" stroke-miterlimit="10"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.25 14H17.5M9 18H17.5M15.5 2V9.86C15.5 10.3 14.98 10.52 14.66 10.23L12.34 8.09C12.248 8.00337 12.1264 7.95513 12 7.95513C11.8736 7.95513 11.752 8.00337 11.66 8.09L9.34 10.23C9.02 10.52 8.5 10.3 8.5 9.86V2H15.5Z"
                                          stroke="#6A7073" stroke-width="1.5" stroke-miterlimit="10"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="hide-menu">Request Counselor</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('employee.event')}}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path d="M16.41 4.00001C18.35 4.00001 19.91 5.57001 19.91 7.50001C19.91 9.39001 18.41 10.93 16.54 11C16.4536 10.99 16.3664 10.99 16.28 11M18.34 20C19.06 19.85 19.74 19.56 20.3 19.13C21.86 17.96 21.86 16.03 20.3 14.86C19.75 14.44 19.08 14.16 18.37 14M9.15997 10.87C9.05997 10.86 8.93997 10.86 8.82997 10.87C7.68217 10.831 6.59461 10.3468 5.7976 9.51996C5.00059 8.69309 4.55671 7.58846 4.55997 6.44001C4.55997 3.99001 6.53997 2.00001 8.99997 2.00001C10.1762 1.97879 11.3127 2.4257 12.1594 3.24242C13.0061 4.05914 13.4938 5.17877 13.515 6.35501C13.5362 7.53124 13.0893 8.66773 12.2726 9.51446C11.4558 10.3612 10.3362 10.8488 9.15997 10.87ZM4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z"
                                          stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="hide-menu">Team & Events</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('employee.tasks.index') }}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path d="M12.3699 8.88H17.6199M6.37988 8.88L7.12988 9.63L9.37988 7.38M12.3699 15.88H17.6199M6.37988 15.88L7.12988 16.63L9.37988 14.38"
                                          stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                          stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="hide-menu">Tasks</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('employee.support.index')}}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path d="M9.879 7.519C11.05 6.494 12.95 6.494 14.121 7.519C15.293 8.544 15.293 10.206 14.121 11.231C13.918 11.41 13.691 11.557 13.451 11.673C12.706 12.034 12.001 12.672 12.001 13.5V14.25M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 17.25H12.008V17.258H12V17.25Z"
                                          stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="hide-menu">Support</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('employee.employee-profile-view')}}"
                           aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <rect width="24" height="24" fill="none"/>
                                    <path d="M12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15Z"
                                          stroke="#6A7073" stroke-width="1.5" stroke-miterlimit="10"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12.88V11.12C2 10.08 2.85 9.22 3.9 9.22C5.71 9.22 6.45 7.94 5.54 6.37C5.02 5.47 5.33 4.3 6.24 3.78L7.97 2.79C8.76 2.32 9.78 2.6 10.25 3.39L10.36 3.58C11.26 5.15 12.74 5.15 13.65 3.58L13.76 3.39C14.23 2.6 15.25 2.32 16.04 2.79L17.77 3.78C18.68 4.3 18.99 5.47 18.47 6.37C17.56 7.94 18.3 9.22 20.11 9.22C21.15 9.22 22.01 10.07 22.01 11.12V12.88C22.01 13.92 21.16 14.78 20.11 14.78C18.3 14.78 17.56 16.06 18.47 17.63C18.99 18.54 18.68 19.7 17.77 20.22L16.04 21.21C15.25 21.68 14.23 21.4 13.76 20.61L13.65 20.42C12.75 18.85 11.27 18.85 10.36 20.42L10.25 20.61C9.78 21.4 8.76 21.68 7.97 21.21L6.24 20.22C5.8041 19.969 5.48558 19.5553 5.35435 19.0698C5.22311 18.5842 5.28988 18.0664 5.54 17.63C6.45 16.06 5.71 14.78 3.9 14.78C2.85 14.78 2 13.92 2 12.88Z"
                                          stroke="#6A7073" stroke-width="1.5" stroke-miterlimit="10"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="hide-menu">Settings</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('employee.mwl')}}"
                           aria-expanded="false">
                            <span>
                                <svg fill="#4d5558" height="25px" width="25px" version="1.1" id="Layer_1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     viewBox="0 0 485 485" xml:space="preserve"><g id="SVGRepo_bgCarrier"
                                                                                   stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path d="M413.974,71.026C368.171,25.225,307.274,0,242.5,0S116.829,25.225,71.026,71.026C25.225,116.829,0,177.726,0,242.5 s25.225,125.671,71.026,171.474C116.829,459.775,177.726,485,242.5,485s125.671-25.225,171.474-71.026 C459.775,368.171,485,307.274,485,242.5S459.775,116.829,413.974,71.026z M242.5,455C125.327,455,30,359.673,30,242.5 S125.327,30,242.5,30S455,125.327,455,242.5S359.673,455,242.5,455z"></path>
                                            <path d="M318.514,231.486c19.299,0,35-15.701,35-35s-15.701-35-35-35s-35,15.701-35,35S299.215,231.486,318.514,231.486z"></path>
                                            <path d="M166.486,231.486c19.299,0,35-15.701,35-35s-15.701-35-35-35s-35,15.701-35,35S147.188,231.486,166.486,231.486z"></path>
                                            <path d="M242.5,355c-46.911,0-89.35-29.619-105.604-73.703l-28.148,10.378C129.329,347.496,183.08,385,242.5,385 s113.171-37.504,133.752-93.325l-28.148-10.378C331.85,325.381,289.411,355,242.5,355z"></path>
                                        </g>
                                    </g></svg>
                            </span>
                            <span class="hide-menu">Mental Wellness Library</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
                <div class="hstack gap-3">
                    <div class="john-img">
                        <img src="{{auth()->user()->image}}" class="rounded-circle"
                             width="40" height="40"
                             alt="">
                    </div>
                    <div class="john-title">
                        <h6 class="mb-0 fs-4 fw-semibold">{{auth()->user()->name}}</h6>
                        <span class="fs-2 text-dark">{{auth()->user()->type}}</span>
                    </div>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="submit"
                                aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="logout">
                            <i class="ti ti-power fs-6"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item p-3">
                        <div class="d-flex flex-column gap-1">
                            <h3>Mental Wellbeing</h3>
                            <a href="http://MHC.tongle.space"><small>Let’s track your results today!</small></a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">

                    </li>
                </ul>
                <div class="d-block d-lg-none">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/emp/images/logos/new_logo.png')}}" class="dark-logo" width="50"
                             alt="">
                    </a>
                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="p-2">
                        <i class="ti ti-dots fs-7"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0)"
                           class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button"
                           data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                           aria-controls="offcanvasWithBothOptions">
                            <i class="ti ti-align-justified fs-7"></i>
                        </a>
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                            <li class="nav-item dropdown">
                                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="user-profile-img">
                                            <img src="{{auth()->user()->image}}" style="object-fit: cover"
                                                 class="rounded-circle"
                                                 width="35" height="35" alt="">
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                     aria-labelledby="drop1">
                                    <div class="profile-dropdown position-relative" data-simplebar="">
                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                        </div>
                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <img src="{{auth()->user()->image}}"
                                                 class="rounded-circle" style="object-fit: cover"
                                                 width="80" height="80" alt="">
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3">{{auth()->user()->name}}</h5>
                                                <span class="mb-1 d-block text-dark">{{auth()->user()->type}}</span>
                                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> {{auth()->user()->email}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">
                                            <a href="{{route('employee.employee-profile-view')}}"
                                               class="py-8 px-7 mt-8 d-flex align-items-center">
                                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                    <img src="{{asset('assets/emp/images/svgs/icon-account.svg')}}"
                                                         alt="" width="24"
                                                         height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                                    <span class="d-block text-dark">Account Settings</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <form action="{{route('logout')}}" method="POST">
                                                @csrf
                                                <button class="btn btn-outline-primary" style="width: 100%"
                                                        type="submit">
                                                    Log Out
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
            <div class="page-header {{request()->routeIs('employee.dashboard')?'':'my-4'}}">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="page-header-title">
                                <h4 class="m-b-10">@yield('page-title')</h4>
                            </div>
                            <ul class="breadcrumb">
                                @yield('breadcrumb')
                            </ul>
                        </div>
                        <div class="col">
                            @yield('action-btn')
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
     aria-labelledby="offcanvasWithBothOptionsLabel">
    <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
            <a href="{{url('/')}}">
                <img src="{{asset('assets/emp/images/logos/new_logo.png')}}"
                     alt="" class="img-fluid">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body profile-dropdown mobile-navbar">
            <ul id="sidebarnav">
                <li class="sidebar-item selected">
                    <a class="sidebar-link active" href="{{route('employee.health')}}" aria-expanded="false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M8.96997 22H14.97C19.97 22 21.97 20 21.97 15V9C21.97 4 19.97 2 14.97 2H8.96997C3.96997 2 1.96997 4 1.96997 9V15C1.96997 20 3.96997 22 8.96997 22Z"
                                      stroke="white" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                                <path d="M1.96997 12.7L7.96997 12.68C8.71997 12.68 9.55997 13.25 9.83997 13.95L10.98 16.83C11.24 17.48 11.65 17.48 11.91 16.83L14.2 11.02C14.42 10.46 14.83 10.44 15.11 10.97L16.15 12.94C16.46 13.53 17.26 14.01 17.92 14.01H21.98"
                                      stroke="white" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="hide-menu">Health Journey</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('employee.ticket.index')}}" aria-expanded="false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z"
                                      stroke="#6A7073" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                                <path d="M13.25 14H17.5M9 18H17.5M15.5 2V9.86C15.5 10.3 14.98 10.52 14.66 10.23L12.34 8.09C12.248 8.00337 12.1264 7.95513 12 7.95513C11.8736 7.95513 11.752 8.00337 11.66 8.09L9.34 10.23C9.02 10.52 8.5 10.3 8.5 9.86V2H15.5Z"
                                      stroke="#6A7073" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="hide-menu">Request Counselor</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('employee.event')}}" aria-expanded="false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M16.41 4.00001C18.35 4.00001 19.91 5.57001 19.91 7.50001C19.91 9.39001 18.41 10.93 16.54 11C16.4536 10.99 16.3664 10.99 16.28 11M18.34 20C19.06 19.85 19.74 19.56 20.3 19.13C21.86 17.96 21.86 16.03 20.3 14.86C19.75 14.44 19.08 14.16 18.37 14M9.15997 10.87C9.05997 10.86 8.93997 10.86 8.82997 10.87C7.68217 10.831 6.59461 10.3468 5.7976 9.51996C5.00059 8.69309 4.55671 7.58846 4.55997 6.44001C4.55997 3.99001 6.53997 2.00001 8.99997 2.00001C10.1762 1.97879 11.3127 2.4257 12.1594 3.24242C13.0061 4.05914 13.4938 5.17877 13.515 6.35501C13.5362 7.53124 13.0893 8.66773 12.2726 9.51446C11.4558 10.3612 10.3362 10.8488 9.15997 10.87ZM4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z"
                                      stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="hide-menu">Team & Events</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('employee.tasks.index') }}" aria-expanded="false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M12.3699 8.88H17.6199M6.37988 8.88L7.12988 9.63L9.37988 7.38M12.3699 15.88H17.6199M6.37988 15.88L7.12988 16.63L9.37988 14.38"
                                      stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                      stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="hide-menu">Tasks</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('employee.support.index')}}" aria-expanded="false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M9.879 7.519C11.05 6.494 12.95 6.494 14.121 7.519C15.293 8.544 15.293 10.206 14.121 11.231C13.918 11.41 13.691 11.557 13.451 11.673C12.706 12.034 12.001 12.672 12.001 13.5V14.25M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 17.25H12.008V17.258H12V17.25Z"
                                      stroke="#6A7073" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="hide-menu">Support</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('employee.employee-profile-view')}}" aria-expanded="false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect width="24" height="24" fill="white"></rect>
                                <path d="M12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15Z"
                                      stroke="#6A7073" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                                <path d="M2 12.88V11.12C2 10.08 2.85 9.22 3.9 9.22C5.71 9.22 6.45 7.94 5.54 6.37C5.02 5.47 5.33 4.3 6.24 3.78L7.97 2.79C8.76 2.32 9.78 2.6 10.25 3.39L10.36 3.58C11.26 5.15 12.74 5.15 13.65 3.58L13.76 3.39C14.23 2.6 15.25 2.32 16.04 2.79L17.77 3.78C18.68 4.3 18.99 5.47 18.47 6.37C17.56 7.94 18.3 9.22 20.11 9.22C21.15 9.22 22.01 10.07 22.01 11.12V12.88C22.01 13.92 21.16 14.78 20.11 14.78C18.3 14.78 17.56 16.06 18.47 17.63C18.99 18.54 18.68 19.7 17.77 20.22L16.04 21.21C15.25 21.68 14.23 21.4 13.76 20.61L13.65 20.42C12.75 18.85 11.27 18.85 10.36 20.42L10.25 20.61C9.78 21.4 8.76 21.68 7.97 21.21L6.24 20.22C5.8041 19.969 5.48558 19.5553 5.35435 19.0698C5.22311 18.5842 5.28988 18.0664 5.54 17.63C6.45 16.06 5.71 14.78 3.9 14.78C2.85 14.78 2 13.92 2 12.88Z"
                                      stroke="#6A7073" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('employee.mwl')}}" aria-expanded="false">
                        <span>
                            <svg fill="#4d5558" height="25px" width="25px" version="1.1" id="Layer_1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 viewBox="0 0 485 485" xml:space="preserve"><g id="SVGRepo_bgCarrier"
                                                                               stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <path d="M413.974,71.026C368.171,25.225,307.274,0,242.5,0S116.829,25.225,71.026,71.026C25.225,116.829,0,177.726,0,242.5 s25.225,125.671,71.026,171.474C116.829,459.775,177.726,485,242.5,485s125.671-25.225,171.474-71.026 C459.775,368.171,485,307.274,485,242.5S459.775,116.829,413.974,71.026z M242.5,455C125.327,455,30,359.673,30,242.5 S125.327,30,242.5,30S455,125.327,455,242.5S359.673,455,242.5,455z"></path>
                                        <path d="M318.514,231.486c19.299,0,35-15.701,35-35s-15.701-35-35-35s-35,15.701-35,35S299.215,231.486,318.514,231.486z"></path>
                                        <path d="M166.486,231.486c19.299,0,35-15.701,35-35s-15.701-35-35-35s-35,15.701-35,35S147.188,231.486,166.486,231.486z"></path>
                                        <path d="M242.5,355c-46.911,0-89.35-29.619-105.604-73.703l-28.148,10.378C129.329,347.496,183.08,385,242.5,385 s113.171-37.504,133.752-93.325l-28.148-10.378C331.85,325.381,289.411,355,242.5,355z"></path>
                                    </g>
                                </g></svg>
                        </span>
                        <span class="hide-menu">Mental Wellness Library</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!--  Search Bar -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
                <input type="search" class="form-control fs-3" placeholder="Search here" id="search">
                <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
                    <i class="ti ti-x fs-5 ms-3"></i>
                </span>
            </div>
            <div class="modal-body message-body" data-simplebar="">
                <h5 class="mb-0 fs-5 p-1">Search Result</h5>
                <ul class="list mb-0 py-2">
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Search result 1</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="commonModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body">
            </div>
        </div>
    </div>
</div>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
    <div id="liveToast" class="toast text-white fade" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/plugins/main.min.js') }}"></script>

<script src="{{asset('assets/emp/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/emp/libs/simplebar/dist/simplebar.min.js')}}"></script>
<script src="{{asset('assets/emp/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!--  core files -->
<script src="{{asset('assets/emp/js/app.min.js')}}"></script>
<script src="{{asset('assets/emp/js/app.init.js')}}"></script>
<script src="{{asset('assets/emp/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/emp/js/custom.js')}}"></script>

{{--plugins--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/1.1.6/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/plugins/flatpickr.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/emp/js/custom_js.js') }}"></script>

@stack('script-page')
@if($message = Session::get('success'))
    <script>
        show_toastr('success', '{!! $message !!}');
    </script>
@endif
@if($message = Session::get('error'))
    <script>
        show_toastr('error', '{!! $message !!}');
    </script>
@endif

<script>
    $(document).ready(function () {
        $('.table').DataTable({"order": []});
    });
    $(document).ready(function () {
        const sidebarLink = $('.sidebar-link');

        function setSvgPathColor() {
            for (let i = 0; i < sidebarLink.length; i++) {
                let svg = sidebarLink[i].getElementsByTagName('span')[0].getElementsByTagName('svg')[0];
                if (sidebarLink[i].classList.contains('active')) {
                    let paths = svg.getElementsByTagName('path');
                    for (let j = 0; j < paths.length; j++) {
                        paths[j].setAttribute('stroke', '#ffffff');
                    }
                }
            }
        }

        setSvgPathColor()


    })
</script>
</body>
</html>