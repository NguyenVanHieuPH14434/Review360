@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('department.update', $department->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="title" class="form-label">Phòng ban</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $department->title}}" id="title">
                @error('title')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') ?? $department->description}}</textarea>
                @error('description')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Trạng thái</label>
                <select class="form-select @error('status') is-invalid @enderror" name="status">
                    @php
                        $status = old('status') == 1 || $department->status !== 2 && ! old('status') ? true : false;
                    @endphp
                    <option {{ $status ? "selected" : "" }} value="1">Hoạt động</option>
                    <option {{ ! $status ? "selected" : "" }} value="2">Không hoạt động</option>
                </select>
            </div>
            <a href="{{ route('department.list') }}" class="btn btn-danger rounded-pill px-4 waves-effect waves-light">Danh sách</a>
            <a href="{{ route('department.create') }}" class="btn btn-success rounded-pill px-4 waves-effect waves-light">
                Tạo mới
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">Save</button>
        </form>
    </div>
@endsection
