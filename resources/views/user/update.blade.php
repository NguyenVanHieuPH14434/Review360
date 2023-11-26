@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Người dùng" action="Cập nhật"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Cập nhật">
            <x-slot:create>
                <a href="{{ route('user.create') }}" class="btn mb-1 waves-effect waves-light btn-success">
                    <i class="ti ti-plus"></i> Tạo mới
                </a>
            </x-slot:create>  
            <x-slot:view>
                <a href="{{ route('user.show', $user->id) }}" class="btn mb-1 waves-effect waves-light btn-warning">
                    <i class="ti ti-eye"></i> Chi tiết
                </a>
            </x-slot:view>  
        </x-card-title>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                @php
                    $isSelected = customIsSelected('role_id', $user, 'role_id');
                    $selectedJobTitle = customIsSelected('job_title_id', $user, 'job_title_id');
                    $selectedDepartment = customIsSelected('department_id', $user, 'department_id');
                    $selectedManagement = customIsSelected('direct_management', $user, 'direct_management');
                    $selectedStatus = customIsSelected('status', $user, 'status');
                    $selectedLevel = customIsSelected('level', $user, 'level');
                @endphp
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100 position-relative overflow-hidden">
                            <div class="card-body p-4">
                            <h5 class="card-title fw-semibold">Ảnh hồ sơ của bạn</h5>
                            <div class="text-center">
                                <img src="{{ asset(session('image') ?? $user->avatar) }}" id="previewImage" alt="" class="img-fluid rounded-circle" width="120" height="120">
                                <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                <x-form-input name="avatar" class="preview-img-none d-none" label="Avatar" :oldValue="old('avatar')" type="file" previewImg="true" />
                                <input type="hidden" value="{{ session('image') ?? null }}" name="tmp_image">
                                <input type="hidden" value="{{ session('originName') ?? null }}" name="origin_name">
                                <label for="avatar" class="btn btn-primary">Tải lên</label>
                                </div>
                                <p class="mb-0">Allowed JPG, JPEG or PNG. Max size of 5MB</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100 position-relative overflow-hidden">
                            <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Thông tin cá nhân</h5>
                                <div class="mb-4">
                                    <x-form-select :select="$roles" class="col" label="Role" name="role_id" required="true" select2="true"
                                    :isSelected="$isSelected" />
                                </div>
                                <div class="mb-4">
                                    <x-form-select :select="$levels" class="col" label="Level" name="level" required="true"
                                    :isSelected="$selectedLevel" select2="true" />
                                </div>
                                <div class="">
                                    <x-form-select class="col" :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" label="Trạng thái" name="status"
                                    :isSelected="$selectedStatus"/>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="card w-100 position-relative overflow-hidden mb-0">
                            <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Thông tin cá nhân</h5>
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <x-form-input class="col" name="name" label="Họ và tên" required="true" :oldValue="old('name') ?? $user->name" placeholder="Họ và tên" />
                                    </div>
                                    <div class="mb-4">
                                        <x-form-input class="col" name="email" label="Email" required="true" :oldValue="old('email') ?? $user->email" placeholder="Email" />
                                    </div>
                                    <div class="mb-4">
                                        <x-form-input class="col" name="work_start_date" label="Ngày bắt đầu làm việc" required="true" :oldValue="old('work_start_date') ?? $user->work_start_date" 
                                        datepicker="true" autocomplete="off" placeholder="Ngày bắt đầu làm việc" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <x-form-select class="col" :select="$listJobTitle" label="Chức danh" name="job_title_id" required="true"
                                        :isSelected="$selectedJobTitle" select2="true" />
                                    </div>
                                    <div class="mb-4">
                                        <x-form-select class="col" :select="$listDepartment" label="Phòng ban" name="department_id" required="true"
                                        :isSelected="$selectedDepartment" select2="true" />
                                    </div>
                                    <div class="mb-4">
                                        <x-form-select :select="$users" class="col" label="Quản lý trực tiếp" name="direct_management" required="true"
                                        :isSelected="$selectedManagement" select2="true" />
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="col-3 d-flex align-items-center justify-content-start mt-4 gap-3">
                                        <button class="btn btn-warning back-page">
                                            <div class="d-flex align-items-center">
                                                <i class="ti ti-arrow-left"></i>
                                                Quay lại
                                            </div>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                        <button class="btn btn-primary">
                                            <div class="d-flex align-items-center">
                                                <i class="ti ti-send me-2 fs-4"></i>
                                                Lưu lại
                                            </div>
                                        </button>
                                        <input type="reset" class="btn bg-danger-subtle text-danger" value="Hủy bỏ"/>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="pills-notifications" role="tabpanel" aria-labelledby="pills-notifications-tab" tabindex="0">
                </div>
            </form>
        </div>
    </div>
@endsection
