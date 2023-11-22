@extends('employee.layout.main')
@section('content')
    <style>
        .table-container {
            display: flex;
            flex-wrap: wrap;
            background-color: #c2c4c7;
            width: 1120px;
        }

        .table-container-item {
            position: relative;
        }

        .table-time {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 14px;
        }

        .table {
            width: 150px;
            height: 50px;
            border: 1px solid #000;
            margin: 50px;
            text-align: center;
            line-height: 50px;
            font-weight: bold;
        }

        .processing {
            background-color: #087561;
            color: #FFF;
        }

        .approved {
            background-color: #a8a85b;
            color: #FFF;
        }

        .table-status {
            display: flex;
            justify-content: space-between;
            padding-left: 70px;
        }

        .table-status .table {
            height: 50px;
            margin: 5px;
        }
    </style>
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
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Bàn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">Bàn</h1>
                    </div>

                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="{{route('show_create_table.index')}}">
                            <i class="tio-user-add mr-1"></i> Thêm Bàn
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
                            <h6 class="card-subtitle mb-2">Tổng số bàn</h6>

                            <div class="row align-items-center gx-2">
                                <div class="col">
                                    <span class="js-counter display-4 text-dark">{{$tableCount}}</span>
                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>

            </div>
        </div>
        <div class="content container-fluid">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <form action="{{route('check_table.post')}}" method="post">
                            @csrf
                            <div class="row justify-content-between align-items-center">
                                <div class="col-3">
                                    <!-- Ngày -->
                                    <label for="date" class="form-label">Ngày:</label>
                                    <input type="date" id="date" class="form-control" name="reservation_date"
                                           value="{{$reservationDate}}">
                                </div>
                                <div class="col-3">
                                    <!-- Giờ bắt đầu -->
                                    <label for="start-time" class="form-label">Giờ bắt đầu:</label>
                                    <input type="number" id="start-time" class="form-control" name="time"
                                           placeholder="Nhập giờ" value="{{$startTime}}">
                                </div>
                                <div class="col-3">
                                    <!-- Giờ kết thúc -->
                                    <label for="end-time" class="form-label">Giờ kết thúc:</label>
                                    <input type="number" id="end-time" class="form-control" name="time_out"
                                           placeholder="Nhập giờ" value="{{$endTime}}">
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-status mt-3">
                            <div class="table">Bàn trống</div>
                            <div class="table processing">Bàn ăn</div>
                            <div class="table approved">Bàn đặt</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        @foreach($table as $table_item)
                            <div class="table-container-item">
                                <div class="table
                    @if(isset($tableStatuses[$table_item->table_id]) && $tableStatuses[$table_item->table_id]['status'] == 'approved') approved
                    @elseif(isset($tableStatuses[$table_item->table_id]) && $tableStatuses[$table_item->table_id]['status'] == 'processing') processing
                    @else table @endif">
                                    {{ $table_item->name }}
                                </div>
                                @if(isset($tableStatuses[$table_item->table_id]) && isset($tableStatuses[$table_item->table_id]['time']) && !empty($tableStatuses[$table_item->table_id]['time']))
                                    <div class="table-time">{{ $tableStatuses[$table_item->table_id]['time'] }} giờ đến {{ $tableStatuses[$table_item->table_id]['time_out'] }} giờ</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
