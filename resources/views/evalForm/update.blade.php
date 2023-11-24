@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Tạo tiêu chí đánh giá" action="Tạo mới"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Tạo mới" />
        <form class="card-body" action="{{ route('evaluationCriteria.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-label">Tiêu chí<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title">
                    @error('title')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="cat_criteria" class="form-label">Loại tiêu chí<span class="text-danger">*</span></label>
                    <select class="form-select hasSelect2 customSelect @error('status') is-invalid @enderror" name="cat_criteria" id="cat_criteria">
                            <option value="">Chọn loại tiêu chí</option>
                            @foreach($listCategoryCriteria as $categoryCriteria)
                                <option value="{{$categoryCriteria->id}}">{{$categoryCriteria->title}}</option>
                            @endforeach
                    </select>
                    @error('status')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Hoạt động</option>
                        <option value="2">Không hoạt động</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="criterion_level" class="form-label">Cấp độ mục tiêu</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="criterion_level" id="criterion_level">
                        @foreach(config('constants.criterion_level') as $key => $criterion_level)
                            <option value="{{$key}}">{{$criterion_level}}</option>
                         @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="job_title" class="form-label">Chức danh<span class="text-danger">*</span></label>
                    <select class="form-select hasSelect2 customSelect @error('status') is-invalid @enderror" name="job_title" multiple id="job_title" aria-placeholder="Chọn chức danh">
                        @foreach($listJobTitle as $jobTitle)
                        <option value="{{$jobTitle->id}}">{{$jobTitle->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="department" class="form-label">Phòng ban</label>
                    <select class="form-select hasSelect2 customSelect @error('status') is-invalid @enderror" name="department" id="department">
                        <option value="">Chọn phòng ban</option>
                        @foreach($listDepartments as $department)
                        <option value="{{$department->id}}">{{$department->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="department" class="form-label">Nhân viên</label>
                    <select class="form-select hasSelect2 customSelect @error('status') is-invalid @enderror" name="department" id="department">
                        <option value="">Chọn nhân viên</option>
                        @foreach($listDepartments as $department)
                        <option value="{{$department->id}}">{{$department->title}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Mô tả tiêu chí<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="criterion_level" class="form-label">Mô tả thang điểm đánh giá<span class="text-danger">*</span></label>
                        @foreach($listAssessmentSetup as $assessmentSetup)
                        <div class="col-md-12 mb-3">
                            <label>Level {{$assessmentSetup->number_level}}</label>
                            <div class="row">
                                <div class="col-md-9">
                                  <div class="mb-1">
                                    <input type="text" class="form-control" placeholder="Mô tả ..." name="levelDescription[{{$assessmentSetup->number_level}}]">
                                  </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i>
                    Lưu lại
                </div>
            </button>
        </form>
    </div>
@endsection