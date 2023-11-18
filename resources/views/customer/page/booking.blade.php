@extends('customer.layout.main')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <section class="container clearfix common-pad-inner booknow">
        <div class="sec-header">
            <h2>Booking</h2>
            <h3>Please tell us your personal information</h3>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
                <div class="book-left-content input_form">
                   @if(Auth::guard('customer')->check())
                        <form id="contactBooking" action="{{route('book_table_customer.post')}}" method="post">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="customer_id"
                                       value="{{Auth::guard('customer')->user()->customer_id}}">
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <input placeholder="Ngày đặt" name="reservation_date" type="text"
                                           class="form-control datepicker-example8">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <input id="number" type="number" name="number_of_guests" placeholder="Số người"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <div class="select-box">
                                        <select name="time" class="select-menu">
                                            <option value="default"> Giờ</option>
                                            <option value="7">7h</option>
                                            <option value="8">8h</option>
                                            <option value="9">9h</option>
                                            <option value="10">10h</option>
                                            <option value="11">11h</option>
                                            <option value="12">12h</option>
                                            <option value="13">13h</option>
                                            <option value="14">14h</option>
                                            <option value="15">15h</option>
                                            <option value="16">16h</option>
                                            <option value="17">17h</option>
                                            <option value="18">18h</option>
                                            <option value="19">19h</option>
                                            <option value="20">20h</option>
                                            <option value="21">21h</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <div class="select-box">
                                        <select name="table_type_id" class="select-menu">
                                            <option value="default"> Loại bàn</option>
                                            @foreach($table_type as $tableItem)
                                                <option value="{{$tableItem->table_type_id}}">{{$tableItem->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="message"></label><textarea id="message" rows="6" name="note" placeholder="Bạn có điều gì nhà hàng lưu ý?"
                                                                           class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="res-btn">subscribe<i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form id="contactBooking" action="{{route('book_table.post')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <input id="name" type="text" name="name" placeholder="Cho chúng tôi biết tên bạn"
                                           class="form-control">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <input id="email" type="email" name="email" placeholder="Nhập Email"
                                           class="form-control ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <input placeholder="Ngày đặt" name="reservation_date" type="text"
                                           class="form-control datepicker-example8">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <input id="phone" type="number" name="phone" placeholder="Nhập SĐT"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <div class="select-box">
                                        <select name="time" class="select-menu">
                                            <option value="default"> Giờ</option>
                                            <option value="7">7h</option>
                                            <option value="8">8h</option>
                                            <option value="9">9h</option>
                                            <option value="10">10h</option>
                                            <option value="11">11h</option>
                                            <option value="12">12h</option>
                                            <option value="13">13h</option>
                                            <option value="14">14h</option>
                                            <option value="15">15h</option>
                                            <option value="16">16h</option>
                                            <option value="17">17h</option>
                                            <option value="18">18h</option>
                                            <option value="19">19h</option>
                                            <option value="20">20h</option>
                                            <option value="21">21h</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <div class="select-box">
                                        <select name="table_type_id" class="select-menu">
                                            <option value="default"> Loại bàn</option>
                                            @foreach($table_type as $tableItem)
                                                <option value="{{$tableItem->table_type_id}}">{{$tableItem->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                    <input id="number" type="number" name="number_of_guests" placeholder="Số người"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="message"></label><textarea id="message" rows="6" name="note" placeholder="Bạn có điều gì nhà hàng lưu ý?"
                                                                           class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="res-btn">subscribe<i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                   @endif
                </div>
            </div>
            <div class="col-sm-4 pull-right">
                <div class="book-right"><span><img src="images\gallery-home\bk.jpg" alt=""></span>
                    <h2>About Restaurant</h2>
                    <p>Khám phá hương vị tinh tế và không gian sang trọng tại nhà hàng chúng tôi. Đến với chúng tôi, bạn
                        sẽ được trải nghiệm ẩm thực đa dạng, từ món ăn truyền thống đến những sáng tạo mới đầy bất ngờ.
                        Đặt bàn ngay hôm nay để thưởng thức một bữa ăn tuyệt vời và dịch vụ chuyên nghiệp.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
