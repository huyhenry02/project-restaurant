<div id="sidebarMain" class="d-none">
    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">
                <div class="navbar-brand-wrapper justify-content-between">
                    <!-- Logo -->


                    <a class="navbar-brand" href="index.html" aria-label="Front">
                        <img class="navbar-brand-logo" src="/customer/images/logo/trang.png" alt="Logo" style="width: 70px; height: 80px">
                    </a>
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>

                <div class="navbar-vertical-content">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <li class="nav-item">
                            <small class="nav-subtitle" title="Pages">Pages</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

{{--                        <!-- User -->--}}
{{--                        <li class="navbar-vertical-aside-has-menu ">--}}
{{--                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:" title="Pages">--}}
{{--                                <i class="tio-pages-outlined nav-icon"></i>--}}
{{--                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Nhân viên</span>--}}
{{--                            </a>--}}

{{--                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link " href="{{route('show_list_employee.index')}}" title="Referrals">--}}
{{--                                        <span class="tio-circle nav-indicator-icon"></span>--}}
{{--                                        <span class="text-truncate">Danh sách</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link " href="{{route('show_create_employee.index')}}" title="Referrals">--}}
{{--                                        <span class="tio-circle nav-indicator-icon"></span>--}}
{{--                                        <span class="text-truncate">Thêm Nhân viên</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <!-- Customer -->
                        <!-- report -->
                        <li class="navbar-vertical-aside">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Báo cáo</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('show_report_sales.index') }}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Doanh số</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('show_report_reservations.index') }}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Đặt bàn</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('show_report_customers.index') }}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Khách hàng</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar-vertical-aside">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Khách hàng</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_list_customer.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Danh sách</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Message -->
                        <li class="navbar-vertical-aside">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Tin nhắn phản hồi</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_list_message.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Danh sách</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
{{--                        <!-- role -->--}}
{{--                        <li class="navbar-vertical-aside-has-menu ">--}}
{{--                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">--}}
{{--                                <i class="tio-pages-outlined nav-icon"></i>--}}
{{--                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Quyền</span>--}}
{{--                            </a>--}}

{{--                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link " href="{{route('show_list_role.index')}}" title="Referrals">--}}
{{--                                        <span class="tio-circle nav-indicator-icon"></span>--}}
{{--                                        <span class="text-truncate">Danh sách</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link " href="{{route('show_create_role.index')}}" title="Referrals">--}}
{{--                                        <span class="tio-circle nav-indicator-icon"></span>--}}
{{--                                        <span class="text-truncate">Thêm Quyền</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <!-- facility -->--}}
{{--                        <li class="navbar-vertical-aside-has-menu ">--}}
{{--                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">--}}
{{--                                <i class="tio-pages-outlined nav-icon"></i>--}}
{{--                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Cơ sở vật chất</span>--}}
{{--                            </a>--}}

{{--                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link " href="{{route('show_list_facility.index')}}" title="Referrals">--}}
{{--                                        <span class="tio-circle nav-indicator-icon"></span>--}}
{{--                                        <span class="text-truncate">Danh sách</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link " href="{{route('show_create_facility.index')}}" title="Referrals">--}}
{{--                                        <span class="tio-circle nav-indicator-icon"></span>--}}
{{--                                        <span class="text-truncate">Thêm Cơ sở vật chất</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <!-- menu -->
                        <li class="navbar-vertical-aside">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Menu</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_list_menu.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Danh sách</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_create_menu.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Thêm món ăn</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- order -->
                        <li class="navbar-vertical-aside">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Hóa đơn</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_list_order.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Danh sách</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_create_order.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Thêm Hóa đơn</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- reservation -->
                        <li class="navbar-vertical-aside">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Đơn đặt bàn</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_list_reservation.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Danh sách</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- table -->
                        <li class="navbar-vertical-aside">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Loại Bàn</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_list_table_type.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Danh sách</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_create_table_type.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Thêm Loại Bàn</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- table item -->
                        <li class="navbar-vertical-aside">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "  title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Bàn</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_list_table.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Danh sách</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('show_create_table.index')}}" title="Referrals">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Thêm Bàn</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </aside>
</div>


<div id="sidebarCompact" class="d-none">
    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-brand d-flex justify-content-center">
                <!-- Logo -->


                <a class="navbar-brand" href="index.html" aria-label="Front">
                    <img class="navbar-brand-logo-short" src="/frontend/assets\svg\logos\logo-short.svg" alt="Logo">
                </a>

                <!-- End Logo -->
            </div>

        </div>
    </aside>
</div>

