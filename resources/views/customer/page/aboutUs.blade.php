@extends('customer.layout.main')
@section('content')
    <!-- About Resort style-->
    <section class="container clearfix common-pad-inner about-info-box">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="sec-header3">
                    <h2>Nhà hàng của chúng tôi</h2>
                    <h3>Ẩm thực DÉLICAT - Tính tế trong từng phút giây</h3>
                </div>
                <p>Chào mừng đến với nhà hàng của chúng tôi - một điểm đến ẩm thực tuyệt vời cho những người yêu thích hương vị tinh tế và không gian sang trọng.
                    Với không gian thiết kế đẹp mắt, dịch vụ chuyên nghiệp và đa dạng món ăn độc đáo, chúng tôi cam kết mang đến cho khách hàng một trải nghiệm ẩm thực đáng nhớ.</p>
            </div>
        </div>
        <div class="row rest-pad">
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="rest-content">
                    <h2>Sự yên bình giữa lòng thủ đô</h2>
                    <p>Hãy đến và khám phá nhà hàng của chúng tôi, nơi bạn sẽ tận hưởng những trải nghiệm ẩm thực độc đáo và thú vị, và để chúng tôi mang đến cho bạn một trải nghiệm ẩm thực tuyệt vời không thể quên.</p>
                    <ul>
                        <li>Phong cách hiện đại, tối giản</li>
                        <li>Cây xanh ở khắp mọi nơi</li>
                        <li>Mọi bữa ăn đều chỉnh chu, ngon miệng </li>
                        <li>Đội ngũ nhân viên chuyên nghiệp</li>
                        <li>Có thể đáp ứng mọi khẩu vị của bạn</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-xs-12"><img src="images\restaurant\1.jpg" alt="" class="img-responsive"></div>
        </div>
    </section>
    <!--  -->
    <section class="container clearfix common-pad about-info-box">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="sec-header3">
                    <h2>Về nhà hàng</h2>
                    <h3>Ẩm thực DÉLICAT - Tính tế trong từng phút giây</h3>
                </div>
                <p>Nhà hàng chúng tôi là một điểm đến lý tưởng cho những ai tìm kiếm một trải nghiệm ẩm thực đẳng cấp và sang trọng.
                    Đội ngũ nhân viên phục vụ của chúng tôi luôn sẵn lòng tạo ra một trải nghiệm tuyệt vời cho quý khách. Họ được đào tạo chuyên nghiệp và am hiểu về ẩm thực cao cấp, đồng thời mang đến dịch vụ tận tâm và chu đáo để đáp ứng mọi yêu cầu và mong đợi của quý khách.</p>
                <h6>Chúng tôi tự hào mang đến cho khách hàng những món ăn đa dạng và chất lượng cao, từ các món khai vị hấp dẫn cho đến các món chính đậm đà và hấp dẫn, và không thể thiếu những món tráng miệng ngọt ngào và tinh tế. Hãy đến và trải nghiệm một bữa ăn đẳng cấp tại nhà hàng sang trọng của chúng tôi. Chúng tôi cam kết mang đến cho quý khách một trải nghiệm ẩm thực đáng nhớ, từ không gian lịch sự cho đến món ăn tuyệt hảo và dịch vụ chuyên nghiệp.</h6>
            </div>
            <div class="col-sm-4 hidden-xs">
                <div class="img-cap-effect">
                    <div class="img-box"><img src="images\about\about2.jpg" alt="">
                        <div class="img-caption"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Resort style-->
    <!-- Our Resort Values style-->
    <section class="clearfix news-wrapper">
        <div class="container clearfix common-pad">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 our-resort-value hidden-xs">
                    <div class="img-l-box"><img src="images\about\service.jpg" width="230" alt=""></div>
                    <div class="img-r-box">
                        <div class="img-box1"><img src="images\about\veget.jpg" alt=""></div>
                        <div class="img-box2"><img src="images\about\meal.jpg" alt=""></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="resort-r-value">
                        <div class="sec-header sec-header-pad">
                            <h2>Giá trị cốt lõi</h2>
                            <h3>Chọn một chiếc bàn phù hợp nhất với sở thích và ngân sách của bạn</h3>
                        </div>
                        <div class="accordian-area">
                            <div id="accordion" role="tablist" aria-multiselectable="true" class="panel-group">
                                <div class="panel panel-default">
                                    <div id="headingOne" role="tab" class="panel-heading">
                                        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed"><span>An toàn</span><i class="fa fa-minus"></i><i class="fa fa-plus"></i></a></h4>
                                    </div>
                                    <div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" class="panel-collapse collapse">
                                        <div class="panel-body faq-content">
                                            <p> Với tâm niệm mong muốn bảo vệ sức khỏe của khách hàng, chúng tôi luôn luôn đề cao vấn đề an toàn thực phẩm ở mọi công đoạn từ lựa chọn và bảo quản nguyên liệu,
                                                quá trình chế biến món ăn đến khi thành phẩm. Nhà hàng rất chặt chẽ trong khâu nhập nguyên liệu. Nhà Hàng không chỉ nhập những loại rau đảm bảo tiêu chuẩn rau sạch, hải sản đảm bảo tươi sống và có nguồn gốc rõ ràng,
                                                mà với hải sản nhập cấp đông luôn được lấy mẫu kiểm định trước khi nhập vào.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div id="headingTwo" role="tab" class="panel-heading">
                                        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Chất lượng<i class="fa fa-minus"></i><i class="fa fa-plus"></i></a></h4>
                                    </div>
                                    <div id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" class="panel-collapse collapse in">
                                        <div class="panel-body faq-content">
                                            <p>Chúng tôi luôn không ngừng tìm tòi, học hỏi, cập nhật để hoàn thiện và nâng cao chất lượng từng món ăn, nâng cao chất lượng và sự khoa học trong thiết kế thực đơn bữa ăn. Đồng thời, chúng tôi còn chú trọng đến việc nâng cao chất lượng các loại hình dịch vụ Nhà Hàng mà cung cấp.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div id="headingThree" role="tab" class="panel-heading">
                                        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsed">Chuyên nghiệp<i class="fa fa-minus"></i><i class="fa fa-plus"></i></a></h4>
                                    </div>
                                    <div id="collapseThree" role="tabpanel" aria-labelledby="headingThree" class="panel-collapse collapse">
                                        <div class="panel-body faq-content">
                                            <p>Sự chuyên nghiệp là một trong những giá trị chúng tôi tự tin và tự hào nhất. Chúng tôi sở hữu một đội ngũ nhân viên giàu kinh nghiệm và đã qua đào tạo chuyên sâu, bao gồm các chuyên gia tư vấn về ẩm thực, đầu bếp, nhân viên phục vụ… Tập thể nhân viên nhà hàng luôn sẵn sàng cống hiến hết mình để có thể cung cấp những dịch vụ tốt nhất,
                                                chuyên nghiệp nhất đến khách hàng.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="take-a-tour-video-box">
        <div class="check-video-box">
            <div class="img-holder">
                <img src="images/about/video-overlay.jpg" alt="">
                <div class="content">
                    <div class="content-inner">
                        <div class="box">
                            <h3>Đặt Món Ngay</h3>
                            <a href="images/about/video1.jpg" class="fancybox"><i class="icon icon-Play"></i></a>
                            <h4>trải nghiệm nhà hàng đẳng cấp của chúng tôi</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Giới Thiệu Nhà Hàng -->

    <!-- Khách Hàng Đánh Giá -->
    <section class="container clearfix common-pad testimonials-sec">
        <div class="sec-header">
            <h2>Đánh Giá Từ Khách Hàng</h2>
            <h3>Chọn bàn ăn phù hợp với phong cách và ngân sách của bạn</h3>
        </div>
        <div class="testimonials-wrapper">
            <div class="testimonial-sliders">
                <div class="item">
                    <div class="test-cont">
                        <p>"Trải nghiệm tại nhà hàng này thật tuyệt vời. Thực đơn phong phú, món ăn ngon miệng và phục
                            vụ chuyên nghiệp. Không gian thoáng đãng, rộng rãi. Tôi chắc chắn sẽ quay lại."</p>
                    </div>
                    <div class="test-bot">
                        <div class="tst-img"><img src="images/testimonials/1.png" alt="" class="img-responsive"></div>
                        <div class="client_name">
                            <h5><a href="testimonials.html">Edogawa Conan - <span>Thần chết</span></a></h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="test-cont">
                        <p>"Nhà hàng này thực sự đáng ghé thăm. Món ăn tươi ngon, chế biến tinh tế. Nhân viên tận tâm,
                            không gian ấm cúng, lý tưởng để thư giãn."</p>
                    </div>
                    <div class="test-bot">
                        <div class="tst-img"><img src="images/testimonials/2.png" alt="" class="img-responsive"></div>
                        <div class="client_name">
                            <h5><a href="testimonials.html">Mori Ran - <span>Võ sĩ</span></a></h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="test-cont">
                        <p>"Một bữa tối hoàn hảo tại nhà hàng này. Dịch vụ tận tình, món ăn từ nguyên liệu tươi ngon,
                            trình bày đẹp mắt. Lý tưởng cho những dịp đặc biệt."</p>
                    </div>
                    <div class="test-bot">
                        <div class="tst-img"><img src="images/testimonials/3.png" alt="" class="img-responsive"></div>
                        <div class="client_name">
                            <h5><a href="testimonials.html">Haibara Ai - <span>Bác sĩ</span></a></h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="test-cont">
                        <p>"Món ăn đa dạng, phục vụ tận tâm, không gian sáng sủa. Một trải nghiệm đáng nhớ và sẽ giới
                            thiệu cho bạn bè."</p>
                    </div>
                    <div class="test-bot">
                        <div class="tst-img"><img src="images/testimonials/4.png" alt="" class="img-responsive"></div>
                        <div class="client_name">
                            <h5><a href="testimonials.html">Kuroba Kaito - <span>Siêu trộm</span></a></h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="test-cont">
                        <p>"Nhà hàng gây ấn tượng mạnh với tôi. Hương vị độc đáo, không gian sang trọng và đội ngũ nhân
                            viên tận tình. Sẽ quay lại trong tương lai!"</p>
                    </div>
                    <div class="test-bot">
                        <div class="tst-img"><img src="images/testimonials/5.png" alt="" class="img-responsive"></div>
                        <div class="client_name">
                            <h5><a href="testimonials.html">Mori Kogoro - <span>Thám tử</span></a></h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
