@php
    // Check if any of the submenu routes under "System Management" are active
    $hrActive =
        request()->routeIs('admin.dashboard.*') ||
        request()->routeIs('admin.card.users.*');
@endphp
<!-- Start app-sidebar -->
<aside class="sticky app-sidebar" id="sidebar">
    <!-- start app-sidebar-header -->
    <div class="app-sidebar-header">
        <a href="index.html" class="desktop-logo">
            <img src="{{ asset('assets/images/logo/web-logo.png') }}" alt="image">
        </a>
        <a href="index.html" class="desktop-dark">
            <img src="{{ asset('assets/images/logo/light-logo.png') }}" alt="image">
        </a>
    </div>
    <!-- end app-sidebar-header -->

    <!-- start app-sidebar-wrapper -->
    <div class="app-sidebar-wrapper" id="sidebar-scroll" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px -12px -80px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                        style="height: 100%; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px 12px 80px;">
                            <nav class="app-sidebar-menu-wrapper nav flex-column sub-open">
                                <div class="sidebar-left" id="sidebar-left"></div>
                                <ul class="app-sidebar-main-menu">
                                    <li class="sidebar-menu-category"><span class="category-name">Main</span>
                                    </li>
                                    <li class="slide">
                                        <a href="{{ route('admin.dashboard') }}"
                                            class="sidebar-menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                            <div class="side-menu-icon">
                                                <i class="ti ti-layout-dashboard"></i>
                                            </div>
                                            <span class="sidebar-menu-label">Dashboard</span>
                                        </a>
                                    </li>

                                    <li class="slide">
                                        <a href="{{ route('admin.cards.index') }}"
                                            class="sidebar-menu-item {{ request()->routeIs('admin.cards.index') ? 'active' : '' }}">
                                            <div class="side-menu-icon">
                                                <i class="ti ti-qrcode"></i>
                                            </div>
                                            <span class="sidebar-menu-label">Generate Cards</span>
                                        </a>
                                    </li>

                                    <li class="slide">
                                        <a href="{{ route('admin.users.index') }}"
                                            class="sidebar-menu-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                                            <div class="side-menu-icon">
                                                <i class="ti ti-qrcode"></i>
                                            </div>
                                            <span class="sidebar-menu-label">Users</span>
                                        </a>
                                    </li>

                                    {{-- HR Management --}}
                                    {{-- <li class="slide has-sub {{ $hrActive ? 'open' : '' }}">
                                        <a href="javascript:void(0);"
                                            class="sidebar-menu-item {{ $hrActive ? 'active' : '' }}">
                                            <div class="side-menu-icon">
                                                <i class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21 19H23V21H1V19H3V4C3 3.44772 3.44772 3 4 3H14C14.5523 3 15 3.44772 15 4V19H19V11H17V9H20C20.5523 9 21 9.44772 21 10V19ZM5 5V19H13V5H5ZM7 11H11V13H7V11ZM7 7H11V9H7V7Z"></path></svg>
                                                </i>
                                            </div>
                                            <span class="sidebar-menu-label">Cards Management</span>
                                            <i class="ri-arrow-down-s-fill side-menu-angle"></i>
                                        </a>

                                        <ul class="sidebar-menu child1"
                                            style="display: {{ $hrActive ? 'block' : 'none' }};">
                                            <li class="slide">
                                                <a href="{{ route('admin.cards.index') }}"
                                                    class="sidebar-menu-item {{ request()->routeIs('admin.cards.*') ? 'active' : '' }}">
                                                    Generate Cards
                                                </a>
                                            </li>

                                            <li class="slide">
                                                <a class="sidebar-menu-item" href="#">Lead Contact</a>
                                            </li>
                                            <li class="slide">
                                                <a class="sidebar-menu-item" href="#">Expense</a>
                                            </li>
                                            <li class="slide">
                                                <a class="sidebar-menu-item" href="#">Assets</a>
                                            </li>
                                            <li class="slide">
                                                <a class="sidebar-menu-item" href="#">Media Library</a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>
                                <div class="sidebar-right" id="sidebar-right"></div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 259px; height: 270px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar"
                style="width: 0px; transform: translate3d(0px, 0px, 0px); display: none;">
            </div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar simplebar-visible"
                style="height: 0px; transform: translate3d(0px, 13px, 0px); display: none;"></div>
        </div>
    </div>
    <!-- end app-sidebar-wrapper -->
</aside>
<div class="app-offcanvas-overlay"></div>
<!-- end app-sidebar -->
