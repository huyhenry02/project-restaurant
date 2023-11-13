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
                    <form method="post" action="{{route('create_menu.post')}}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Tên Món <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="You can find your code in a postal address."></i></label>

                                <input type="text" class="js-masked-input form-control" name="item_name" id="addresszipCodeLabel" placeholder="Món ..." aria-label="Your zip code" data-hs-mask-options='{
                           "template": "AA0 0AA"
                         }'>
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Mô tả <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="You can find your code in a postal address."></i></label>

                                <input type="text" class="js-masked-input form-control" name="description" id="addresszipCodeLabel" p aria-label="Your zip code" data-hs-mask-options='{
                           "template": "AA0 0AA"
                         }'>
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Giá <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="You can find your code in a postal address."></i></label>

                                <input type="number" class="js-masked-input form-control" name="price" id="addresszipCodeLabel" p aria-label="Your zip code" data-hs-mask-options='{
                           "template": "AA0 0AA"
                         }'>
                            </div>
                            <div class="form-group">
                                <label for="collectionsLabel" class="input-label">Loại Món</label>

                                <!-- Select -->
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                        id="collectionsLabel" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "chọn loại món"
                          }' name="category_id">
                                    <option label="empty"></option>
                                    @foreach($category as $key=>$val)
                                        <option value="{{$val->category_id ?? ''}}">{{$val->name ?? ''}}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->

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
