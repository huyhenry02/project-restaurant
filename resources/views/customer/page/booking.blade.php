@extends('customer.layout.main')
@section('content')
    <section class="container clearfix common-pad-inner booknow">
        <div class="sec-header">
            <h2>Booking</h2>
            <h3>Pick a table that best suits your taste and budget</h3>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
                <div class="book-left-content input_form">
                    <form id="contactBooking" action="contact_process.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <input id="name" type="text" name="name" placeholder="Cho chúng tôi biết tên bạn" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <input id="email" type="email" name="email" placeholder="Nhập Email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <input placeholder="Ngày đặt" name="arival_date" type="text" class="form-control datepicker-example8">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <input id="phone" type="text" name="phone" placeholder="Nhập SĐT" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <div class="select-box">
                                    <select name="hours" class="select-menu">
                                        <option value="default"> Giờ </option>
                                        <option value="1">7</option>
                                        <option value="2">8</option>
                                        <option value="3">9</option>
                                        <option value="4">10</option>
                                        <option value="4">11</option>
                                        <option value="4">12</option>
                                        <option value="4">13</option>
                                        <option value="4">14</option>
                                        <option value="4">15</option>
                                        <option value="4">16</option>
                                        <option value="4">17</option>
                                        <option value="4">18</option>
                                        <option value="4">19</option>
                                        <option value="4">20</option>
                                        <option value="4">21</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <div class="select-box">
                                    <select name="minutes" class="select-menu">
                                        <option value="default">Phút</option>
                                        <option value="1">00</option>
                                        <option value="2">15</option>
                                        <option value="3">30</option>
                                        <option value="4">45</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <div class="select-box">
                                    <select name="loai" class="select-menu">
                                        <option value="default"> Loại </option>
                                        <option value="1">Bàn đôi</option>
                                        <option value="2">Bàn nhóm</option>
                                        <option value="3">Phòng riêng</option>
                                        <option value="4">Đặt tiệc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <input id="number" type="number" name="number" placeholder="Số người" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea id="message" rows="6" name="message" placeholder="Bạn có điều gì cần chú ý?" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="res-btn">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4 pull-right">
                <div class="book-right"><span><img src="images\gallery-home\bk.jpg" alt=""></span>
                    <h2>About Restaurant</h2>
                    <p>Khám phá hương vị tinh tế và không gian sang trọng tại nhà hàng chúng tôi. Đến với chúng tôi, bạn sẽ được trải nghiệm ẩm thực đa dạng, từ món ăn truyền thống đến những sáng tạo mới đầy bất ngờ. Đặt bàn ngay hôm nay để thưởng thức một bữa ăn tuyệt vời và dịch vụ chuyên nghiệp.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
