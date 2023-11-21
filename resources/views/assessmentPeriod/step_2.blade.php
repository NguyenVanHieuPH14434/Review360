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
                                <span class="step">2</span> Thiết lập mẫu đánh giá
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
                            <div class="col-md-4 mb-3">
                                <label for="tb-status" class="floating-label">Phòng ban<span class="text-danger">*</span></label>
                                @php $status = old('status') ?? $assessmentPeriod->status @endphp
                                <select aria-label="Phòng ban" multiple="multiple" class="form-control selectDepartment customSelect floating-control @error('status') is-invalid @enderror" name="status" id="selectDepartment">
                                    <option value="">Chọn phòng ban áp dụng</option>
                                    @if(!empty($departments))
                                        @foreach($departments as $key => $department)
                                            <option value="{{$key}}">{{$department}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('status')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tb-status" class="floating-label">Chức danh<span class="text-danger">*</span></label>
                                @php $status = old('status') ?? $assessmentPeriod->status @endphp
                                <select aria-label="Chức danh" multiple="multiple" class="form-control selectJobTitle customSelect floating-control @error('status') is-invalid @enderror" name="status" id="selectJobTitle">
                                    <option value="">Chọn chức danh áp dụng</option>
                                    @if(!empty($jobTitles))
                                        @foreach($jobTitles as $key => $jobTitle)
                                            <option value="{{$key}}">{{$jobTitle}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('status')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tb-status" class="floating-label">Nhân viên<span class="text-danger">*</span></label>
                                @php $status = old('status') ?? $assessmentPeriod->status @endphp
                                <select aria-label="Trạng thái" id="selectUser" class="form-control customSelect floating-control @error('status') is-invalid @enderror" name="status">
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
                            <div class="box-eval-form">
                                <h5>Mẫu đánh giá</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mẫu đánh giá</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3">Không có dữ liệu</td>
                                        </tr>
                                    </tbody>
                                </table>
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
        $('#selectDepartment,#selectJobTitle,#selectUser').select2( {
            theme: 'bootstrap-5',
        });
    </script>
@endsection
