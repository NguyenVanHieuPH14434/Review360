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
            <h5 class="card-title fw-semibold mb-0 lh-sm title-form">Tạo mới</h5>
            <div class="box-action">
                <a href="{{route('assessmentPeriod.list')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-list"></i> Danh sách
                </a>
            </div>
        </div>
        <div class="card-body wizard-content">
            <form action="{{ route('assessmentPeriod.store') }}" method="POST" class="tab-wizard wizard-circle wizard clearfix">
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
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="tb-title">Kỳ đánh giá <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="tb-title" name="title" value="{{ old('title') ?? $assessmentPeriod->title }}">
                                @error('title')
                                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tb-status" class="floating-label">Sao chép từ kỳ đánh giá <span class="text-danger">*</span></label>
                                @php $status = old('status') ?? $assessmentPeriod->status @endphp
                                <select aria-label="Trạng thái" class="form-control hasSelect2 customSelect floating-control @error('status') is-invalid @enderror" name="status" id="tb-status">
                                    <option value="">Chọn loại đánh giá</option>
                                    <option value="1" {{ $status == 1 ? "selected" : "" }}>Job Rank</option>
                                    <option value="2" {{ $status == 2 ? "selected" : "" }}>Performance</option>
                                    <option value="1" {{ $status == 3 ? "selected" : "" }}>Tháng</option>
                                    <option value="1" {{ $status == 4 ? "selected" : "" }}>Quý</option>
                                    <option value="1" {{ $status == 5 ? "selected" : "" }}>Năm</option>
                                    <option value="1" {{ $status == 5 ? "selected" : "" }}>Đánh giá 360</option>
                                </select>
                                @error('status')
                                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tb-status" class="floating-label">Loại đánh giá <span class="text-danger">*</span></label>
                                @php $status = old('status') ?? $assessmentPeriod->status @endphp
                                <select aria-label="Trạng thái" class="form-control hasSelect2 customSelect floating-control @error('status') is-invalid @enderror" name="status" id="tb-status">
                                    <option value="">Chọn loại đánh giá</option>
                                    <option value="1" {{ $status == 1 ? "selected" : "" }}>Job Rank</option>
                                    <option value="2" {{ $status == 2 ? "selected" : "" }}>Performance</option>
                                    <option value="1" {{ $status == 3 ? "selected" : "" }}>Tháng</option>
                                    <option value="1" {{ $status == 4 ? "selected" : "" }}>Quý</option>
                                    <option value="1" {{ $status == 5 ? "selected" : "" }}>Năm</option>
                                </select>
                                @error('status')
                                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tb-title">Ngày bắt đầu<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="tb-title" name="title" value="{{ old('title') ?? $assessmentPeriod->title }}">
                                @error('title')
                                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tb-title">Ngày kết thúc<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="tb-title" name="title" value="{{ old('title') ?? $assessmentPeriod->title }}">
                                @error('title')
                                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tb-status" class="floating-label">Trạng thái <span class="text-danger">*</span></label>
                                @php $status = old('status') ?? $assessmentPeriod->status @endphp
                                <select aria-label="Trạng thái" class="form-control hasSelect2 customSelect floating-control @error('status') is-invalid @enderror" name="status" id="tb-status">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="1" {{ $status == 1 ? "selected" : "" }}>Hoạt động</option>
                                    <option value="2" {{ $status == 2 ? "selected" : "" }}>Không hoạt động</option>
                                </select>
                                @error('status')
                                <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                            <div class="col-md-8 col-xl-9" style="margin: 15px 0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input primary check-outline outline-primary" type="checkbox" id="primary-outline-check" value="option1">
                                    <label class="form-check-label" for="primary-outline-check">Công khai điểm đánh giá</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input primary check-outline outline-primary" type="checkbox" id="primary2-outline-check" value="option1" checked="">
                                    <label class="form-check-label" for="primary2-outline-check">Công khai kết quả đánh giá</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="tb-description">Mô tả</label>
                                <textarea class="form-control" rows="12" style="height: 100px" id="tb-description" name="description">{{ old('description') ?? $assessmentPeriod->description }}</textarea>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="actions clearfix">
                    <ul role="menu" aria-label="Pagination">
                        <li aria-hidden="false" aria-disabled="false">
                            <a href="#next" role="menuitem" class="font-medium rounded-pill px-4">
                                <i class="ti ti-send me-2 fs-4"></i>Lưu và tiếp tục
                            </a>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection
