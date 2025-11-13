<!-- app-header -->
<div class="app-header-area">
    <header class="app-header" id="header">
        <div class="app-header-inner">
            <div class="app-header-left">
                <div class="d-flex align-center gap-15">
                    <div class="app-header-element">
                        <a class="sidebar-toggle-bar" id="sidebarToggle" href="javascript:void(0);">
                            <div class="sidebar-menu-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <div class="app-header-ls-logo">
                        <!-- large screen logo -->
                        <a class="app-header-ls-dark-logo" href="index.html">
                            <img src="{{ asset('assets/images/logo/light-logo.png') }}" alt="image">
                        </a>
                        <a class="app-header-ls-light-logo" href="index.html">
                            <img src="{{ asset('assets/images/logo/web-logo.png') }}" alt="image">
                        </a>
                    </div>
                    <div class="app-header-mobile-logo">
                        <a class="app-header-dark-logo" href="index.html">
                            <img src="{{ asset('assets/images/logo/light-logo.png') }}" alt="image">
                        </a>
                        <a class="app-header-light-logo" href="index.html">
                            <img src="{{ asset('assets/images/logo/light-logo.png') }}" alt="image">
                            ` </a>
                    </div>
                </div>
            </div>
            <div class="app-header-right">
                <div class="app-header-switcher app-header-circle">
                    <div class="theme-switcher">
                        <i class="change-theme theme-button ri-sun-line"></i>
                    </div>
                </div>

                <div class="cursor-pointer app-header-fullscreen app-header-circle">
                    <div onclick="javascript:toggleFullScreen()">
                        <i class="ri-fullscreen-line"></i>
                    </div>
                </div>

                <div class="app-header-user">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="author">
                                <div class="author-thumb">
                                    <img src="{{ asset('assets/images/avatar/avatar-thumb-dummy.png') }}"
                                        alt="user">
                                </div>
                                <h6 class="author-name lh-1">HR Admin</h6>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="bd-user-info-list"><a href="app-user-account.html"><i
                                        class="ri-user-line"></i>Profile</a>
                            </li>
                            <li class="bd-user-info-list"><a href="app-user-billing.html"><i
                                        class="ri-bank-card-line"></i>Plans &amp; Billing</a></li>
                            <li class="bd-user-info-list"><a href="app-user-security.html"><i
                                        class="ri-settings-2-line"></i>Profile Settings</a></li>
                            <li class="bd-user-info-list">
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ri-logout-circle-line"></i> Logout
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="body__overlay"></div>
</div>
<!-- app-header -->
