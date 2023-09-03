<script src="{{asset('assets/emp/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/emp/js/sidebarmenu.js')}}"></script>
<style>
    .sidebar-nav {
        padding: 0px 24px;
    }
    .sidebar-nav ul .sidebar-item .sidebar-link {
        color: #2a3547;
        display: flex;
        font-size: 14px;
        /*white-space: nowrap;*/
        align-items: center;
        line-height: 25px;
        position: relative;
        margin: 0 0 2px;
        padding: 10px;
        border-radius: 7px;
        gap: 15px;
        text-decoration: none;
        font-weight: 600;
    }
    .sidebar-nav ul .sidebar-item .sidebar-link:hover {
        color: #fff !important;
        background: linear-gradient(135deg, #FD7E30 0%, #FDBF18 77.08%) !important;
        box-shadow: 0px 6px 12px 0px rgba(253, 126, 48, 0.40) !important;
    }
    .sidebar-nav ul .sidebar-item.active {
        border-radius: 7px;
        background: linear-gradient(135deg, #FD7E30 0%, #FDBF18 77.08%) !important;
        box-shadow: 0px 6px 12px 0px rgba(253, 126, 48, 0.40) !important;
    }
    .sidebar-nav ul .sidebar-item.active .sidebar-link {
        font-size: 14px;
        color: #fff !important;
    }
    .sidebar-nav ul .sidebar-item.selected > .sidebar-link.active, .sidebar-nav ul .sidebar-item > .sidebar-link.active {
        color: #fff !important;
        background: linear-gradient(135deg, #FD7E30 0%, #FDBF18 77.08%) !important;
        box-shadow: 0px 6px 12px 0px rgba(253, 126, 48, 0.40) !important;
    }

    .collapse.in {
        display: block
    }

    .sidebar-nav .has-arrow {
        position: relative
    }

    .sidebar-nav .has-arrow::after {
        position: absolute;
        content: "";
        width: 7px;
        height: 7px;
        border-width: 1px 0 0 1px;
        border-style: solid;
        border-color: #2a3547;
        margin-left: 10px;
        -webkit-transform: rotate(135deg) translate(0, -50%);
        -ms-transform: rotate(135deg) translate(0, -50%);
        -o-transform: rotate(135deg) translate(0, -50%);
        transform: rotate(135deg) translate(0, -50%);
        -webkit-transform-origin: top;
        -ms-transform-origin: top;
        -o-transform-origin: top;
        transform-origin: top;
        top: 22px;
        right: 15px;
        -webkit-transition: all .3s ease-out;
        -o-transition: all .3s ease-out;
        transition: all .3s ease-out
    }

    .sidebar-nav .has-arrow[aria-expanded=true]::after, .sidebar-nav li.active > .has-arrow::after, .sidebar-nav li > .has-arrow.active::after {
        top: 18px;
        margin-top: 1px;
        border-color: #fff;
        -webkit-transform: rotate(-135deg) translate(0, -50%);
        -ms-transform: rotate(-135deg) translate(0, -50%);
        -o-transform: rotate(-135deg) translate(0, -50%);
        transform: rotate(-135deg) translate(0, -50%)
    }

    .sidebar-nav #sidebarnav > .sidebar-item .first-level {
        padding: 10px;
        border-radius: 7px;
        animation: menuDropdownShow .3s ease-in-out;
        transition: background-color .3s
    }



    .sidebar-nav #sidebarnav > .sidebar-item .first-level .sidebar-item > .sidebar-link .sidebar-icon {
        margin-right: 0;
        margin-left: 0;
        flex-shrink: 0
    }

    .sidebar-nav #sidebarnav > .sidebar-item .first-level .sidebar-item .sidebar-link {
        font-size: 14px;
        gap: 10px
    }

    .sidebar-nav #sidebarnav > .sidebar-item .first-level .sidebar-item .sidebar-link:hover {
        background-color: rgba(93, 135, 255, .1);
        color: #5d87ff
    }

    .sidebar-nav #sidebarnav > .sidebar-item .first-level .sidebar-item .sidebar-link .ti {
        font-size: 16px
    }

    .sidebar-nav #sidebarnav > .sidebar-item .first-level .sidebar-item:last-child {
        margin-bottom: 0
    }

    .sidebar-nav #sidebarnav > .sidebar-item > .has-arrow:after {
        transform: rotate(-135deg) translate(0, -50%);
        right: 9px;
    }

    .sidebar-nav #sidebarnav > .sidebar-item:last-child > .first-level {
        right: 0;
        left: auto
    }

    .sidebar-nav #sidebarnav > .sidebar-item > .two-column + .first-level {
        width: 400px
    }

    .sidebar-nav #sidebarnav > .sidebar-item > .two-column + .first-level > .sidebar-item {
        float: left;
        vertical-align: top;
        width: 50%
    }
    .sidebar-nav ul .sidebar-item .two-level .sidebar-item .sidebar-link {
        padding: 8px 10px 8px 45px
    }

    /* Mobile view by default */
    @media (max-width: 991.98px) {
        .sidebar-nav {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
            width: 250px;
            overflow-y: auto;
        }

        .sidebar-nav.show-sidebar {
            transform: translateX(0);
        }

    }

</style>
<nav class="sidebar-nav scroll-sidebar mt-4" data-simplebar="">
    <ul id="sidebarnav">
        <!-- Mobile Logo -->
        <li class="sidebar-item mobile-logo">
            <img src="{{asset('assets/emp/images/logos/new_logo.png')}}" alt="Logo" width="100">
        </li>


        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-home" style="font-size: 22px"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                <span>
                    <i class="ti ti-users" style="font-size: 22px"></i>
                </span>
                <span class="hide-menu">User Management</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a href="{{ route('users.index') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('roles.index')}}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Role</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('ticket.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-ticket" style="font-size: 22px"></i>
                </span>
                <span class="hide-menu">Request Counselor</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('timemodule.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-package" style="font-size: 22px"></i>
                </span>
                <span class="hide-menu">Counselling Hours Package</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('event.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-calendar-event" style="font-size: 22px"></i>
                </span>
                <span class="hide-menu">Workshop and Team bounding</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                <span>
                    <i class="ti ti-settings" style="font-size: 22px"></i>
                </span>
                <span class="hide-menu">Setting</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a href="{{ route('settings') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">System Settings</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
