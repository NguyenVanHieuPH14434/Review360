@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Người dùng" action="Cập nhật"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Cập nhật thông tin người dùng">
            <x-slot:create>
                <a href="{{ route('user.create') }}" class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-plus"></i> Tạo mới
                </a>
            </x-slot:create>  
        </x-card-title>
        <form class="card-body" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">
                <x-form-input name="name" label="Họ và tên" required="true" :oldValue="old('name') ?? $user->name" />
                @php
                    $isSelected = customIsSelected('role_id', $user, 'role_id');
                @endphp
                <x-form-select :select="$roles" label="Role" name="role_id" required="true" :isSelected="$isSelected" select2="true" />
            </div>
            <div class="row">
                @php
                    $selectedJobTitle = customIsSelected('job_title_id', $user, 'job_title_id');
                    $selectedDepartment = customIsSelected('department_id', $user, 'department_id');
                @endphp
                <x-form-select :select="$listJobTitle" label="Chức danh" name="job_title_id" required="true"
                :isSelected="$selectedJobTitle" select2="true" />
                <x-form-select :select="$listDepartment" label="Phòng ban" name="department_id" required="true"
                :isSelected="$selectedDepartment" select2="true" />
            </div>
            <div class="row">
                <x-form-input name="email" label="Email" required="true" :oldValue="old('email') ?? $user->email" />
                @php
                    $selectedManagement = customIsSelected('direct_management', $user, 'direct_management');
                @endphp
                <x-form-select :select="$listUser" label="Quản lý trực tiếp" name="direct_management" required="true"
                :isSelected="$selectedManagement" select2="true" />
            </div>
            <div class="row">
                <x-form-input name="work_start_date" label="Ngày bắt đầu làm việc" required="true" :oldValue="old('work_start_date') ?? date('d-m-Y', strtotime($user->work_start_date))" datepicker="true" />
                @php
                    $selectedStatus = customIsSelected('status', $user, 'status');
                @endphp
                <x-form-select :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" label="Trạng thái" name="status" :isSelected="$selectedStatus" />
            </div>
            <div class="row">
                <x-form-input name="avatar" label="Avatar" :oldValue="old('avatar')" type="file" previewImg="true" />
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Ảnh cũ</label> <br>
                    <img src="{{ asset($user->avatar) }}" width="100" height="80" alt="{{$user->avatar}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i>
                    Lưu lại
                </div>
            </button>
        </form>
    </div>
@endsection
