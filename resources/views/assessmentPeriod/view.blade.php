@extends('layouts.master')
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Nhóm tiêu chí</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"> <a class="text-muted text-decoration-none" href="#">Nhóm tiêu chí</a></li>
                            <li class="breadcrumb-item" aria-current="page">Xem chi tiết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Chi tiết</h5>
            <div class="box-action">
                <a href="{{route('categoryCriteria.list')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-list"></i> Danh sách
                </a>
                <a href="{{route('categoryCriteria.create')}}" class="btn mb-1 waves-effect waves-light btn-success">
                    <i class="ti ti-plus"></i> Tạo mới
                </a>
                <a href="{{route('categoryCriteria.edit',$categoryCriteria->id)}}" class="btn mb-1 waves-effect waves-light btn-secondary">
                    <i class="ti ti-edit"></i> Cập nhật
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-end col-md-3">Nhóm tiêu chí:</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{{$categoryCriteria->title}}</p>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-end col-md-3">Trạng thái:</label>
                        <div class="col-md-9">
                            <p class="form-control-static">
                                <span class="mb-1 badge rounded-pill {{config('constants.badge-status')[$categoryCriteria->status]}} fw-semibold fs-2">{{config('constants.status')[$categoryCriteria->status]}}</span>
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
                        <label class="control-label text-end col-md-3">Mô tả:</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{{$categoryCriteria->description}}</p>
                        </div>
                    </div>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-end col-md-3">Ngày tạo:</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{{$categoryCriteria->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-end col-md-3">Ngày cập nhật:</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{{$categoryCriteria->updated_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
        </div>
    </div>
@endsection
