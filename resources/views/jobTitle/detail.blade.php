@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Chức danh" action="Chi tiết"/>
@endsection
@section('content')
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <!-- ---------------------
                                        start Form with view only
                                    ---------------- -->
                <div class="card">
                    <x-card-title title="Thông tin chức danh">
                        <x-slot:create>
                            <a href="{{ route('jobTitle.create') }}" class="btn mb-1 waves-effect waves-light btn-primary">
                                <i class="ti ti-plus"></i> Tạo mới
                            </a>
                        </x-slot:create>  
                    </x-card-title>
                    <form class="form-horizontal">
                        <div class="form-body">
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
                                <h5 class="card-title mb-0">Mô tả: </h5>
                                <span class="form-control-static">{{ $jobTitle->description }}</span>
                            </div>
                            <hr>
                            <div class="form-actions">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <a href="{{ route('jobTitle.edit', $jobTitle->id) }}"
                                                        class="btn btn-primary">
                                                        <i class="ti ti-edit fs-5"></i>
                                                        Cập nhật
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
