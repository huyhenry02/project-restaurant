@extends('employee.layout.main')
@section('content')
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Trang</a></li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Hóa đơn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">Hóa đơn</h1>
                    </div>

                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="{{route('show_create_role.index')}}">
                            <i class="tio-user-add mr-1"></i> Thêm Hóa đơn
                        </a>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->
            <!-- Stats -->
            <div class="row gx-2 gx-lg-3">
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">Tổng số Hóa đơn</h6>

                            <div class="row align-items-center gx-2">
                                <div class="col">
                                    <span class="js-counter display-4 text-dark">{{$orderCount}}</span>

                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>

            </div>
        </div>
        <!-- End Stats -->

        <!-- Card -->
        <div class="card">
            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 7],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 15,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                    <thead class="thead-light">
                    <tr>
                        <th class="table-column-pr-0">
                            <div class="custom-control custom-checkbox">
                                <input id="datatableCheckAll" type="checkbox" class="custom-control-input">
                                <label class="custom-control-label" for="datatableCheckAll"></label>
                            </div>
                        </th>
                        <th>Tên Hóa đơn</th>
                        <th>Tên Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Loại Bàn</th>
                        <th>Bàn</th>
                        <th>Ngày</th>
                        <th>Giờ</th>
                        <th>Tổng tiền</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($order as $key=>$val)
                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="usersDataCheck1">
                                    <label class="custom-control-label" for="usersDataCheck1"></label>
                                </div>
                            </td> x
                            <td>{{ $val ? $val->name : '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val->customer->name ?? '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val->customer->phone ?? '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val->table_type_order->name ?? '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val->table_order->name ?? '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val ? $val->order_date : '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val ? $val->time : '' }} giờ<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val ? $val->total_amount : '' }} VNĐ<span class="text-hide">Code: GB</span></td>
                            <td>
                                <a class="btn btn-sm btn-white" href="{{route('show_update_order.index',$val->order_id)}}" >
                                    <i class="tio-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-white" href="{{route('order.delete',$val->order_id)}}" >
                                    <i class="tio-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="mr-2">Trang:</span>

                            <!-- Select -->
                            <select id="datatableEntries" class="js-select2-custom" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "customClass": "custom-select custom-select-sm custom-select-borderless",
                            "dropdownAutoWidth": true,
                            "width": true
                          }'>
                                <option value="10">10</option>
                                <option value="15" selected="">15</option>
                                <option value="20">20</option>
                            </select>
                            <!-- End Select -->

                            <span class="text-secondary mr-2">of</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
        </div>
        <!-- End Content -->

        <!-- Footer -->

    </main>


@endsection
