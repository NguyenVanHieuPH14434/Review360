@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Chức danh" action="Tạo mới"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Tạo mới" />
        <form class="card-body" action="{{ route('jobTitle.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Chức danh <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title">
                    @error('title')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @php
                    $isSelected = function ($key, $value){
                        return old('status') == $key;
                    };
                @endphp
                <x-form-select :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" label="Trạng thái" name="status" required="true" :isSelected="$isSelected"/>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
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
