@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- ---------------------
                                        start Form with view only
                                    ---------------- -->
                <div class="card">
                    <div class="card-header text-bg-primary">
                        <h5 class="mb-0 text-white">Form with view only</h5>
                    </div>
                    <form class="form-horizontal">
                        <div class="form-body">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Thông tin chức danh</h5>
                            </div>
                            <hr class="mt-0 mb-5">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-end col-md-3">Mã chức danh:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">{{ $jobTitle->job_title_code }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-end col-md-3">Ngày tạo:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">{{ $jobTitle->created_at->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-end col-md-3">Chức danh:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">{{ $jobTitle->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-end col-md-3">Ngày cập nhật:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">{{ $jobTitle->updated_at->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-end col-md-3">Trạng thái:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    {{ $jobTitle->status !== 2 ? 'Hoạt động' : 'Không hoạt động' }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-0">Mô tả</h5>
                            </div>
                            <hr>
                            <div class="row card-body">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <p class="form-control-static">{{ $jobTitle->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <a href="{{ route('jobTitle.list') }}" class="btn btn-danger">
                                                        Danh sách
                                                    </a>
                                                    <a href="{{ route('jobTitle.create') }}" class="btn btn-success">
                                                        Tạo mới
                                                    </a>
                                                    <a href="{{ route('jobTitle.edit', $jobTitle->id) }}"
                                                        class="btn btn-primary">
                                                        <i class="ti ti-edit fs-5"></i>
                                                        Update
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ---------------------
                                        start Form with view only
                                    ---------------- -->
            </div>
        </div>
    </div>
@endsection
