@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('jobTitle.import') }}" method="POST" enctype="multipart/form-data">
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
            <a href="{{ route('jobTitle.list') }}" class="btn btn-danger rounded-pill px-4 waves-effect waves-light">
                Tải mẫu import
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">Save</button>
        </form>
    </div>
@endsection
