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
                            <li class="breadcrumb-item" aria-current="page">Thiết lập nhân viên đánh giá</li>
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
            <h5 class="card-title fw-semibold mb-0 lh-sm title-form">Thiết lập nhân viên đánh giá</h5>
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
                            <a id="steps-uid-5-t-0" class="done" href="{{route('assessmentPeriod.edit',$assessmentPeriod->id)}}" aria-controls="steps-uid-5-p-0">
                                <span class="current-info audible">current step: </span>
                                <span class="step">1</span> Thiết lập kỳ đánh giá
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false" class="current" aria-selected="true">
                            <a id="steps-uid-5-t-1" href="javascript:void(0)" aria-controls="steps-uid-5-p-1">
                                <span class="step">2</span> Thiết lập nhân viên đánh giá
                            </a>
                        </li>
                        <li role="tab" class="disabled" aria-disabled="true">
                            <a id="steps-uid-5-t-2" href="javascript:void(0)" aria-controls="steps-uid-5-p-2">
                                <span class="step">3</span> Thiết lập người đánh giá</a>
                        </li>
                    </ul>
                </div>
                <div class="content clearfix">
                   @include('assessmentPeriod.form_step2')
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
