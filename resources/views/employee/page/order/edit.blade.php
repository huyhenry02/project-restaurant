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
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="ecommerce-products.html">Hóa đơn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Thông tin Khách hàng</h4>
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
                               aria-label="Shirt, t-shirts, etc." value="{{$order->customer->name}}">
                    </div>
                    <!-- End Form Group -->

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Số điện thoại</label>

                                <input type="text" class="form-control" name="phone" id="SKULabel"
                                       placeholder="eg. 348121032" aria-label="eg. 348121032"
                                       value="{{$order->customer->phone}}">
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Email</label>

                                <input type="email" class="form-control" name="email" id="SKULabel"
                                       placeholder="eg. 348121032" aria-label="eg. 348121032"
                                       value="{{$order->customer->email}}">
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- End Form Group -->
                    </div>
                </div>
            </div>
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Thông tin Hóa đơn {{$order->name}}</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Ngày ăn</label>

                                <input type="date" class="form-control" name="reservation_date" id="SKULabel"
                                       value="{{$order->order_date}}">
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="SKULabel" class="input-label">Giờ</label>

                                <input type="number" class="form-control" name="time" id="SKULabel"
                                       value="{{$order->time}}">
                            </div>
                        </div>
                        <!-- End Form Group -->
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-6">
                            {{--                            <!-- Form Group -->--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="SKULabel" class="input-label">Số người </label>--}}

                            {{--                                <input type="number" class="form-control" name="number_of_guests" id="SKULabel"--}}
                            {{--                                       placeholder="eg. 348121032" aria-label="eg. 348121032"--}}
                            {{--                                       value="{{$reservation->number_of_guests}}">--}}
                            {{--                            </div>--}}
                            {{--                            <!-- End Form Group -->--}}
                        </div>

                        <div class="col-sm-4">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="collectionsLabel" class="input-label">Loại bàn</label>

                                <!-- Select -->
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                        id="collectionsLabel" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Select options"
                          }' name="table_id">
                                    <option label="empty"></option>
                                    <option value="{{$order->table_reservation->table_id ?? ''}}"
                                            selected="">{{$order->table_reservation->name ?? ''}}</option>
                                    @foreach($table as $key=>$val)
                                        <option value="{{$val->table_id ?? ''}}">{{$val->name ?? ''}}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->

                            </div>
                            <!-- End Form Group -->
                        </div>
                        {{--                        <div class="col-sm-4">--}}
                        {{--                            <!-- Form Group -->--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="categoryLabel" class="input-label">Trạng thái</label>--}}

                        {{--                                <!-- Select -->--}}
                        {{--                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"--}}
                        {{--                                        id="categoryLabel" data-hs-select2-options='{--}}
                        {{--                            "minimumResultsForSearch": "Infinity",--}}
                        {{--                            "placeholder": "Sửa trạng thái"--}}
                        {{--                          }' name="status">--}}
                        {{--                                    <option label="empty"></option>--}}
                        {{--                                    <option value="{{$reservation->status}}"--}}
                        {{--                                            selected="">{{$reservation->status}}</option>--}}
                        {{--                                    <option value="approved">Approved</option>--}}
                        {{--                                    <option value="completed">Completed</option>--}}
                        {{--                                    <option value="pending">Pending</option>--}}
                        {{--                                    <option value="processing">Processing</option>--}}
                        {{--                                </select>--}}
                        {{--                                <!-- End Select -->--}}
                        {{--                            </div>--}}
                        {{--                            <!-- End Form Group -->--}}
                        {{--                        </div>--}}
                        <!-- End Form Group -->
                    </div>
                </div>
            </div>
            <div class="js-add-field card mb-3 mb-lg-5" data-hs-add-field-options='{
                  "template": "#addVariantsTemplate",
                  "container": "#addVariantsContainer",
                  "defaultCreated": 0,
                  "limit": 100
                }'>
                <!-- Header -->
                <div class="card-header">
                    <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="col-12 col-sm mb-3 mb-sm-0">
                            <h4 class="card-header-title">Variants</h4>
                        </div>

                        <div class="col-auto">
                            <div class="d-flex align-items-center">
                                <!-- Datatable Info -->
                                <div id="datatableCounterInfo" style="display: none;">
                                    <div class="d-flex align-items-center">
                          <span class="font-size-sm mr-3">
                            <span id="datatableCounter">0</span>
                            Selected
                          </span>
                                        <a class="btn btn-sm btn-outline-danger" href="javascript:;">
                                            <i class="tio-delete-outlined"></i> Delete
                                        </a>
                                    </div>
                                </div>
                                <!-- End Datatable Info -->

                                <a class="js-create-field btn btn-sm btn-ghost-secondary" href="javascript:;">
                                    <i class="tio-add"></i> Add variant
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Header -->

                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                         "columnDefs": [{
                            "targets": [0, 1, 6],
                            "orderable": false
                          }],
                         "order": [],
                         "pageLength": 15,
                         "isResponsive": false,
                         "isShowPaging": false
                       }'>
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input id="datatableCheckAll" type="checkbox" class="custom-control-input">
                                    <label class="custom-control-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th></th>
                            <th class="table-column-pl-0">Size</th>
                            <th class="table-column-pl-0">Color</th>
                            <th class="table-column-pl-0">Price</th>
                            <th class="table-column-pl-0">Quantity</th>
                            <th class="table-column-pl-0"></th>
                        </tr>
                        </thead>

                        <tbody id="addVariantsContainer">
                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck1">
                                    <label class="custom-control-label" for="productVariationsCheck1"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="S">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="White">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="45.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="10">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck2">
                                    <label class="custom-control-label" for="productVariationsCheck2"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="M">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="White">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="45.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="10">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck3">
                                    <label class="custom-control-label" for="productVariationsCheck3"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="L">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="White">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="45.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="10">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck4">
                                    <label class="custom-control-label" for="productVariationsCheck4"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="XL">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="White">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="45.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="10">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck5">
                                    <label class="custom-control-label" for="productVariationsCheck5"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="S">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="Black">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="45.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="10">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck6">
                                    <label class="custom-control-label" for="productVariationsCheck6"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="M">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="Black">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="45.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="10">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck7">
                                    <label class="custom-control-label" for="productVariationsCheck7"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="L">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="Black">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="45.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="10">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck8">
                                    <label class="custom-control-label" for="productVariationsCheck8"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="XL">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="Black">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="45.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="10">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck9">
                                    <label class="custom-control-label" for="productVariationsCheck9"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="S">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="Orange">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="50.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="5">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck10">
                                    <label class="custom-control-label" for="productVariationsCheck10"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="M">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="Orange">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="50.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="5">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck11">
                                    <label class="custom-control-label" for="productVariationsCheck11"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="L">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="Orange">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="50.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="5">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="productVariationsCheck12">
                                    <label class="custom-control-label" for="productVariationsCheck12"></label>
                                </div>
                            </td>
                            <th>
                                <img class="avatar" src="assets\img\400x400\img7.jpg" alt="Image Description">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="XL">
                            </th>
                            <th class="table-column-pl-0">
                                <input type="text" class="form-control" value="Orange">
                            </th>
                            <th class="table-column-pl-0">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" class="form-control pl-8" value="50.00">
                                </div>
                            </th>
                            <th class="table-column-pl-0">
                                <!-- Quantity Counter -->
                                <div class="js-quantity-counter input-group-quantity-counter">
                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" value="5">

                                    <div class="input-group-quantity-counter-toggle">
                                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Quantity Counter -->
                            </th>
                            <th class="table-column-pl-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-white" href="#">
                                        <i class="tio-delete-outlined"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <a class="js-create-field btn btn-sm btn-ghost-secondary" href="javascript:;">
                        <i class="tio-add"></i> Add variant
                    </a>
                </div>
                <!-- End Footer -->

                <!-- Add Variants Field -->
                <table style="display: none;">
                    <tr id="addVariantsTemplate">
                        <td class="table-column-pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="productVariationsCheck13">
                                <label class="custom-control-label" for="productVariationsCheck13"></label>
                            </div>
                        </td>
                        <th>
                            <img class="avatar" src="assets\img\400x400\img2.jpg" alt="Image Description">
                        </th>
                        <th class="table-column-pl-0">
                            <input type="text" class="form-control">
                        </th>
                        <th class="table-column-pl-0">
                            <input type="text" class="form-control">
                        </th>
                        <th class="table-column-pl-0">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">USD</div>
                                </div>
                                <input type="text" class="form-control pl-8">
                            </div>
                        </th>
                        <th class="table-column-pl-0">
                            <!-- Quantity Counter -->
                            <div class="js-quantity-counter-dynamic input-group-quantity-counter">
                                <input type="number" class="js-result form-control input-group-quantity-counter-control" value="1">

                                <div class="input-group-quantity-counter-toggle">
                                    <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                        <i class="tio-remove"></i>
                                    </a>
                                    <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                        <i class="tio-add"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End Quantity Counter -->
                        </th>
                        <th class="table-column-pl-0">
                            <div class="btn-group" role="group" aria-label="Edit group">
                                <a class="btn btn-white" href="#">
                                    <i class="tio-edit"></i> Edit
                                </a>
                                <a class="btn btn-white" href="#">
                                    <i class="tio-delete-outlined"></i>
                                </a>
                            </div>
                        </th>
                    </tr>
                </table>
                <!-- End Add Variants Field -->
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
            <!-- Body -->
        </div>
    </div>
</form>

        </div>
        </div>
        </div>
    </main>
@endsection
