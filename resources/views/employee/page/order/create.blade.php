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
                                <li class="breadcrumb-item active" aria-current="page">Tạo hoá đơn mới</li>
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
                                           aria-label="Shirt, t-shirts, etc." >
                                </div>
                                <!-- End Form Group -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Số điện thoại</label>

                                            <input type="text" class="form-control" name="phone" id="SKULabel"
                                                   placeholder="eg. 348121032" aria-label="eg. 348121032"
                                                   >
                                        </div>
                                        <!-- End Form Group -->
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Email</label>

                                            <input type="email" class="form-control" name="email" id="SKULabel"
                                                   placeholder="eg. 348121032" aria-label="eg. 348121032"
                                                  >
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
                                <h4 class="card-header-title">Thông tin Hóa đơn </h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Ngày ăn</label>

                                            <input type="date" class="form-control" name="order_date" id="SKULabel"
                                                   >
                                        </div>
                                        <!-- End Form Group -->
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Giờ</label>

                                            <input type="number" class="form-control" name="time" id="SKULabel"
                                                   >
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                <div class="row">

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
                                                @foreach($table as $key=>$val)
                                                    <option value="{{$val->table_id ?? ''}}">{{$val->name ?? ''}}</option>
                                                @endforeach
                                            </select>
                                            <!-- End Select -->

                                        </div>
                                        <!-- End Form Group -->
                                    </div>
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
                                        <h4 class="card-header-title">Món đã gọi</h4>
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
                                            <button type="button" id="addItemBtn" class="js-create-field btn btn-sm btn-ghost-secondary"> <i class="tio-add"></i> Thêm món</button>
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
                                        <th class="table-column-pl-0">Tên món</th>
                                        <th class="table-column-pl-0">Mô tả</th>
                                        <th class="table-column-pl-0">Giá</th>
                                        <th class="table-column-pl-0">Số lượng</th>
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

                                            </th>
                                            <th class="table-column-pl-0">
                                                <input type="text" class="form-control"  name="item_name">
                                            </th>
                                            <th class="table-column-pl-0">
                                                <input type="text" class="form-control"  name="description">
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">VNĐ</div>
                                                    </div>
                                                    <input type="text" class="form-control pl-8"  name="price">
                                                </div>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="js-quantity-counter input-group-quantity-counter">
                                                    <input type="number" class="js-result form-control input-group-quantity-counter-control" name="quantity">
                                                </div>
                                                <!-- End Quantity Counter -->
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="btn-group" role="group" aria-label="Edit group">
                                                    <a class="btn btn-white" href="#">
                                                        <i class="tio-delete-outlined"></i>
                                                    </a>
                                                </div>
                                            </th>
                                        </tr>

                                    <tr id="addVariantsTemplate" style="display: none;" data-cloneable="true">
                                        <td class="table-column-pr-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productVariationsCheck13">
                                                <label class="custom-control-label" for="productVariationsCheck13"></label>
                                            </div>
                                        </td>
                                        <th>

                                        </th>
                                        <th class="table-column-pl-0">
                                            <input type="text" class="form-control" name="item_name">
                                        </th>
                                        <th class="table-column-pl-0">
                                            <input type="text" class="form-control" name="description">
                                        </th>
                                        <th class="table-column-pl-0">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">VNĐ</div>
                                                </div>
                                                <input type="text" class="form-control pl-8" name="price">
                                            </div>
                                        </th>
                                        <th class="table-column-pl-0">
                                            <!-- Quantity Counter -->
                                            <div class="js-quantity-counter-dynamic input-group-quantity-counter">
                                                <input type="number" class="js-result form-control input-group-quantity-counter-control" value="1" name="quantity">
                                            </div>
                                            <!-- End Quantity Counter -->
                                        </th>
                                        <th class="table-column-pl-0">
                                            <div class="btn-group" role="group" aria-label="Edit group">
                                                <a class="btn btn-white" href="#">
                                                    <i class="tio-delete-outlined"></i>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <hr>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                        <!-- Body -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Tổng giá trị hoá đơn</h4>
                            </div>
                            <div class="row justify-content-md-end mb-3">

                                <dl class="row text-sm-center">
                                    <dt class="col-sm-6">Tổng:</dt>
                                    <dd class="col-sm-6"> VNĐ</dd>
                                    <dt class="col-sm-6">Giảm giá</dt>
                                    <dd class="col-sm-6">0 VNĐ</dd>
                                    <dt class="col-sm-6">Tổng tiền phải trả:</dt>
                                    <dd class="col-sm-6"> VNĐ</dd>
                                </dl>
                                <!-- End Row -->
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>

        </div>
        </div>

    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var table = document.getElementById("datatable");
            var templateRow = document.getElementById("addVariantsTemplate");
            var addItemBtn = document.getElementById("addItemBtn");
            addItemBtn.addEventListener("click", function () {
                var newRow = templateRow.cloneNode(true);
                newRow.style.display = "table-row";
                newRow.removeAttribute("id");
                table.querySelector("tbody").appendChild(newRow);
            });
        });
    </script>

@endsection
