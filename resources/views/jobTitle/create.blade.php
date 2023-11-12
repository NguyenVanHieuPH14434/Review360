@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('jobTitle.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Chức danh</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title">
                @error('title')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Trạng thái</label>
                <select class="form-select @error('status') is-invalid @enderror" name="status">
                    <option value="1">Hoạt động</option>
                    <option value="2">Không hoạt động</option>
                </select>
                @error('status')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <a href="{{ route('jobTitle.list') }}" class="btn btn-danger rounded-pill px-4 waves-effect waves-light">Danh
                sách</a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">Save</button>
        </form>
    </div>
@endsection
