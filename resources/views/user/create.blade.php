@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Tạo chức danh" action="Tạo mới"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Tạo mới" />
        <form class="card-body" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <x-form-input name="name" label="Họ và tên" required="true" :oldValue="old('name')" />
                <x-form-select :select="$roles" label="Role" name="role_id" required="true" select2="true" />
            </div>
            <div class="row">
                <x-form-select :select="$listJobTitle" label="Chức danh" name="job_title_id" required="true"
                select2="true" />
                <x-form-select :select="$listDepartment" label="Phòng ban" name="department_id" required="true"
                select2="true" />
            </div>
            <div class="row">
                <x-form-input name="email" label="Email" required="true" :oldValue="old('email')" />
                <x-form-select :select="$listUser" label="Quản lý trực tiếp" name="direct_management" required="true"
                select2="true" />
            </div>
            <div class="row">
                <x-form-input name="work_start_date" label="Ngày bắt đầu làm việc" required="true" :oldValue="old('work_start_date')" datepicker="true" />
                <x-form-select :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" label="Trạng thái" name="status"/>
            </div>
            <div class="row">
                <x-form-input name="avatar" label="Avatar" :oldValue="old('avatar')" type="file" previewImg="true" />
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
