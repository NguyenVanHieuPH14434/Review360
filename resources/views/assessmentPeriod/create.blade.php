@extends('layouts.master')
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Kỳ đánh giá</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"> <a class="text-muted text-decoration-none" href="{{route('assessmentPeriod.list')}}">Kỳ đánh giá</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tạo mới</li>
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
            <h5 class="card-title fw-semibold mb-0 lh-sm title-form">Tạo mới</h5>
            <div class="box-action">
                <a href="{{route('assessmentPeriod.list')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-list"></i> Danh sách
                </a>
            </div>
        </div>
        <div class="card-body wizard-content">
            <form action="{{ route('assessmentPeriod.store') }}" method="POST" class="tab-wizard wizard-circle wizard clearfix">
                @csrf
                @include('assessmentPeriod.step_1')
            </form>
        </div>
    </div>
@endsection
