<!-- .hidden-bar-->
<section id="sidebarCollapse" class="side-menu">
    <button type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-expanded="false" aria-controls="sidebarCollapse" class="close-button"><i class="fa fa-times"></i></button>

    <h3 class="title playball-font">Chào mừng đến với Nhà hàng</h3>

    <!-- /.side-menu-widget-->
    <div class="side-menu-widget gallery-widget">
        <div class="title-box">
            <h4>Từ Bộ Sưu Tập Của Chúng Tôi</h4><span class="decor-line inline"></span>
        </div>
        <!-- /.title-box-->
        <ul class="list-inline">
            <li><a href="#"><img src="/customer/images/gallery/c1.jpg" alt="Hình Ảnh Tuyệt Vời"></a></li>
            <li><a href="#"><img src="/customer/images/gallery/c3.jpg" alt="Hình Ảnh Tuyệt Vời"></a></li>
            <li><a href="#"><img src="/customer/images/gallery/k2.jpg" alt="Hình Ảnh Tuyệt Vời"></a></li>
            <li><a href="#"><img src="/customer/images/gallery/i3.jpg" alt="Hình Ảnh Tuyệt Vời"></a></li>
            <li><a href="#"><img src="/customer/images/gallery/s1.jpg" alt="Hình Ảnh Tuyệt Vời"></a></li>
            <li><a href="#"><img src="/customer/images/gallery/s2.jpg" alt="Hình Ảnh Tuyệt Vời"></a></li>
            <li><a href="#"><img src="/customer/images/gallery/r3.jpg" alt="Hình Ảnh Tuyệt Vời"></a></li>
            <li><a href="#"><img src="/customer/images/gallery/v1.jpg" alt="Hình Ảnh Tuyệt Vời"></a></li>
        </ul>
        <!-- /.list-inline-->
        <ul class="contact-info">
            <li>nhom04@gmail.com</li>
            <li>+84 999 10101010</li>
        </ul>
        <!-- /.contact-info-->
    </div>
    <!-- /.side-menu-widget-->
    <div class="side-menu-widget subscribe-widget">
    </div>
</section>
<!-- /.side-menu-->
<section class="top-bar dhomev">
    <div class="container">
        <div class="pull-left left-infos contact-infos">
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-phone"></i> (+84) 999 101010</a></li>
                <!--comment for inline hack
                -->
                <li><a href="#"><i class="fa fa-map-marker"></i> 79, Hồ Tùng Mậu, Cầu Giấy, Hà Nội</a></li>
                <!--comment for inline hack
                -->
                <li><a href="#"><i class="fa fa-envelope"></i> nhom04@gmail.com</a></li>
            </ul>
        </div>
        <!-- /.pull-left left-infos-->
        <div class="pull-right right-infos link-list">
            @if(Auth::guard('customer')->check())
                <ul class="list-inline">
                    <li><a href="{{route('show_history_reservation.index')}}">{{Auth::guard('customer')->user()->name}}</a></li>
                    <li><a href="{{route('logout_customer.post')}}">Đăng xuất</a></li>
                </ul>
            @else
                <ul class="list-inline">
                    <li><a href="{{route('show_login_customer.index')}}">Đăng nhập</a></li>
                    <li><a href="{{route('show_register_customer.index')}}">Đăng ký</a></li>
                </ul>
            @endif
        </div>
        <!-- /.pull-right right-infos link-list-->
    </div>
    <!-- /.container-->
</section>
<!-- /.top-bar-->
<nav id="main-navigation-wrapper" class="navbar navbar-default _fixed-header _light-header stricky">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false"
                    class="navbar-toggle collapsed"><span class="sr-only">Chuyển đổi điều hướng</span><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a href="{{route('show_home.index')}}" class="navbar-brand"><img alt="Hình Ảnh Tuyệt Vời" src="/customer/images/logo/den.png"></a>
        </div>
        <div id="main-navigation" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('show_home.index')}}"> Trang Chủ </a></li>
                <li><a href="{{route('show_about_us.index')}}"> Về Chúng Tôi </a></li>
                <li><a href="{{route('show_our_table.index')}}"> Bàn </a></li>
                <!--<li><a href="gallery1.html">Thư viện</a></li>-->
                <li><a href="{{route('show_our_restaurant.index')}}">Thực đơn</a></li>
                <li><a href="{{route('show_offer.index')}}">Ưu Đãi</a></li>
                <li><a href="{{route('show_book.index')}}">Đặt Chỗ</a></li>
                <li><a href="{{route('show_contact.index')}}">Liên Hệ</a></li>
            </ul>
            <!-- /.nav navbar-right-->
        </div>
    </div>
</nav>
<!-- Header  Slider style-->
