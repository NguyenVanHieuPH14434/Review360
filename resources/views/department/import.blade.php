@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Phòng ban" action="Import"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Import" label="Tải mẫu import" />
        <form class="card-body" action="{{ route('department.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Upload file</label>
                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file">
                @error('file')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @if (Session::has("import_error"))
                    @foreach (Session::get("import_error") as $failure)
                        <span class="text-danger" role="alert">
                            <strong>{{ $failure->errors()[0] }} Error at line: {{ $failure->row() }}</strong>
                        </span>
                    @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">
                <i class="ti ti-send me-2 fs-4"></i>
                Lưu lại
            </button>
        </form>
    </div>
@endsection
