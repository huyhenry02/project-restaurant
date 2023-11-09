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
                @foreach($categories as $category)
                    <li role="presentation">
                        <a href="#category_{{ $category->category_id ?? '' }}" aria-controls="category_{{ $category->category_id ?? '' }}" role="tab" data-toggle="tab">{{ $category->name ?? '' }}</a>
                    </li>
                @endforeach
            </ul>
            <!-- Tab panes-->
            <div class="myTabContent tab-content">
              @foreach($categories as $category)
                    <div id="category_{{ $category->category_id ?? '' }}" role="tabpanel" class="tab-pane">
                        <div class="tab-inner-cont"><img src="images\restaurant\6.jpg" alt="" class="img-responsive">
                            @foreach($category->menuItems as $food)
                                <div class="media">
                                    <div class="media-left">
                                        <h2>{{ $food->item_name ?? '' }}</h2>
                                        <p>{{ $food->description ?? '' }}</p>
                                    </div>
                                    <div class="media-right">
                                        <p>{{ $food->price ?? '' }}<sup>VNĐ</sup></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
              @endforeach
            </div>
        </div>
    </section>
@endsection
