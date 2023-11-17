@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Phòng ban" action="Cập nhật"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Cập nhật phòng ban">
            <x-slot:create>
                <a href="{{ route('department.create') }}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-plus"></i> Tạo mới
                </a>
            </x-slot:create>  
        </x-card-title>
        <form class="card-body" action="{{ route('department.update', $department->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Phòng ban <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $department->title}}" id="title">
                    @error('title')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status">
                        @php
                            $status = old('status') == 1 || $department->status !== 2 && ! old('status') ? true : false;
                        @endphp
                        <option value="">Chọn trạng thái</option>
                        <option {{ $status ? "selected" : "" }} value="1">Hoạt động</option>
                        <option {{ ! $status ? "selected" : "" }} value="2">Không hoạt động</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') ?? $department->description}}</textarea>
                    @error('description')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
