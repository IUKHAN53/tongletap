@php
use App\Models\Utility;

$settings = Utility::settings();
// $logo=asset(Storage::url('uploads/logo/'));
$logo=\App\Models\Utility::get_file('uploads/logo');


$company_logo=Utility::getValByName('company_logo_dark');
$company_logos=Utility::getValByName('company_logo_light');

$setting = \App\Models\Utility::colorset();
$color = (!empty($setting['color'])) ? $setting['color'] : 'theme-3';
$mode_setting = \App\Models\Utility::mode_layout();
$SITE_RTL = Utility::getValByName('SITE_RTL');

@endphp
<!DOCTYPE html>
<html lang="en" dir="{{$setting['SITE_RTL'] == 'on'?'rtl':''}}">

<head>
    <title>{{__('TongleTap')}}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}" />
    <!-- font css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/tabler-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/material.css')}}">
    <!-- vendor css -->
    @if ($SITE_RTL == 'on')
    <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
    @if ($setting['cust_darklayout'] == 'on')
    <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    @endif
    <link rel="stylesheet" href="{{asset('assets/css/customizer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/landing.css')}}" />
</head>

<body class="{{$color}}">
    <!-- [ Nav ] start -->
    <nav class="navbar navbar-expand-md navbar-dark default top-nav-collapse">
        <div class="container">
            <a class="navbar-brand bg-transparent" href="">

                <img src="{{ $logo .'/logo-light.png' }}" alt="logo" width="40%" />

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layouts">Layouts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonial">Testimonial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">Faq</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light ms-2 me-1" href="{{ route('login') }}">{{__('Login')}}</a>
                    </li>
                    @if($settings['enable_signup'] == 'on')
                    <li class="nav-item">
                        <a class="btn btn-light ms-2 me-1" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- [ dashboard ] start -->
    <section id="dashboard" class="theme-alt-bg dashboard-block">
        <div class="container">
            <div class="row align-items-center justify-content-end mb-5">
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        {{__('ERPGo SaaS')}}
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        {{__(' All In One Business ERP With Project, Account, HRM, CRM')}}
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i class="fas fa-shopping-cart me-2"></i>Buy now</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{asset('landing/images/dashboard.png')}}" alt="Datta Able Admin Template" class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s" />
                </div>
            </div>
            <div class="row align-items-center justify-content-start">
                <div class="col-sm-6">
                    <img src="{{asset('assets/images/front/img-crm-dash-2.svg')}}" alt="Datta Able Admin Template" class="img-fluid header-img wow animate__fadeInLeft" data-wow-delay="0.2s" />
                </div>
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInRight" data-wow-delay="0.2s">
                        {{__('ERPGo SaaS')}}
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.4s">
                        {{__('All In One Business ERP With Project, Account, HRM, CRM')}}
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInRight" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i class="fas fa-shopping-cart me-2"></i>Buy now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->

    <!-- [ dashboard ] start -->
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    @if($settings['cust_darklayout'] && $settings['cust_darklayout'] == 'on' )

                    <img src="{{ $logo . '/' . (isset($company_logos) && !empty($company_logos) ? $company_logos : 'logo-dark.png') }}" alt="logo" style="width: 150px;">
                    @else

                    <img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}" alt="logo" style="width: 150px;">
                    @endif
                </div>
                <div class="col-lg-6 col-sm-12 text-end">

                    <p class="text-body">Copyright © 2023 | Design By Tongle</p>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- Required Js -->
    <script src="{{asset('assets/js/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/wow.min.js')}}"></script>
    <script>
        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener("scroll", function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
            } else if (cOst > ost) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
                document.querySelector(".navbar").classList.remove("default");
            } else {
                document.querySelector(".navbar").classList.add("default");
                document
                    .querySelector(".navbar")
                    .classList.remove("top-nav-collapse");
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
        var wow = new WOW({
            animateClass: "animate__animated", // animation css class (default is animated)
        });
        wow.init();
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: "#navbar-example",
        });
    </script>
</body>

</html>