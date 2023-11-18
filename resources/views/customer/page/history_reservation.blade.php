@extends('customer.layout.main')
@section('content')
    <!-- Header  Inner style-->
    <section class="row final-inner-header">
        <div class="container">
            <h2 class="this-title">History</h2>
        </div>
    </section>
    <section class="row final-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">History</li>
            </ol>
        </div>
    </section>
    <section class="container clearfix common-pad booknow">
        <h2>Lịch sử đặt bàn</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên đơn đặt bàn</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Bàn</th>
                <th scope="col">Loại bàn</th>
                <th scope="col">Ngày ăn</th>
                <th scope="col">Ngày đặt</th>
            </tr>
            </thead>
            <tbody>
           @foreach($reservation as $key=>$val)
               <tr>
                   <th scope="row">{{$key + 1}}</th>
                   <td>{{$val->name ?? ''}}</td>
                   <td>{{$val->status ?? ''}}</td>
                   <td>{{$val->table_id ?? ''}}</td>
                   <td>{{$val->table_type_reservation->name}}</td>
                   <td>{{$val->reservation_date ?? ''}}</td>
                   <td> {{ $val && $val->created_at ? $val->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') : '' }}</td>
               </tr>
           @endforeach
            </tbody>
        </table>

        <h2>Lịch sử hoá đơn</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên hoá đơn</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
           @foreach($order as $key=>$val)
               <tr>
                   <th scope="row">{{$key + 1}}</th>
                   <td>{{$val->name ?? ''}}</td>
                   <td> {{ $val && $val->created_at ? $val->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') : '' }}</td>
                   <td>{{$val->total_amount ?? ''}}</td>
               </tr>
           @endforeach
            </tbody>
        </table>
    </section>
@endsection

