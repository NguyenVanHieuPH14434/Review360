@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Người dùng" action="Chi tiết" />
@endsection
@section('content')
    {{-- <x-card-title title="Thông tin người dùng">
        <x-slot:create>
            <a href="{{ route('jobTitle.create') }}" class="btn mb-1 waves-effect waves-light btn-primary">
                <i class="ti ti-plus"></i> Tạo mới
            </a>
        </x-slot:create>  
    </x-card-title> --}}

    <div class="card overflow-hidden chat-application">
        <div class="d-flex align-items-center justify-content-between gap-3 m-3 d-lg-none">
            <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar"
                aria-controls="chat-sidebar">
                <i class="ti ti-menu-2 fs-5"></i>
            </button>
            <form class="position-relative w-100 d-none">
                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                    placeholder="Search Contact">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="d-flex w-100">
            <div class="left-part border-end w-20 flex-shrink-0 d-none d-lg-block">
                <div class="px-9 pt-4 pb-3">
                    <a href="{{ route('user.create') }}" class="btn btn-primary fw-semibold py-8 w-100">Tạo mới</a>
                </div>
                <ul class="list-group simplebar-scrollable-y simplebar-mouse-entered" style="height: calc(100vh - 400px)"
                    data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a href="{{ route('user.list') }}" class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1">
                                                <i class="ti ti-list"></i>Danh sách </a>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 230px; height: 370px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </ul>
            </div>
            <div class="d-flex w-100">
                <div class="min-width-340" style="width: 0px !important; min-width: 0px !important; z-index: -999;">
                    <div class="border-end user-chat-box h-100">
                        <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                            <form class="position-relative">
                                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                                    placeholder="Search" />
                                <i
                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                            </form>
                        </div>
                        <div class="app-chat">
                            <ul class="chat-users" style="height: calc(100vh - 400px)" data-simplebar>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user bg-light"
                                        id="chat_user_1" data-user-id="1">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-4.jpg" alt="user-4" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Dr.
                                                Bonnie Barstow
                                            </h6>
                                            <span class="fs-2 text-body-color d-block">barstow@ modernize.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_2" data-user-id="2">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-4.jpg" alt="user4" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                                                Jonathan Higgins
                                            </h6>
                                            <span class="fs-2 text-body-color d-block">jonathan_hig@modernize.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_3" data-user-id="3">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-3.jpg" alt="user3" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Michael
                                                Knight
                                            </h6>
                                            <span class="fs-2 text-body-color d-block">michale-knight@gmail.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_4" data-user-id="4">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-8.jpg" alt="user8" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Angus
                                                MacGyver</h6>
                                            <span class="fs-2 text-body-color d-block">macgyver@gmail.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_5" data-user-id="5">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-2.jpg" alt="user2" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Rick
                                                Wright</h6>
                                            <span class="fs-2 text-body-color d-block">rockwright@modernize.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_6" data-user-id="6">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-1.jpg" alt="user1" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Sledge
                                                Hammer</h6>
                                            <span class="fs-2 text-body-color d-block">hammer9@gmail.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_7" data-user-id="7">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-3.jpg" alt="user3" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Peter
                                                Thornton</h6>
                                            <span class="fs-2 text-body-color d-block">peter293@modernize.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_8" data-user-id="8">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-1.jpg" alt="user1" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Devon
                                                Miles</h6>
                                            <span class="fs-2 text-body-color d-block">devon@gmail.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_9" data-user-id="9">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-1.jpg" alt="user1" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Michael
                                                Knight</h6>
                                            <span class="fs-2 text-body-color d-block">michael_knight@modernize.com</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
                                        id="chat_user_10" data-user-id="10">
                                        <span class="position-relative">
                                            <img src="../assets/images/profile/user-1.jpg" alt="user1" width="40"
                                                height="40" class="rounded-circle">
                                        </span>
                                        <div class="ms-6 d-inline-block w-75">
                                            <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">Mike
                                                Torello</h6>
                                            <span class="fs-2 text-body-color d-block">torello@gmail.com</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-100">
                    <div class="chat-container h-100 w-100">
                        <div class="chat-box-inner-part h-100">
                            <div class="chatting-box app-email-chatting-box">
                                <div
                                    class="p-9 py-3 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                                    <h5 class="text-dark mb-0 fw-semibold">Thông tin cá nhân</h5>
                                    <ul class="list-unstyled mb-0 d-flex align-items-center">
                                        <li class="d-lg-none d-block">
                                            <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                href="javascript:void(0)">
                                                <i class="ti ti-arrow-left"></i>
                                            </a>
                                        </li>
                                        {{-- <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="important">
                                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                href="javascript:void(0)">
                                                <i class="ti ti-star"></i>
                                            </a>
                                        </li> --}}
                                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Edit">
                                            <a class="d-block text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                href="{{ route('user.edit', $user->id) }}">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                        </li>
                                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Delete">
                                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                href="javascript:void(0)">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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

            <div class="offcanvas user-chat-box offcanvas-end" tabindex="-1" id="chat-sidebar"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"> Contact </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="px-9 pt-4 pb-3">
                    <a href="{{ route('user.create') }}" class="btn btn-primary fw-semibold py-8 w-100">Tạo mới</a>
                </div>
                <ul class="list-group simplebar-scrollable-y" style="height: calc(100vh - 150px)" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a href="{{ route('user.list') }}" class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1">
                                                <i class="ti ti-list"></i>Danh sách </a>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 330px; height: 370px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 299px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    </div>
@endsection
