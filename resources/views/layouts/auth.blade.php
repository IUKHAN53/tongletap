<!DOCTYPE html>
@php
use App\Models\Utility;
$logo=\App\Models\Utility::get_file('uploads/logo/');
$company_logo=Utility::getValByName('company_logo_dark');
$company_logos=Utility::getValByName('company_logo_light');
$company_favicon=Utility::getValByName('company_favicon');
$setting = \App\Models\Utility::colorset();
$mode_setting = \App\Models\Utility::mode_layout();
$color = (!empty($setting['color'])) ? $setting['color'] : 'theme-3';
$company_logo = \App\Models\Utility::GetLogo();
$SITE_RTL= isset($setting['SITE_RTL'])?$setting['SITE_RTL']:'off';
@endphp
{{--<html lang="en" dir="{{$SITE_RTL == 'on' ? 'rtl' : '' }}">--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on' ? 'rtl' : '' }}">

<head>
    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'TongleTap')}} - @yield('page-title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" type="image/x-icon" />
    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <!-- vendor css -->
    @if ( $setting['SITE_RTL'] == 'on')
    <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css')}}" id="main-style-link">
    @endif
    @if($setting['cust_darklayout']=='on')
    <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css')}}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" id="main-style-link">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
</head>

<body class="{{ $color }}">
    <div class="auth-wrapper auth-v3" style="background : url('public/assets/images/login-bg.png') no-repeat center; background-size: cover">
        <div class="auth-content" style="align-items: center;padding-top: 150px; border:1px solid transparent;">
            <div class="card" style="background: linear-gradient(132.09deg, rgba(255, 255, 255, 0) -5.63%, rgba(255, 255, 255, 0.7) 100%);border-radius:30px;">
                <div class="row align-items-center text-start">
                    <div class="col-xl-12">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <div class="auth-footer" style="text-align: left;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="">
                                {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright Tongle') }} {{ date('Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signup ] end -->
    <!-- Required Js -->
    <script src="{{ asset('assets/js/vendor-all.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script>
        feather.replace();
    </script>
    <script>
        feather.replace();
        var pctoggle = document.querySelector("#pct-toggler");
        if (pctoggle) {
            pctoggle.addEventListener("click", function() {
                if (
                    !document.querySelector(".pct-customizer").classList.contains("active")
                ) {
                    document.querySelector(".pct-customizer").classList.add("active");
                } else {
                    document.querySelector(".pct-customizer").classList.remove("active");
                }
            });
        }
        var themescolors = document.querySelectorAll(".themes-color > a");
        for (var h = 0; h < themescolors.length; h++) {
            var c = themescolors[h];
            c.addEventListener("click", function(event) {
                var targetElement = event.target;
                if (targetElement.tagName == "SPAN") {
                    targetElement = targetElement.parentNode;
                }
                var temp = targetElement.getAttribute("data-value");
                removeClassByPrefix(document.querySelector("body"), "theme-3");
                document.querySelector("body").classList.add(temp);
            });
        }
        var custthemebg = document.querySelector("#cust-theme-bg");
        custthemebg.addEventListener("click", function() {
            if (custthemebg.checked) {
                document.querySelector(".dash-sidebar").classList.add("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.add("transprent-bg");
            } else {
                document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.remove("transprent-bg");
            }
        });
        var custdarklayout = document.querySelector("#cust-darklayout");
        custdarklayout.addEventListener("click", function() {
            if (custdarklayout.checked) {
                document
                    .querySelector(".m-header > .b-brand > .logo-lg")
                    .setAttribute("src", "{{ asset('assets/images/logo.svg') }}");
                document
                    .querySelector("#main-style-link")
                    .setAttribute("href", "{{ asset('assets/css/style-dark.css') }}");
            } else {
                document
                    .querySelector(".m-header > .b-brand > .logo-lg")
                    .setAttribute("src", "{{ asset('assets/images/logo-dark.png') }}");
                document
                    .querySelector("#main-style-link")
                    .setAttribute("href", "{{ asset('assets/css/style.css') }}");
            }
        });

        function removeClassByPrefix(node, prefix) {
            for (let i = 0; i < node.classList.length; i++) {
                let value = node.classList[i];
                if (value.startsWith(prefix)) {
                    node.classList.remove(value);
                }
            }
        }
    </script>
    @stack('custom-scripts')
</body>

</html>