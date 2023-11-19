@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Phòng ban" action="Danh sách"/>
@endsection
@section('content')
    <div class="card card-body rounded-2">
        <div class="row pb-5 border-bottom">
            <div class="d-flex flex-wrap gap-2 justify-content-xxl-between justify-content-start">
                <form class="d-flex flex-wrap gap-2 justify-content-start col-12 col-xxl-9" action="{{ route('department.search') }}" method="GET">
                    <div class="col-12 col-md-4 col-xl-3">
                        <div class="position-relative">
                            <input type="text" class="form-control product-search ps-3" name="title"
                                value="{{ request('title') }}" placeholder="Phòng ban">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl-3">
                        <div class="position-relative">
                            <input type="text" class="form-control product-search ps-3" name="departmentCode"
                                value="{{ request('departmentCode') }}" placeholder="Mã phòng ban">
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-xl-1 d-flex">
                        <button type="submit" style="min-height: 35px"
                            class="btn btn-info w-100 h-100 d-flex justify-content-center position-relative">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-white"></i>
                        </button>
                    </div>
                </form>
                <div class="d-flex justify-content-xl-end gap-2 col-9 col-md-3 col-xxl-2">
                    <div class="col-auto text-start mt-3 mt-xxl-0">
                        <a href="{{ route('department.create') }}"
                            class="btn btn-info">
                            <i class="ti ti-plus"></i>
                            Tạo mới
                         </a>
                    </div>
                    <div class="col-auto text-start mt-3 mt-xxl-0">
                        <div class="btn-group">
                            <a href="{{ route('department.importView') }}" class="btn btn-info dropdown" >
                              <i class="ti ti-download fs-4"></i>
                              Import
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-xl">
            <table class="table table-striped text-nowrap customize-table mb-0 align-middle mb-4">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>Mã phòng ban</th>
                        <th>Phòng ban</th>
                        <th>Ngày tạo</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($listDepartment as $department)
                        <tr>
                            <td>{{ $department->department_code }}</td>
                            <td>{{ $department->title }}</td>
                            <td>{{ $department->created_at->format('d/m/Y') }}</td>
                            <td class="text-center td-action">
                                <a href="{{ route('department.show', $department->id) }}">
                                    <i class="ti ti-eye fs-6"></i>
                                </a>
                                <a href="{{ route('department.edit', $department->id) }}"><i class="ti ti-pencil btn-update"></i></a>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#al-danger-alert"><i class="ti ti-trash btn-delete"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4" class="text-center">NO DATA</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $listDepartment->appends(request()->query())->links() }}
        </div>
    </div>
@endsection

