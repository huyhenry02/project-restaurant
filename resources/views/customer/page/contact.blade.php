@extends('customer.layout.main')
@section('content')
    <!-- Header  Inner style-->
    <section class="row final-inner-header">
        <div class="container">
            <h2 class="this-title">Contact us</h2>
        </div>
    </section>
    <section class="row final-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{route('show_home.index')}}">Trang chủ</a></li>
                <li class="active">Liên lạc</li>
            </ol>
        </div>
    </section>
    <!-- Header  Slider style-->
    <!-- Booking style-->
    <section class="container clearfix common-pad booknow">
        <div class="sec-header">
            <h2>Gửi 1 tin nhắn</h2>
            <h3>Chọn một chiếc bàn phù hợp nhất với sở thích và ngân sách của bạn</h3>
        </div>
        <div class="row nasir-contact">
            <div class="col-md-8">
                <div class="book-left-content input_form">
                    <form id="contactForm" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12"><span>Tên của bạn</span>
                                <input id="name" type="text" name="name" placeholder="Tên bạn" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12"><span>Địa chỉ email</span>
                                <input id="email" type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span>Chủ đề </span>
                                <input id="subject" type="text" name="subject" placeholder="Chủ đề bạn muốn nói đến...." class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span>Lời nhắn của bạn </span>
                                <textarea id="message" rows="6" name="message" placeholder="...." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" value="submit now" class="res-btn">Gửi ngay</button>
                            </div>
                        </div>
                    </form>
                    <div id="success">
                        <p>Tin nhắn đã được gửi thành công.</p>
                    </div>
                    <div id="error">
                        <p>Có gì đó lỗi. Tin nhắn không thể gửi!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <h2>Thông tin liên lạc</h2>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-map-marker"></i></div>
                        <div class="media-contact-info">
                            <p>79, Hồ Tùng Mậu, Cầu Giấy, Hà Nội, Việt Nam</p>
                        </div>
                    </div>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-envelope-o"></i></div>
                        <div class="media-contact-info">
                            <p><a href="mailto:Info@Resorthotel.Com">nhom05@gmail.com</a><br><a href="mailto:support@Resorthotel.Com">support@Resorthotel.Com</a></p>
                        </div>
                    </div>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-phone"></i></div>
                        <div class="media-contact-info">
                            <p>
                                Thứ 2 đến Thứ 6 : 8.00am to 5.00 pm<br>
                                Thứ 7 : 8.00am to 3.00 pm<br>
                                Chủ nhật : <span>closed</span>
                            </p>
                        </div>
                    </div>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="icon icon-Timer"></i></div>
                        <div class="media-contact-info">
                            <p><a href="tel:999 10101010<"><i>+ 999 10101010</i></a><br><a href="tel:999 10101010<"><i>+ 999 10101010</i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Booking style-->
    <!-- TT-CONTACT-MAP-->
    <div id="map-canvas" data-lat="51.477254" data-lng="-0.026888" data-zoom="14" class="tt-contact-map map-block"></div>
    <div class="addresses-block"><a data-lat="51.477254" data-marker="images/marker.png" data-lng="-0.026888" data-string="1. Here is some address or email or phone or something else..."></a></div>
    <!-- Welcome banner  style-->
@endsection
