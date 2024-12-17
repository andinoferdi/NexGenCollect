<div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
    <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
        <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10"
            id="kt_aside_logo">
            <a href="{{ route('dashboard') }}">
                <img alt="Logo" src="{{ asset('assets/media/logos/favico.png') }}" class="h-55px" />
            </a>
        </div>
        <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0"
            id="kt_aside_nav">
            <div class="hover-scroll-y mb-10" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_nav"
                data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="0px">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
                        data-bs-dismiss="click" title="Menu">
                        <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light"
                            data-bs-toggle="tab" href="#kt_aside_nav_tab_menu">
                            <i class="fas fa-th-large fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
            <div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
                <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-overflow="true"
                    data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-dismiss="click" title="User profile">
                    <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('assets/media/avatars/blank.png') }}"
                        alt="image" />
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
                        <a href="{{ route('account_setting') }}" class="menu-link px-5">Account Settings</a>
                    </div>
                    <div class="menu-item px-5">
                        <a href="{{ route('logout') }}" class="menu-link px-5"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign Out
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="aside-secondary d-flex flex-row-fluid">
        <div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
            <div class="d-flex h-100 flex-column">
                <div class="flex-column-fluid hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true"
                    data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_wordspace"
                    data-kt-scroll-dependencies="#kt_aside_secondary_footer" data-kt-scroll-offset="0px">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="kt_aside_nav_tab_menu" role="tabpanel">
                            <div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0"
                                id="kt_aside_menu" data-kt-menu="true">
                                <div id="kt_aside_menu_wrapper" class="menu-fit">
                                    <div class="menu-item">
                                        <div class="menu-content pb-2">
                                            <span
                                                class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}"
                                            href="{{ route('dashboard') }}">
                                            <span class="menu-icon">
                                                <i class="fas fa-tachometer-alt"></i>
                                            </span>
                                            <span class="menu-title">Dashboard</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->is('dashboard/userpage') ? 'active' : '' }}"
                                            href="{{ route('userpage') }}">
                                            <span class="menu-icon">
                                                <i class="fas fa-home"></i>
                                            </span>
                                            <span class="menu-title">Landing Page</span>
                                        </a>
                                    </div>
                                    @php
                                        $role_id = auth()->user()->role_id;
                                        $menus = App\Models\Menu::whereHas('settingMenus', function ($query) use (
                                            $role_id,
                                        ) {
                                            $query->where('role_id', $role_id);
                                        })->get();
                                    @endphp
                                    @foreach ($menus as $menu)
                                        <div data-kt-menu-trigger="click"
                                            class="menu-item menu-accordion {{ request()->is('dashboard/*') ? 'menu-active' : '' }}">
                                            <span
                                                class="menu-link {{ request()->is('dashboard/*') ? 'active' : '' }}">
                                                <span class="menu-icon">
                                                    <i class="{{ $menu->icon_menu }}"></i>
                                                </span>
                                                <span class="menu-title">{{ $menu->nama_menu }}</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            @if ($menu->submenus->count() > 0)
                                                <div
                                                    class="menu-sub menu-sub-accordion {{ request()->is('dashboard/*') ? 'menu-active-bg' : '' }}">
                                                    @foreach ($menu->submenus as $submenu)
                                                        @php
                                                            $hasAccess = App\Models\SettingSubmenu::where(
                                                                'role_id',
                                                                $role_id,
                                                            )
                                                                ->where('menu_id', $menu->id)
                                                                ->where('submenu_id', $submenu->id)
                                                                ->exists();
                                                        @endphp
                                                        @if ($hasAccess)
                                                            <div class="menu-item">
                                                                <a class="menu-link {{ request()->is('dashboard/' . $submenu->link_submenu) ? 'active' : '' }}"
                                                                    href="{{ url('dashboard/' . $submenu->link_submenu) }}">
                                                                    <span class="menu-bullet">
                                                                        <span class="bullet bullet-dot"></span>
                                                                    </span>
                                                                    <span
                                                                        class="menu-title">{{ $submenu->nama_submenu }}</span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button
        class="btn btn-sm btn-icon bg-body btn-color-gray-700 btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex"
        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
        data-kt-toggle-name="aside-minimize" style="margin-bottom: 1.35rem">
        <i class="fas fa-chevron-left rotate-180"></i>
    </button>
</div>
