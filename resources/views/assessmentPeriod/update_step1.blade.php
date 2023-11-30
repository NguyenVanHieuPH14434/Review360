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
                            <li class="breadcrumb-item" aria-current="page">Thiết lập kỳ đánh giá</li>
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
            <h5 class="card-title fw-semibold mb-0 lh-sm title-form">Thiết lập kỳ đánh giá</h5>
            <div class="box-action">
                <a href="{{route('assessmentPeriod.list')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-list"></i> Danh sách
                </a>
            </div>
        </div>
        <div class="card-body wizard-content">
            <form action="{{ route('assessmentPeriod.updateStep01', $assessmentPeriod->id) }}" method="POST" class="tab-wizard wizard-circle wizard clearfix">
                @method('PUT')
                @csrf
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                            <a id="steps-uid-5-t-0" class="done" href="javascript:void(0)" aria-controls="steps-uid-5-p-0">
                                <span class="current-info audible">current step: </span>
                                <span class="step">1</span> Thiết lập kỳ đánh giá
                            </a>
                        </li>
                        <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                            <a id="steps-uid-5-t-1" href="{{route('assessmentPeriod.editStep2', $assessmentPeriod->id)}}" aria-controls="steps-uid-5-p-1">
                                <span class="step">2</span> Thiết lập mẫu đánh giá
                            </a>
                        </li>
                        <li role="tab" aria-disabled="true" class="current done">
                            <a id="steps-uid-5-t-2" href="#steps-uid-5-h-2" aria-controls="steps-uid-5-p-2">
                                <span class="step">3</span> Thiết lập người đánh giá</a>
                        </li>
                    </ul>
                </div>
                <div class="content clearfix">
                    <!-- Step 1 -->
                    @include('assessmentPeriod.form_step1')
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
        $("#date-range").datepicker({
            toggleActive: true,
            format:'dd/mm/yyyy'
        });
    </script>
@endsection
