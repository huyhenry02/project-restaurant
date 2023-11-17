@extends('employee.layout.main')
@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 mb-3 mb-lg-0">

            </div>

            <div class="col-lg-10">
                <!-- Card -->
                <div class="card">
                    <!-- Body -->
                    <form method="post" action="{{route('create_table.post')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Tên Bàn <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="You can find your code in a postal address."></i></label>

                                <input type="text" class="js-masked-input form-control" name="name" id="addresszipCodeLabel" placeholder="Bàn ..." aria-label="Your zip code" data-hs-mask-options='{
                           "template": "AA0 0AA"
                         }'>
                            </div>
                            <div class="form-group">
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                        id="collectionsLabel" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Chọn loại bàn"
                          }' name="table_type_id">
                                    <option label="empty"></option>
                                    @foreach($table_type as $key=>$val)
                                        <option value="{{$val->table_type_id ?? ''}}">{{$val->name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End Form Group -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                    </form>
                    <!-- Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection
