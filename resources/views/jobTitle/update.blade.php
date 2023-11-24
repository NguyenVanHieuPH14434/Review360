@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Chức danh" action="Cập nhật"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Cập nhật">
            <x-slot:create>
                <a href="{{ route('jobTitle.create') }}" class="btn mb-1 waves-effect waves-light btn-success">
                    <i class="ti ti-plus"></i> Tạo mới
                </a>
            </x-slot:create>  
            <x-slot:view>
                <a href="{{ route('jobTitle.show', $jobTitle->id) }}" class="btn mb-1 waves-effect waves-light btn-warning">
                    <i class="ti ti-eye"></i> Chi tiết
                </a>
            </x-slot:view>  
        </x-card-title>
        <form class="card-body" action="{{ route('jobTitle.update', $jobTitle->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Chức danh <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $jobTitle->title}}" id="title">
                    @error('title')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @php
                    $isSelected = function ($key, $value) use ($jobTitle){
                        return old('status') == $key || ($jobTitle->status == $key && !old('status'));
                    };
                @endphp
                <x-form-select :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" label="Trạng thái" name="status" required="true" :isSelected="$isSelected"/>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') ?? $jobTitle->description}}</textarea>
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
