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
                            <li class="breadcrumb-item" aria-current="page"> <a class="text-muted text-decoration-none" href="{{route('categoryCriteria.list')}}">Thể loại tiêu chí</a></li>
                            <li class="breadcrumb-item" aria-current="page">Cập nhật</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm title-form">Cập nhật</h5>
            <div class="box-action">
                <a href="{{route('categoryCriteria.list')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-list"></i> Danh sách
                </a>
                <a href="{{route('categoryCriteria.create')}}" class="btn mb-1 waves-effect waves-light btn-success">
                    <i class="ti ti-plus"></i> Tạo mới
                </a>
                <a href="{{route('categoryCriteria.show', $categoryCriteria->id)}}" class="btn mb-1 waves-effect waves-light btn-warning">
                    <i class="ti ti-eye"></i> Chi tiết
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('categoryCriteria.update',$categoryCriteria->id) }}" method="POST">
                @method('PUT')
                @csrf
                @include('categoryCriteria.form')
            </form>
        </div>
    </div>
@endsection
