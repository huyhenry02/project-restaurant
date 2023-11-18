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
                <li><a href="index.html">Home</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
    </section>
    <!-- Header  Slider style-->
    <!-- Booking style-->
    <section class="container clearfix common-pad booknow">
        <div class="sec-header">
            <h2>Login</h2>
            <h3>Please log in to receive more offers</h3>
        </div>
        <div class="row nasir-contact">
            <div class="col-md-8">
                <div class="book-left-content input_form">
                    <form id="contactForm" action="{{route('login_customer.post')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span> Địa chỉ email </span>
                                <input id="email" type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span>Mật khẩu </span>
                                <input id="subject" type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" value="submit now" class="res-btn">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                    <div id="success">
                        <p>Your message sent successfully.</p>
                    </div>
                    <div id="error">
                        <p>Something is wrong. Message cant be sent!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <h2>Contact Info</h2>
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
                            <p>Monday to Friday : 8.00am to 5.00 pm<br>                                  Saturday : 8.00am to 3.00 pm<br>                                  Sunday : <span>closed</span></p>
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
@endsection
