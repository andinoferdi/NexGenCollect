<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-equal">
                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                    <span class="svg-icon svg-icon-2hx">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                fill="black" />
                            <path opacity="0.3"
                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                fill="black" />
                        </svg>
                    </span>
                </button>
                <a href="{{ route('userpage') }}">
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-landing.svg') }}"
                        class="logo-default h-25px h-lg-30px" />
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-landing-dark.svg') }}"
                        class="logo-sticky h-20px h-lg-25px" />
                </a>
            </div>
            <div class="d-lg-block" id="kt_header_nav_wrapper">
                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                        id="kt_landing_menu">
                        <div class="menu-item">
                            <a class="menu-link nav-link {{ request()->is('/') ? 'active' : '' }} py-3 px-4 px-xxl-6"
                                href="{{ route('userpage') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Home</a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link nav-link {{ Request::is('how-it-works') ? 'active' : '' }} py-3 px-4 px-xxl-6"
                                href="#how-it-works" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">How it
                                Works</a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link nav-link {{ Request::is('achievements') ? 'active' : '' }} py-3 px-4 px-xxl-6"
                                href="#achievements" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Achievements</a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link nav-link {{ Request::is('team') ? 'active' : '' }} py-3 px-4 px-xxl-6"
                                href="#team" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Team</a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link nav-link {{ Request::is('portfolio') ? 'active' : '' }} py-3 px-4 px-xxl-6"
                                href="#portfolio" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Portfolio</a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link nav-link {{ Request::is('pricing') ? 'active' : '' }} py-3 px-4 px-xxl-6"
                                href="#pricing" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Pricing</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex-equal text-end ms-1">
                @if (auth()->check())
                    @php
                        $userRole = auth()->user()->role_id;
                    @endphp
                    @if ($userRole == 1 || $userRole == 3)
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click"
                            data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-dismiss="click" title="User profile">
                            <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('assets/media/avatars/blank.png') }}"
                                alt="image" class="rounded-circle" />
                        </div>

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo"
                                            src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('assets/media/avatars/blank.png') }}" />
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                            {{ auth()->user()->name }}
                                            <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">
                                                {{ auth()->user()->role->nama_role }}
                                            </span>
                                        </div>
                                        <a href="mailto:{{ auth()->user()->email }}"
                                            class="fw-bold text-muted text-hover-primary fs-7">
                                            {{ auth()->user()->email }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5 my-1">
                                <a href="{{ route('account_setting_user') }}" class="menu-link px-5">Account
                                    Settings</a>
                            </div>
                            <div class="menu-item px-5 my-1">
                                <a href="{{ route('verifikasi.indexuser') }}" class="menu-link px-5">Jadi
                                    Seniman</a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="{{ route('logout') }}" class="menu-link px-5"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign Out
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-success">Sign In</a>
                @endif
            </div>
        </div>
    </div>
</div>
