@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Nhóm tiêu chí" action="Cập nhật"/>
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
