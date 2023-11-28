@extends('layouts.master')
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Đánh giá nhân viên</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Đánh giá nhân viên</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <x-notification/>
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <div class="row">
                <div class="col-md-5">
                    <select class="form-control hasSelect2 customSelect floating-control selectAP" id="tb-status" aria-placeholder="Chọn kỳ đánh giá">
                       <option value="">Chọn kỳ đánh giá</option>
                        @if(!empty($listAssessmentPeriod))
                            @foreach($listAssessmentPeriod as $key => $item)
                                <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-7 box-action">
                    <a href="{{route('assessmentPeriod.list')}}" class="btn mb-1 waves-effect waves-light btn-primary" style="float: right">
                        <i class="ti ti-list"></i> Kỳ đánh giá
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            @csrf
            <div class="table-responsive rounded-2">
                <table class="table table-striped text-nowrap customize-table mb-0 align-middle table-empReview">
                    <thead class="text-dark fs-4">
                    <tr>
                        <th rowspan="2">
                            <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th rowspan="2">
                            <h6 class="fw-semibold mb-0">Ảnh</h6>
                        </th>
                        <th rowspan="2">
                            <h6 class="fw-semibold mb-0">Họ tên</h6>
                        </th>
                        <th rowspan="2">
                            <h6 class="fw-semibold mb-0">Phòng ban</h6>
                        </th>
                        <th rowspan="2">
                            <h6 class="fw-semibold mb-0">Chức danh</h6>
                        </th>
                        <th colspan="2" class="text-center">
                            <h6 class="fw-semibold mb-0">JobRank</h6>
                        </th>
                        <th colspan="2" class="text-center">
                            <h6 class="fw-semibold mb-0">Performance</h6>
                        </th>
                        <th rowspan="2">
                            <h6 class="fw-semibold mb-0">Trạng thái</h6>
                        </th>
                        <th rowspan="2">
                            <h6 class="fw-semibold mb-0">Thời hạn đánh giá</h6>
                        </th>
                        <th rowspan="2">
                            <h6 class="fw-semibold mb-0">Ngày đánh giá</h6>
                        </th>
                        <th class="th-action" rowspan="2">
                            <h6 class="fw-semibold mb-0">Thao tác</h6>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h6 class="fw-semibold mb-0">Tổng điểm</h6>
                        </th>
                        <th>
                            <h6 class="fw-semibold mb-0">Xếp loại</h6>
                        </th>
                        <th>
                            <h6 class="fw-semibold mb-0">Tổng điểm</h6>
                        </th>
                        <th>
                            <h6 class="fw-semibold mb-0">Xếp loại</h6>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="13">Không dữ liệu</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.selectAP').on('change',function (e) {
            e.preventDefault();
            let asID = $(this).val();
            let _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{route('employeeReview.getListEmpReview')}}",
                type: "POST",
                dataType: "JSON",
                data: {_token:_token, asID:asID},
                success: function (response) {
                    $('.table-empReview tbody').html(response.html)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })
    </script>
@endsection
