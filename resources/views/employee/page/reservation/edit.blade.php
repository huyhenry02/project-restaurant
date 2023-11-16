@extends('employee.layout.main')
@section('content')
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="ecommerce-products.html">Trang</a>
                                </li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="ecommerce-products.html">Bàn
                                        Đã đặt</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

<form action="{{route('update_reservation.post',$reservation->reservation_id)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Thông tin người đặt</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- Form Group -->
                    <div class="form-group">
                        <label for="productNameLabel" class="input-label"> Họ tên <i
                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                data-placement="top"
                                title="Products are the goods or services you sell."></i></label>

                        <input type="text" class="form-control" name="name" id="productNameLabel"
                               aria-label="Shirt, t-shirts, etc." value="{{$reservation->customer->name}}">
                    </div>
                    <!-- End Form Group -->

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Số điện thoại</label>

                                <input type="text" class="form-control" name="phone" id="SKULabel"
                                       placeholder="eg. 348121032" aria-label="eg. 348121032"
                                       value="{{$reservation->customer->phone}}">
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Email</label>

                                <input type="email" class="form-control" name="email" id="SKULabel"
                                       placeholder="eg. 348121032" aria-label="eg. 348121032"
                                       value="{{$reservation->customer->email}}">
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- End Form Group -->
                    </div>
                </div>
            </div>
            <!-- Body -->
        </div>
        <div class="col-lg-8">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Thông tin Bàn Đặt {{$reservation->name}}</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Ngày đặt</label>

                                <input type="date" class="form-control" name="reservation_date" id="SKULabel"
                                       value="{{$reservation->reservation_date}}">
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Giờ</label>

                                <input type="number" class="form-control" name="time" id="SKULabel"
                                       value="{{$reservation->time}}">
                            </div>
                        </div>
                        <!-- End Form Group -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Số người </label>

                                <input type="number" class="form-control" name="number_of_guests" id="SKULabel"
                                       placeholder="eg. 348121032" aria-label="eg. 348121032"
                                       value="{{$reservation->number_of_guests}}">
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="categoryLabel" class="input-label">Trạng thái</label>

                                <!-- Select -->
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                        id="categoryLabel" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Sửa trạng thái"
                          }' name="status">
                                    <option value="{{$reservation->status}}"
                                            >  @if ($reservation->status === 'approved')
                                           Đã xác nhận
                                        @elseif ($reservation->status === 'pending')
                                            Chờ xác nhận
                                        @elseif ($reservation->status === 'processing')
                                            Đang ăn
                                        @elseif ($reservation->status === 'completed')
                                            Hoàn thành
                                        @elseif ($reservation->status === 'rejected')
                                            Đã hủy
                                        @endif</option>
                                    <option value="approved">Xác nhận</option>
                                    <option value="completed">Hoàn thành</option>
                                    <option value="pending"> Chờ xác nhận</option>
                                    <option value="processing">Đang diễn ra</option>
                                    <option value="rejected">Đã hủy</option>
                                </select>
                                <!-- End Select -->
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- End Form Group -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="collectionsLabel" class="input-label">Bàn</label>

                                <!-- Select -->
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                        id="collectionsLabel" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Select options"
                          }' name="table_id">
                                    <option value="{{$reservation->table_reservation->table_id ?? ''}}"
                                    >{{$reservation->table_reservation->name ?? ''}}</option>
                                    @foreach($table as $key=>$val)
                                        <option value="{{$val->table_id ?? ''}}">{{$val->name ?? ''}}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->

                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="tablesLabel" class="input-label">Loại bàn</label>

                                <!-- Select -->
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                        id="tablesLabel" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Select options"
                          }' name="table_type_id">
                                    <option value="{{$reservation->table_type_reservation->table_type_id ?? ''}}"
                                    >{{$reservation->table_type_reservation->name ?? ''}}</option>
                                    @foreach($table_type as $key=>$val)
                                        <option value="{{$val->table_type_id ?? ''}}">{{$val->name ?? ''}}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->

                            </div>
                            <!-- End Form Group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productNameLabel" class="input-label"> Ghi chú</label>

                        <input type="text" class="form-control" name="note" id="productNameLabel"
                               aria-label="Shirt, t-shirts, etc." value="{{$reservation->note}}">
                    </div>
                </div>
            </div>
            <!-- Body -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</form>

        </div>
        </div>
        </div>
    </main>
@endsection
