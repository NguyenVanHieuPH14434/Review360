@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="card card-body">
            <div class="row">
                <div class="d-flex flex-wrap gap-2 justify-content-xxl-between justify-content-start">
                    <form class="d-flex flex-wrap gap-2 justify-content-start col-12 col-xxl-9" action="{{ route('department.search') }}" method="GET">
                        <div class="col-12 col-md-2 col-xl-1">
                            <div class="position-relative">
                                <select id="perPage" name="per_page" class="form-select">
                                    <option {{ request('per_page') == 1 ? 'selected' : '' }} value="10">10</option>
                                    <option {{ request('per_page') == 2 ? 'selected' : '' }} value="20">20</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-xl-3">
                            <div class="position-relative">
                                <input type="text" class="form-control product-search ps-3" name="title"
                                    value="{{ request('title') }}" placeholder="Chức danh">
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-xl-3">
                            <div class="position-relative">
                                <input type="text" class="form-control product-search ps-3" name="departmentCode"
                                    value="{{ request('departmentCode') }}" placeholder="Mã chức danh">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 col-xl-1 d-flex">
                            <button type="submit" style="min-height: 35px"
                                class="btn btn-info w-100 h-100 d-flex justify-content-center position-relative">
                                <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-white"></i>
                            </button>
                        </div>
                    </form>
                    <div class="d-flex gap-2 col-9 col-md-3 col-xxl-2">
                        <div class="col-auto text-start mt-3 mt-xxl-0">
                            <a href="{{ route('department.create') }}"
                                class="btn btn-info">
                                Create
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
        </div>
        <div class="table-responsive-xl card card-body">
            <table class="table table-bordered border-primary">
                <thead class="bg-primary text-white">
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
                            <td class="text-center">
                                <a href="{{ route('department.show', $department->id) }}">
                                    <i class="ti ti-eye fs-6"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="3" class="text-center">NO DATA</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $listDepartment->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#perPage").on("change", function(e) {
                var selectedValue = $(this).val();

                // Lấy URL hiện tại và thêm hoặc cập nhật tham số 'per_page'
                var currentUrl = window.location.href;
                var url = new URL(currentUrl);
                url.searchParams.set('per_page', selectedValue);

                window.location.href = url.toString();
            });
        });
    </script>
@endsection
