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
    @csrf
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm title-form">Tạo mới</h5>
            <div class="box-action">
                <a href="{{route('assessmentPeriod.list')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-list"></i> Danh sách
                </a>
            </div>
        </div>
        <div class="card-body wizard-content">
            <form action="{{ route('assessmentPeriod.updateStep2', $assessmentPeriod->id) }}" method="POST" class="tab-wizard wizard-circle wizard clearfix">
                @csrf
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                            <a id="steps-uid-5-t-0" class="done" href="#steps-uid-5-h-0" aria-controls="steps-uid-5-p-0">
                                <span class="current-info audible">current step: </span>
                                <span class="step">1</span> Thiết lập kỳ đánh giá
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false" class="current" aria-selected="true">
                            <a id="steps-uid-5-t-1" href="#steps-uid-5-h-1" aria-controls="steps-uid-5-p-1">
                                <span class="step">2</span> Thiết lập nhân viên
                            </a>
                        </li>
                        <li role="tab" class="disabled" aria-disabled="true">
                            <a id="steps-uid-5-t-2" href="#steps-uid-5-h-2" aria-controls="steps-uid-5-p-2">
                                <span class="step">3</span> Thiết lập người đánh giá</a>
                        </li>
                    </ul>
                </div>
                <div class="content clearfix">
                    <!-- Step 1 -->
                    <h6 id="steps-uid-5-h-0" tabindex="-1" class="title current">Personal Info</h6>
                    <section id="steps-uid-5-p-0" role="tabpanel" aria-labelledby="steps-uid-5-h-0" class="body current" aria-hidden="false" style="">
                        <div class="row">
                            <h5 style="margin-bottom:  20px">Tìm kiếm nhân viên</h5>
                            <div class="col-md-6 mb-3">
                                <label for="tb-status" class="floating-label">Phòng ban</label>
                                <select aria-label="Phòng ban" multiple="multiple" class="selectEmp hasSelect2 form-control selectDepartment customSelect floating-control" name="departments[]" id="selectDepartment"  aria-placeholder="Tìm kiếm theo phòng ban">
                                    @if(!empty($departments))
                                        @foreach($departments as $key => $department)
                                            <option value="{{$key}}">{{$department}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tb-status" class="floating-label">Chức danh</label>
                                <select aria-label="Chức danh" multiple="multiple" class="selectEmp hasSelect2 form-control selectJobTitle customSelect floating-control" name="jobTitles[]" id="selectJobTitle"  aria-placeholder="Tìm kiếm theo chức danh">
                                    @if(!empty($jobTitles))
                                        @foreach($jobTitles as $key => $jobTitle)
                                            <option value="{{$key}}">{{$jobTitle}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label">Level</label>
                                <select class="form-select hasSelect2 customSelect selectEmp" name="levels[]" multiple id="selectLevel" aria-placeholder="Tìm kiếm theo level">
                                    @foreach(config('constants.level') as $key => $level)
                                        <option value="{{$key}}">{{$level}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label">Nhân viên</label>
                                <select class="form-select hasSelect2 selectEmp customSelect @error('status') is-invalid @enderror" name="users[]" multiple id="selectUser" aria-placeholder="Tìm kiếm theo nhân viên">
                                    @foreach($users as $k => $user)
                                        <option value="{{$k}}">{{$user}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-eval-form">

                            </div>
                        </div>
                    </section>
                </div>
                <div class="actions clearfix">
                    <ul role="menu" aria-label="Pagination">
                        <li aria-hidden="false" aria-disabled="false">
                            <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                <i class="ti ti-send me-2 fs-4"></i>Lưu và tiếp tục
                            </button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.selectEmp').on('change', function (e){
            e.preventDefault();
            let departments = $('#selectDepartment').val();
            let jobTitles = $('#selectJobTitle').val();
            let levels = $('#selectLevel').val();
            let users = $('#selectUser').val();
            let _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{route('assessmentPeriod.getListUser')}}",
                type: "POST",
                dataType: "JSON",
                data: {_token:_token, departments:departments, jobTitles:jobTitles, levels:levels, users:users} ,
                success: function (response) {
                    console.log(response.html);
                    $('.box-eval-form').html(response.html)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })
    </script>
@endsection
