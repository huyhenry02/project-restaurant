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
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Trang</a>
                                </li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Bàn đã
                                        đặt</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">Bàn đã đặt</h1>
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
                            <h6 class="card-subtitle mb-2">Tổng số Bàn đã đặt</h6>

                            <div class="row align-items-center gx-2">
                                <div class="col">
                                    <span class="js-counter display-4 text-dark">{{$reservationCount}}</span>

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
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-auto">
                        <!-- Unfold -->
                        <div class="hs-unfold mr-2">
                            <a class="js-hs-unfold-invoker btn btn-white" href="javascript:;" data-hs-unfold-options='{
                      "target": "#datatableFilterSidebar",
                      "type": "css-animation",
                      "animationIn": "fadeInRight",
                      "animationOut": "fadeOutRight",
                      "hasOverlay": true,
                      "smartPositionOff": true
                     }'>
                                <i class="tio-filter-list mr-1"></i> Lọc
                            </a>
                        </div>
                        <!-- End Unfold -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                       class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                       data-hs-datatables-options='{
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
                        <th>Mã Đơn đặt bàn</th>
                        <th>Tên Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th>Số người</th>
                        <th>Loại bàn</th>
                        <th>Bàn</th>
                        <th>Ngày đặt</th>
                        <th>Giờ</th>
                        <th>Giờ dự kiến trả bàn</th>
                        <th>Thời gian chỉnh sửa</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($reservation as $key=>$val)
                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="usersDataCheck1">
                                    <label class="custom-control-label" for="usersDataCheck1"></label>
                                </div>
                            </td>
                            <td>{{ $val ? $val->name : '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val->customer->name ?? '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val->customer->phone ?? '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val ? $val->note : '' }}<span class="text-hide">Code: GB</span></td>
                            <td>
                                @if ($val->status === 'approved')
                                    <span class="legend-indicator bg-primary "></span>Đã xác nhận
                                @elseif ($val->status === 'pending')
                                    <span class="legend-indicator bg-warning "></span>Chờ xác nhận
                                @elseif ($val->status === 'processing')
                                    <span class="legend-indicator bg-info"></span>Đang ăn
                                @elseif ($val->status === 'completed')
                                    <span class="legend-indicator bg-success "></span>Hoàn thành
                                @elseif ($val->status === 'rejected')
                                    <span class="legend-indicator bg-danger"></span>Đã hủy
                                @endif
                            </td>
                            <td>{{ $val ? $val->number_of_guests : '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val->table_type_reservation->name ?? '' }}<span class="text-hide">Code: GB</span>
                            </td>
                            <td>{{ $val->table_reservation->name ?? '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val ? $val->reservation_date : '' }}<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val ? $val->time : '' }} giờ<span class="text-hide">Code: GB</span></td>
                            <td>{{ $val ? $val->time_out : '' }} giờ<span class="text-hide">Code: GB</span></td>
                            <td>
                                {{ $val && $val->created_at ? $val->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') : '' }}
                                <span class="text-hide">Code: GB</span>
                            </td>

                            <td>
                                <a class="btn btn-sm btn-white"
                                   href="{{route('show_update_reservation.index',$val->reservation_id)}}">
                                    <i class="tio-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-white"
                                   href="{{route('reservation.delete',$val->reservation_id)}}">
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
    <div id="datatableFilterSidebar" class="hs-unfold-content sidebar sidebar-bordered sidebar-box-shadow">
        <div class="card card-lg sidebar-card sidebar-footer-fixed">
            <div class="card-header">
                <h4 class="card-header-title">Lọc</h4>
                <!-- Toggle Button -->
                <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-ghost-dark ml-2" href="javascript:;"
                   data-hs-unfold-options='{
                "target": "#datatableFilterSidebar",
                "type": "css-animation",
                "animationIn": "fadeInRight",
                "animationOut": "fadeOutRight",
                "hasOverlay": true,
                "smartPositionOff": true
               }'>
                    <i class="tio-clear tio-lg"></i>
                </a>
                <!-- End Toggle Button -->
            </div>

            <form action="{{route('filterReservations.post')}}" method="post">
                @csrf
                <div class="card-body sidebar-body">
                    <small class="text-cap mb-3">Loại bàn</small>

                    @foreach($table_type as $val)
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="productTypeFilterRadio{{$val->table_type_id}}" name="table_type_id"
                                   class="custom-control-input table-type-radio"
                                   data-table-type="{{$val->_table_type_id}}"
                                   value="{{$val->table_type_id}}">
                            <label class="custom-control-label"
                                   for="productTypeFilterRadio{{$val->table_type_id}}">{{$val->name}}</label>
                        </div>
                    @endforeach
                    <hr class="my-4">
                    <small class="text-cap mb-3">Mã bàn </small>
                    <div class="input-group input-group-merge mb-2">
                        <label for="collectionsLabel"></label>
                        <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                id="collectionsLabel" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Chọn mã bàn "
                          }' name="table_id">
                            <option label="empty"></option>
                            @foreach($table as $key=>$val)
                                <option class="table-option" value="{{$val->table_id ?? ''}} "
                                        data-table-type="{{$val->table_item->table_type_id}}"
                                >
                                    {{$val->name ?? ''}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="my-4">
                    <small class="text-cap mb-3">Ngày </small>
                    <div class="input-group input-group-merge mb-2">
                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="tio-calendar"></i>
                                    </span>
                        </div>
                        <input type="date" class="form-control flatpickr-custom-form-control" name="reservation_date">
                    </div>
                </div>

                <div class="card-footer sidebar-footer">
                    <div class="row gx-2">
                        <div class="col">
                            <button type="submit" class="btn btn-block btn-primary">Lưu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tableTypeRadios = document.querySelectorAll('.table-type-radio');
            const tableOptions = document.querySelectorAll('.table-option');

            tableTypeRadios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    const selectedTableType = radio.dataset.tableType;
                    tableOptions.forEach(function (option) {
                        option.style.display = 'none';
                    });
                    const selectedTableOptions = document.querySelectorAll('.table-option[data-table-type="' + selectedTableType + '"]');
                    selectedTableOptions.forEach(function (option) {
                        option.style.display = 'block';
                    });
                });
            });
        });
    </script>
@endsection
