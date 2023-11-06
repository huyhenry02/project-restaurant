@extends('customer.layout.main')
@section('content')
    <!-- Header  Inner style-->
    <section class="row final-inner-header">
        <div class="container">
            <h2 class="this-title">Our Restaurant</h2>
        </div>
    </section>
    <section class="row final-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Dinning</li>
            </ol>
        </div>
    </section>
    <!-- Header  Slider style-->
    <!-- Our Restaurant style-->

    <!-- Our Restaurant style-->
    <!-- Our Special Dinning-->
    <section class="our-special-wrapper">
        <section class="container clearfix common-pad">
            <div class="sec-header3">
                <h2>Our Special Dinning</h2>
                <h3>Pick a room that best suits your taste and budget</h3>
            </div>
            <p> Hãy thưởng thức món ăn ngon độc đáo tại nhà hàng chúng tôi. Chúng tôi tự hào mang đến cho bạn những hương vị tinh tế và sự kết hợp hoàn hảo của các thành phần chất lượng,
                đem đến một trải nghiệm ẩm thực đặc biệt và đáng nhớ  </p>
            <div class="row">
                <div class="our-spec-outer">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="item"><img src="images\gallery\m1.jpg" alt="" class="img-responsive">
                            <h2>Cháo ếch</h2>
                            <p>Cháo ếch - món ăn truyền thống với hương vị đặc biệt, chúng tôi tự hào mang đến cho bạn một tô cháo ếch thơm ngon,
                                thấm đượm gia vị, và có công thức riêng biệt để giữ nguyên hương vị truyền thống của món ăn này.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="item"><img src="images/gallery/m2.jpg" alt="" class="img-responsive">
                            <h2>Bún đậu mắm tôm</h2>
                            <p>Bún đậu mắm tôm - một món ăn truyền thống đậm đà và hấp dẫn, chúng tôi tự hào mang đến cho bạn một tô bún mềm mịn, phối hợp với đậu hũ thơm ngon,
                                rau xanh tươi mát và mắm tôm đặc trưng, tạo nên một hương vị tuyệt vời.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="item"><img src="images\gallery\m3.jpg" alt="" class="img-responsive">
                            <h2>Bún chả</h2>
                            <p>Bún chả - một món ăn đặc trưng của Hà Nội, chúng tôi tự hào mang đến cho bạn một tô bún mềm mịn kết hợp với chả thơm ngon và nước mắm chua ngọt đặc trưng.
                                Hương vị đậm đà và sự kết hợp hoàn hảo của các thành phần sẽ khiến bạn say mê từ lần đầu thưởng thức.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="item"><img src="images\gallery\m4.jpg" alt="" class="img-responsive">
                            <h2>Bánh mỳ</h2>
                            <p>Bánh mỳ - một món ăn thân quen và phổ biến trên khắp thế giới, chúng tôi tự hào mang đến cho bạn những chiếc bánh mỳ tươi ngon, với vỏ giòn tan và ruột mềm mịn. Với các lớp nhân đa dạng từ thịt, cá, rau củ và các loại
                                gia vị, bánh mỳ của chúng tôi sẽ khiến bạn thưởng thức một trải nghiệm ẩm thực đa sắc màu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Our Special Dinning-->
    <!-- Our Menu-->
    <section class="our-menu-wrapper container clearfix common-pad">
        <div class="sec-header">
            <h2>Our Menu</h2>
            <h3>Pick a table that best suits your taste and budget</h3>
        </div>
        <div class="our-menu-tab">
            <ul role="tablist" class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Breakfast</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Lunch</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Dinner</a></li>
            </ul>
            <!-- Tab panes-->
            <div class="myTabContent tab-content">
                <div id="home" role="tabpanel" class="tab-pane active">
                    <div class="tab-inner-cont"><img src="images\restaurant\6.jpg" alt="" class="img-responsive">
                        <p>Bữa sáng phục vụ từ 7h - 12h</p>
                        <div class="media">
                            <div class="media-left">
                                <h2>BÁNH MỲ</h2>
                                <p>Bánh mỳ, pate, thịt xá xíu, trứng, đồ chua</p>
                            </div>
                            <div class="media-right">
                                <p>30<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>PHỞ BÒ</h2>
                                <p>Phở, thịt bò, rau thơm, hành, nước dùng </p>
                            </div>
                            <div class="media-right">
                                <p>60<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>BÚN CHẢ</h2>
                                <p>Bún, chả thịt, chả miếng, cà rốt, su hào</p>
                            </div>
                            <div class="media-right">
                                <p>50<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>BÚN ĐẬU</h2>
                                <p>Bún, đậu rán, nem chả, mắm tôm, rau</p>
                            </div>
                            <div class="media-right">
                                <p>60<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border media-n-border">
                            <div class="media-left">
                                <h2>XÔI</h2>
                                <p>Xôi, thịt, trứng, pate, tương, dưa góp</p>
                            </div>
                            <div class="media-right">
                                <p>40<sup>đ</sup></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="profile" role="tabpanel" class="tab-pane fade">
                    <div class="tab-inner-cont"><img src="images\restaurant\6.jpg" alt="" class="img-responsive">
                        <p>Bữa trưa phục vụ từ 12h - 18h</p>
                        <div class="media">
                            <div class="media-left">
                                <h2>BÁNH MỲ</h2>
                                <p>Bánh mỳ, pate, thịt xá xíu, trứng, đồ chua</p>
                            </div>
                            <div class="media-right">
                                <p>30<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>PHỞ BÒ</h2>
                                <p>Phở, thịt bò, rau thơm, hành, nước dùng </p>
                            </div>
                            <div class="media-right">
                                <p>60<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>BÚN CHẢ</h2>
                                <p>Bún, chả thịt, chả miếng, cà rốt, su hào</p>
                            </div>
                            <div class="media-right">
                                <p>50<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>BÚN ĐẬU</h2>
                                <p>Bún, đậu rán, nem chả, mắm tôm, rau</p>
                            </div>
                            <div class="media-right">
                                <p>60<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border media-n-border">
                            <div class="media-left">
                                <h2>XÔI</h2>
                                <p>Xôi, thịt, trứng, pate, tương, dưa góp</p>
                            </div>
                            <div class="media-right">
                                <p>40<sup>đ</sup></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="messages" role="tabpanel" class="tab-pane fade">
                    <div class="tab-inner-cont"><img src="images\restaurant\6.jpg" alt="" class="img-responsive">
                        <p>Bữa tối phục vụ từ 18h - 22h</p>
                        <div class="media">
                            <div class="media-left">
                                <h2>BÁNH MỲ</h2>
                                <p>Bánh mỳ, pate, thịt xá xíu, trứng, đồ chua</p>
                            </div>
                            <div class="media-right">
                                <p>30<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>PHỞ BÒ</h2>
                                <p>Phở, thịt bò, rau thơm, hành, nước dùng </p>
                            </div>
                            <div class="media-right">
                                <p>60<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>BÚN CHẢ</h2>
                                <p>Bún, chả thịt, chả miếng, cà rốt, su hào</p>
                            </div>
                            <div class="media-right">
                                <p>50<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border">
                            <div class="media-left">
                                <h2>BÚN ĐẬU</h2>
                                <p>Bún, đậu rán, nem chả, mắm tôm, rau</p>
                            </div>
                            <div class="media-right">
                                <p>60<sup>đ</sup></p>
                            </div>
                        </div>
                        <div class="media media-border media-n-border">
                            <div class="media-left">
                                <h2>XÔI</h2>
                                <p>Xôi, thịt, trứng, pate, tương, dưa góp</p>
                            </div>
                            <div class="media-right">
                                <p>40<sup>đ</sup></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Menu-->
    <!-- Reserve a table-->
    <!-- <section class="our-table-wrapper">
       <div class="our-menu-wrapper container clearfix common-pad">
         <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <div class="our-table-cont">
               <h2>Đặt bàn</h2>
               <p>Hãy đặt bàn ngay hôm nay và khám phá thế giới hương vị đa dạng tại nhà hàng của chúng tôi.</p>
             </div>
           </div>
           <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
             <div class="table-form input_form">
               <form id="contactForm" action="contact_process.php" method="post">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <input placeholder="Ngày đặt" type="text" class="form-control datepicker-example8">
                 </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <input id="room" type="text" name="room" placeholder="Số lượng" class="form-control">
                 </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <input id="yname" type="text" name="yname" placeholder="Cho chúng tôi biết tên bạn.." class="form-control">
                 </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <input id="table" type="text" name="table" placeholder="Cho chúng tôi cách liên hệ với bạn" class="form-control">
                 </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <button type="submit" class="res-btn">Book now</button>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </section>-->
    <!-- Reserve a table-->
    <!-- Welcome banner  style-->
@endsection
