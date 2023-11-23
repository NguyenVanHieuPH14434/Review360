@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Tạo chức danh" action="Tạo mới"/>
@endsection
@section('content')
<div class="card">
    <x-card-title title="Tạo mới" />
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                        <h5 class="card-title fw-semibold">Ảnh hồ sơ của bạn</h5>
                        <div class="text-center">
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" id="previewImage" alt="" class="img-fluid rounded-circle" width="120" height="120">
                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                            <x-form-input name="avatar" class="preview-img-none d-none" label="Avatar" :oldValue="old('avatar')" type="file" previewImg="true" />
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
                                <x-form-select :select="$roles" class="col" label="Role" name="role_id" required="true" select2="true" />
                            </div>
                            <div class="mb-4">
                                <x-form-select :select="$levels" class="col" label="Level" name="level" required="true"
                                select2="true" />
                            </div>
                            <div class="">
                                <x-form-select class="col" :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" label="Trạng thái" name="status"/>
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
                                    <x-form-input class="col" name="name" label="Họ và tên" required="true" :oldValue="old('name')" placeholder="Họ và tên" />
                                </div>
                                <div class="mb-4">
                                    <x-form-input class="col" name="email" label="Email" required="true" :oldValue="old('email')" placeholder="Email" />
                                </div>
                                <div class="mb-4">
                                    <x-form-input class="col" name="work_start_date" label="Ngày bắt đầu làm việc" required="true" :oldValue="old('work_start_date')" 
                                    datepicker="true" autocomplete="off" placeholder="Ngày bắt đầu làm việc" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <x-form-select class="col" :select="$listJobTitle" label="Chức danh" name="job_title_id" required="true"
                                    select2="true" />
                                </div>
                                <div class="mb-4">
                                    <x-form-select class="col" :select="$listDepartment" label="Phòng ban" name="department_id" required="true"
                                    select2="true" />
                                </div>
                                <div class="mb-4">
                                    <x-form-select :select="$listUser" class="col" label="Quản lý trực tiếp" name="direct_management" required="true"
                                    select2="true" />
                                </div>
                            </div>
                            <div class="col-12">
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
