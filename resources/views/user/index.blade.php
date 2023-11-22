@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Người dùng" action="Danh sách"/>
@endsection
@section('content')
    <div class="card rounded-2">
        <x-card-title title="Danh sách" label="Import" routeName="user.import" icon="ti ti-download fs-4">
            <x-slot:create>
                <a href="{{ route('user.create') }}"
                class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-plus"></i>
                    Tạo mới
                </a>
            </x-slot:create>
        </x-card-title>
        <div class="row card-body mx-0 pb-5 border-bottom">
            <form class="d-flex flex-wrap gap-2 justify-content-start" action="{{ route('user.search') }}" method="GET">
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-input name="keyword" class="col" :oldValue="request('keyword')"
                    placeholder="Mã nhân viên, tên nhân viên, email" />
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-input name="workDate" class="col" :oldValue="request('workDate')" datepicker="true"
                    placeholder="Ngày bắt đầu làm việc" />
                </div>
                @php
                    $selectedStatus = function ($key, $value) {
                        return $key == request('status');
                    };
                    $selectedJobTitle = isSelectedMultiple('job_title_id', 'request');
                    $selectedDepartment = isSelectedMultiple('department_id', 'request');
                    $selectedManagement = isSelectedMultiple('direct_management', 'request');
                @endphp
                <div class="col-12 col-md-3 col-xl-3">
                    <x-form-select :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" :isSelected="$selectedStatus" class="col" label="Trạng thái" name="status" hideLab="true"/>
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-select :select="$listJobTitle" class="col" name="job_title_id"
                    :isSelected="$selectedJobTitle" select2Multi="true" label="Chức danh" hideLab="true" placeholder="Chọn chức danh" />
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-select :select="$listDepartment" class="col" name="department_id"
                    :isSelected="$selectedDepartment" select2Multi="true" label="Phòng ban" hideLab="true" placeholder="Chọn phòng ban" />
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-select :select="$users" class="col" label="Quản lý trực tiếp" name="direct_management"
                    :isSelected="$selectedManagement" select2Multi="true" hideLab="true" placeholder="Chọn quản lý trực tiếp" />
                </div>
                <div class="col-4 col-md-2 col-xl-1 d-flex">
                    <button type="submit" style="min-height: 35px"
                        class="btn btn-info w-100 h-100 d-flex justify-content-center position-relative">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-white"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="row card-body">
            <div class="col py-3 border">
                <div class="position-relative">
                  <span class="ps-5 cursor-pointer">Tìm kiếm...</span>
                  <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                  <i class="ti ti-chevron-down position-absolute top-50 end-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
              </div>
              <div class="body-search d-none">
                <form class="d-flex flex-wrap gap-2 justify-content-start" action="{{ route('user.search') }}" method="GET">
                    <div class="col-12 col-md-4 col-xl-3">
                        <x-form-input name="keyword" class="col" :oldValue="request('keyword')"
                        placeholder="Mã nhân viên, tên nhân viên, email" />
                    </div>
                    <div class="col-12 col-md-4 col-xl-3">
                        <x-form-input name="workDate" class="col" :oldValue="request('workDate')" datepicker="true"
                        placeholder="Ngày bắt đầu làm việc" />
                    </div>
                    @php
                        $selectedStatus = function ($key, $value) {
                            return $key == request('status');
                        };
                        $selectedJobTitle = isSelectedMultiple('job_title_id', 'request');
                        $selectedDepartment = isSelectedMultiple('department_id', 'request');
                        $selectedManagement = isSelectedMultiple('direct_management', 'request');
                    @endphp
                    <div class="col-12 col-md-3 col-xl-3">
                        <x-form-select :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" :isSelected="$selectedStatus" class="col" label="Trạng thái" name="status" hideLab="true"/>
                    </div>
                    <div class="col-12 col-md-4 col-xl-3">
                        <x-form-select :select="$listJobTitle" class="col" name="job_title_id"
                        :isSelected="$selectedJobTitle" select2Multi="true" label="Chức danh" hideLab="true" placeholder="Chọn chức danh" />
                    </div>
                    <div class="col-12 col-md-4 col-xl-3">
                        <x-form-select :select="$listDepartment" class="col" name="department_id"
                        :isSelected="$selectedDepartment" select2Multi="true" label="Phòng ban" hideLab="true" placeholder="Chọn phòng ban" />
                    </div>
                    <div class="col-12 col-md-4 col-xl-3">
                        <x-form-select :select="$users" class="col" label="Quản lý trực tiếp" name="direct_management"
                        :isSelected="$selectedManagement" select2Multi="true" hideLab="true" placeholder="Chọn quản lý trực tiếp" />
                    </div>
                    <div class="col-4 col-md-2 col-xl-1 d-flex">
                        <button type="submit" style="min-height: 35px"
                            class="btn btn-info w-100 h-100 d-flex justify-content-center position-relative">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-white"></i>
                        </button>
                    </div>
                </form>
              </div>
        </div>
        <div class="card-body table-responsive-xl">
            <table class="table table-striped text-nowrap customize-table mb-0 align-middle mb-4">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>Avatar</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Chức danh</th>
                        <th>Phòng ban</th>
                        <th>Quản lý trực tiếp</th>
                        <th>Ngày tạo</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($listUser as $user)
                        <tr>
                            <td>
                                <img src="{{ asset($user->avatar) }}" width="60" height="60" alt="{{$user->avatar}}">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getJobTitle ? $user->getJobTitle->title : "" }}</td>
                            <td>{{ $user->getDepartment ? $user->getDepartment->title : "" }}</td>
                            <td>{{ $user->getManagement ? $user->getManagement->name : "" }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="text-center td-action">
                                <a href="{{ route('user.show', $user->id) }}">
                                    <i class="ti ti-eye fs-6"></i>
                                </a>
                                <a href="{{ route('user.edit', $user->id) }}"><i class="ti ti-pencil btn-update"></i></a>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#al-danger-alert"><i class="ti ti-trash btn-delete"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="8" class="text-center">NO DATA</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $listUser->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
{{-- @section('content')
    <div class="card rounded-2">
        <x-card-title title="Danh sách" label="Import" routeName="user.import" icon="ti ti-download fs-4">
            <x-slot:create>
                <a href="{{ route('user.create') }}"
                class="btn mb-1 waves-effect waves-light btn-primary">
                    <i class="ti ti-plus"></i>
                    Tạo mới
                </a>
            </x-slot:create>
        </x-card-title>
        <div class="row card-body mx-0 pb-5 border-bottom">
            <form class="d-flex flex-wrap gap-2 justify-content-start" action="{{ route('user.search') }}" method="GET">
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-input name="keyword" class="col" :oldValue="request('keyword')"
                    placeholder="Mã nhân viên, tên nhân viên, email" />
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-input name="workDate" class="col" :oldValue="request('workDate')" datepicker="true"
                    placeholder="Ngày bắt đầu làm việc" />
                </div>
                @php
                    $selectedStatus = function ($key, $value) {
                        return $key == request('status');
                    };
                    $selectedJobTitle = isSelectedMultiple('job_title_id', 'request');
                    $selectedDepartment = isSelectedMultiple('department_id', 'request');
                    $selectedManagement = isSelectedMultiple('direct_management', 'request');
                @endphp
                <div class="col-12 col-md-3 col-xl-3">
                    <x-form-select :select="['1'=>'Hoạt động', '2'=>'Không hoạt động']" :isSelected="$selectedStatus" class="col" label="Trạng thái" name="status" hideLab="true"/>
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-select :select="$listJobTitle" class="col" name="job_title_id"
                    :isSelected="$selectedJobTitle" select2Multi="true" label="Chức danh" hideLab="true" placeholder="Chọn chức danh" />
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-select :select="$listDepartment" class="col" name="department_id"
                    :isSelected="$selectedDepartment" select2Multi="true" label="Phòng ban" hideLab="true" placeholder="Chọn phòng ban" />
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <x-form-select :select="$users" class="col" label="Quản lý trực tiếp" name="direct_management"
                    :isSelected="$selectedManagement" select2Multi="true" hideLab="true" placeholder="Chọn quản lý trực tiếp" />
                </div>
                <div class="col-4 col-md-2 col-xl-1 d-flex">
                    <button type="submit" style="min-height: 35px"
                        class="btn btn-info w-100 h-100 d-flex justify-content-center position-relative">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-white"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="card-body table-responsive-xl">
            <table class="table table-striped text-nowrap customize-table mb-0 align-middle mb-4">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>Avatar</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Chức danh</th>
                        <th>Phòng ban</th>
                        <th>Quản lý trực tiếp</th>
                        <th>Ngày tạo</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($listUser as $user)
                        <tr>
                            <td>
                                <img src="{{ asset($user->avatar) }}" width="60" height="60" alt="{{$user->avatar}}">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getJobTitle ? $user->getJobTitle->title : "" }}</td>
                            <td>{{ $user->getDepartment ? $user->getDepartment->title : "" }}</td>
                            <td>{{ $user->getManagement ? $user->getManagement->name : "" }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="text-center td-action">
                                <a href="{{ route('user.show', $user->id) }}">
                                    <i class="ti ti-eye fs-6"></i>
                                </a>
                                <a href="{{ route('user.edit', $user->id) }}"><i class="ti ti-pencil btn-update"></i></a>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#al-danger-alert"><i class="ti ti-trash btn-delete"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="8" class="text-center">NO DATA</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $listUser->appends(request()->query())->links() }}
        </div>
    </div>
@endsection --}}

