@extends('layouts.master')
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Kỳ đánh giá</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"> <a class="text-muted text-decoration-none" href="{{route('assessmentPeriod.list')}}">Kỳ đánh giá</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tạo mới</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm title-form">Thiết lập người đánh giá</h5>
            <div class="box-action">
                <a href="{{route('assessmentPeriod.list')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-list"></i> Danh sách
                </a>
            </div>
        </div>
        <div class="card-body wizard-content">
            <div class="tab-wizard wizard-circle wizard clearfix">
                @csrf
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                            <a id="steps-uid-5-t-0" class="done" href="#steps-uid-5-h-0" aria-controls="steps-uid-5-p-0">
                                <span class="current-info audible">current step: </span>
                                <span class="step">1</span> Thiết lập kỳ đánh giá
                            </a>
                        </li>
                        <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                            <a id="steps-uid-5-t-1" href="#steps-uid-5-h-1" aria-controls="steps-uid-5-p-1">
                                <span class="step">2</span> Thiết lập mẫu đánh giá
                            </a>
                        </li>
                        <li role="tab" aria-disabled="true" class="current">
                            <a id="steps-uid-5-t-2" href="#steps-uid-5-h-2" aria-controls="steps-uid-5-p-2">
                                <span class="step">3</span> Thiết lập người đánh giá</a>
                        </li>
                    </ul>
                </div>
                <div class="content clearfix">
                    <!-- Step 1 -->
                    <h6 id="steps-uid-5-h-0" tabindex="-1" class="title current">Personal Info</h6>
                    <section id="steps-uid-5-p-0" role="tabpanel" aria-labelledby="steps-uid-5-h-0" class="body current" aria-hidden="false" style="">
                        <h5>Nhân viên đánh giá</h5>
                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Ảnh</th>
                                <th>Họ và tên</th>
                                <th>Phòng ban</th>
                                <th>Chức danh</th>
                                <th>Quản lý trực tiếp</th>
                                <th>Người đánh giá</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $key => $row)
                                    <tr>
                                        <td>
                                            {{$key+1}}
                                        </td>
                                        <td id="avatar-{{$row->user_id}}">
                                            <p class="mb-0 fw-normal fs-4">
                                                <img src="{{ asset($row->user->avatar) }}" width="60" height="60" class="img-fluid rounded-circle" alt="{{$row->user->avatar}}">
                                            </p>
                                        </td>
                                        <td id="info-{{$row->user_id}}">
                                            <p class="mb-0 fw-normal fs-4 username">{{$row->user->name}}</p>
                                            <p class="mb-0 fw-normal fs-2 userCode">{{$row->user->code}}</p>
                                            <p class="mb-0 fw-normal fs-2 userEmail">{{$row->user->email}}</p>
                                        </td>
                                        <td id="department-{{$row->user_id}}">
                                            <p class="mb-0 fw-normal fs-4">{{ $row->user->getDepartment ? $row->user->getDepartment->title : '' }}</p>
                                        </td>
                                        <td id="jobTitle-{{$row->user_id}}">
                                            <p class="mb-0 fw-normal fs-4 jobTitle">{{ $row->user->getJobTitle ? $row->user->getJobTitle->title : '' }}</p>
                                            <p class="mb-0 fw-normal fs-4 level">{{$row->user->level_id != '' ? config('constants.level')[$row->user->level_id] : ''}}</p>
                                        </td>
                                        <td id="management-{{$row->user_id}}">
                                            <p class="mb-0 fw-normal fs-4">{{ $row->user->getManagement ? $row->user->getManagement->name : '' }}</p>
                                        </td>
                                        <td>
                                            @if(count($row->reviewers) > 0)
                                                @foreach($row->reviewers as $item)
                                                    <p class="mb-0 fw-normal fs-4 username">
                                                        {{$item->user->name}}
                                                         - Trọng số: {{$item->weighting}}%
                                                        @if($item->principal_reviewer == 1)
                                                            <span class="mb-1 badge rounded-pill font-medium bg-primary-subtle text-primary">Đánh giá chính</span>
                                                        @endif
                                                    </p>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="td-action">
                                            <a href="javascript:void(0)" class="add_reviewer" data-id="{{$row->id}}" data-userId="{{$row->user_id}}"><i class="ti ti-plus btn-update"></i></a>
                                            <a href="javascript:void(0)" class="update_reviewer"><i class="ti ti-pencil btn-update"></i></a>
                                            <a href="javascript:void(0)" class="delete-user" data-flag="confirm"><i class="ti ti-trash btn-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">Không có dữ liệu</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade hide modal-reviewer" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="reviewerModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                       Thêm người đánh giá nhân viên
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info font-medium rounded-pill px-4 btn-reviewer">
                        <i class="ti ti-send me-2 fs-4"></i>Lưu lại
                    </button>
                    <button type="button" class="btn btn-danger font-medium rounded-pill px-4" data-bs-dismiss="modal">
                        <i class="ti ti-trash me-2 fs-4"></i> Hủy
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.add_reviewer').on('click',function (e){
                e.preventDefault();
                let userid = $(this).data('userid');
                let _token = $('input[name="_token"]').val();
                let userInfo = {
                    id: $(this).data('id'),
                    user_id: userid,
                    name: $('#info-' + userid + ' .username').html(),
                    code: $('#info-'+userid+' .userCode').html(),
                    email : $('#info-'+userid+' .userEmail').html(),
                    department: $('#department-'+userid+' p').html(),
                    jobTitle: $('#jobTitle-'+userid+' p.jobTitle').html(),
                    level: $('#jobTitle-'+userid+' p.level').html(),
                    management: $('#management-'+userid+' p').html(),
                };

                $.ajax({
                    url: "{{route('assessmentPeriod.getListReviewer')}}",
                    type: "POST",
                    dataType: "JSON",
                    data: {_token:_token, userid:userid,userInfo: userInfo},
                    success: function (response) {
                        $('.modal-reviewer .modal-body').html(response.html);
                        $('.modal-reviewer').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            })
        })
    </script>
@endsection
