@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Người dùng" action="Chi tiết" />
@endsection
@section('content')
<div class="card">
    <x-card-title title="Thông tin người dùng">
        <x-slot:create>
            <a href="{{ route('jobTitle.create') }}" class="btn mb-1 waves-effect waves-light btn-success">
                <i class="ti ti-plus"></i> Tạo mới
            </a>
        </x-slot:create>  
        <x-slot:update>
            <a href="{{ route('jobTitle.edit', $user->id) }}" class="btn mb-1 waves-effect waves-light btn-secondary">
                <i class="ti ti-edit"></i> Cập nhật
            </a>
        </x-slot:update>  
    </x-card-title>
    <div class="card-body">
        <div class="w-100">
            <div class="chat-container h-100 w-100">
                <div class="chat-box-inner-part h-100">
                    <div class="chatting-box app-email-chatting-box">
                        <div class="position-relative overflow-hidden">
                            <div class="position-relative">
                                <div class="chat-box p-9" style="height: calc(100vh - 428px)"
                                    data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: -20px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0"
                                                    role="region" aria-label="scrollable content"
                                                    style="height: 100%; overflow: hidden scroll;">
                                                    <div class="simplebar-content" style="padding: 20px;">
                                                        <div class="chat-list chat active-chat" data-user-id="1">
                                                            <div
                                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <img src="{{ asset($user->avatar) }}"
                                                                        alt="user4" width="72"
                                                                        height="72" class="rounded-circle">
                                                                    <div>
                                                                        <h6 class="fw-semibold fs-4 mb-0">
                                                                            {{ $user->name }}</h6>
                                                                        <p class="mb-0">
                                                                            {{ $user->getDepartment->title }}</p>
                                                                        <p class="mb-0">
                                                                            {{ $user->getJobTitle->title }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6 mb-7">
                                                                    <p class="mb-1 fs-2">Mã nhân viên</p>
                                                                    <h6 class="fw-semibold mb-0">
                                                                        {{ $user->code }}</h6>
                                                                </div>
                                                                <div class="col-6 mb-7">
                                                                    <p class="mb-1 fs-2">Email</p>
                                                                    <h6 class="fw-semibold mb-0">
                                                                        {{ $user->email }}</h6>
                                                                </div>
                                                                <div class="col-6 mb-9">
                                                                    <p class="mb-1 fs-2">Quản lý trực tiếp</p>
                                                                    <h6 class="fw-semibold mb-0">
                                                                        {{ $user->getManagement->name }}</h6>
                                                                </div>
                                                                <div class="col-6 mb-9">
                                                                    <p class="mb-1 fs-2">Trạng thái</p>
                                                                    <h6 class="fw-semibold mb-0">
                                                                        {{ $user->status == 1 ? 'Hoạt động' : 'Không hoạt động' }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-6 mb-7">
                                                                    <p class="mb-1 fs-2">Role</p>
                                                                    <h6 class="fw-semibold mb-0">
                                                                        {{ $roles[$user->role_id] }}</h6>
                                                                </div>
                                                                <div class="col-6 mb-7">
                                                                    <p class="mb-1 fs-2">Ngày bắt đầu làm việc </p>
                                                                    <h6 class="fw-semibold mb-0">
                                                                        {{ date('d/m/Y', strtotime($user->work_start_date)) }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-6 mb-7">
                                                                    <p class="mb-1 fs-2">Ngày tạo</p>
                                                                    <h6 class="fw-semibold mb-0">
                                                                        {{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-6 mb-7">
                                                                    <p class="mb-1 fs-2">Ngày cập nhật </p>
                                                                    <h6 class="fw-semibold mb-0">
                                                                        {{ date('d/m/Y H:i:s', strtotime($user->updated_at)) }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary fs-2"
                                                                    fdprocessedid="pk6kl8">Cập nhật</a>
                                                                <button class="btn btn-danger fs-2"
                                                                    fdprocessedid="83zpb">Xóa</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: auto; height: 578px;">
                                        </div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                        <div class="simplebar-scrollbar"
                                            style="height: 128px; transform: translate3d(0px, 0px, 0px); display: block;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection