@extends('employee.layout.main')

@section('content')
    <main id="content" role="main" class="main">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link">Trang</a></li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link">Báo cáo</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đơn đặt bàn</li>
                            </ol>
                        </nav>
                        <h1 class="page-header-title">Báo cáo đơn đặt bàn</h1>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Thống kê đơn đặt bàn</h5>
                    <div class="form-inline">
                        <label for="timeType" class="mr-2">Chọn loại thời gian:</label>
                        <select id="timeType" class="form-control">
                            <option value="year">Theo Năm</option>
                            <option value="month">Theo Tháng</option>
                            <option value="week">Theo Tuần</option>
                            <option value="day">Theo Ngày</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="reservationChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let ctx = document.getElementById('reservationChart').getContext('2d');
            let customerChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Số lượng đơn đặt bàn',
                        data: [],
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            title: {
                                display: true,
                                text: 'Số lượng đơn đặt bàn'
                            },
                            beginAtZero: true,
                            min: 0
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Thời gian'
                            }
                        },
                    }
                }
            });

            function updateChart(type) {
                $.ajax({
                    url: '{{ route('get_report_reservations.get', ':type') }}'.replace(':type', type),
                    method: 'GET',
                    success: function(response) {
                        let labels = [];
                        let data = [];

                        if (type === 'year') {
                            response.yearly.forEach(item => {
                                labels.push(item.year);
                                data.push(item.total);
                            });
                        } else if (type === 'month') {
                            response.monthly.forEach(item => {
                                labels.push('Tháng ' + item.month);
                                data.push(item.total);
                            });
                        } else if (type === 'week') {
                            response.weekly.forEach(item => {
                                labels.push('Tuần ' + item.week);
                                data.push(item.total);
                            });
                        } else if (type === 'day') {
                            response.daily.forEach(item => {
                                labels.push(item.day);
                                data.push(item.total);
                            });
                        }
                        customerChart.data.labels = labels;
                        customerChart.data.datasets[0].data = data;
                        customerChart.update();
                    },
                    error: function() {
                        alert('Không thể lấy dữ liệu, vui lòng thử lại sau.');
                    }
                });
            }

            $('#timeType').change(function() {
                let selectedType = $(this).val();
                updateChart(selectedType);
            });

            updateChart('year');
        });
    </script>
@endsection
