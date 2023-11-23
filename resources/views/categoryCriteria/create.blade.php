@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Nhóm tiêu chí" action="Tạo mới"/>
@endsection
@section('content')
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm title-form">Tạo mới</h5>
            <div class="box-action">
                <a href="{{route('categoryCriteria.list')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-list"></i> Danh sách
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('categoryCriteria.store') }}" method="POST">
                @csrf
                @include('categoryCriteria.form')
            </form>
        </div>
    </div>
@endsection
